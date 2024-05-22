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
        Schema::table('wismas', function (Blueprint $table) {
            $table->string('kegiatan')->after('from')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wismas', function (Blueprint $table) {
            $table->dropColumn('kegiatan');
        });
    }
};
