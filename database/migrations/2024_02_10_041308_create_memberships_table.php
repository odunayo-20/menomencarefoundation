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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->text('first_name', 255);
            $table->text('other_name', 255)->nullable();
            $table->text('last_name', 255);
            $table->text('state', 255);
            $table->date('date_of_birth');
            $table->string('email');
            $table->string('phone', 255);
            $table->string('gender');
            $table->text('address', 500);
            $table->text('employ_status', 500);
            $table->text('edu_qualification', 500);
            $table->text('organization_name', 500)->nullable();
            $table->text('organization_address', 500)->nullable();
            $table->text('membership_category',255);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};