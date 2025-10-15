<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showInfo()
    {
        return view('app_pages.user.account_info');
    }

    public function update(UpdateUsersRequest $request)
    {
        $user = auth()->user();

        // Cập nhật thông tin cơ bản
        $user->name = $request->name;
        $user->email = $request->email;

        // Nếu có upload ảnh đại diện
        if ($request->hasFile('avatar')) {
            // // Xóa ảnh cũ nếu có
            // if ($user->avatar && file_exists(public_path('uploads/avatars/'.$user->avatar))) {
            //     unlink(public_path('uploads/avatars/'.$user->avatar));
            // }

            // // Lưu ảnh mới
            // $file = $request->file('avatar');
            // $filename = time().'_'.$file->getClientOriginalName();
            // $file->move(public_path('uploads/avatars'), $filename);
            $photoPath = $request->file('avatar')->store('photos','public');
            $user->avatar = $photoPath;
        }

        // Lưu thay đổi
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
