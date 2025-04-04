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
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // id column (AUTO_INCREMENT and PRIMARY KEY)
            $table->string('name', 32); // name column (VARCHAR 255)
            $table->string('type', 32); // type column (VARCHAR 10)
            $table->text('permission')->nullable(); // perms column (TEXT)
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
