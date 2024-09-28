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
        Schema::create('trip_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('package_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->text('price');
            $table->text('include');
            $table->text('exclude');
            $table->text('destination');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_packages');
    }
};
