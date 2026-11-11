<?php

namespace App\Models\Psgc;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class PsgcCity extends Model
{

    protected $table = "psgc_cities";

    use HasFactory;

    protected $fillable = [

        'psgcCode',
        'citymunDesc',
        'citymunCode',
        'provCode',
        'regCode'

    ];
}
