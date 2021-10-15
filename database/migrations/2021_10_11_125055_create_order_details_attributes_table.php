<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_detail_id')->constrained('order_details', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('attribute_id')->constrained('attributes', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('option_id')->constrained('options', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details_attributes');
    }
}