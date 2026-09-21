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
        Schema::create('doctor_calendar_publications', function (Blueprint $table) {
            $table->id();
            $table->string('target_month', 7)->unique()->comment('対象年月(YYYY-MM)');
            $table->boolean('is_published')->default(false)->comment('公開フラグ');
            $table->timestamp('published_at')->nullable()->comment('公開日時');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_calendar_publications');
    }
};
