<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    public $fillable = [
        'amount',
        'pet_wallet_id',
        'txnref',
        'user_id',
        'created_by',
        'transaction_type',
        'payment_method',
        'status'
    ];

    public function user(){
        $this->belongsTo(User::class);
    }

    public function petwallet(){
        $this->belongsTo(PetWallet::class);
    }

    protected static function boot() {
	    parent::boot();
        static::saved(function ($deposit) {
            $wallet = PetWallet::find($deposit->pet_wallet_id);
            if ($deposit->status === 'completed') {
                $wallet->increment('amount', $deposit->amount);
            }
        });
	}
}
