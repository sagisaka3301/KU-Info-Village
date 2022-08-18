<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\Common;
use Illuminate\Support\Facades\Auth;
// ユーザー取得のために読み込む
use App\Models\User;

class MypageController extends Controller
{
    public function mypage()
    {
        return view('mypage/index');
    }

    public function proUpdate(Request $request)
    {
        $userName = $request->name;
        $userEmail = $request->email;

        $upUser = Auth::user();

        if($request->has('img')) {
            $fileName = $request->img->getClientOriginalName();

            $saveAs = date('YmdHis') . $fileName;


            $userImg = $request->img->storeAs('public', $saveAs);

            $upUser->f_name = $saveAs;
            $upUser->f_path = $saveAs;
        }
        if ($request->has('name')) {
            $upUser->name = $request->name;
        }
        if ($request->has('email')) {
            $upUser->email = $request->email;
        }

        $upUser->save();
        return redirect()->route('kuinfo.mypage');


    }
}
