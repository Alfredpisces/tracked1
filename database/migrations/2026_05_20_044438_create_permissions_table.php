<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('module_name'); // e.g., 'teacher_performance', 'behavioral_tracking', 'inventory'
            $table->string('action_name'); // e.g., 'submit_dll', 'resolve_cases', 'assign_properties'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
