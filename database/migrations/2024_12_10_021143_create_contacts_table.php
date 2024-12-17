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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // id column (AUTO_INCREMENT and PRIMARY KEY)
            $table->string('name', 255); // name column (VARCHAR 255)
            $table->string('email', 255); // email column (VARCHAR 255)
            $table->string('phone', 32); // phone column (VARCHAR 32)
            $table->text('address'); // address column (TEXT)
            $table->text('webaddress'); // webaddress column (TEXT)
            $table->longText('notes'); // notes column (LONGTEXT)
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
