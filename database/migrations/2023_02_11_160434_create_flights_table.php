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
            $table->unsignedBigInteger('season_id');
            $table->unsignedBigInteger('company_id');
            $table->string('flight_category');
            $table->date('flight_date');
            $table->timestamp('flight_hour');
            $table->string('destination');
            $table->string('destination_description');
            $table->string('call_sign');
            $table->longText('comment');
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
    public function down()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropForeign(['season_id']);
            $table->dropForeign(['company_id']);
        });

        Schema::dropIfExists('flights');
    }
}
