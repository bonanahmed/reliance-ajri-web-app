<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Super User',
            'email' => 'super@super.com',
            'role' => 'super',
            'password' => bcrypt('super')
        ]);
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => bcrypt('admin')
        ]);
        User::factory(15)->create();

        $this->call(VariabelSeeder::class);
        $this->call(MitraSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(SliderSeeder::class);
    }
}
