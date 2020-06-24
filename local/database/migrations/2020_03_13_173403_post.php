<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name',100);
            $table->string('Slug',100);
            $table->string('Description');
            $table->text('Content');
            $table->string('Image',100);
            $table->tinyInteger('Outstanding');
            $table->tinyInteger('Status');
	    $table->Integer('View_Count');
            $table->timestamps();

            $table->integer('PostCategory')->unsigned();
            $table->foreign('PostCategory')->references('id')->on('postcategoryid')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Post');
    }
}
