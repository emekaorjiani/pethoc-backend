<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DepositTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deposits')->insert([
            'id' =>1,
            'user_id' =>   2,
            'amount' => 50000,
            'txnref' => 'CASH-1234567890-DEV',
            'status' => 'completed',
            'transaction_type' => 'Credit',
            'payment_method' => 'Cash',
            'pet_wallet_id' => 1,
            'created_at' => \Carbon\Carbon::now()->subDays(10),

        ]);
        DB::table('deposits')->insert([
            'id' =>2,
            'user_id' =>   2,
            'amount' => 20000,
            'txnref' => 'CASH-1234567891-DEV',
            'status' => 'completed',
            'transaction_type' => 'Credit',
            'payment_method' => 'Cash',
            'pet_wallet_id' => 2,
            'created_at' => \Carbon\Carbon::now()->subDays(10),

        ]);
        DB::table('deposits')->insert([
            'id' =>3,
            'user_id' =>   2,
            'amount' => 30000,
            'txnref' => 'CASH-1234567892-DEV',
           'status' => 'completed',
            'transaction_type' => 'Credit',
            'payment_method' => 'Cash',
            'pet_wallet_id' => 3,
            'created_at' => \Carbon\Carbon::now()->subDays(10),

        ]);

        DB::table('deposits')->insert([
            'id' =>4,
            'user_id' =>   2,
            'amount' => 40000,
            'txnref' => 'CASH-1234567893-DEV',
           'status' => 'completed',
            'transaction_type' => 'Credit',
            'payment_method' => 'Cash',
            'pet_wallet_id' => 4,
             'created_at' => \Carbon\Carbon::now()->subDays(10),

        ]);
        DB::table('deposits')->insert([
            'id' =>5,
            'user_id' =>   2,
            'amount' => 50000,
            'txnref' => 'CASH-1234567894-DEV',
            'status' => 'completed',
            'transaction_type' => 'Credit',
            'payment_method' => 'Cash',
            'pet_wallet_id' => 5,
            'created_at' => \Carbon\Carbon::now()->subDays(10),
        ]);
    }
}
