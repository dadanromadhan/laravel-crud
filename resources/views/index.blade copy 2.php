 @extends('layouts.app')

 @section('title', 'Page Title')

 @section('content')
 <div class="container-modal">

     <div class="row">
         <div class="col-md-12">
             <h1 class="mb-5 text-center">Product List</h1>
             <!-- begin of search -->
             <div class="row justify-content-center">
                 <form action="/barang" method="">
                     <div class="input-group mb-3">
                         <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ 'search' }}">
                         <button class="btn btn-danger" type="submit">Cari</button>
                     </div>
                     {{-- @else
                  <p class="text-center fs-4" >Barang yang anda cari tidak ada</p>
                  @endif --}}
                 </form>
             </div>
             <!-- end of search -->

             <a class="btn btn-primary mb-3" href="/barang/create">Add New Product</a>
             <!-- Trigger/Open The Modal -->
             <button id="myBtn" class="btn btn-primary mb-3">Open Modal</button>

             <!-- The Modal -->
             <div id="myModal" class="modal">

                 <!-- Modal content -->
                 <div class="modal-content">
                     <div class="modal-header">
                         <h2>Tambah Barang</h2>
                         <span class="close">&times;</span>
                     </div>
                     <div class="modal-body">
                         <!-- modal Body -->
                         <form action="/barang" method="post">
                             @csrf
                             <label class="font-weight-bold">Pilih Foto Barang</label>
                             <input type="file" class="form-control" name="FotoBarang" required>

                             <label for="NamaBarang">Nama Barang</label>
                             <input type="text" id="NamaBarang" name="NamaBarang" placeholder="Nama Barang..." required autofocus>

                             <label for="HargaBeli">Harga Beli</label>
                             <input type="text" id="HargaBeli" name="HargaBeli" placeholder="Harga Beli..." required autofocus>

                             <label for="HargaJual">Harga Jual</label>
                             <input type="text" id="HargaJual" name="HargaJual" placeholder="Harga Jual..." required autofocus>

                             <label for="Stok">Stok</label>
                             <input type="text" id="Stok" name="Stok" placeholder="Stok..." required autofocus>

                             <button type="submit" value="Submit" class="btn btn-dark">Add</button>
                         </form>
                         <!-- end of modal body -->
                     </div>
                     <div class="modal-footer">
                         <h3>Modal Footer</h3>
                     </div>
                 </div>

             </div>

             <!-- end of modal -->
             @if(session()->has('success'))
             <div class="alert alert-success" role="alert">
                 {{ session('succsess') }}
             </div>
             @endif
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
                             <form action="/barang" method="POST" style="display: inline-block;">
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