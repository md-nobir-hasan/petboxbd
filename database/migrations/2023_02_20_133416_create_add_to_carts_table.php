<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddToCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_to_carts', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->string('qty')->default(1);
            $table->integer('price');
            $table->unsignedBigInteger('p_color_id')->nullable();
            $table->unsignedBigInteger('p_size_id')->nullable();
            $table->timestamps();
        });
        Schema::table('add_to_carts', function (Blueprint $table) {
            $table->foreign('user_id', 'add_to_carts_user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id', 'add_to_carts_product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('p_size_id', 'add_to_carts_p_size_id')->references('id')->on('pa_sizes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('p_color_id', 'add_to_carts_p_color_id')->references('id')->on('pa_colors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_to_carts');
    }
}
