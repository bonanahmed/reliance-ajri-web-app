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
                'content' => '',
                'image' => '',
                'created_by' => 1,
            ],
            [
                'var' => 'contact',
                'value' => null,
                'content' => '<div>Gedung Soho West Point. Kota Kedoya<br><br></div><div>JL Macan Kav.4-5 Kedoya Utara. Kebon Jeruk<br><br></div><div>Jakarta Barat 11510<br><br></div><div>021-21102288<br><br></div><div>info@reliance.id<br><br></div>',
                'image' => null,
                'created_by' => 1,
            ],
            [
                'var' => 'news_title',
                'value' => 'Berita',
                'content' => null,
                'image' => null,
                'created_by' => 1,
            ],
            [
                'var' => 'news_sub_title',
                'value' => 'Tetap Update disetiap aktivitas kita',
                'content' => null,
                'image' => null,
                'created_by' => 1,
            ],
            [
                'var' => 'btn_simulasi',
                'value' => 'Cek Simulasi Sekarang',
                'content' => null,
                'image' => null,
                'created_by' => 1,
            ],
            [
                'var' => 'produk_title',
                'value' => 'Reliance Endowment',
                'content' => null,
                'image' => null,
                'created_by' => 1,
            ],
            [
                'var' => 'produk_sub_title',
                'value' => 'Asuransi Jiwa dan Tabungan',
                'content' => null,
                'image' => null,
                'created_by' => 1,
            ],
            [
                'var' => 'footer_info',
                'value' => null,
                'content' => '<div>PT Asuransi Jiwa Reliance Indonesia (AJRI) merupakan perusahaan yang berada dalam payung dari group PT Reliance Capital Management dengan visi untuk menjadi sebuah institusi keuangan kelas dunia yang menyediakan solusi keuangan dengan komprehensif bagi seluruh nasabahnya</div>',
                'image' => null,
                'created_by' => 1,
            ],
            [
                'var' => 'produk_individu_sec2',
                'value' => '2 Manfaat Releance Endowment',
                'content' => '<div>1. Manfaat Asuransi sebesar Uang Pertanggungan ditambah Akumulasi Dana Tabungan akan dibayarkan kepada Penerima pertanggungan asuransi baik karena sakit maupun kecelakaan dan selanjutnya asuransi berakhir.<br><br>2. Manfaat Asuransi sebesar Akumulasi Dana Tabungan Tertanggung akan dibayarkan jika Tertanggung hidup sampai dengan akhir masa pertanggungan asuransi</div>',
                'image' => null,
                'created_by' => 1,
            ],
            [
                'var' => 'produk_individu_sec1',
                'value' => 'Reliance Endowment',
                'content' => '<div>Reliance Endowment merupakan Program Asuransi Jiwa Berjangka yang memberikan perlindungan kepada Tertanggung atas kerugian finansial dimasa yang akan datang karena adanya risiko meninggal dunia dan pengelolaan dana tabungan.</div>',
                'image' => 'produk-image/ntyGHKQQ5vojyQAco4BiDTuqKgKdiYHHF2CWjpR9.png',
                'created_by' => 1,
            ],
            [
                'var' => 'galeri_title',
                'value' => 'Galeri',
                'content' => null,
                'image' => null,
                'created_by' => 1,
            ],
            [
                'var' => 'galeri_sub_title',
                'value' => 'Tetap Update disetiap aktivitas kita',
                'content' => null,
                'image' => null,
                'created_by' => 1,
            ],
            [
                'var' => 'home_section_1',
                'value' => 'Cukup Bayar Sesuai Resiko',
                'content' => '<div>PT Asuransi Jiwa Reliance Indonesia (AJRI) merupakan perusahaan yang berada dalam payung dari group PT Reliance Capital Management dengan visi untuk menjadi sebuah institusi keuangan kelas dunia yang menyediakan solusi keuangan dengan komprehensif bagi seluruh nasabahnya</div>',
                'image' => null,
                'created_by' => 1,
            ],
            [
                'var' => 'home_section_1_button',
                'value' => 'Lihat Selengkapnya',
                'content' => null,
                'image' => null,
                'created_by' => 1,
            ],
            [
                'var' => 'mitra_title',
                'value' => 'Mitra Kami',
                'content' => null,
                'image' => null,
                'created_by' => 1
            ],
            [
                'var' => 'mitra_sub_title',
                'value' => 'Telah banyak Mitra yang sudah bekerja sama dengan kami',
                'content' => null,
                'image' => null,
                'created_by' => 1
            ],
            [
                'var' => 'faq',
                'value' => 'Proses Pembayaran Klaim',
                'content' => '<p>Dokumen Formulir Pengajuan Klaim harus berdasarkan klaim yang diajukan, jika klaim tersebut disebabkan meninggal karena sakit atau karena kecelakaan, melampirkan semua formulir atau dokumen asli yang diminta sesuai dengan sebab meninggalnya tersebut.</p>',
                'image' => 'faq-image/m9bbf8CjJ8rTsQJpDQP7Lcf6t66k7J5YQyAfXiUn.png',
                'created_by' => 1
            ],
            [
                'var' => 'prosedur_klaim',
                'value' => 'Prosedur dan Syarat Pengajuan Manfaat Asuransi Jiwa PT Asuransi Jiwa Reliance Indonesia',
                'content' => '<p>Sebagai peningkatan layanan kepada pemegang polis, PT Asuransi Jiwa Reliance Indonesia memberikan kecepatan, kemudahan dan kenyamanan dalam proses klaim. Pelaporan klaim anda akan kami respon dalam waktu 3 jam untuk kami periksa kelengkapan dokumen yang dibutuhkan. Selambat-lambatnya dalam 14 (empat belas) hari kerja kami akan memberikan keputusan klaim setelah dokumen lengkap diterima.</p>',
                'image' => 'prosedur-klaim-image/otODKwtX30VmpX5FYuQ1yYpBOgkr24af3D6XX12Z.png',
                'created_by' => 1
            ]
        ]);
    }
}
