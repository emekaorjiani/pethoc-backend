<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPumpTransactionsTable extends Migration
{
    public function up()
    {
        Schema::table('pump_transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('station_id')->nullable();
            $table->foreign('station_id', 'station_fk_9370327')->references('id')->on('stations');
        });
    }
}
