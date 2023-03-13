<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pa_colors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->integer('price_increase')->default(0);
            $table->longText('des')->nullable();
            $table->timestamps();
        });
        Schema::table('pa_colors', function (Blueprint $table) {
            $table->foreign('color_id', 'pa_colors_color_id')->references('id')->on('product_colors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id', 'pa_colors_product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pa_colors');
    }
}
