<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('charters', function (Blueprint $table) {
            $table->id();
            $table->date('flight_date');
            $table->string('call_sign');
            $table->string('type_of_aircraft');
            $table->string('type_of_flight');
            $table->string('nationality');
            $table->string('from');
            $table->string('to');
            $table->string('purpose_of_flight');
            $table->time('eta')->nullable();
            $table->time('etd')->nullable();
            $table->string('clearance_no');
            $table->string('comment');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('charters');
    }
}
