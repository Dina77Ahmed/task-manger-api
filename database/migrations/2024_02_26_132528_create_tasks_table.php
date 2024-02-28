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
        Schema::create('tasks', function (Blueprint $table) {
            // $table->uuid('id')->primary();
            $table->id();
            $table->string('title')->uniqid();
            $table->enum('status', ['pending', 'active', 'completed'])->default('pending');
            $table->enum('priority', ['low', 'medium', 'high'])
            ->default('medium');
            $table->string('description');
            $table->timestamp('due_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
