<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1">
       <title>home</title>
       <style>
           table{
               border-collapse: collapse;
               border-spacing: 0;
               width: 100%;
               border: 1px solid rgb(126, 122, 122);
           }
           thead{
               background-color: aliceblue;
           }
           th,td{
               text-align: left;
               padding: 8px 16px;
           }
           tr:nth-child(even){background-color: #f2f2f2}
           .tambah{
               padding: 8px 16px;
               text-decoration: none;
           }
           </style>
    </head>
    <body>
        <nav class="navbar navbar-light" style="background-color: #ffd900;">
        <p><h1>Home</h1></p>
        <div style="overflow-x: auto">
            <a class="tambah" href="{{ route('barang.create')}}">+ Tambah Data</a>
            
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>nama barang</th>
                        <th>harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1?>
                    @foreach ( $barang as $brg )
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $brg->nama_barang }}</td>
                        <td>{{ $brg->harga }}</td>
                        <td>
                            <a href="{{ url('barang/' . $brg->id . "/edit") }}">Edit</a>
                            <form action="{{ url('barang/' . $brg->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        </nav>
    </body>
</html>