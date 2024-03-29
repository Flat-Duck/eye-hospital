<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('diagnoses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('eye', ['Left', 'Right'])->default('Left');
            $table->string('BCVA')->nullable();
            $table->string('IOP')->nullable();
            $table->string('LID')->nullable();
            $table->string('conjunctiva')->nullable();
            $table->string('cornea')->nullable();
            $table->string('AC')->nullable();
            $table->string('IrisPupil')->nullable();
            $table->string('lens')->nullable();
            $table->string('fundus')->nullable();
            $table->longText('remarks')->nullable();
            $table->longText('diagnosis')->nullable();
            $table->string('US')->nullable();
            $table->string('OCT')->nullable();
            $table->string('pantacam')->nullable();
            $table->unsignedBigInteger('patient_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnoses');
    }
};
