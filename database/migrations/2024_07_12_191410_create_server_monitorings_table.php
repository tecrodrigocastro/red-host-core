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
        Schema::create('server_monitorings', function (Blueprint $table) {
            $table->id();
            $table->string('server_name');
            $table->integer('cpu_usage'); // in percentage
            $table->integer('ram_usage'); // in MB
            $table->integer('disk_usage'); // in MB
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('server_monitorings');
    }
};
