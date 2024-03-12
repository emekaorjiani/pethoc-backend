<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrderTrackingsTable extends Migration
{
    public function up()
    {
        Schema::table('order_trackings', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id', 'order_fk_9369716')->references('id')->on('orders');
        });
    }
}
