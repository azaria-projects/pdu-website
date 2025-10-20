<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('icon', 128)->default('ti-help-hexagon');
            $table->string('value', 8)->default('0');
            $table->enum('status', ['inactive', 'active'])->default('inactive');
            $table->string('description', 32);
            
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
