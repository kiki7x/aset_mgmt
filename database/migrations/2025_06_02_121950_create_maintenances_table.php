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
        Schema::create('maintenances_schedule', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->nullable();
            $table->string('name'); // Detail pemeliharaan (e.g., 'Ganti Oli Mesin', 'Pembersihan')
            // $table->string('type'); // 'preventive' atau 'corrective'
            $table->string('frequency')->nullable(); // 'per_3_bulan', 'per_4_bulan', dst '
            $table->date('start_date')->nullable(); // Tanggal manual untuk Korektif
            $table->date('next_date')->nullable();
            $table->string('status')->nullable();
            $table->text('customfields')->nullable();
            $table->timestamps();
        });
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('maintenance_schedule_id'); // Relasi ke maintenance_schedule
            $table->string('name')->nullable();
            $table->foreignId('pic_id')->nullable();
            $table->string('status')->nullable();
            $table->date('start_date')->nullable();
            $table->date('finish_date')->nullable();
            $table->string('attachment')->nullable();
            $table->text('notes')->nullable();
            $table->text('customfields')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances_schedule');
        Schema::dropIfExists('maintenances');
    }
};
