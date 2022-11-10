<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimulasiController extends Controller
{
    public function pilih_produk(Request $request)
    {
        if ($request->type == 'karyawan') {
            return redirect('/simulasi/karyawan');
        } else if ($request->type == 'keluarga') {
            return redirect('/simulasi/keluarga');
        } else if ($request->type == 'umkm') {
            return redirect('/simulasi/umkm');
        }
        $variabel = $request->variabel;
        return view('web.pages.simulasi.pilihProduk', [
            'head_title' => $variabel->simulasi_title->value ?? 'simulasi_title',
            'head_sub_title' => $variabel->simulasi_sub_title->value ?? 'simulasi_sub_title',
            'btn_simulasi' => $variabel->btn_simulasi->value ?? 'btn_simulasi',
        ]);
    }

    public function karyawan(Request $request)
    {
        $variabel = $request->variabel;
        return view('web.pages.simulasi.proteksiKaryawan', [
            'head_title' => $variabel->simulasi_title->value ?? 'simulasi_title',
            'head_sub_title' => $variabel->simulasi_sub_title->value ?? 'simulasi_sub_title',
            'btn_simulasi' => $variabel->btn_simulasi->value ?? 'btn_simulasi',
            'variabel' => $variabel
        ]);
    }

    public function keluarga(Request $request)
    {
        $variabel = $request->variabel;
        return view('web.pages.simulasi.proteksiKeluarga', [
            'head_title' => $variabel->simulasi_title->value ?? 'simulasi_title',
            'head_sub_title' => $variabel->simulasi_sub_title->value ?? 'simulasi_sub_title',
            'btn_simulasi' => $variabel->btn_simulasi->value ?? 'btn_simulasi',
        ]);
    }

    public function umkm(Request $request)
    {
        $variabel = $request->variabel;
        return view('web.pages.simulasi.proteksiUmkm', [
            'head_title' => $variabel->simulasi_title->value ?? 'simulasi_title',
            'head_sub_title' => $variabel->simulasi_sub_title->value ?? 'simulasi_sub_title',
            'btn_simulasi' => $variabel->btn_simulasi->value ?? 'btn_simulasi',
        ]);
    }
}
