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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id(); // id column
            $table->string('name', 255); // name column
            $table->text('address'); // address column
            $table->string('contactname', 255); // contactname column
            $table->string('phone', 255); // phone column
            $table->string('email', 255); // email column
            $table->string('web', 255); // web column
            $table->longText('notes'); // notes column
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
