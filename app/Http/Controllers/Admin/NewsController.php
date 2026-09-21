<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\News;
use App\Repositories\NewsRepository;
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
{
    public function __construct(private readonly NewsRepository $newsRepository)
    {
    }

    public function index()
    {
        return view('admin.news.index', [
            'newsList' => $this->newsRepository->getAll(),
        ]);
    }

    public function create()
    {
        return view('admin.news.create', [
            'news' => new News(['published_at' => now(), 'is_published' => true]),
        ]);
    }

    public function store(NewsRequest $request): RedirectResponse
    {
        $this->newsRepository->create($request->validated());

        return redirect()->route('admin.news.index')->with('status', 'お知らせを登録しました。');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', ['news' => $news]);
    }

    public function update(NewsRequest $request, News $news): RedirectResponse
    {
        $this->newsRepository->update($news, $request->validated());

        return redirect()->route('admin.news.index')->with('status', 'お知らせを更新しました。');
    }
}
