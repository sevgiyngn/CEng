<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAltKategorilersTable extends Migration
{
    public function up()
    {
        Schema::table('alt_kategorilers', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_9690970')->references('id')->on('categories');
        });
    }
}
