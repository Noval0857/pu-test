<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyekTagTable extends Migration
{
    public function up()
    {
        Schema::create('proyek_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proyek');
            $table->unsignedBigInteger('id_tag');
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_proyek')->references('id_proyek')->on('proyeks')->onDelete('cascade');
            $table->foreign('id_tag')->references('id_tag')->on('tags')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('proyek_tag');
    }

};
