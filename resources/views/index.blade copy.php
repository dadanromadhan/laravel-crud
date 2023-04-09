 @extends('layouts.app')

 @section('title', 'Page Title')

 @section('content')
 <div class="container-modal">
     <div class="row">
         <div class="col-md-12">
             <h1>Product List</h1>
             <a class="btn btn-primary mb-3" href="/barang/create">Add New Product</a>
             <!-- Trigger/Open The Modal -->
             <button id="myBtn" class="btn btn-primary mb-3">Open Modal</button>

             <!-- The Modal -->
             <div id="myModal" class="modal">

                 <!-- Modal content -->
                 <div class="modal-content">
                     <div class="modal-header">
                         <h2>Modal Header</h2>
                     </div>
                     <div class="modal-body">
                         <!-- modal Body -->
                         <form action="/barang" method="post">
                             @csrf
                             <label class="font-weight-bold">Pilih Foto Barang</label>
                             <input type="file" class="form-control" name="FotoBarang">

                             <label for="NamaBarang">Nama Barang</label>
                             <input type="text" id="NamaBarang" name="NamaBarang" placeholder="Nama Barang..." value="{{ old('NamaBarang') }}">

                             <label for="HargaBeli">Harga Beli</label>
                             <input type="text" id="HargaBeli" name="HargaBeli" placeholder="Harga Beli..." value="{{  old('HargaBeli') }}">

                             <label for="HargaJual">Harga Jual</label>
                             <input type="text" id="HargaJual" name="HargaJual" placeholder="Harga Jual..." value="{{ old('HargaJual') }}">

                             <label for="Stok">Stok</label>
                             <input type="text" id="Stok" name="Stok" placeholder="Stok..." value="{{ old('Stok') }}">

                             <button type="submit" value="Submit" class="save">Add</button>
                         </form>
                         <!-- end of modal body -->
                     </div>
                     <div class="modal-footer">
                         <h3>Modal Footer</h3>
                     </div>
                 </div>

             </div>

             <!-- end of modal -->
             <table class="table table-striped">
                 <thead>
                     <tr>
                         <th scope="col">ID</th>
                         <th scope="col">Foto Barang</th>
                         <th scope="col">Nama Barang</th>
                         <th scope="col">Harga Beli</th>
                         <th scope="col">Harga Jual</th>
                         <th scope="col">Stok</th>
                         <th scope="col">Action</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($barang as $product)
                     <tr>
                         <td>{{ $product->id }}</td>
                         <td><img src="{{ asset('storage/' . $product->FotoBarang) }}" alt="{{ $product->NamaBarang }}" width="50"></td>
                         <td>{{ $product->NamaBarang }}</td>
                         <td>{{ $product->HargaBeli}}</td>
                         <td>{{ $product->HargaJual }}</td>
                         <td>{{ $product->Stok }}</td>
                         <td>
                             <a class="btn btn-secondary" href="{{ route('barang.edit', $product->id) }}">Edit</a>
                             <form action="{{ route('barang.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                 <!-- delete -->
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                             </form>
                         </td>
                     </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
     </div>
 </div>
 @endsection