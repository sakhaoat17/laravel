<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoatDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boat_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('boat_id')->constrained()->onDelete('cascade');
            $table->string('title')->nullable(); // Add title column
            $table->string('location');
            $table->string('body_of_water');
            $table->boolean('captained');
            $table->string('make');
            $table->string('model');
            $table->string('image1');
            $table->string('image2');
            $table->integer('year');
            $table->integer('length'); // In feet
            $table->integer('passengers');
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
        Schema::dropIfExists('boat_details');
    }
}

