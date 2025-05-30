<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 20)->unique();
            $table->string('nickname', 10)->nullable();
            $table->string('fullname', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('email')->unique();
            $table->unsignedInteger('client_id')->nullable(); // clientid column (integer)
            $table->string('title', 64)->nullable(); // title column (VARCHAR 64)
            $table->string('mobile', 64)->nullable(); // mobile column (VARCHAR 64)
            $table->boolean('ticketsnotification')->default(0); // ticketsnotification column (integer as boolean, default 0)
            $table->binary('avatar')->nullable(); // avatar column (MEDIUMBLOB)
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
