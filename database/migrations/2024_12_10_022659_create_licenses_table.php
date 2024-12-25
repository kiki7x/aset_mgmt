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
        Schema::create('licenses_assets', function (Blueprint $table) {
            $table->id(); // id column (AUTO_INCREMENT and PRIMARY KEY)
            $table->unsignedInteger('license_id'); // licenseid column (integer)
            $table->unsignedInteger('asset_id'); // assetid column (integer)
            $table->timestamps(); // created_at and updated_at columns
        });
        Schema::create('licensecategories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('color', 7);
            $table->timestamps();
        });
        Schema::create('licenses_customfields', function (Blueprint $table) {
            $table->id(); // id column (AUTO_INCREMENT and PRIMARY KEY)
            $table->string('type', 32); // type column (VARCHAR 32)
            $table->string('name', 255); // name column (VARCHAR 255)
            $table->string('description', 255); // description column (VARCHAR 255)
            $table->text('options'); // options column (TEXT)
            $table->timestamps(); // created_at and updated_at columns
        });
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained(
                table: 'clients',
                indexName: 'licenses_client_id'
            );
            $table->foreignId('status_id')->constrained(
                table: 'labels',
                indexName: 'licenses_labels_id'
            );
            $table->unsignedBigInteger('category_id');
            $table->foreignId('supplier_id')->constrained(
                table: 'licensecategories',
                indexName: 'licensecategories_supplier_id'
            );
            $table->string('seats', 5);
            $table->string('tag', 255)->unique();
            $table->string('name', 255);
            $table->text('serial');
            $table->text('notes')->nullable();
            $table->text('customfields')->nullable();
            $table->text('qrvalue')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licenses');
        Schema::dropIfExists('licenses_assets');
        Schema::dropIfExists('licensecategories');
        Schema::dropIfExists('licenses_customfields');
    }
};
