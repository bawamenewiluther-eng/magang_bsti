<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }

        .sidebar{
            min-height:100vh;
            background:#1e293b;
        }

        .sidebar a{
            color:white;
            text-decoration:none;
            padding:12px 20px;
            display:block;
        }

        .sidebar a:hover{
            background:#334155;
        }

        .logo{
            font-size:22px;
            font-weight:bold;
            color:white;
            padding:20px;
        }

        .content{
            padding:25px;
        }

        .card-stat{
            border:none;
            border-radius:15px;
            box-shadow:0 4px 10px rgba(0,0,0,.08);
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-2 sidebar p-0">

           <div class="sidebar">

                <a href="{{ route('dashboard') }}">
                    Dashboard
                </a>

                <a href="{{ route('books.index') }}">
                    Buku
                </a>

            </div>

            <a href="#">
                Kurasi Buku
            </a>

            <a href="#">
                Pengguna
            </a>

        </div>

        <div class="col-md-10 content">
            @yield('content')
        </div>

    </div>
</div>

</body>
</html>