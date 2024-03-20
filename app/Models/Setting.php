<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'promo_name',
        'app_paused',
        'paystack_public_key',
        'paystack_secret_key',
        'paystack_callback_url',
        'billing_email',
        'vote_price',
        'min_topup',
        'max_topup',





    ];
}
