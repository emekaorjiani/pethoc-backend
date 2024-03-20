<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetWalletTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pet_wallet')->insert([
            'id' =>1,
            'user_id' => 2,
            'amount' => 50000,
            'transaction_type' => 'Credit',
            'created_by_id' => 2,
            'created_at' => \Carbon\Carbon::now()->subDays(10),
        ]);
        DB::table('pet_wallet')->insert([
            'id' =>2,
            'user_id' =>   2,
            'amount' => 20000,
            'transaction_type' => 'Credit',
            'created_by_id' => 2,
            'created_at' => \Carbon\Carbon::now()->subDays(10),

        ]);
        DB::table('pet_wallet')->insert([
            'id' =>3,
            'user_id' =>   2,
            'amount' => 30000,
            'transaction_type' => 'Credit',
            'created_by_id' => 2,
            'created_at' => \Carbon\Carbon::now()->subDays(10),

        ]);
        DB::table('pet_wallet')->insert([
            'id' =>4,
            'user_id' =>   2,
            'amount' => 40000,
            'transaction_type' => 'Cash',
            'created_by_id' => 2,
            'created_at' => \Carbon\Carbon::now()->subDays(10),

        ]);
        DB::table('pet_wallet')->insert([
            'id' =>5,
            'user_id' =>   2,
            'amount' => 50000,
            'transaction_type' => 'Credit',
            'created_by_id' => 2,
            'created_at' => \Carbon\Carbon::now()->subDays(10),
        ]);
    }
}
