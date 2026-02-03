<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = [
            ['name' => 'Manado'],
            ['name' => 'Jakarta'],
            ['name' => 'Surabaya'],
        ];

        DB::table('cities')->insert($cities);
    }
}
