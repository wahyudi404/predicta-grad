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
        Schema::create('participant_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_id')->constrained('participants', 'id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('study_id')->constrained('studies', 'id')->onDelete('cascade')->onUpdate('cascade');
            $table->float('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participant_scores');
    }
};
