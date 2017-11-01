<?php
/**
 * Created by PhpStorm.
 * User: Back-End
 * Date: 23.10.2017
 * Time: 15:25
 */

namespace App\Http\Controllers;

use App\Portfolio;
use App\Post;
use App\PostCategory;
use App\User;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\Page;

class BlogController extends Controller
{
    public function index($categorySlug = null)
    {
        $categories = PostCategory::all();
        $page = Page::where('slug', 'uslugi')->first();
        $categoryId = null;

        if($categorySlug == null) {
            $posts = Post::with('author')->with('category')->paginate(15);
        }else{
            $category = PostCategory::where('slug', $categorySlug)->first();
            $categoryId = $category->id;
            $posts = Post::where('category_id', $categoryId)->with('author')->with('category')->paginate(15);
        }

        if ($page != null) {
            return view('client.blog.index', [
                'page' => $page,
                'categories' => $categories,
                'posts' => $posts,
                'categoryId' => $categoryId
            ]);
        } else {
            return abort(404);
        }

    }

    public function show($categorySlug, $postSlug)
    {
        $post = Post::where('slug', $postSlug)->with('author')->with('category')->first();

        if ($post != null) {
            return view('client.blog.show', [
                'post' => $post
            ]);
        } else {
            return abort(404);
        }

    }

    public function author(User $user)
    {

        if ($user != null) {
            return view('client.blog.author', [
                'post' => $user
            ]);
        } else {
            return abort(404);
        }

    }
}