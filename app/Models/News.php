<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    protected $table = 'news';

    protected $fillable = [
        'published_at',
        'type',
        'type_comment',
        'title',
        'body',
        'route',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_published' => 'boolean',
    ];

    /**
     * 公開から1週間以内かどうか（new バッジ表示用）
     */
    public function getIsNewAttribute(): bool
    {
        return $this->published_at->gte(now()->subWeek()) && $this->published_at->lte(now());
    }
}
