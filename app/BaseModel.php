<?php
/**
 * Created by PhpStorm.
 * User: Back-End
 * Date: 01.11.2017
 * Time: 17:28
 */

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;

class BaseModel extends Model
{

    public static function boot()
    {
        static::saved(function () {
            $path = Request::path();
            if (strpos($path, 'admin') !== false) {
                self::generateSitemap();
            }
        });

        static::deleted(function () {

            self::generateSitemap();
        });

        parent::boot();
    }

    private static function generateSitemap()
    {
        $sitemap = App::make('sitemap');
        $sitemap->setCache('laravel.sitemap', 60);

        $currentTimeStamp = Carbon::now()->getTimestamp();

        $pages = DB::table('pages')->orderBy('created_at', 'desc')->get();
        $serviceCategories = ServiceCategory::with('services')->with('portfolio')->get()->sortBy('created_at');
        $postCategories = PostCategory::with('posts')->get()->sortBy('created_at');
        $users = DB::table('users')->orderBy('created_at', 'desc')->get();
        $sitemap->add(URL::to('/'), $currentTimeStamp, 1.0, 'daily');
        $sitemap->add(URL::to('/en/'), $currentTimeStamp, 1.0, 'daily');

        foreach ($pages as $value) {
            if (strlen($value->slug) > 1) {
                $sitemap->add(URL::to('/' . $value->slug . '.html'), $value->updated_at, 0.9, 'daily');
                $sitemap->add(URL::to('/en/' . $value->slug . '.html'), $value->updated_at, 0.9, 'daily');
            }
        }

        foreach ($serviceCategories as $serviceCategory) {
            $sitemap->add(URL::to('/portfolio/' . $serviceCategory->slug . '.html'), $serviceCategory->updated_at, 0.8, 'daily');
            $sitemap->add(URL::to('/en/portfolio/' . $serviceCategory->slug . '.html'), $serviceCategory->updated_at, 0.8, 'daily');

            if ($serviceCategory->services->isNotEmpty()) {
                foreach ($serviceCategory->services as $service) {
                    $sitemap->add(URL::to('/services/' . $service->slug . '.html'), $service->updated_at, 0.7, 'daily');
                    $sitemap->add(URL::to('/en/services/' . $service->slug . '.html'), $service->updated_at, 0.7, 'daily');
                }
            }
            if ($serviceCategory->portfolio->isNotEmpty()) {
                foreach ($serviceCategory->portfolio as $portfolio) {
                    $sitemap->add(URL::to('/portfolio/' . $serviceCategory->slug . '/' . $portfolio->slug . '.html'), $portfolio->updated_at, 0.6, 'daily');
                    $sitemap->add(URL::to('/en/portfolio/' . $serviceCategory->slug . $portfolio->slug . '.html'), $portfolio->updated_at, 0.6, 'daily');
                }
            }
        }

        foreach ($postCategories as $postCategory) {
            $sitemap->add(URL::to('/blog/' . $postCategory->slug . '.html'), $postCategory->updated_at, 0.8, 'daily');
            $sitemap->add(URL::to('/en/blog/' . $postCategory->slug . '.html'), $postCategory->updated_at, 0.8, 'daily');

            if ($postCategory->posts->isNotEmpty()) {
                foreach ($postCategory->posts as $post) {
                    $sitemap->add(URL::to('/blog/' . $postCategory->slug . '/' . $post->slug . '.html'), $post->updated_at, 0.6, 'daily');
                    $sitemap->add(URL::to('/en/blog/' . $postCategory->slug . $post->slug . '.html'), $post->updated_at, 0.6, 'daily');
                }
            }
        }

        foreach ($users as $user) {
            $sitemap->add(URL::to('/blog/author/' . $user->slug . '.html'), $user->updated_at, 0.6, 'daily');
            $sitemap->add(URL::to('/en/blog/author/' . $user->slug . '.html'), $user->updated_at, 0.6, 'daily');
        }

        return $sitemap->store('xml', 'sitemap');
    }
}