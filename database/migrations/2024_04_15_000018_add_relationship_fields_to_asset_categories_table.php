<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssetCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('asset_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_9690979')->references('id')->on('categories');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id', 'sub_category_fk_9690980')->references('id')->on('alt_kategorilers');
            $table->unsignedBigInteger('store_id')->nullable();
            $table->foreign('store_id', 'store_fk_9690994')->references('id')->on('stores');
        });
    }
}
