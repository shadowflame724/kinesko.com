<?php
/**
 * Created by PhpStorm.
 * User: Back-End
 * Date: 23.10.2017
 * Time: 15:25
 */

namespace App\Http\Controllers;

use App\Events\PostShown;
use App\Post;
use App\PostCategory;
use App\User;
use TCG\Voyager\Models\Page;

class BlogController extends Controller
{
    public function index($categorySlug = null)
    {
        $categories = PostCategory::all();
        $page = Page::where('slug', 'blog')->first();
        $categoryId = null;

        if ($categorySlug == null) {
            $posts = Post::with('author')->with('category')->paginate(setting('site.pagination_length'));
        } else {
            $category = PostCategory::where('slug', $categorySlug)->first();
            $categoryId = $category->id;
            $posts = Post::where('category_id', $categoryId)->with('author')->with('category')->paginate(setting('site.pagination_length'));
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
        $similarPosts = Post::where('category_id', $post->category_id)
            ->where('author_id', $post->author_id)
            ->where('id', '!=', $post->id)
            ->with('author')->with('category')
            ->orderBy('created_at', 'DESC')
            ->limit(2)->get();

        if ($post != null) {
            event(new PostShown($post));
            return view('client.blog.show', [
                'post' => $post,
                'similarPosts' => $similarPosts
            ]);
        } else {
            return abort(404);
        }

    }

    public function author($slug)
    {
        $page = Page::where('slug', 'blog')->first();
        $user = User::where('slug', $slug)->first();
        $posts = Post::where('author_id', $user->id)->with('category')->paginate(setting('site.pagination_length'));

        $commonViews = $user->posts->sum('views');
        $commonRating = $user->posts->sum('rating');
        $commonVotes = $user->posts->sum('votes');

        if ($user != null) {
            return view('client.blog.author', [
                'user' => $user,
                'posts' => $posts,
                'commonViews' => $commonViews,
                'commonRating' => $commonRating,
                'commonVotes' => $commonVotes,
                'page' => $page
            ]);
        } else {
            return abort(404);
        }

    }
}