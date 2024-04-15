<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAltKategorilersTable extends Migration
{
    public function up()
    {
        Schema::create('alt_kategorilers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subcategory_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
