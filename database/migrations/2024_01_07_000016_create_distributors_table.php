<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributorsTable extends Migration
{
    public function up()
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('profile_info')->nullable();
            $table->string('kyc_verified');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
