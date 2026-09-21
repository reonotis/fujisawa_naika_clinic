<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['published_at' => '2026-08-10', 'title' => '医療用レーザー治療のご案内', 'route' => '/self-pay/laser'],
            ['published_at' => '2026-08-02', 'title' => '9月の外来担当医表を公開しました。', 'route' => null],
            ['published_at' => '2026-06-11', 'title' => '令和6年度 流山市特定健診・肝炎ウイルス検診のご案内（6/15〜）', 'route' => '/notice/kensin'],
            ['published_at' => '2026-06-02', 'title' => '胸部レントゲン撮影にAI機能を搭載しました。', 'route' => '/notice/ai-xray'],
            ['published_at' => '2026-04-01', 'title' => '当院のマイナ保険証体制につきまして', 'route' => '/notice/maina'],
        ];

        foreach ($items as $item) {
            News::updateOrCreate(
                ['published_at' => $item['published_at'], 'title' => $item['title']],
                $item + ['type' => 'notice', 'type_comment' => 'お知らせ', 'is_published' => true],
            );
        }
    }
}
