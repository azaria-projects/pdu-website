<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('motto')->nullable();
            $table->string('vision')->nullable();
            $table->string('mission')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('facebook')->nullable()->unique();
            $table->string('linkedin')->nullable()->unique();
            $table->string('instagram')->nullable()->unique();
            $table->boolean('is_partner')->default(false);

            $table->unsignedBigInteger('icon_id')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
