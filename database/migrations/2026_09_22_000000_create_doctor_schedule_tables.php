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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('表示名');
            $table->string('css_class')->unique()->comment('カレンダー表示用CSSクラス');
            $table->unsignedInteger('sort_order')->default(0)->comment('並び順');
            $table->boolean('is_active')->default(true)->comment('有効フラグ');
            $table->timestamps();
        });

        Schema::create('doctor_weekly_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('day_of_week')->unique()->comment('曜日(0=日〜6=土)');
            $table->boolean('is_closed')->default(false)->comment('休診日');
            $table->foreignId('am_doctor_id')->nullable()->constrained('doctors')->nullOnDelete()->comment('午前担当医(NULL=休診)');
            $table->foreignId('pm_doctor_id')->nullable()->constrained('doctors')->nullOnDelete()->comment('午後担当医(NULL=休診)');
            $table->timestamps();
        });

        Schema::create('doctor_schedule_overrides', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique()->comment('対象日');
            $table->boolean('is_closed')->default(false)->comment('休診日');
            $table->foreignId('am_doctor_id')->nullable()->constrained('doctors')->nullOnDelete()->comment('午前担当医(NULL=休診)');
            $table->foreignId('pm_doctor_id')->nullable()->constrained('doctors')->nullOnDelete()->comment('午後担当医(NULL=休診)');
            $table->string('note')->nullable()->comment('備考・休診日の表示名');
            $table->timestamps();
        });

        Schema::create('clinic_holidays', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique()->comment('休診日');
            $table->string('name')->comment('表示名(敬老の日 など)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinic_holidays');
        Schema::dropIfExists('doctor_schedule_overrides');
        Schema::dropIfExists('doctor_weekly_schedules');
        Schema::dropIfExists('doctors');
    }
};
