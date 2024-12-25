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
            $table->foreignId('people_id')->constrained(
                table: 'users',
                indexName: 'comments_people_id'
            );
            $table->foreignId('client_id')->constrained(
                table: 'clients',
                indexName: 'comments_client_id'
            );
            $table->foreignId('project_id')->constrained(
                table: 'projects',
                indexName: 'comments_project_id'
            );
            $table->foreignId('ticket_id')->constrained(
                table: 'tickets',
                indexName: 'comments_ticket_id'
            );
            $table->longText('comment');
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
