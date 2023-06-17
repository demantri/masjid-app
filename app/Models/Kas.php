<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kas extends Model
{
    public function getKasMasuk()
    {
        $data = DB::select("select * from kas where jenis = '1'");
        return $data;    
    }
}
