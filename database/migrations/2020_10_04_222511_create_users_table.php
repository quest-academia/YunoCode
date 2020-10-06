<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('email',255);
            $table->char('password',32);
            $table->enum('gender',128);
            $table->date('birthday')->nullable();
            $table->text('introduction')->nallable();
            $table->integer('career_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->bit('authority',1);

            $table->foreign('career_id')->references('id')->on('careers')->onDelete('career');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
