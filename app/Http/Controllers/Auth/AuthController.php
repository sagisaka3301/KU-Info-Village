<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// ユーザー取得のために読み込む
use App\Models\User;

class AuthController extends Controller
{
    /**
     * @return View
     */

    public function login(LoginFormRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', '=', $credentials['email'])->first();

        if (!is_null($user)) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->route('kuinfo.home');
            }
        }
        return redirect()->route('kuinfo.error')->with('error', 'メールアドレスかパスワードが異なります。');
    }

    /**
     * ユーザーをログアウトさせる。
     *
     * @param \Illuminate\Http\Request
     */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('kuinfo.front');
    }
}
