@csrf
<div class="field">
    <label for="published_at">公開日</label>
    <input id="published_at" type="date" name="published_at" value="{{ old('published_at', $news->published_at?->format('Y-m-d')) }}" required>
    @error('published_at')<div class="error">{{ $message }}</div>@enderror
</div>
<div class="field">
    <label for="title">タイトル</label>
    <input id="title" type="text" name="title" value="{{ old('title', $news->title) }}" required maxlength="255">
    @error('title')<div class="error">{{ $message }}</div>@enderror
</div>
<div class="field">
    <label for="route">リンク先（URLのパス）</label>
    <input id="route" type="text" name="route" value="{{ old('route', $news->route) }}" maxlength="255" placeholder="/self-pay/laser">
    @error('route')<div class="error">{{ $message }}</div>@enderror
</div>
<div class="field">
    <input type="hidden" name="is_published" value="0">
    <label><input type="checkbox" name="is_published" value="1" @checked(old('is_published', $news->is_published))> 公開する</label>
    @error('is_published')<div class="error">{{ $message }}</div>@enderror
</div>
<button type="submit" class="btn">保存</button>
<a href="{{ route('admin.news.index') }}" style="margin-left: 16px;">戻る</a>
