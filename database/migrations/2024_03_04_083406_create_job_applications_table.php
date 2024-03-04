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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();

            $table->string('firstName')->index(); // Index for firstName;
            $table->string('lastName')->index(); // Index for lastName;
            $table->string('email')->index(); // Index for email;
            $table->bigInteger('mobile')->unsigned()->index(); // Index for mobile;;
            $table->string('role',50)->index(); // Index for role;
            $table->text('file');
            $table->text('address');
            $table->text('workExperience')->nullable();
            $table->text('education');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
