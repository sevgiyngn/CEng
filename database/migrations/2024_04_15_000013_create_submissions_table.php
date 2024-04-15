<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('store_delivery_date')->nullable();
            $table->string('story_delivery_employee')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
