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
        Schema::create('email_log', function (Blueprint $table) {
            $table->id(); // id column (AUTO_INCREMENT and PRIMARY KEY)
            $table->unsignedInteger('people_id'); // peopleid column (integer)
            $table->unsignedInteger('client_id'); // clientid column (integer)
            $table->string('to', 128); // to column (VARCHAR 128)
            $table->string('subject', 256); // subject column (VARCHAR 256)
            $table->text('message'); // message column (TEXT)
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_log');
    }
};
