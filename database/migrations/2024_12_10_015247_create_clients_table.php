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
        Schema::create('clients', function (Blueprint $table) {
            $table->id(); // id column (AUTO_INCREMENT)
            $table->string('name', 255); // name column (VARCHAR 255)
            $table->string('asset_tag_prefix', 255); // asset_tag_prefix column (VARCHAR 255)
            $table->string('license_tag_prefix', 255); // license_tag_prefix column (VARCHAR 255)
            $table->longText('notes'); // notes column (LONGTEXT)
            $table->timestamps(); // created_at and updated_at columns
        });
        Schema::create('clients_admins', function (Blueprint $table) {
            $table->id(); // id column (AUTO_INCREMENT)
            $table->unsignedInteger('admin_id'); // adminid column (integer)
            $table->unsignedInteger('client_id'); // clientid column (integer)
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
        Schema::dropIfExists('clients_admins');
    }
};
