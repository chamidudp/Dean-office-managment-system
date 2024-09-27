<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('sender_id')->constrained('users'); // Foreign key for sender
            $table->foreignId('recipient_id')->constrained('users'); // Foreign key for recipient
            $table->text('content'); // Message content
            $table->timestamp('read_at')->nullable(); // When the message was read
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
        Schema::dropIfExists('messages'); // Drops the messages table if it exists
    }
}
