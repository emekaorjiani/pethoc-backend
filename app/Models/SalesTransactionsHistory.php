<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesTransactionsHistory extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'sales_transactions_histories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'station_id',
        'product_id',
        'quantity',
        'amount',
        'transaction_reference',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
