<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('delivery_date');
            $table->string('delivery_employee');
            $table->string('plaka');
            $table->string('seal_number');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
