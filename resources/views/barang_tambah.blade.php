
<html>
    <head>
        <title>Create</title>
    </head>
    <body>
        <p><h1>Create</h1></p>

        <form action="{{ route('barang.store') }}" method="post">
            @csrf
            
            Nama barang: <input type="text" name="nama_barang">
            Harga: <input type="text" name="harga">
            <button type="submit">Simpan</button>
        </form>
    </body>
</html>