<?php

namespace Database\Seeders;

use App\Models\About;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::insert([
            [
                'title' => 'Profil Perusahaan',
                'slug' => 'profil-perusahaan',
                'body' => '<h1><br></h1><div>PT Asuransi Jiwa Reliance Indonesia,merupakan perusahaan yang bergerak dibidang asuransi jiwa. Perusahaan yang berada didalam payung dari group PT Reliance Capital Management merupakan sebuah induk perusahaan yang bergerak dibidang jasa keuangan di Indonesia. PT Reliance Capital Management mempunyai visi untuk menjadi sebuah perusahaan institusi keuangan kelas dunia yang menyediakan solusi keuangan dengan komprehensif bagi nasabahnya.<br><br>PT Asuransi Jiwa Reliance Indonesia, berkantor pusat di Jakarta, beroperasi sejak 1 Januari 2013 setelah mendapat izin operasional berdasarkan surat Keputusan Menteri Keuangan RI Nomor: KEP-762/KM.10/2012, tanggal 27 Desember 2012, sebagai perusahaan asuransi jiwa yang memberikan perlindungan asuransi antara lain asuransi kematian, asuransi kecelakaan diri, Credit Life serta turunan asuransi kematian yang lainnya.<br><br>PT Asuransi Jiwa Reliance Indonesia dapat berkompetisi di dalam industri pasar asuransi jiwa Indonesia dan ikut berperan secara maksimal dengan memberikan perlindungan asuransi jiwa kepada seluruh lapisan masyarakat di Indonesia.<br><br>PT Asuransi Jiwa Reliance Indonesia fokus kepada tata kelola perusahaan dengan menggunakan prinsip keterbukaan, akuntabilitas, pertanggungjawaban, kemandirian, kesetaraan dan dikelola dengan prinsip kehati-hatian yang disertai dengan perhitungan risiko yang matang.<br><br>PT Asuransi Jiwa Reliance Indonesia berkomitmen untuk selalu meningkatkan kepuasan nasabah dengan memberikan produk yang akurat dan tepat waktu yang didukung oleh sistem pengembangan sumber daya manusia, sistem administrasi dan sistem pengelolaan data yang berkualitas. PT Asuransi Jiwa Reliance Indonesia senantiasa akan melakukan inovasi secara terus menerus demi terciptanya kepuasan bagi para pihak yang bersangkutan.</div>',
                'image' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Induk dan Anak Perusahaan',
                'slug' => 'induk-dan-anak-perusahaan',
                'body' => '<h1>Induk Perusahaan</h1><div><br></div><div>PT Reliance Capital Management (“RCM”) merupakan induk perusahaan Reliance Group yang bergerak di sektor keuangan. Sebagai induk perusahaan, saat ini RCM mempunyai penyertaan di PT Reliance Securities, Tbk, PT Asuransi Reliance Indonesia, PT Usaha Pembiayaan Reliance Indonesia, PT Asuransi Jiwa Reliance Indonesia dan PT Reliance Manajer Investasi. RCM melakukan penyertaan di Perusahaan sejak Oktober 2011.<br><br>RCM berdiri pada tanggal 14 April 1999 dengan nama PT Nuansa Citra Bersama. Pada tahun 2010, PT Nuansa Citra Bersama berubah nama menjadi PT Reliance Capital dan pada tanggal 14 Juli 2011, dengan Akta Pernyataan Keputusan Rapat No. 175, PT Reliance Capital berubah nama menjadi PT Reliance Capital Management.<br><br></div><h1>Anak Perusahaan</h1><div><br></div><div>Selain bergerak di industri asuransi jiwa, PT Reliance Capital Management juga merupakan induk perusahaan yang memiliki beberapa anak perusahaan, yaitu:<br><br></div><ol><li>Reliance Capital Group Pte Ltd</li><li>PT Asuransi Reliance Indonesia (General &amp; Health Insurance)</li><li>PT Reliance Securitas Tbk (Securities)</li><li>PT Usaha Pembiayaan Reliance Indonesia (Multi Finance)</li><li>PT Reliance&nbsp; Manajer Investasi (Asset Management)</li><li>PT Reliance Modal Ventura</li></ol><div><br></div><div>PT Reliance Capital Management akan terus mengembangkan unit-unit usaha lainya di sektor jasa keuangan, guna melengkapi kebutuhan masyarakat dalam bidang jasa keuangan (One Stop Shopping Financial Solution).</div><div><br></div>',
                'image' => 'news-image/TzdrXemJPLY1sJD5qxWxnemBKNtiIdOzzH8VlZci.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Struktur Organisasi',
                'slug' => 'struktur-organisasi',
                'body' => '<h2>Pendiri</h2><p>&nbsp;</p><figure class="image image-style-align-left image_resized" style="width:23.56%;"><img src="http://128.199.162.71/storage/uploads/anton_1665988825.png" srcset="http://128.199.162.71/storage/uploads/thumbnail/anton_1665988825.png 500w" sizes="100vw" width="500"><figcaption>Pendiri dan Presiden Komisaris<br><strong>Anton Budidjaja</strong></figcaption></figure><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><h2>Jajaran Dewan Komisaris</h2><figure class="image image-style-align-left image_resized" style="width:26.49%;"><img src="http://128.199.162.71/storage/uploads/anton_1665989004.png" srcset="http://128.199.162.71/storage/uploads/thumbnail/anton_1665989004.png 500w" sizes="100vw" width="500"><figcaption>Komisaris Utama<br><strong>Anton Budidjaja</strong></figcaption></figure><figure class="image image_resized image-style-align-left" style="width:26.42%;"><img src="http://128.199.162.71/storage/uploads/anton_1665989045.png" srcset="http://128.199.162.71/storage/uploads/thumbnail/anton_1665989045.png 500w" sizes="100vw" width="500"><figcaption>Komisaris Independen<br><strong>Anton Budidjaja</strong></figcaption></figure><figure class="image image-style-align-left image_resized" style="width:26.99%;"><img src="http://128.199.162.71/storage/uploads/anton_1665989132.png" srcset="http://128.199.162.71/storage/uploads/thumbnail/anton_1665989132.png 500w" sizes="100vw" width="500"><figcaption>Komisaris<br><strong>Anton Budidjaja</strong></figcaption></figure>',
                'image' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Visi, Misi dan Nilai Perusahaan',
                'slug' => 'visi-misi-dan-nilai-perusahaan',
                'body' => '<h1>Visi</h1><div><br><em>“Menjadi pilihan utama jaminan perlindungan bagi masyarakat kecil dan menengah serta pelaku UMKM di Indonesia.”<br></em><br></div><h1><em>Misi</em></h1><div><br></div><ol><li>Menjadi salah satu dari sepuluh besar perusahaan pelayanan jasa asuransi jiwa kredit di Indonesia.</li><li>Mengembangkan kemampuan sumber daya manusia profesional dengan teknologi informasi yang handal serta melaksanakan manajemen risiko dan menerapkan prinsip Good Corporate Governance (GCG).</li><li>Ikut mewujudkan keluarga Indonesia mencapai kesejahteraan.</li></ol><div><br></div><h1>Nilai</h1><div><br>PT Asuransi Jiwa Reliance Indonesia mengutamakan nilai-nilai kepercayaan dan senantiasa memelihara reputasi perusahaan dibidang jasa keuangan khususnya Asuransi Jiwa dengan terus berinovasi, berkelanjutan&nbsp; serta&nbsp; memberikan pelayanan terbaik kepada pelanggan.</div><div>
                </div>',
                'image' => 'news-image/FL35xPbqMRCTIZ4HfJlFEogMaWZdgQSMFn1P7JX0.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Etika Bisnis Perusahaan',
                'slug' => 'etika-bisnis-perusahaan',
                'body' => '<div>PT Asuransi Jiwa Reliance Indonesia memiliki Etika bisnis sebagai pedoman dalam menciptakan bisnis yang sehat. Etika Bisnis dalam suatu perusahaan dapat membentuk nilai, norma dan perilaku karyawan serta pimpinan dalam membangun hubungan yang adil dan sehat dengan nasabah, mitra kerja, pemegang saham dan masyarakat.<br><br>PT Asuransi Jiwa Reliance Indonesia meyakini prinsip bisnis yang baik adalah bisnis yang beretika, yakni bisnis dengan kinerja unggul dan berkesinambungan yang dijalankan dengan mentaati kaidah-kaidah etika sejalan dengan hukum dan peraturan yang berlaku.<br><br>Etika Bisnis dapat menjadi standar dan pedoman bagi seluruh karyawan termasuk manajemen dan menjadikannya sebagai pedoman untuk melaksanakan pekerjaan sehari-hari dengan dilandasi moral yang luhur, jujur, transparan dan sikap yang profesional.Berikut merupakan etika bisnis PT Asuransi Jiwa Reliance Indonesia:<br><br><br></div><ol><li>Mengutamakan kepentingan nasabah dengan memberikan pelayanan terbaik</li><li>Memberikan komitmen terpercaya dalam jangka panjang</li><li>Berinovasi untuk memenuhi kebutuhan nasabah</li><li>Memberdayakan seluruh karyawan dan nasabah tidak hanya dengan memberikan solusi jangka pendek namun menciptakan sumber daya manusia yang lebih maju</li><li>Mentaati kaidah-kaidah etika sejalan dengan hukum dan peraturan yang berlaku
                </li></ol>',
                'image' => 'news-image/e4uoH2N9B0fT0Rm63vo4Kp2XLympQRtjBipUpeiO.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Tata Kelola Perusahaan',
                'slug' => 'tata-kelola-perusahaan',
                'body' => '<div>Setiap perusahaan membutuhkan pengelolaan yang baik, yaitu sumber daya manusia, kekayaan, kegiatan penjualan, produksi, sampai dengan kegiatan perencanaan administrasinya. Pengelolaan dijalankan agar tujuan yang telah ditetapkan dapat tercapai dan hambatan- hambatan yang ada dapat diprediksi jauh-jauh hari sebelumnya, karena perusahaan telah melakukan analisis terhadap kelemahan-kelemahan dan kekuatankekuatan yang dimilikinya, selain itu juga telah menganalisis peluang dan ancaman sebagai faktor eksternal yang mempengaruhinya. Oleh karena itu perlu dipelajari dan dipahami apa itu manajemen, fungsi dan ruang lingkup yang harus diterapkan di perusahaan, terutama perusahaan yang bergerak di bidang asuransi. Usaha perasuransian merupakan usaha yang menjanjikan perlindungan kepada pihak tertanggung dan atau pemegang polis sekaligus menghimpun dana masyarakat. Dengan kedua peranan tersebut yang dalam perkembangannya semakin meningkat makin terasa kebutuhan akan hadirnya perasuransian yang kuat dan dapat diandalkan. PT Asuransi Jiwa Reliance Indonesia sebagai salah satu perusahaan yang bergerak dalam bidang usaha perasuransian, secara konsisten menerapkan Tata Kelola Perusahaan yang Baik sebagai suatu sistem pengelolaan Perusahaan yang baik sejalan dengan asas transparansi, akuntabilitas, responsibilitas, independensi serta kewajaran dan kesetaraan yang pada gilirannya mengoptimalkan kinerja perusahaan serta diharapkan dapat meningkatkan kepercayaan dari pemegang polis serta pemangku kepentingan pada umumnya. &nbsp;<br><br><br></div><h1>1. Kebijakan Tata Kelola Perusahaan yang Baik&nbsp;</h1><div><br>Perusahaan memandang bahwa penerapan Tata Kelola Perusahaan yang Baik merupakan suatu kebutuhan perusahaan dalam mengembangkan struktur dan sistem Tata Kelola Perusahaan dengan memperhatikan prinsip Tata Kelola serta ketentuan perundang-undangan yang berlaku. Hal tersebut akan meningkatkan kemakmuran Perusahaan, yang pada gilirannya akan mengoptimalkan nilai pemegang saham dalam jangka panjang tanpa mengabaikan kepentingan Stakeholders lainnya. Sejalan dengan dikeluarkannya Peraturan Otoritas Jasa Keuangan Nomor 73/POJK.05/2016 tentang Tata Kelola Perusahaan yang Baik bagi perusahaan perasuransian, serta pedoman umum Good Corporate Governance Perusahaan Asuransi dan perusahaan Reasuransi Indonesia oleh Komite Nasional Kebijakan Governance (KNKG), maka perusahaan perlu menetapkan kebijakan dalam mengelola Perusahaan sesuai dengan prinsip-prinsip Tata Kelola Perusahaan yang Baik. Kebijakan dalam mengelola Perusahaan tersebut berisikan prinsip-prinsip pengelolaan Perusahaan yang dalam implementasinya akan diikuti dengan berbagai kebijakan serta peraturan teknis sesuai kebutuhan Perusahaan. Keberadaan kebijakan tersebut diharapkan akan dapat menjadi acuan bagi segenap jajaran Perusahaan dalam menjalankan aktivitas bisnis Perusahaan sesuai dengan prinsip-prinsip Tata Kelola Perusahaan yang Baik.<br><br>Penerapan Tata Kelola Perusahaan yang Baik bertujuan untuk :<br><br></div><ol><li>Tercapainya pertumbuhan dan imbal hasil yang maksimal sehingga meningkatkan kemakmuran Perusahaan serta mewujudkan nilai pemegang saham dalam jangka panjang tanpa mengabaikan kepentingan stakeholders lainnya;</li><li>Mengendalikan dan mengarahkan hubungan yang baik antara Shareholders, Dewan Komisaris, Direksi, dan seluruh Stakeholders Perusahaan.</li><li>Mendukung aktivitas pengendalian internal dan pengembangan Perusahaan.</li><li>Pengelolaan sumber daya secara lebih amanah.</li><li>Meningkatkan pertanggungjawaban kepada Stakeholders.</li><li>Perbaikan budaya kerja Perusahaan.</li><li>Menjadikan Perusahaan bernilai tambah yaitu meningkatkan kesejahteraan seluruh insane Perusahaan berikut peningkatan kemanfaatan bagi Stakeholders.</li></ol><div>Sedangkan Sasaran Pelaksanaan Good Corporate Governance adalah :<br><br></div><ol><li>
Pelaksanaan sistem manajemen strategi yang handal, sehingga mampu merumuskan Visi, Misi, Tujuan dan Sasaran yang sejalan dengan rencana strategi (strategic plan) Perusahaan baik jangka pendek maupun jangka panjang</li><li>Adanya keterbukaan serta komunikasi dua arah baik dengan regulator, pelaku pasar modal dan Stakeholders lainnya</li><li>Berfungsinya dengan baik organ-organ penunjang kegiatan pengendalian internal dan pengembangan Perusahaan, antara lain Komite Audit, Komite GCG, Komite Remunerasi Nominasi dan Pengembangan SDM, Komite Pemantau Resiko, Komite Audit, Internal Audit, Manajemen Resiko</li><li>Komitmen dan aturan main dari praktik penyelenggaraan bisnis yang beretika</li><li>Sumber daya manusia yang handal, unggul, profesional dan bebas dari benturan kepentingan</li><li>Setiap jajaran Perusahaan mengetahui dan mampu menjalankan tugas, kewajiban dan tanggung jawab sesuai ketentuan yang berlaku serta mengetahui penalty dan reward-nya</li><li>Kepedulian pada masyarakat sekitar dan pada kelestarian lingkungan.
</li></ol>',
                'image' => 'news-image/qvzhGXEw3y7YjDpGC9qCIV0isMOBSuiOkOstTFwq.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Laporan Keuangan',
                'slug' => 'laporan-keuangan',
                'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque rem sit, eveniet officia hic nam? Placeat qui reiciendis illum culpa magni rem minima debitis recusandae veritatis iure, autem ipsum aperiam!',
                'image' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Penghargaan',
                'slug' => 'penghargaan',
                'body' => '<h1>2019</h1><div><br><figure data-trix-attachment="{&quot;contentType&quot;:&quot;image/png&quot;,&quot;filename&quot;:&quot;penghargaan1.png&quot;,&quot;filesize&quot;:45030,&quot;height&quot;:165,&quot;href&quot;:&quot;http://128.199.162.71/storage/uploads/penghargaan1_1665975141.png?content-disposition=attachment&quot;,&quot;url&quot;:&quot;http://128.199.162.71/storage/uploads/penghargaan1_1665975141.png&quot;,&quot;width&quot;:245}" data-trix-content-type="image/png" data-trix-attributes="{&quot;presentation&quot;:&quot;gallery&quot;}" class="attachment attachment--preview attachment--png"><a href="http://128.199.162.71/storage/uploads/penghargaan1_1665975141.png?content-disposition=attachment"><img src="http://128.199.162.71/storage/uploads/penghargaan1_1665975141.png" class="img-fluid" width="245" height="165"><figcaption class="attachment__caption"><span class="attachment__name">penghargaan1.png</span> <span class="attachment__size">43.97 KB</span></figcaption></a></figure>Peringkat II Digital Brand Award versi Isentia<br><br><br></div><h1>2018</h1><div><figure data-trix-attachment="{&quot;contentType&quot;:&quot;image/png&quot;,&quot;filename&quot;:&quot;penghargaan2.png&quot;,&quot;filesize&quot;:56924,&quot;height&quot;:165,&quot;href&quot;:&quot;http://128.199.162.71/storage/uploads/penghargaan2_1665975196.png?content-disposition=attachment&quot;,&quot;url&quot;:&quot;http://128.199.162.71/storage/uploads/penghargaan2_1665975196.png&quot;,&quot;width&quot;:245}" data-trix-content-type="image/png" data-trix-attributes="{&quot;presentation&quot;:&quot;gallery&quot;}" class="attachment attachment--preview attachment--png"><a href="http://128.199.162.71/storage/uploads/penghargaan2_1665975196.png?content-disposition=attachment"><img src="http://128.199.162.71/storage/uploads/penghargaan2_1665975196.png" class="img-fluid" width="245" height="165"><figcaption class="attachment__caption"><span class="attachment__name">penghargaan2.png</span> <span class="attachment__size">55.59 KB</span></figcaption></a></figure>Direktur Utama PT Asuransi Jiwa Reliance Indonesia Mendapatkan penghargaan “Insurance Top Leader with Strong Ethical Commitment” pada INSURANCE TOP LEADER AWARDS 2018.<br><br><br><figure data-trix-attachment="{&quot;contentType&quot;:&quot;image/png&quot;,&quot;filename&quot;:&quot;penghargaan3.png&quot;,&quot;filesize&quot;:62283,&quot;height&quot;:165,&quot;href&quot;:&quot;http://128.199.162.71/storage/uploads/penghargaan3_1665975210.png?content-disposition=attachment&quot;,&quot;url&quot;:&quot;http://128.199.162.71/storage/uploads/penghargaan3_1665975210.png&quot;,&quot;width&quot;:245}" data-trix-content-type="image/png" data-trix-attributes="{&quot;presentation&quot;:&quot;gallery&quot;}" class="attachment attachment--preview attachment--png"><a href="http://128.199.162.71/storage/uploads/penghargaan3_1665975210.png?content-disposition=attachment"><img src="http://128.199.162.71/storage/uploads/penghargaan3_1665975210.png" class="img-fluid" width="245" height="165"><figcaption class="attachment__caption"><span class="attachment__name">penghargaan3.png</span> <span class="attachment__size">60.82 KB</span></figcaption></a></figure>Perusahaan asuransi jiwa dengan kinerja terbaik dengan ekuitas di bawah Rp750 Miliar<br>
</div><div>
</div>',
                'image' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
