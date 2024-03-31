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
        Schema::create('pembejeozakilimos', function (Blueprint $table) {
            $table->id();
            $table->string('pembejeo_jina');
            $table->string('pembejeo_maelezo');
            $table->string('pembejeo_bei');
            $table->string('pembejeo_picha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembejeozakilimos');
    }
};
