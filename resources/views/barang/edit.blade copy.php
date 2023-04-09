@extends('layouts.edit')
 
@section('title', 'Page Title')

@section('content')
    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
    @csrf
    @method('PUT')
        <label class="font-weight-bold">Pilih Foto Barang</label>
        <input type="file" class="form-control" name="FotoBarang" value="{{ old('FotoBarang', $barang->FotoBarang) }}">

        <label for="NamaBarang">Nama Barang</label>
        <input type="text" id="NamaBarang" name="NamaBarang" placeholder="Nama Barang..." value="{{ old('NamaBarang', $barang->NamaBarang) }}">
  
        <label for="HargaBeli">Harga Beli</label>
        <input type="text" id="HargaBeli" name="HargaBeli" placeholder="Harga Beli..." value="{{  old('HargaBeli', $barang->HargaBeli) }}">
  
        <label for="HargaJual">Harga Jual</label>
        <input type="text" id="HargaJual" name="HargaJual" placeholder="Harga Jual..." value="{{ old('HargaJual', $barang->HargaJual) }}">

        <label for="Stok">Stok</label>
        <input type="text" id="Stok" name="Stok" placeholder="Stok..." value="{{ old('Stok', $barang->Stok) }}">
    
      <button type="submit" value="Submit" class="update">Update</button>
    </form>
  @endsection
