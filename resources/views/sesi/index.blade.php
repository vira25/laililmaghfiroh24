<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body  style="background-color: hsl(190, 90%, 50%);" >  
    <main class="container">
        @if ($errors->any())
        <div class="pt-3">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{$item}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
        <div class="w-50 center border rounded px-3 py-5 mx-auto">
        <h1 class="text-center mb-4 " style="font-style:italic;">Login</h1>
            <form class="pb-3" action={{ url('/sesi/login') }} method="POST">
                @csrf 
                @method('post')
                <div class="mb-3">
                    <label form="email" class="form-label">Email</label>
                    <input type="email" name="email" value="{{Session::get('email')}}" class="form-control">
                </div>
                <div class="mb-3">
                    <label form="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3 d-grid">
                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                </div>
                <li class="nav-item">
                    <a>Sudah Punya Akun????, silahlan daftar duluu!!!</a>
                    <a href="/sesi/register" class="nav-link center border mx-auto" type="submit">Sing in</a>
                </li>
            </form>

        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>