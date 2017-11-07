<?php
/**
 * Created by PhpStorm.
 * User: Back-End
 * Date: 23.10.2017
 * Time: 15:25
 */

namespace App\Http\Controllers;

use App\Post;
use App\Portfolio;
use App\ServiceCategory;
use TCG\Voyager\Models\Page;

class MainController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', '')->first();
        $serviceCategories = ServiceCategory::with('services')->get();
        $posts = Post::with('author')->with('category')->orderBy('created_at', 'DESC')->limit(3)->get();
        $mainWork = Portfolio::where('on_main_page', '1')->with('category')->inRandomOrder()->limit(1)->first();

        if ($page != null) {
            return view('client.index', [
                'page' => $page,
                'serviceCategories' => $serviceCategories,
                'posts' => $posts,
                'mainWork' => $mainWork
            ]);
        } else {
            return abort(404);
        }

    }
}