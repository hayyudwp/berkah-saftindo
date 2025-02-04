<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::select(['id', 'name', 'desc', 'image', 'price', 'category_id', 'slug']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-warning" href="' . route("products.edit", $row->id) . '"><i class="bi bi-pencil-square"></i></a>';
                    $btn .= '&nbsp; <button class="btn btn-danger delete-item" data-id="' . $row->id . '"><i class="bi bi-trash-fill"></i></button>';
                    return $btn;
                })
                ->editColumn('image', function ($item) {
                    return $item->image 
                        ? '<img src="' . Storage::url('products/' . $item->image) . '" width="100">'
                        : 'No Image';
                })
                // Menambahkan kategori untuk ditampilkan di DataTable
                ->addColumn('category_name', function ($item) {
                    return $item->category ? $item->category->name : 'No Category';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('admin.products.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'nullable|numeric',
            'category_id' => 'required|numeric',
        ]);

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->desc = $validatedData['desc']; // TinyMCE akan mengirimkan HTML di dalam deskripsi
        $product->price = $validatedData['price'] ?? null;
        $product->category_id = $validatedData['category_id'];
        $product->slug = Str::slug($validatedData['name']);

        // Menangani file gambar
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('products', $filename, 'public');
            $product->image = $filename;
        }

        // Membuat slug dari nama produk
        $product->save();

        return redirect()->route('products.index')->with('success', 'Berhasil Menambahkan Produk.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'nullable|numeric',
            'category_id' => 'required|numeric',
        ]);
    
        // Jika ada file gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image && Storage::exists('public/products/' . $product->image)) {
                Storage::delete('public/products/' . $product->image);
            }
    
            // Simpan gambar baru dengan nama berdasarkan slug judul
            $file = $request->file('image');
            $filename = Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('products', $filename, 'public');
            $validatedData['image'] = $filename; // Tambahkan nama file baru ke data yang divalidasi
        }
    
        // Generate slug baru
        $validatedData['slug'] = Str::slug($validatedData['name']);
    
        // Update model
        $product->update($validatedData);
    
        return redirect()->route('products.index')->with('success', 'Berhasil Memperbarui Produk.');
    }

    public function delete(Request $request)
    {
        $record = Product::find($request->itemID);

        if (!$record) {
            return response()->json(['status' => 'failed', 'message' => 'Produk tidak ditemukan'], 404);
        }

        // Hapus gambar dari storage jika ada
        if ($record->image && Storage::exists('public/products/' . $record->image)) {
            Storage::delete('public/products/' . $record->image);
        }

        $record->delete();

        return response()->json(['status' => 'success', 'message' => 'Produk Berhasil dihapus']);
    }
}
