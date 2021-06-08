<?php
    $koneksi = mysqli_connect("localhost","root","","p_genap3") or die(mysqli_error());
?>

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
        <h1><a href="{{url('/barang')}}">Home</a></h1>
        <div style="overflow-x: auto">
            <a class="tambah" href="{{ route('barang.create')}}">+ Tambah Data</a>
            <p>Cari barang :</p>
	<form action="" method="GET">
		<input type="text" name="cari" placeholder="Cari .." value="{{ old('cari') }}">
		<input type="submit" value="CARI">
    </form> 
            
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
                    <?php if(isset($_GET['cari'])){
                        $sql = "SELECT * FROM barang";
                        $query = mysqli_query($koneksi, $sql);
                        while($data = mysqli_fetch_array($query)){
                            if($data['nama_barang'] == $_GET['cari']){
                        ?>
                            <tr><td>1</td>
                            <td><?php echo $data['nama_barang'];?></td>
                            <td><?php echo $data['harga'];?></td>
                            
                            <td>
                                <a href="/barang/<?php echo $data['id'];?>/edit">Edit</a>
                                <form action="barang/<?php echo $data['id'];?>" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit">Delete</button>
                                </form>
                            </td>
                            <?php
                            }
                        }
                    }
                    else{  
                        $no=1?>
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
                        <?php } ?>
                </tbody>
            </table>
        </div>
        </nav>
    </body>
</html>