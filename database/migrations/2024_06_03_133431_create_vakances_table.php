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
        Schema::create('vakances', function (Blueprint $table) {
            $table->id();

            $table->string('nosaukums');
            $table->string('iss_apraksts');
            $table->integer('alga');
            $table->string('atrasanas_vieta');
            $table->binary('attels');
            $table->text('darba_apraksts');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vakances');
    }
};
