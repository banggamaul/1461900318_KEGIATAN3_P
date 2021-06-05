<?php

namespace Database\Seeders;

use App\Models\barang;
use Illuminate\Database\Seeder;

class barangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brg1 = new barang();
        $brg1->nama_barang  = "sepatu";
        $brg1->harga = "100000";
        $brg1->save();

        $brg2 = new barang();
        $brg2->nama_barang = "baju";
        $brg2->harga = "50000";
        $brg2->save();
    }
}
