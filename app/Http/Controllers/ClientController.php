<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ClientController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::select(['id', 'name', 'address', 'image']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-warning" href="' . route("clients.edit", $row->id) . '"><i class="bi bi-pencil-square"></i></a>';
                    $btn .= '&nbsp; <button class="btn btn-danger delete-item" data-id="' . $row->id . '"><i class="bi bi-trash-fill"></i></button>';
                    return $btn;
                })
                ->editColumn('image', function ($item) {
                    return $item->image 
                        ? '<img src="' . Storage::url('clients/' . $item->image) . '" width="100">'
                        : 'No Image';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('admin.clients.index');
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            
        ]);

        $client = new Client($validatedData);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('clients', $filename, 'public');
            $client->image = $filename;
        }

        $client->save();

        return redirect()->route('clients.index')->with('success', 'Berhasil Menambahkan Klien.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            
        ]);
    
        // Jika ada file gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($client->image && Storage::exists('public/clients/' . $client->image)) {
                Storage::delete('public/clients/' . $client->image);
            }
    
            // Simpan gambar baru dengan nama berdasarkan slug judul
            $file = $request->file('image');
            $filename = Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('clients', $filename, 'public');
            $validatedData['image'] = $filename; // Tambahkan nama file baru ke data yang divalidasi
        }
    
    
        // Update model
        $client->update($validatedData);
    
        return redirect()->route('clients.index')->with('success', 'Berhasil Memperbarui Klien.');
    }
    

    public function delete(Request $request)
    {
        $record = Client::find($request->itemID);

        if (!$record) {
            return response()->json(['status' => 'failed', 'message' => 'Klien tidak ditemukan'], 404);
        }

        if ($record->image && Storage::exists('public/clients/' . $record->image)) {
            Storage::delete('public/clients/' . $record->image);
        }

        $record->delete();

        return response()->json(['status' => 'success', 'message' => 'Klien Berhasil dihapus']);
    }
}
