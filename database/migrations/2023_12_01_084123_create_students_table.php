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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('birthday');

            $table->string('image')->nullable();
            $table->boolean('is_active')->default(1);

            $table->unsignedBigInteger('team_id')->nullable();
            $table->index('team_id', 'student_team_idx');
            $table->foreign('team_id', 'student_team_fk')->on('teams')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
