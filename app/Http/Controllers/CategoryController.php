<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::select(['id', 'name', 'desc', 'icon', 'slug']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-warning" href="' . route("categories.edit", $row->id) . '"><i class="bi bi-pencil-square"></i></a>';
                    $btn .= '&nbsp; <button class="btn btn-danger delete-item" data-id="' . $row->id . '"><i class="bi bi-trash-fill"></i></button>';
                    return $btn;
                })
                ->editColumn('icon', function ($item) {
                    return $item->icon 
                        ? '<img src="' . Storage::url('categories/' . $item->icon) . '" width="100">'
                        : 'No icon';
                })
                ->rawColumns(['action', 'icon'])
                ->make(true);
        }
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'icon' => 'nullable|mimes:ico,jpeg,png,jpg|max:2048', // Perbaiki validasi mimes
        ]);
    
        $category = new Category($validatedData);
    
        // Jika ada file 'icon' yang diunggah
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('categories', $filename, 'public');
            $category->icon = $filename;
        }
    
        // Buat slug berdasarkan nama kategori
        $category->slug = Str::slug($validatedData['name']);
        $category->save();
    
        return redirect()->route('categories.index')->with('success', 'Berhasil Menambahkan Kategori.');
    }
    

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'icon' => 'nullable|mimes:ico,jpeg,png,jpg|max:2048',
        ]);
    
        // Jika ada file gambar baru
        if ($request->hasFile('icon')) {
            // Hapus gambar lama jika ada
            if ($category->icon && Storage::exists('public/categories/' . $category->icon)) {
                Storage::delete('public/categories/' . $category->icon);
            }
    
            // Simpan gambar baru dengan nama berdasarkan slug judul
            $file = $request->file('icon');
            $filename = Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('categories', $filename, 'public');
            $validatedData['icon'] = $filename; // Tambahkan nama file baru ke data yang divalidasi
        }
    
        // Generate slug baru
        $validatedData['slug'] = Str::slug($validatedData['name']);
    
        // Update model
        $category->update($validatedData);
    
        return redirect()->route('categories.index')->with('success', 'Berhasil Memperbarui Kategori.');
    }
    

    public function delete(Request $request)
    {
        $record = Category::find($request->itemID);

        if (!$record) {
            return response()->json(['status' => 'failed', 'message' => 'Category tidak ditemukan'], 404);
        }

        if ($record->icon && Storage::exists('public/categories/' . $record->icon)) {
            Storage::delete('public/categories/' . $record->icon);
        }

        $record->delete();

        return response()->json(['status' => 'success', 'message' => 'Category Berhasil dihapus']);
    }
}
