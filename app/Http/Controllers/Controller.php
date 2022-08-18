<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\User;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function checkEmail($email) {
        $check = User::where('email', $email)->count();
        return $check;
    }

    public function getUserByEmail($email) {
        $user = User::where('email', $email);
        return $user;
    }

    public function postFlag($userEmail) {
        $user = User::where('email', '=', $userEmail)->first();
        $user->post_flag = 1;
        $user->save();
    }

    public function error() {
        return view('error');
    }
}
