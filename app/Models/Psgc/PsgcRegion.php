<?php

namespace App\Models\Psgc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsgcRegion extends Model
{

    protected $table = "psgc_regions";

    use HasFactory;

    protected $fillable = [

        'psgcCode',
        'psgc_region',
        'regDesc',
        'regCode'

    ];
}
