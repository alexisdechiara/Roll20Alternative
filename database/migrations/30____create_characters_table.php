<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('DOB')->nullable();
            $table->string('image')->nullable();
            $table->integer('level')->nullable();
            $table->integer('max_health_point')->nullable();
            $table->integer('health_point')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->string('gender')->nullable();
            $table->string('skin_color')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('hair_color')->nullable();
            $table->integer('melee_attack')->nullable();
            $table->integer('dist_attack')->nullable();
            $table->integer('magic_attack')->nullable();
            $table->text('desc_attack')->nullable();
            $table->integer('melee_defense')->nullable();
            $table->integer('dist_defense')->nullable();
            $table->integer('magic_defense')->nullable();
            $table->text('desc_defense')->nullable();
            $table->boolean('day_vision')->nullable();
            $table->boolean('night_vision')->nullable();
            $table->string('resistance')->nullable();
            $table->text('desc_other')->nullable();
            $table->string('class')->nullable();
            $table->string('current_location')->nullable();
            $table->string('birth_location')->nullable();
            $table->string('race')->nullable();
            $table->string('cult')->nullable();
            // Foreign keys:
            $table->unsignedBigInteger('characteristic_id')->nullable();
            $table->unsignedBigInteger('user_id');
            // Table with foreign value
            $table->text('skills_id')->nullable();
            $table->text('stuffs_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('characteristic_id')->references('id')->on('characteristics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
