<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDistributorOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('distributor_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('distributor_id')->nullable();
            $table->foreign('distributor_id', 'distributor_fk_9370303')->references('id')->on('distributors');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id', 'order_fk_9370304')->references('id')->on('orders');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_9370309')->references('id')->on('users');
        });
    }
}
