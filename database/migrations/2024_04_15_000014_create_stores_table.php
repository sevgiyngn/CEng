<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('story_county')->nullable();
            $table->string('story_district')->nullable();
            $table->string('story_adress')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
