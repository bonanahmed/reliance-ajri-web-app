<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Variabel;

class VariabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Variabel::insert([
            [
                'var' => 'title',
                'value' => 'Reliance',
                'content' => null
            ],
            [
                'var' => 'contact',
                'value' => null,
                'content' => '<div>Gedung Soho West Point. Kota Kedoya<br><br></div><div>JL Macan Kav.4-5 Kedoya Utara. Kebon Jeruk<br><br></div><div>Jakarta Barat 11510<br><br></div><div>021-21102288<br><br></div><div>info@reliance.id<br><br></div>',
            ]
        ]);
    }
}
