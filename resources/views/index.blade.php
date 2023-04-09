 
@extends('layouts.app')
 
@section('title', 'Page Title')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div>
            <h3 class="text-center my-4">Daftar Barang</h3>

            <hr>
        </div>
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <!-- begin of search -->
                <nav class="navbar bg-body-tertiary float-right">
                    <div class="container-fluid ">
                      <form class="d-flex" role="search" method="post" action="/barang">
                        <input class="form-control me-2" type="search" placeholder="Search" >
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                    </div>
                  </nav>
<!-- end of search -->
                
                             <!-- Trigger Open The Modal -->
             <button id="myBtn" class="btn btn-primary mb-3">Tambah Barang</button>
                        
                
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
                         <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                             @csrf
                             {{-- <label for="FotoBarang">Pilih Foto Barang</label>
                             <input type="file" class="form-control" name="FotoBarang" required> --}}

                             <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control @error('FotoBarang') is-invalid @enderror" name="FotoBarang">
                            
                                <!-- error message untuk title -->
                                @error('FotoBarang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

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
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" >ID</th>
                        <th scope="col">Foto Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($barang as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td class="text-center">
                                <img src="{{ URL::to('/barang/' . $product->FotoBarang) }}" alt="{{ $product->NamaBarang }}" />
                            </td>
                            <td>{{ $product->NamaBarang}}</td>
                            <td>{!! $product->HargaBeli!!}</td>
                            <td>{{ $product->HargaJual }}</td>
                            <td>{{ $product->Stok }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barang.destroy', $product->id) }}" method="POST">
                                    <a href="{{ route('barang.edit', $product->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                      @empty
                          <div class="alert alert-danger">
                              Data Post belum Tersedia.
                          </div>
                      @endforelse
                    </tbody>
                  </table>  
                  <div class="pagination">
                  {{ $barang->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

