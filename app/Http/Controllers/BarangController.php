<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        // //get barang
        // $barang = Barang::latest()->filter()->paginate(5);
        $barang = Barang::latest()->paginate(5);

        //render view with barang
        return view('index', compact('barang'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'FotoBarang'  => 'required|image|mimes:jpeg,png,jpg|max:100',
            'NamaBarang'  => 'required',
            'HargaBeli'   => 'required',
            'HargaJual'   => 'required',
            'Stok'        => 'required'
        ]);

        //upload image
        $FotoBarang = $request->file('FotoBarang');
        $FotoBarang->storeAs('public/barang', $FotoBarang->hashName());

        //create Barang
        Barang::create([
            'FotoBarang'    => $FotoBarang->hashName(),
            'NamaBarang'    => $request->NamaBarang,
            'HargaBeli'     => $request->HargaBeli,
            'HargaJual'     => $request->HargaJual,
            'Stok'          => $request->Stok
        ]);

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     *
     * @param  mixed $barang
     * @return void
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $barang
     * @return void
     */
    public function update(Request $request, Barang $barang)
    {
        //validate form
        $this->validate($request, [
            'FotoBarang'  => 'required|image|mimes:jpeg,png,jpg|max:100',
            'NamaBarang'  => 'required',
            'HargaBeli'   => 'required',
            'HargaJual'   => 'required',
            'Stok'        => 'required'
        ]);

        //check if image is uploaded
        if ($request->hasFile('FotoBarang')) {

            //upload new image
            $FotoBarang = $request->file('FotoBarang');
            $FotoBarang->storeAs('public/barang', $FotoBarang->hashName());

            //delete old image
            Storage::delete('public/barang/' . $barang->image);

            //update Barang with new image
            $barang->update([
                'FotoBarang'    => $FotoBarang->hashName(),
                'NamaBarang'    => $request->NamaBarang,
                'HargaBeli'     => $request->HargaBeli,
                'HargaJual'     => $request->HargaJual,
                'Stok'          => $request->Stok
            ]);
        } else {

            //update Barang without image
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
}
