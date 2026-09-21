@csrf
<div class="field">
    <label for="name">名前</label>
    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required maxlength="255">
    @error('name')<div class="error">{{ $message }}</div>@enderror
</div>
<div class="field">
    <label for="email">メールアドレス</label>
    <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required maxlength="255">
    @error('email')<div class="error">{{ $message }}</div>@enderror
</div>
<div class="field">
    <label for="password">パスワード@if($user->exists)（変更する場合のみ入力）@endif</label>
    <input id="password" type="password" name="password" minlength="8" autocomplete="new-password" @required(! $user->exists)>
    @error('password')<div class="error">{{ $message }}</div>@enderror
</div>
<div class="field">
    <label for="password_confirmation">パスワード（確認）</label>
    <input id="password_confirmation" type="password" name="password_confirmation" minlength="8" autocomplete="new-password" @required(! $user->exists)>
</div>
<button type="submit" class="btn">保存</button>
<a href="{{ route('admin.users.index') }}" style="margin-left: 16px;">戻る</a>
