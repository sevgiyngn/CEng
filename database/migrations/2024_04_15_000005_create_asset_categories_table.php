<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('asset_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('serial_number')->nullable();
            $table->string('name')->nullable();
            $table->string('product_brand')->nullable();
            $table->string('product_model')->nullable();
            $table->string('product_description')->nullable();
            $table->integer('amountofstock')->nullable();
            $table->integer('minimum_stock')->nullable();
            $table->datetime('delivery_date')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
