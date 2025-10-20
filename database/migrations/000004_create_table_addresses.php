<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('city', 64);
            $table->string('street', 256);
            $table->string('country', 128);
            $table->string('province', 128);
            $table->string('pos_code', 12);

            $table->unsignedBigInteger('company_id');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
