<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('author_id');
            // $table->unsignedBigInteger('category_id');
            // $table->unsignedBigInteger('rak_id');
            // $table->unsignedBigInteger('penerbit_id');
            $table->string('title');
            $table->string('issn');
            $table->text('description');
            $table->string('cover')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('authors')->onUpdate('CASCADE')->onDelete('CASCADE');
            // $table->foreign('category_id')->references('id')->on('categories');
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
}
