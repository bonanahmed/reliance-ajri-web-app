<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'Reliance Group Term Life',
            'description' => '<div>Jenis Produk Asuransi Jiwa Reliance Indonesia yang memberikan manfaat Asuransi sebesar Uang Pertanggungan apabila Peserta meninggal dunia karena sakit maupun kecelakaan. Produk ini digunakan untuk Para Karyawan Perusahaan.</div>',
            'button' => 'Cek Flexi Life Sekarang',
            'button_link' => null,
            'image' => 'slider-image/aUh3BWMV5Ap81yO21fZ70aT59Oiu1GUNZjY3cGQb.png',
            'created_by' => 1,
            'published' => 0
        ];
    }
}
