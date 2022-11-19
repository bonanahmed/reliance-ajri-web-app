<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Variabel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class VariabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(database_path() . '/seeds/variabels.sql');
        DB::statement($sql);
    }
}
