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
        Schema::create('pieteikumis', function (Blueprint $table) {
            $table->id();

            $table->string('vakance');
            $table->string('vards');
            $table->string('uzvards');
            $table->string('talrunis');
            $table->string('epasts');
            $table->binary('cv');
            $table->text('komentars');
            $table->string('statuss')->default('Apstrādē');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pieteikumis');
    }
};
