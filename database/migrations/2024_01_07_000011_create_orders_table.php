<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pickup_area')->nullable();
            $table->string('delivery_phone');
            $table->string('delivery_location');
            $table->integer('quantity');
            $table->string('payment_method');
            $table->string('status');
            $table->decimal('total_cost', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
