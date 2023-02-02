<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('seasons_id')->nullable();
            $table->string('call_sign')->nullable();
            $table->string('type_of_aircraft')->nullable();
            $table->string('type_of_flight')->nullable();
            $table->string('nationality')->nullable();
            $table->longText('purpose_of_flight')->nullable();
            $table->longText('comment')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->timestamp('eta')->nullable();
            $table->timestamp('etd')->nullable();
            $table->integer('clearance_nr')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('flights');
    }
}
