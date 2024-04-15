<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetCategoryDeliveryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('asset_category_delivery', function (Blueprint $table) {
            $table->unsignedBigInteger('delivery_id');
            $table->foreign('delivery_id', 'delivery_id_fk_9691038')->references('id')->on('deliveries')->onDelete('cascade');
            $table->unsignedBigInteger('asset_category_id');
            $table->foreign('asset_category_id', 'asset_category_id_fk_9691038')->references('id')->on('asset_categories')->onDelete('cascade');
        });
    }
}
