<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->longText('desc');
            $table->integer('year');
            $table->bigInteger('publisher_id')->unsigned();
            $table->bigInteger('author_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->timestamps();

            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
