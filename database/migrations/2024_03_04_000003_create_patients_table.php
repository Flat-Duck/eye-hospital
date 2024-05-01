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
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('birth_date');
            $table->bigInteger('n_id');
            $table->enum('gender', ['male', 'female']);
            $table->string('phone');
            $table->string('escort_phone');
            $table->unsignedBigInteger('city_id');
            $table->string('category');
            $table->unsignedBigInteger('hospital_id');
            $table->string('CO')->nullable();
            $table->string('PMH')->nullable();
            $table->string('PSH')->nullable();
            $table->string('DM')->nullable();
            $table->string('BP')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
