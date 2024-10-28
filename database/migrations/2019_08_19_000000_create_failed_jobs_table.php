<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id(); // Unique identifier for each failed job
            $table->string('uuid')->unique(); // Unique identifier for the job
            $table->text('connection'); // Connection used for the job
            $table->text('queue'); // The name of the queue the job was in
            $table->longText('payload'); // The payload data associated with the job
            $table->longText('exception'); // Exception message for debugging
            $table->timestamp('failed_at')->useCurrent(); // Timestamp of when the job failed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs'); // Drops the failed_jobs table if it exists
    }
}
