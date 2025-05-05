<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
</head>
<body>
    <h1>Universitas MDP</h1>
    <a href = {{ route('fakultas.index') }}>Fakultas</a> |
    <a href = {{ route('prodi.index') }}>Prodi</a> |
    <a href = {{ route('mahasiswa.index') }}>Mahasiswa</a> 
    @yield('content')
    &copy; 2025
</body>
</html>