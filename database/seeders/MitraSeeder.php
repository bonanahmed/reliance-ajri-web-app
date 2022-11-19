<?php

namespace Database\Seeders;

use App\Models\Mitra;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(database_path() . '/seeds/mitras.sql');
        DB::statement($sql);
    }
}
