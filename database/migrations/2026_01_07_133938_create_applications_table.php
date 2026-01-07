<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
Schema::create('applications', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('company_name');
        $table->string('job_title');
        $table->enum('status', ['En attente', 'Relancé', 'Entretien', 'Refusé'])->default('En attente');
        $table->date('applied_at');
        $table->string('link')->nullable(); // Lien de l'offre
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
