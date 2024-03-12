<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStationAdminsTable extends Migration
{
    public function up()
    {
        Schema::table('station_admins', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_9370311')->references('id')->on('users');
            $table->unsignedBigInteger('station_id')->nullable();
            $table->foreign('station_id', 'station_fk_9370312')->references('id')->on('station_managements');
        });
    }
}
