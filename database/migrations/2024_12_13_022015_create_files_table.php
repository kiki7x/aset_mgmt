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
        Schema::create('files', function (Blueprint $table) {
            $table->id(); // id column (AUTO_INCREMENT and PRIMARY KEY)
            $table->foreignId('client_id')->constrained(
                table: 'clients',
                indexName: 'files_client_id'
            );
            $table->foreignId('project_id')->constrained(
                table: 'projects',
                indexName: 'files_project_id'
            );
            $table->foreignId('asset_id')->nullable();
            $table->foreignId('ticketreply_id')
            ->constrained(
                table: 'tickets_replies',
                indexName: 'files_ticketreply_id'
            );
            $table->string('name', 255);
            $table->string('file', 255);
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
