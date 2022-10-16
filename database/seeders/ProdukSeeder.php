<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produk::create([
            'title' => 'individu',
            'slug' => 'individu',
            'body' => 'individu',
            'type' => 'individu'
        ]);
        Produk::factory(10)->create();
    }
}
