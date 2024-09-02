<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'name'=> "Olahraga",
        ]);
        Category::create([
            'name'=> "kosmetik",
        ]);
        Category::create([
            'name'=> "Teknologi",
        ]);
        Category::create([
            'name'=> "Pendidikan",
        ]);
        Category::create([
            'name'=> "konsumsi",
        ]);
        Category::create([
            'name'=> "Bahan Baku",
        ]);
        Category::create([
            'name'=> "Pakaian",
        ]);
        Category::create([
            'name'=> "Tas",
        ]);
    }
}
