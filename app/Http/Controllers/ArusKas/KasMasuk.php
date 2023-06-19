<?php

namespace App\Http\Controllers\ArusKas;

use App\Contracts\KasMasukContract;
use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Kas;
use Illuminate\Http\Request;

final class KasMasuk extends Controller
{
    public function __construct(private KasMasukContract $service) {
        $this->kode = new Code;
    }

    public function index() 
    {
        $kode = $this->kode->generateCodeKasMasuk();
        $kas = $this->service->show();
        $data = [
            'kode'=> $kode,
            'kas' => $kas
        ];
        return view('keuangan.kas-masuk.index', $data);    
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'nama_jamaah'       => 'required|string',
            'nominal'           => 'required|string',
            'jenis_transaksi'   => 'required|string',
            'deskripsi'         => 'required|string',
        ]);

        try {
            $data = $this->service->store($request->all());

            return response()->json([
                'data' => $data,
                'message' => 'Berhasil disimpan'
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
