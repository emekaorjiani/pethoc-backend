<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetWalletTable extends Migration
{
    public function up()
    {
        Schema::create('pet_wallet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount', 15, 2);
            $table->string('transaction_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
