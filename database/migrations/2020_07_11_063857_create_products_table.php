<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->unsignedBigInteger('subcat_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('title');
            $table->string('sku')->nullable();
            $table->string('slug')->unique();
            $table->text('summary')->nullable();
            $table->longText('description')->nullable();
            $table->text('photo');
            $table->integer('stock')->nullable()->default(1);
            $table->enum('condition',['default','new','hot'])->default('default');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->float('price');
            $table->float('discount')->nullabale();
            $table->boolean('is_featured')->deault(false);
            $table->date('time_to')->nullable();
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('cat_id', 'products_cat_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('subcat_id', 'products_subcat_id')->references('id')->on('subcats')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('brand_id', 'products_brand_id')->references('id')->on('brands')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
