<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wardens', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number');
            $table->string('email')->unique();
            $table->string('city');
            $table->string('address');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wardens');
    }
};
