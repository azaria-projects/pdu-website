<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('com_codes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64)->unique();
            $table->text('value');
            $table->enum('type', ['icons', 'key-value', 'default-careers', 'default-company']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('com_codes');
    }
};
