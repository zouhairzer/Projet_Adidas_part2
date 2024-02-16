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
        Schema::create('permissions', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('route_id')->constrained('routes')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['role_id', 'route_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
