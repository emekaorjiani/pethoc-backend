<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelPurchasesTable extends Migration
{
    public function up()
    {
        Schema::create('fuel_purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity');
            $table->string('payment_method');
            $table->string('transaction_reference')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
