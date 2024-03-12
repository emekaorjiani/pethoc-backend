<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTransactionsHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('sales_transactions_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity')->nullable();
            $table->decimal('amount', 15, 2);
            $table->string('transaction_reference');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
