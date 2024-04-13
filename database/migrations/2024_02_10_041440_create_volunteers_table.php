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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->text('designation', 255);
            $table->text('name', 255);
            $table->text('state', 255);
            $table->date('date_of_birth');
            $table->string('email');
            $table->string('phone', 255);
            $table->text('address', 500);
            $table->text('position', 500);
            $table->text('organisation', 500);
            $table->text('program', 500);
            $table->text('activities', 500);
            $table->string('gender');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
