<?php

namespace App\Services;

use App\Contracts\KasMasukContract;
use Illuminate\Support\Facades\DB;

final class KasMasukService implements KasMasukContract
{
    public function show()
    {
        $data = DB::select("select * from kas where jenis = '1'");
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
            'jenis_transaksi' => 'Kas masuk'
        ];

        $data = DB::table('transaksi')->insert($params);

        return $data;
    }

    public function showLaporan($date_from, $date_to, $kas)
    {
        $query = DB::select("select a.*, b.nama
            from transaksi a
            join kas b on a.id_kas = b.kode_kas
            where jenis_transaksi = 'Kas masuk'
            and tanggal_transaksi between '$date_from' and '$date_to'
            and id_kas = '$kas'
        ");
        return $query;
    }
}
