<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * 管理画面ログイン用ユーザーを登録する。
     * 認証情報は .env の ADMIN_EMAIL / ADMIN_PASSWORD で指定する（local のみ既定値あり）。
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', app()->environment('local') ? 'admin@example.com' : null);
        $password = env('ADMIN_PASSWORD', app()->environment('local') ? 'password' : null);

        if (! $email || ! $password) {
            throw new \RuntimeException('ADMIN_EMAIL と ADMIN_PASSWORD を .env に設定してください。');
        }

        User::updateOrCreate(
            ['email' => $email],
            ['name' => '管理者', 'password' => Hash::make($password)],
        );
    }
}
