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
use Illuminate\Support\Facades\URL;

class BaseModel extends Model
{
    public static function boot()
    {
        static::created(function () {
            self::generateSitemap();
        });

        static::updated(function () {
            self::generateSitemap();
        });

        static::deleted(function () {
            self::generateSitemap();
        });

        parent::boot();
    }

    private static function generateSitemap()
    {
        $sitemap = App::make('sitemap');

        // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
        // by default cache is disabled
        $sitemap->setCache('laravel.sitemap', 60);

        // check if there is cached sitemap and build new only if is not

        $currentTimeStamp = Carbon::now()->format('Y-m-d');
        // add item to the sitemap (url, date, priority, freq)
        $sitemap->add(URL::to('/'), $currentTimeStamp, '1.0', 'daily');

        $pages = DB::table('pages')->orderBy('created_at', 'desc')->get();

        foreach ($pages as $value) {
            $sitemap->add(URL::to('/' . $value->slug), $currentTimeStamp, 0.9, 'daily');
        }


        // get all portfolio from db
        $portfolio = DB::table('portfolio')->orderBy('created_at', 'desc')->get();

//        // add every post to the sitemap
//        foreach ($portfolio as $value) {
//            $sitemap->add($value->slug, $currentTimeStamp, 0.8, 'daily');
//        }


        return $sitemap->store('xml', 'sitemap');

    }
}