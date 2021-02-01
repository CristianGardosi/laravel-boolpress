<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // FK per puntare alla tabella users dove a un singolo user possono appartenere molteplici post (1-*)
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('body');
            $table->string('slug');
            $table->timestamps();

            // !RELAZIONE W/USER ID
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
