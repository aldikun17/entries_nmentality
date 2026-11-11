<?php

namespace Database\Seeders;

use App\Models\Psgc\PsgcCity;
use App\Models\Psgc\PsgcProvince;
use App\Models\Psgc\PsgcRegion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PsgcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            [
                'psgcCode'    => '130000000',
                'psgc_region' => '130000000',
                'regDesc'     => 'NATIONAL CAPITAL REGION (NCR)',
                'regCode'      => '13',
            ],
            [
                'psgcCode'    => '010000000',
                'psgc_region' => '010000000',
                'regDesc'     => 'REGION I (ILOCOS REGION)',
                'regCode'      => '01',
            ]
        ];
        foreach ($regions as $region) {
            PsgcRegion::create($region);
        }

        $cities = [
            [
                'psgcCode'    => '133901000',
                'citymunDesc' => 'CITY OF TAGUIG',
                'citymunCode' => '133901',
                'provCode'    => '1339',
                'regCode'     => '13',
            ],
            [
                'psgcCode'    => '012801000',
                'citymunDesc' => 'CITY OF LAOAG',
                'citymunCode' => '012801',
                'provCode'    => '0128',
                'regCode'     => '01',
            ]
        ];
        foreach ($cities as $city) {
            PsgcCity::create($city);
        }

        $provinces = [
            [
                'psgcCode' => '133900000',
                'provDesc' => 'NCR, SECOND DISTRICT',
                'provCode' => '1339',
                'regCode'  => '13',
            ],
            [
                'psgcCode' => '012800000',
                'provDesc' => 'ILOCOS NORTE',
                'provCode' => '0128',
                'regCode'  => '01',
            ]
        ];
        foreach ($provinces as $prov) {
            PsgcProvince::create($prov);
        }
    }
}
