<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostCategoryId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PostCategoryId', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name',100);
            $table->string('Slug',100);
            $table->string('Description');
            $table->Integer('ParentID')->default(0);
            $table->tinyInteger('Status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PostCategoryId');
    }
}
