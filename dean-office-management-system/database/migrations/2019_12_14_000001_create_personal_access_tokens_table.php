<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id(); // Unique identifier for each token
            $table->morphs('tokenable'); // Defines a polymorphic relationship for the token owner
            $table->string('name'); // Name of the token for identification
            $table->string('token', 64)->unique(); // The actual token string, unique in the database
            $table->text('abilities')->nullable(); // Abilities granted by the token (e.g., scopes)
            $table->timestamp('last_used_at')->nullable(); // Timestamp for when the token was last used
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
        Schema::dropIfExists('personal_access_tokens'); // Drops the personal_access_tokens table if it exists
    }
}
