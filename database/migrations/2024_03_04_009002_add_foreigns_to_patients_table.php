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
        Schema::table('patients', function (Blueprint $table) {
            $table
                ->foreign('hospital_id')
                ->references('id')
                ->on('hospitals')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table
                ->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropForeign(['hospital_id']);
            $table->dropForeign(['city_id']);
        });
    }
};
