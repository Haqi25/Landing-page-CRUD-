<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $produks = Produk::all();

        return view('dashboard', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
      
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'string|max:255|nullable'
        ], 
      
        [
            'nama_produk.required' => 'Nama Harus Diisi',
            'nama_produk.max:255' => 'Tidak Boleh lebih dari 255 karakter',
            'gambar.required' => 'Gambar Harus diisi',
            'gambar.mimes:jpeg,png,jpg,webp' => 'Gambar harus berupa file jpeg, png, jpg dan webp',
            'harga.required' => 'Harga Harus diisi',
            'harga.numeric' => 'Harga Harus Numeric',
            'harga.min:0' => 'Harga minimal harus 0',
        ]
    
        
    );

     if ($request->hasFile('gambar')) {
    $path = $request->file('gambar')->store('produk', 'public');
    $validatedData['gambar'] = $path;
     }
          Produk::create($validatedData);

          return redirect()->route('dashboard.index')->with('success', 'Data Berhasil dibuat');
     
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);


        return view('edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
         $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'gambar' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'string|max:255|nullable'
        ], 
      
        [
            'nama_produk.required' => 'Nama Harus Diisi',
            'nama_produk.max:255' => 'Tidak Boleh lebih dari 255 karakter',
            
            'gambar.mimes:jpeg,png,jpg,webp' => 'Gambar harus berupa file jpeg, png, jpg dan webp',
            'harga.required' => 'Harga Harus diisi',
            'harga.numeric' => 'Harga Harus Numeric',
            'harga.min:0' => 'Harga minimal harus 0',
        ]
    
        
    );

     if ($request->hasFile('gambar')) {
    $path = $request->file('gambar')->store('produk', 'public');
    $validatedData['gambar'] = $path;
        
    }

    $produk = Produk::findOrFail($id);
    
    $produk->update($validatedData);
   
    return redirect()->route('dashboard.index')->with('success', 'Data Berhasil Diubah');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);

        $produk->delete();

        return redirect()->route('dashboard.index')->with('success', 'Data Berhasil Dihapus');
    }

}
