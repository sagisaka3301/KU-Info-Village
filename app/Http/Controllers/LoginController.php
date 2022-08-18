<?php
namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Request;
use Request;


class LoginController extends Controller
{
    public function front() {
        return view('login/index');
    }
    public function home()
    {
        return view('home');
    }


    public function register(Request $request) {
        $register = $request::all();
        $err = [];
        $uni_count = 0;
        $key_num = config('key.ORANGE');
        $key_w = config('key.APPLE');
        $hidden_msg = config('key.GRAPE');
        $name = $register['name'];
        $email = $register['email'];
        $password = $register['password'];
        $pass_conf = $register['password__confirmation'];

        $checkEmail = self::checkEmail($email);

        if(intval($checkEmail) > 0) {
            $err[] = 'そのメールアドレスは既に使われています。';
        }

        if (!strpos($email, $key_w)) {
            $uni_count = 1;
        }

        if (!preg_match($key_num, $email)) {
            $uni_count = 1;
        }

        if($uni_count !== 0) {
            $err[] = $hidden_msg;
        }

        if($password !== $pass_conf) {
            $err[] = '確認用パスワードと異なっています。';
        }

        if (count($err) === 0) {
            $user_data = new User();
            $user_data->name = $name;
            $user_data->email = $email;
            $user_data->password = Hash::make($password);
            $user_data->save();
            $message = '保存しました。ログインボタンよりログインが可能になりました。';
        } else {
            $message = '登録に失敗しました。';
        }

        return view('login/register', [
            'err' => $err,
            'message' => $message,
        ]);
    }


}
