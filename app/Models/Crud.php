<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Crud extends Model
{
    public function show(
        string $table_name
    )
    {
        return DB::table($table_name)->get();    
    }

    public function insert(
        string $table_name,
        array $data
    )
    {
        $data = DB::table($table_name)->insert($data);
        return $data;
    }
}
