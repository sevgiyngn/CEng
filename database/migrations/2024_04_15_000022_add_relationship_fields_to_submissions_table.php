<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSubmissionsTable extends Migration
{
    public function up()
    {
        Schema::table('submissions', function (Blueprint $table) {
            $table->unsignedBigInteger('deliveryid_id')->nullable();
            $table->foreign('deliveryid_id', 'deliveryid_fk_9690671')->references('id')->on('deliveries');
            $table->unsignedBigInteger('depoid_id')->nullable();
            $table->foreign('depoid_id', 'depoid_fk_9690907')->references('id')->on('stores');
        });
    }
}
