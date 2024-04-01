<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'Nicolas',
                'surname' => 'Puentes',
                'document' => '12345678',
                'document_type' => 'Cédula',
                'address' => 'Actual',
                'phone' => '4234234234',
                'status_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Company S.A.S',
                'surname' => '',
                'document' => '900888777',
                'document_type' => 'Nit',
                'address' => 'Company Actual',
                'phone' => '57576547',
                'status_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
