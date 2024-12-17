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
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // id column (AUTO_INCREMENT)
            $table->unsignedInteger('people_id'); // peopleid column (integer)
            $table->unsignedInteger('client_id'); // clientid column (integer)
            $table->unsignedInteger('project_id'); // projectid column (integer)
            $table->unsignedInteger('ticket_id'); // ticketid column (integer)
            $table->longText('comment'); // comment column (LONGTEXT)
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
