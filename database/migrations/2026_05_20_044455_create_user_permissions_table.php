<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->id();
            // Link directly to the main users table records
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Link directly to the permissions table records
            $table->foreignId('permission_id')->constrained('permissions')->onDelete('cascade');
            $table->timestamp('granted_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_permissions');
    }
};
