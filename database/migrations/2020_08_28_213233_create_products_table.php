<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title',32);
            $table->string('promotion',128);
            $table->string('overview',256);
            $table->string('main_image',128);
            $table->string('sub_image1',128)->nullable();
            $table->string('sub_image2',128)->nullable();
            $table->string('sub_image3',128)->nullable();
            $table->integer('price');
            $table->integer('category_id')->unsigned()->index();
            $table->integer('status_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
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
