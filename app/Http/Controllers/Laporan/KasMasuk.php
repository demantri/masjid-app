<?php

namespace App\Http\Controllers\Laporan;

use App\Contracts\KasMasukContract;
use App\Http\Controllers\Controller;
use App\Models\Code;
use Illuminate\Http\Request;

final class KasMasuk extends Controller
{
    public function __construct(private KasMasukContract $service) {
        $this->kode = new Code;
    }

    public function index() 
    {
        $kas = $this->service->show();

        $data = [
            'kas' => $kas
        ];

        return view('laporan.kas-masuk.index', $data);    
    }

    public function getList(Request $request)
    {
        $date_from = date('Y-m-d', strtotime(str_replace('/', '-', $request->date_from)));
        $date_to = date('Y-m-d', strtotime(str_replace('/', '-', $request->date_to)));
        $kas = $request->kas_masuk;

        $data = $this->service->showLaporan($date_from, $date_to, $kas);

        return response()->json($data, 200);
    }
}
