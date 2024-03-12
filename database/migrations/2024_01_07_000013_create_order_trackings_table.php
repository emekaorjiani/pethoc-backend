<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTrackingsTable extends Migration
{
    public function up()
    {
        Schema::create('order_trackings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->float('latitude', 7, 4)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
