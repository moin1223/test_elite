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
        Schema::create('requested_users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('thana_id')->nullable();
            $table->string('ward_no')->nullable();
            $table->string('group_id')->nullable();
            $table->string('mobile_number')->unique();
            $table->string('whats_app_number')->nullable();
            $table->string('monitor_name')->nullable();
            $table->string('monitor_number')->nullable();
            $table->string('drector_name')->nullable();
            $table->string('director_number')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('status');
            $table->string('role')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requested_users');
    }
};
