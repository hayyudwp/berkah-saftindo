<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Client;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Lakukan autentikasi
        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect()->intended('/admin/dashboards')->with('success', 'Login successful!');
        }

        // Jika gagal
        return back()->withErrors([
            'username' => 'Invalid username or password.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('success', 'You have been logged out.');
    }

    public function dashboard()
    {
        // Pastikan user sudah login
        if (Auth::check()) {
            // Ambil jumlah data untuk produk, kategori, klien, dan blog
            $totalProducts = Product::count();
            $totalCategories = Category::count();
            $totalClients = Client::count();
            $totalBlogs = Blog::count();

            // Kirim data ke view
            return view('admin.dashboard', compact('totalProducts', 'totalCategories', 'totalClients', 'totalBlogs'));
        }

        return redirect()->route('login');
    }
}
