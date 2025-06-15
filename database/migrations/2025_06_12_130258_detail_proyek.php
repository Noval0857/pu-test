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
        Schema::create('detail_proyek', function (Blueprint $table) {
            $table->id('id_detail');
            $table->foreignId('id_proyek')->constrained('proyeks', 'id_proyek')->onDelete('cascade');
            $table->string('nama_berkas');
            $table->string('url_berkas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
