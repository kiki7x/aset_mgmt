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
            $table->unsignedInteger('client_id'); // clientid column (integer)
            $table->unsignedInteger('project_id'); // projectid column (integer)
            $table->unsignedInteger('asset_id'); // assetid column (integer)
            $table->unsignedInteger('ticketreply_id'); // ticketreplyid column (integer)
            $table->string('name', 255); // name column (VARCHAR 255)
            $table->string('file', 255); // file column (VARCHAR 255)
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
