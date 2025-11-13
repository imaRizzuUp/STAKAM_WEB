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
        Schema::table('pengumumans', function (Blueprint $table) {
            $table->string('file_path')->nullable()->change();
            $table->string('file_type', 10)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengumumans', function (Blueprint $table) {
            $table->string('file_path')->nullable(false)->change();
            $table->string('file_type', 10)->nullable(false)->change();
        });
    }
};