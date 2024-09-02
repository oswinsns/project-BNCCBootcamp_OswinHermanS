<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\barang;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        barang::create([
            'nama'=> "jam_tangan",
            'image' => "image",
            'harga'=>  30000,
            'jumlah_barang'=> 5,
            // 'release'=> "2024-08-01",
            'category_id' => "3",
        ]);

        barang::create([
            'nama'=> "adaptor",
            'image' => "image",
            'harga'=>  30000,
            'jumlah_barang'=> 5,
            // 'release'=> "2024-08-01",
            'category_id' => "3",
        ]);

        barang::create([
            'nama'=> "tas ransel",
            'image' => "image",
            'harga'=>  30000,
            'jumlah_barang'=> 5,
            // 'release'=> "2024-08-01",
            'category_id' => "7",
        ]);
    }
}
