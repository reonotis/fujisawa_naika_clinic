<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class NewsRepository
{
    /**
     * 公開中のお知らせを公開日の新しい順に取得する
     *
     * @return Collection<int, News>
     */
    public function getPublished(): Collection
    {
        return $this->newestFirst(News::where('is_published', true))->get();
    }

    /**
     * 非公開を含む全てのお知らせを公開日の新しい順に取得する
     *
     * @return Collection<int, News>
     */
    public function getAll(): Collection
    {
        return $this->newestFirst(News::query())->get();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): News
    {
        return News::create($data);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function update(News $news, array $data): News
    {
        $news->update($data);

        return $news;
    }

    /**
     * @param  Builder<News>  $query
     * @return Builder<News>
     */
    private function newestFirst(Builder $query): Builder
    {
        return $query->orderByDesc('published_at')->orderByDesc('id');
    }
}
