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
            $table->id();
            $table->string('titre');
            $table->string('description');
            $table->string('amao');
            $table->string('amoe');
            $table->foreignId('type_id')->nullable()->constrained('types');
            $table->foreignId('method_id')->nullable()->constrained('methods');
            $table->foreignId('sponsor_id')->nullable()->constrained('sponsors');
            $table->foreignId('prestataire_id')->nullable()->constrained('prestataires');
            $table->foreignId('statu_id')->nullable()->constrained('status');
            $table->foreignId('team_id')->nullable()->constrained('teams');
            $table->timestamps();
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
