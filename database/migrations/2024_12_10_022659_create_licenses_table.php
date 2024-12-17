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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id(); // id column (AUTO_INCREMENT and PRIMARY KEY)
            $table->unsignedInteger('client_id'); // clientid column (integer)
            $table->unsignedInteger('status_id'); // statusid column (integer)
            $table->unsignedInteger('category_id'); // categoryid column (integer)
            $table->unsignedInteger('supplier_id'); // supplierid column (integer)
            $table->string('seats', 5); // seats column (VARCHAR 5)
            $table->string('tag', 255)->unique(); // tag column (VARCHAR 255, UNIQUE)
            $table->string('name', 255); // name column (VARCHAR 255)
            $table->text('serial'); // serial column (TEXT)
            $table->text('notes'); // notes column (TEXT)
            $table->text('customfields'); // customfields column (TEXT)
            $table->text('qrvalue'); // qrvalue column (TEXT)
            $table->timestamps(); // created_at and updated_at columns
        });
        Schema::create('licenses_assets', function (Blueprint $table) {
            $table->id(); // id column (AUTO_INCREMENT and PRIMARY KEY)
            $table->unsignedInteger('license_id'); // licenseid column (integer)
            $table->unsignedInteger('asset_id'); // assetid column (integer)
            $table->timestamps(); // created_at and updated_at columns
        });
        Schema::create('licenses_customfields', function (Blueprint $table) {
            $table->id(); // id column (AUTO_INCREMENT and PRIMARY KEY)
            $table->string('type', 32); // type column (VARCHAR 32)
            $table->string('name', 255); // name column (VARCHAR 255)
            $table->string('description', 255); // description column (VARCHAR 255)
            $table->text('options'); // options column (TEXT)
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licenses');
        Schema::dropIfExists('licenses_assets');
        Schema::dropIfExists('licenses_customfields');
    }
};
