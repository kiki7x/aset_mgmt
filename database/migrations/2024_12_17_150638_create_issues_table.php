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
        Schema::create('issues', function (Blueprint $table) {
            $table->id(); // Primary Key, AUTO_INCREMENT
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('asset_id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('admin_id');
            $table->unsignedInteger('milestone_id');
            $table->string('issuetype', 15);
            $table->string('priority', 60);
            $table->string('status', 60);
            $table->string('name', 255);
            $table->longText('description');
            $table->string('duedate', 20);
            $table->unsignedInteger('timespent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
