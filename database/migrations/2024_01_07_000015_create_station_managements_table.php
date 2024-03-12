<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('station_managements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number_of_pumps');
            $table->string('product_types');
            $table->string('prices');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
