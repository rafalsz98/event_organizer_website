<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('datestart', 0);
            $table->time('duration', 0);
            $table->string('name', 64);
            $table->text('description');
            $table->string('place', 255);
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->unsignedInteger('max_participants', false);
            $table->unsignedInteger('current_participants', false);
            $table->unsignedInteger('price', false);
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
        Schema::dropIfExists('events');
    }
}
