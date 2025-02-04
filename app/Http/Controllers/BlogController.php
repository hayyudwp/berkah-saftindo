<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::select(['id', 'title', 'content', 'image', 'slug', 'published_at']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-warning" href="' . route("blogs.edit", $row->id) . '"><i class="bi bi-pencil-square"></i></a>';
                    $btn .= '&nbsp; <button class="btn btn-danger delete-item" data-id="' . $row->id . '"><i class="bi bi-trash-fill"></i></button>';
                    return $btn;
                })
                ->editColumn('image', function ($item) {
                    return $item->image 
                        ? '<img src="' . Storage::url('blogs/' . $item->image) . '" width="100">'
                        : 'No Image';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('admin.blogs.index');
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'published_at' => 'required',
        ]);

        $blog = new Blog($validatedData);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('blogs', $filename, 'public');
            $blog->image = $filename;
        }

        $blog->slug = Str::slug($validatedData['title']);
        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Berhasil Menambahkan Blog.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'published_at' => 'required',
        ]);
    
        // Jika ada file gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($blog->image && Storage::exists('public/blogs/' . $blog->image)) {
                Storage::delete('public/blogs/' . $blog->image);
            }
    
            // Simpan gambar baru dengan nama berdasarkan slug judul
            $file = $request->file('image');
            $filename = Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('blogs', $filename, 'public');
            $validatedData['image'] = $filename; // Tambahkan nama file baru ke data yang divalidasi
        }
    
        // Generate slug baru
        $validatedData['slug'] = Str::slug($validatedData['title']);
    
        // Update model
        $blog->update($validatedData);
    
        return redirect()->route('blogs.index')->with('success', 'Berhasil Memperbarui Blog.');
    }
    

    public function delete(Request $request)
    {
        $record = Blog::find($request->itemID);

        if (!$record) {
            return response()->json(['status' => 'failed', 'message' => 'Blog tidak ditemukan'], 404);
        }

        if ($record->image && Storage::exists('public/blogs/' . $record->image)) {
            Storage::delete('public/blogs/' . $record->image);
        }

        $record->delete();

        return response()->json(['status' => 'success', 'message' => 'Blog Berhasil dihapus']);
    }
}
