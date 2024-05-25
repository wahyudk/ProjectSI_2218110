<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Absensi Pegawai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('post1.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                            <label class="font-weight-bold">ID Pegawai</label>
                                <input type="text" class="form-control @error('idpegawai') is-invalid @enderror" name="idpegawai" value="{{ old('title') }}" placeholder="Masukkan ID Pegawai">
                            
                                <!-- error message untuk idpegawai -->
                                @error('idpegawai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Masuk</label>
                                <input type="text" class="form-control @error('tglmasuk') is-invalid @enderror" name="tglmasuk" value="{{ old('jabatan') }}" placeholder="Masukkan tglmasuk">
                            
                                <!-- error message untuk tglmasuk -->
                                @error('tglmasuk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                            <label class="font-weight-bold">Jam Masuk</label>
                                <input type="text" class="form-control @error('jammasuk') is-invalid @enderror" name="jammasuk" value="{{ old('jammasuk') }}" placeholder="Masukkan jammasuk">
                            
                                <!-- error message untuk jammasuk -->
                                @error('jammasuk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>


                            <div class="form-group">
                            <label class="font-weight-bold">Jam Pulang</label>
                                <input type="text" class="form-control @error('jampulang') is-invalid @enderror" name="jampulang" value="{{ old('jampulang') }}" placeholder="Masukkan No Telepon">
                            
                                <!-- error message untuk jampulang -->
                                @error('jampulang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>                       

                            <button type="submit" class="btn btn-md btn-primary">SAVE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>