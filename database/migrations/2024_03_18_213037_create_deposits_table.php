<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_wallet_id');
            $table->decimal('amount', 20,2)->default(0);
            $table->string('txnref')->unique();
            $table->string('status')->default('pending');
            $table->string('transaction_type')->nullable();
            $table->string('payment_method')->nullable();

            $table->foreignId('user_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposits');
    }
};
