<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalesTransactionsHistoriesTable extends Migration
{
    public function up()
    {
        Schema::table('sales_transactions_histories', function (Blueprint $table) {
            $table->unsignedBigInteger('station_id')->nullable();
            $table->foreign('station_id', 'station_fk_9370398')->references('id')->on('stations');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'product_fk_9370399')->references('id')->on('products');
        });
    }
}
