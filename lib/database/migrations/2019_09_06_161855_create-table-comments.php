<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('com_id');
            $table->bigInteger('com_users')->unsigned();
            $table->foreign('com_users')->references('id')->on('users')->onDelete('cascade');

            $table->integer('com_posts')->unsigned();
            $table->foreign('com_posts')->references('post_id')->on('posts')->onDelete('cascade');
            $table->text('com_content');
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
        Schema::dropIfExists('comments');
    }
}
