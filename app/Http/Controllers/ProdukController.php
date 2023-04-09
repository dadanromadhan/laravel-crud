<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProdukController extends Controller
{
    public function index()
    {
        //get barang
        $barang = Barang::latest()->filter('search')->paginate(5);

        //render view with barang
        return view('index', compact('barang'));
    }

    public function create(): View
    {
        return view('barang.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'FotoBarang'  => 'required|image|mimes:jpeg,png,jpg|max:100',
            'NamaBarang' => 'required|unique:barangs',
            'HargaBeli' =>  'required',
            'HargaJual' =>   'required',
            'Stok'      =>    'required'
        ]);
        //upload image
        $FotoBarang = $request->file('FotoBarang');
        $FotoBarang->storeAs('public/barang', $FotoBarang->hashName());
        Barang::create([
            'FotoBarang'    => $FotoBarang->hashName(),
            'NamaBarang'    => $request->NamaBarang,
            'HargaBeli'     => $request->HargaBeli,
            'HargaJual'     => $request->HargaJual,
            'Stok'          => $request->Stok
        ]);
        return redirect('barang')->with('Data Baru telah di simpan!');
    }

    public function edit(string $id): View
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    //update
    public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'FotoBarang'  => 'required|image|mimes:jpeg,png,jpg|max:100',
            'NamaBarang' => 'required',
            'HargaBeli' =>  'required',
            'HargaJual' =>   'required',
            'Stok'      =>    'required'
        ]);
        //get post by ID
        $barang = Barang::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('FotoBarang')) {

            //upload new image
            $FotoBarang = $request->file('FotoBarang');
            $FotoBarang->storeAs('public/barang/', $FotoBarang->hashName());

            //delete old image
            Storage::delete('public/barang/' . $barang->FotoBarang);

            //update post with new image
            $barang->update([
                'FotoBarang'    => $FotoBarang->hashName(),
                'NamaBarang'    => $request->NamaBarang,
                'HargaBeli'     => $request->HargaBeli,
                'HargaJual'     => $request->HargaJual,
                'Stok'          => $request->Stok
            ]);
        } else {

            //update post without image
            $barang->update([
                'NamaBarang'    => $request->NamaBarang,
                'HargaBeli'     => $request->HargaBeli,
                'HargaJual'     => $request->HargaJual,
                'Stok'          => $request->Stok
            ]);
        }

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    //delete
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $barang = Barang::findOrFail($id);

        //delete image
        Storage::delete('public/barang' . $barang->GambarBarang);

        //delete post
        $barang->delete();

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
