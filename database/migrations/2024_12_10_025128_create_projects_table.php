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
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); // id column (AUTO_INCREMENT and PRIMARY KEY)
            $table->unsignedInteger('client_id'); // clientid column (integer)
            $table->string('tag', 255); // tag column (VARCHAR 255)
            $table->string('name', 255); // name column (VARCHAR 255)
            $table->longText('notes'); // notes column (LONGTEXT)
            $table->text('description'); // description column (TEXT)
            $table->string('startdate', 20); // startdate column (VARCHAR 20)
            $table->string('deadline', 20); // deadline column (VARCHAR 20)
            $table->integer('progress'); // progress column (integer)
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
