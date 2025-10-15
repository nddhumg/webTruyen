<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showInfo()
    {
        return view('app_pages.user.account_info');
    }

   public function update(UpdateUsersRequest $request)
{
    $user = auth()->user();

    $user->name = $request->name;

    // Nếu có upload file
    if ($request->hasFile('avatar')) {
        $file = $request->file('avatar');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Lưu file vào storage/app/public/avatars
        $file->storeAs('avatars', $filename, 'public');

        // Cập nhật đường dẫn trong DB (chỉ lưu 'avatars/...')
        $user->avatar = 'avatars/' . $filename;
    }

    $user->save();

    return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
}

    public function register(CreateUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/')->with('success', 'Tài khoản đã được tạo!');
    }

    public function login(LoginUsersRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
