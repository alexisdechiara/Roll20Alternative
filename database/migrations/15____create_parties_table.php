<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('players');
            $table->text('description');
            $table->unsignedBigInteger('user_id');
            $table->string('password')->nullable();
            $table->string('cover_picture')->nullable();
            $table->text('themes')->nullable();
            $table->text('board')->default('{"box":{"number_per_height":"20","grid_line_width":"0.5","visible":"true","index":"5"},"boards":{},"props":{},"tokens":{}}');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parties');
    }
}
