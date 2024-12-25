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
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); // id column (AUTO_INCREMENT and PRIMARY KEY)
            $table->foreignId('client_id')->constrained(
                table: 'clients',
                indexName: 'projects_client_id'
            );
            $table->string('tag', 100);
            $table->string('name', 100);
            $table->longText('notes')->nullable();
            $table->text('description');
            $table->string('startdate', 20);
            $table->string('deadline', 20);
            $table->integer('progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
