<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('name', 48)->unique();
            $table->string('link', 256)->unique()->nullable();
            $table->string('description', 128);
            $table->enum('status', ['inactive', 'active'])->default('inactive');

            $table->unsignedBigInteger('image_id')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
