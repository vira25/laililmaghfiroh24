<!doctype html>
<html lang="en">                                                                                                         
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body  style="background-color: hsl(190, 80%, 66%);">
    <h1 class="text-center mb-5" style="font-style:italic;">Data Pegawai</h1>
    <main class="container">
      @if (Session::has('success'))
      <div class="pt-3">
          <div class="alert alert-'success">
            {{ Session::get('success') }} <!--Menampilkan pesan dari session 'success'. -->
          </div>
      </div>
      @endif 
        <div class="my-3 p-3" style="background-color: hsl(202, 78%, 65%);">    
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3 px-4 py-4">
                  <a href='{{ url("pegawai/create") }}' class="btn btn-primary"> + Data</a>
                </div>
                <header class="d-flex flex-wrap justify-content-center px-4 py-3 mb-4
                  border-bottom">
                  <a href="/" class="align-items-center mb-3 mb-md-10 me-md-auto
                  text-dark text-decoration-none">
                  </a>
                  <div>
                  <a href="/login/logout" class="nav-link">Keluar</a>
                  </div>
                </header>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-2">Nama</th>
                            <th class="col-md-2">No telpon</th>
                            <th class="col-md-2">Level</th>
                            <th class="col-md-2">Alamat</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $i = $data->firstItem() ?> <!-- untuk mengurutkan no urut pada web kita  -->
                      @foreach ($data as $item)
                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->Nama }}</td>
                        <td>{{ $item->Notelpon }}</td>
                        <td>{{ $item->level }}</td>
                        <td>{{ $item->Alamat }}</td>
                        <td>
                            <a href='{{ url("pegawai/".$item->Nama."/edit")}}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Apakah anda sudah yakin????')" class="d-inline" action="{{ url('pegawai/'.$item->Notelpon) }}" method="post">
                            @csrf
                            @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++ ?> <!-- untuk melakukan increment -->
                      @endforeach
                    </tbody>
                </table>
               {{ $data->links() }} <!-- Menampilkan hasil paginasi dari angka 1 sampai angka 4 -->
          </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>