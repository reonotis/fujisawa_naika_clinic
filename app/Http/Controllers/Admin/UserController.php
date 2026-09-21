<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function index()
    {
        return view('admin.users.index', [
            'users' => $this->userRepository->getAll(),
        ]);
    }

    public function create()
    {
        return view('admin.users.create', ['user' => new User()]);
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $this->userRepository->create($request->validated());

        return redirect()->route('admin.users.index')->with('status', 'ユーザーを登録しました。');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $this->userRepository->update($user, $request->validated());

        return redirect()->route('admin.users.index')->with('status', 'ユーザーを更新しました。');
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->is(auth()->user())) {
            return redirect()->route('admin.users.index')->withErrors(['delete' => 'ログイン中のユーザーは削除できません。']);
        }

        $this->userRepository->delete($user);

        return redirect()->route('admin.users.index')->with('status', 'ユーザーを削除しました。');
    }
}
