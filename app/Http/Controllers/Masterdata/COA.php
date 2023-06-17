<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

final class COA extends Controller
{
    public function __construct() {
        $this->crud = new Crud();
    }

    public function index() 
    {
        $coa = $this->crud->show('coa');
        $data = [
            'coa' => $coa
        ];
        return view('masterdata.coa.index', $data);
    }

    public function store(Request $request)
    {
        $params = [
            'no_coa' => $request->no_coa,
            'nama_coa' => $request->nama_coa,
            'header' => substr($request->no_coa, 0, 1),
            'posisi' => $request->posisi,
            'saldo_awal' => $request->saldo_awal,
        ];

        $data = $this->crud->insert('coa', $params);

        return response()->json([
            'data' => $data,
            'message' => 'Data berhasil disimpan'
        ], 200);
    }
}
