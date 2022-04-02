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
            $table->increments('product_id');
            $table->string('product_name')->length(100);
            $table->integer('product_qty')->length(100);
            $table->boolean('gender');
            $table->boolean('type');
            $table->string('product_intro');
            $table->text('product_describe');
            $table->integer('product_price')->length(50);
            $table->integer('product_promotion')->length(100)->nullable();
            $table->text('product_image');
            $table->boolean('product_status');
            $table->integer('cat_id')->length(10)->unsigned();
            $table->integer('brand_id')->length(10)->unsigned();
            $table->timestamps();
            
            $table->foreign('cat_id')->references('cat_id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('brand_id')->on('brands')->onDelete('cascade');
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
