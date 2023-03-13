 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('p_size_id')->nullable();
            $table->unsignedBigInteger('p_color_id')->nullable();
            $table->string('qty');
            $table->integer('price');
            $table->timestamps();
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->foreign('order_id', 'order_items_order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id', 'order_items_product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('p_size_id', 'order_items_p_size_id')->references('id')->on('pa_sizes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('p_color_id', 'order_items_p_color_id')->references('id')->on('pa_colors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
