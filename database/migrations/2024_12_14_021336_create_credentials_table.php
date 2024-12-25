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
        Schema::create('credentials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained(
                table: 'clients',
                indexName: 'credentials_client_id'
            );
            $table->foreignId('asset_id')->constrained(
                table: 'assets',
                indexName: 'credentials_asset_id'
            );
            $table->string('type', 100)->nullable();
            $table->string('username', 100)->nullable();
            $table->text('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credentials');
    }
};
