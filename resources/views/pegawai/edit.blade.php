<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body style="background-color: #7b858f">
<!-- START FORM -->
<main class="container">
<form action='{{ url("pegawai/".$data->Notelpon) }}' method='POST'> 
    @csrf
    @method('PUT')
        <div style="background-color: #9fa7af" class="my-3 p-3">
            <a href="{{ url('pegawai') }}" class="btn btn-secondary"><< BACK</a>
            <div class="mb-3 row">
                <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="string" class="form-control" name='Nama' value="{{ $data->Nama }}" id="Nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Notelpon" class="col-sm-2 col-form-label">No telpon</label>
                <div class="col-sm-10">
                    <input type="string" class="form-control" name='Notelpon' value="{{ $data->Notelpon }}" id="Notelpon">
                </div>
            </div>
            {{-- {{ $data->Notelpon }}> <!-- menunjukan jika notelpon tidak bisa diupdate  --> --}}
            <div class="mb-3 row">
                <label for="Nama" class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-10">
                    <input type="string" class="form-control" name='level' value="{{ $data->level }}" id="level">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10"> 
                    <input type="text" class="form-control" name='Alamat' value="{{ $data->Alamat }}" id="Alamat">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Alamat" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SAVE</button></div>
            </div>
          </form>
        </div>
        <!-- AKHIR FORM -->
        </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>