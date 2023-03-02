<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduledFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('scheduled_flights', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('season_id');
            $table->unsignedBigInteger('company_id');
            $table->date('flight_date');
            $table->time('flight_hour');
            $table->string('destination');
            $table->string('destination_description');
            $table->string('call_sign');
            $table->longText('comment');
            $table->boolean('arrival')->default(false);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('season_id')->references('id')->on('seasons')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('scheduled_flights', function (Blueprint $table) {
            $table->dropForeign(['season_id']);
            $table->dropForeign(['company_id']);
        });

        Schema::dropIfExists('scheduled_flights');
    }
}
