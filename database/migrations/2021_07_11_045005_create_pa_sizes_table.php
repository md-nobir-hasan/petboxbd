<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pa_sizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->integer('price_increase')->default(0);
            $table->longText('des')->nullable();
            $table->timestamps();
        });
        Schema::table('pa_sizes', function (Blueprint $table) {
            $table->foreign('size_id', 'pa_sizes_size_id')->references('id')->on('product_sizes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id', 'pa_sizes_product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pa_sizes');
    }
}
