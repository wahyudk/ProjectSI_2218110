<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Izin Pegawai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Izin Pegawai</h3>
                    <h5 class="text-center"><a href="https://github.com/wahyudk">SDM PT. PLN</a></h5>         
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('post3.create') }}" class="btn btn-md btn-success mb-3">CREATE DATA</a>
                        <a href='{{ url('post3/view/pdf') }}' class="btn btn-md btn-success mb-3">DOWNLOAD AS PDF</a>
                        <a href="{{ ('dashboard') }}" class="btn btn-md btn-primary mb-3">DASHBOARD</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">ID Pegawai</th>
                                <th scope="col">Tanggal Izin</th>
                                <th scope="col">keterangan</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($post3 as $post)
                                <tr>
                                    <td>{{ $post->idpegawai }}</td>
                                    <td>{{ $post->tglizin }}</td>
                                    <td>{{ $post->keterangan }}</td>
                                    <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('post3.destroy', $post->id) }}" method="POST">
                                              <a href="{{ route('post3.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Pegawai Kosong.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>