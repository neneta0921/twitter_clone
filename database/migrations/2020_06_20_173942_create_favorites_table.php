<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
          $table->id();
          $table->foreignId('user_id')
              ->comment('ユーザID')
              ->constrained()
              ->onDelete('cascade')
              ->onUpdate('cascade');
          $table->foreignId('tweet_id')
              ->comment('ツイートID')
              ->constrained()
              ->onDelete('cascade')
              ->onUpdate('cascade');

          $table->index('id');
          $table->index('user_id');
          $table->index('tweet_id');

          $table->unique([
              'user_id',
              'tweet_id'
          ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
