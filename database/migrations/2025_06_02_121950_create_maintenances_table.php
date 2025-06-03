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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->nullable();
            $table->string('maintenance_type'); // 'preventive' atau 'corrective'
            $table->string('detail'); // Detail pemeliharaan (e.g., 'Ganti Oli Mesin', 'Pembersihan')
            $table->string('sub_detail')->nullable(); // Untuk 'Other' di Korektif
            $table->date('maintenance_date')->nullable(); // Tanggal manual untuk Korektif
            $table->string('preventive_schedule')->nullable(); // 'per_3_bulan', 'per_4_bulan', '
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
