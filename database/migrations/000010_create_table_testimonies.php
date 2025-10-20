<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('role', 128);
            $table->string('testimony', 384);
            $table->enum('status', ['inactive', 'active'])->default('inactive');
            
            $table->unsignedBigInteger('company_id');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonies');
    }
};
