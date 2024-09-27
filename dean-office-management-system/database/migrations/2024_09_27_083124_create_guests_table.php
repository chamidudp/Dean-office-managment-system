<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Guest's full name
            $table->string('email')->nullable(); // Guest's email address
            $table->string('phone')->nullable(); // Guest's phone number
            $table->timestamp('visit_date')->nullable(); // Date of visit
            $table->text('purpose_of_visit')->nullable(); // Purpose of the visit
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests'); // Drops the guests table if it exists
    }
}
