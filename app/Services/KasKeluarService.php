<?php

namespace App\Services;

use App\Contracts\KasKeluarContract;
use Illuminate\Support\Facades\DB;

final class KasKeluarService implements KasKeluarContract
{
    public function show()
    {
        $data = DB::select("select * from kas where jenis = '2'");
        return $data;    
    }

    public function store(array $data)
    {
        $params = [
            'id_transaksi' => $data['id_transaksi'],
            'tanggal_transaksi' => $data['tgl_transaksi'],
            'nama_jamaah' => $data['nama_jamaah'],
            'nominal' => $data['nominal'],
            'id_kas' => $data['jenis_transaksi'],
            'deskripsi' => $data['deskripsi'],
            'jenis_transaksi' => 'Kas keluar'
        ];

        $data = DB::table('transaksi')->insert($params);

        return $data;
    }
}
