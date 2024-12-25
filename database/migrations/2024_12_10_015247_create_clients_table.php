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
            $table->string('name', 255);
            $table->string('assettik_tag_prefix', 10);
            $table->string('assetrt_tag_prefix', 10);
            $table->string('license_tag_prefix', 10);
            $table->longText('notes')->nullable(); // notes column (LONGTEXT)
            $table->timestamps(); // created_at and updated_at columns
        });
        Schema::create('clients_admins', function (Blueprint $table) {
            $table->id(); // id column (AUTO_INCREMENT)
            $table->unsignedInteger('admin_id');
            $table->unsignedInteger('client_id');
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
