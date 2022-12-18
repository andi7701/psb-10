<?php

namespace App\Traits;

use App\Models\User;


trait GetData
{
    public function get_data_tahun(){
        $tahunIni = date('Y');
        $tahunPendaftaran = $tahunIni . ' / ' . intval($tahunIni + 1);

        return $tahunPendaftaran;
    }

    public function get_kode_pendaftaran()
    {
        $cek_kode_terakhir = User::selectRaw('max(kode_daftar) as kode_daftar')
            ->where('kode_daftar', 'like', $this->kategoriPendaftar . '%')
            ->first();
        $kode_selanjutnya = substr($cek_kode_terakhir->kode_daftar, 1, 4);
        $kode_selanjutnya++;

        return sprintf('%04s', $kode_selanjutnya);
    }
}