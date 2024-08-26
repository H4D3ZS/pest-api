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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->dateTime('appointment_date');
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            $table->string('client_name');
            $table->string('client_address');
            $table->string('pest_found')->nullable();
            $table->string('action_taken')->nullable();
            $table->timestamp('time_in')->nullable();
            $table->timestamp('time_out')->nullable();
            $table->text('remarks')->nullable();
            $table->text('chemicals_used')->nullable();
            $table->string('pest_control_applicator')->nullable();
            $table->string('escort_name')->nullable();
            $table->json('chemicals')->nullable();
            $table->string('service_type');
            $table->string('pest_type');
            $table->string('severity');
            $table->text('description')->nullable();
            $table->string('status')->default('scheduled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
