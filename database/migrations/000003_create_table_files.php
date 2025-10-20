<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('path', 256)->unique();
            $table->enum('type', ['banner', 'thumbnail', 'icon', 'document', 'sliders',  'others']);
            $table->string('name', 128)->unique();
            $table->integer('size');
            $table->string('extension', 6);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
