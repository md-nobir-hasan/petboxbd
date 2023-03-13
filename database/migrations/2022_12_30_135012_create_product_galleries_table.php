<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->unsignedBigInteger('size_id')->nullable();
            $table->unsignedBigInteger('gallery_id');
            $table->string('active')->nullable();
            $table->timestamps();
        });

        Schema::table('product_galleries', function (Blueprint $table) {
            $table->foreign('product_id', 'product_galleries_product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('color_id', 'product_galleries_color_id')->references('id')->on('product_colors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('size_id', 'product_galleries_size_id')->references('id')->on('product_sizes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('gallery_id', 'product_galleries_gallery_id')->references('id')->on('image_galleries')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_galleries');
    }
}
