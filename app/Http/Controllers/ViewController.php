<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Client;
use App\Models\Product;
use App\Models\Blog;

class ViewController extends Controller
{
    public function home()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
        $clients = Client::all();
        return view('home', compact('products', 'categories', 'clients'));
    }

    public function about()
    {
        return view('about');
    }

    public function blog()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('blog', compact('blogs'));
    }
    
    public function contact()
    {
        return view('contact');
    }
    
    public function product()
    {
        $products = Product::with('category')->inRandomOrder()->limit(15)->get();
        $categories = Category::all();
        return view('product', compact('products', 'categories'));
    }

    // Endpoint untuk mengambil produk berdasarkan kategori
    public function getProducts(Request $request)
    {
        $query = Product::query();

        // Filter berdasarkan kategori jika kategori tidak "all"
        if ($request->category_id && $request->category_id !== 'all') {
            $query->where('category_id', $request->category_id);
        }
    
        // Filter berdasarkan pencarian nama produk
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
    
        // Batasi jumlah produk yang ditampilkan
        $limit = $request->limit ?? 5;
        $products = $query->limit($limit)->get();
    
        return response()->json($products);
    }
    

    public function showProductDetail($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        
        // Ambil produk terkait berdasarkan kategori yang sama
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)  // Pastikan produk yang sedang dilihat tidak muncul di related products
            ->limit(4)  // Menampilkan 4 produk terkait
            ->get();
    
        return view('product-detail', compact('product', 'relatedProducts'));
    }
    
    public function showBlogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blog-detail', compact('blog'));
    }
}

