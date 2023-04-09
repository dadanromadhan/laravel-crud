<html>
    <head>
        <title>BANTENG</title>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <a href="{{ route('barang.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Harga Beli</th>
                                    <th scope="col">Harga Jual</th>
                                    <th scope="col">Foto Barang</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @forelse ($produk as $post)
                                    <tr>
                                        <td>{{ $post->id }}
                                        <td class="text-center">
                                            <img src="{{ Storage::url('public/posts/').$post->image }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $post->FotoBarang}}</td>
                                        <td>{{ $post->NamaBarang }}</td>
                                        <td>{!! $post->HargaBeli!!}</td>
                                        <td>{!! $post->HargaJual!!}</td>
                                        <td>{!! $post->Stok !!}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
                              {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
    
        <script>
            //message with toastr
            @if(session()->has('success'))
            
                toastr.success('{{ session('success') }}', 'BERHASIL!'); 
    
            @elseif(session()->has('error'))
    
                toastr.error('{{ session('error') }}', 'GAGAL!'); 
                
            @endif
        </script>
    <script src="{{ asset('css/table-detail/js/index.js') }}"></script>
    </body>
</html>