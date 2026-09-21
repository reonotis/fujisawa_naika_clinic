<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'published_at' => ['required', 'date'],
            'title' => ['required', 'string', 'max:255'],
            'route' => ['nullable', 'string', 'max:255', 'regex:#^/\S*$#'],
            'is_published' => ['required', 'boolean'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'published_at' => '公開日',
            'title' => 'タイトル',
            'route' => 'リンク先',
            'is_published' => '公開設定',
        ];
    }
}
