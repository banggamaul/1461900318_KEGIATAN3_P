<html>
    <head>
        <title>Edit</title>
    </head>
    <body>
        <p><h1>Edit</h1></p>

        <form action="{{ url('barang/' . $barang->id) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value ="patch">
            Nama barang: <input type="text" name="nama_barang" value="{{$barang->nama_harga}}">
            Harga: <input type="text" name="harga" value="{{$barang->harga}}">
            <button type="submit">Simpan</button>
        </form>
    </body>
</html>