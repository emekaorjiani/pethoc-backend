<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGasInfosTable extends Migration
{
    public function up()
    {
        Schema::create('gas_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('gas_level');
            $table->string('low_level_notification_enabled');
            $table->string('auto_refill_enabled');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
