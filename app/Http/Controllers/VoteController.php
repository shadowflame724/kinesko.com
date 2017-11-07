<?php

namespace App\Http\Controllers;

use App\Post;
use App\Portfolio;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote(Request $request, $type = null, $id)
    {
        if (\Session::has($request->path()))
            return 0;
        if ($request->ajax()) {
            if ($type == 'portfolio') {
                $res = Portfolio::find($id);
            } else {
                $res = Post::find($id);
            }
            $res->rating += $request->rating;
            $res->votes = $res->votes + 1;
            $res->save();
            session([$request->path() => 'true']);
            return 1;
        }
    }
}
