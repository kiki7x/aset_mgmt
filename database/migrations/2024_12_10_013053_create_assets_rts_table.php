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
        Schema::create('assets_rts', function (Blueprint $table) {
            $table->id(); // id column
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('admin_id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('manufacturer_id');
            $table->unsignedInteger('model_id');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('status_id');
            $table->date('purchase_date');
            $table->unsignedInteger('warranty_months');
            $table->string('tag', 255)->unique();
            $table->string('name', 255);
            $table->string('serial', 255);
            $table->text('notes')->nullable();
            $table->unsignedInteger('location_id');
            $table->text('customfields')->nullable();
            $table->text('qrvalue')->nullable();
            $table->timestamps(); // adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets_rts');
    }
};
