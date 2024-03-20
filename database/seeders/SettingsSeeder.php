<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'promo_name' => 'Pethoc Launch Promo',
            'app_paused' => false,
            'min_topup' => 1000,
            'max_topup' => 200000,
            'paystack_public_key' => 'pk_test_974ae49eb4b73c7f699a9a1aa44ad78431199706',
            'paystack_secret_key' => 'sk_test_321708fd6e420beb3f56e802c842dd4e7c1eb424',
            'paystack_callback_url' => 'https://pethoc.com/paystack/callback',
            'billing_email'=> 'billings@pethoc.com',
        ]);
    }
}
