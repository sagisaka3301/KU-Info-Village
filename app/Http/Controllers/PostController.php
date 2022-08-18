<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Lib\Common;
use Illuminate\Support\Facades\Auth;
// ユーザー取得のために読み込む
use App\Models\User;

class PostController extends Controller
{
    public function classes(Request $request)
    {
        if($request->undergra) {

            $exnum = $request->undergra;
            $exclusive = Post::where('undergra', '=', (string)$request->undergra)->paginate(80);
                return view('classes.index')
                    ->with(['posts' => $exclusive,
                            'exnum' => $exnum,]);
        } else if($request->search) {
            $search = Post::where('class_name', 'LIKE', '%' .(string)$request->search. '%')->paginate(80);
                return view('classes.index')
                    ->with(['posts' => $search,
                            'search' => $request->search,]);
        } else {
            $posts = Post::latest()->paginate(80);
            return view('classes/index')
                ->with(['posts' => $posts]);
        }

    }

    public function detail(Post $post)
    {
        return view('classes.detail')
            ->with(['post' => $post]);
    }

    public function create(Request $request)
    {

        $postUser = Auth::user();
        $userEmail = $postUser->email;

        $class = new Post;
        $class->undergra = $request->undergra;
        $class->type = $request->type ;
        $class->class_name = $request->class_name;
        $class->in_charge = $request->in_charge;
        $class->evaluation = $request->rating;
        $class->comment = $request->comment;
        $class->post_user = $userEmail;
        $class->save();

        self::postFlag($userEmail);

        return redirect()
            ->route('kuinfo.classes');
    }


}
