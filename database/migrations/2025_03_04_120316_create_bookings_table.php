<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */



    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('bookings_id');
            $table->string('name');
            $table->string('email');
            $table->string('number');
            $table->date('date');
            $table->time('time');
            $table->integer('guests');
            $table->text('request')->nullable();
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
        Schema::dropIfExists('bookings');
    }
};
