<?php

namespace App\Models\Psgc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsgcProvince extends Model
{

    protected $table = "psgc_provinces";

    use HasFactory;

    protected $fillable = [

        'psgcCode',
        'provDesc',
        'provCode',
        'regCode'

    ];
}
