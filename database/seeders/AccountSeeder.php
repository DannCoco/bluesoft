<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accounts')->insert([
            [
                'number' => '700879640',
                'balance' => 0,
                'customer_id' => 1,
                'account_type_id' => 1,
                'city_id' => 1,
                'status_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'number' => '987654321',
                'balance' => 0,
                'customer_id' => 2,
                'account_type_id' => 2,
                'city_id' => 2,
                'status_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
