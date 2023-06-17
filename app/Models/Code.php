<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Code extends Model
{
    public function generateCodeKasMasuk()
    {
        $code = DB::table('transaksi')
                        ->selectRaw('RIGHT(id_transaksi, 3) as kode')
                        ->where('jenis_transaksi', '=', 'Kas masuk')
                        ->orderBy('id', 'desc')
                        ->limit(1);

        $query = $code->get();
        
        if (count($query) <> 0) {
            $data = $query->first();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $date = date('Ymd');
        $kodetampil = "TRXI" . $date . $batas;
        return $kodetampil;
    }

    public function generateCodeKasKeluar()
    {
        $code = DB::table('transaksi')
                        ->selectRaw('RIGHT(id_transaksi, 3) as kode')
                        ->where('jenis_transaksi', '=', 'Kas keluar')
                        ->orderBy('id', 'desc')
                        ->limit(1);

        $query = $code->get();
        
        if (count($query) <> 0) {
            $data = $query->first();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $date = date('Ymd');
        $kodetampil = "TRXO" . $date . $batas;
        return $kodetampil;
    }
}
