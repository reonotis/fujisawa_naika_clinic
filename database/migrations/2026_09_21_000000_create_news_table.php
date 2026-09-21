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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->date('published_at')->comment('公開日');
            $table->string('type')->default('notice')->comment('種別キー');
            $table->string('type_comment')->default('お知らせ')->comment('種別表示名');
            $table->string('title')->comment('タイトル');
            $table->text('body')->nullable()->comment('本文');
            $table->string('route')->nullable()->comment('リンク先URLパス');
            $table->boolean('is_published')->default(true)->comment('公開フラグ');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['is_published', 'published_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
