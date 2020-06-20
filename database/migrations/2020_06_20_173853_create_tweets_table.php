<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->comment('ユーザID')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('text')->comment('本文');
            $table->softDeletes();
            $table->timestamps();
          
            $table->index('id');
            $table->index('user_id');
            $table->index('text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets');
    }
}
