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
        Schema::create('notifications_templates', function (Blueprint $table) {
            $table->id(); // id column (AUTO_INCREMENT and PRIMARY KEY)
            $table->string('name', 255); // name column (VARCHAR 255)
            $table->string('subject', 255); // subject column (VARCHAR 255)
            $table->longText('message'); // message column (LONGTEXT)
            $table->text('info'); // info column (TEXT)
            $table->string('sms', 254); // sms column (VARCHAR 254)
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications_templates');
    }
};
