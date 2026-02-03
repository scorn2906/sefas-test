<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    public function run()
    {
        $positions = [
            ['name' => 'HRD'],
            ['name' => 'Accounting'],
            ['name' => 'Direktur'],
            ['name' => 'Sales'],
        ];

        DB::table('positions')->insert($positions);
    }
}
