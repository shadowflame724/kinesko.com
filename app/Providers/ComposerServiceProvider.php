<?php

namespace App\Providers;

use App\Manager;
use App\Portfolio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Http\Composers\GlobalComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class ComposerServiceProvider.
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */

    public function boot(Request $request)
    {
        /*
         * Global
         */
        View::composer(
            // This class binds the $logged_in_user variable to every view
            '*', GlobalComposer::class
        );

        /*
         * Languages in global config
         */

        $appLangs = [
            'suf' => '_' . LaravelLocalization::getCurrentLocale()
        ];
        config([
            'app.langs' => $appLangs
        ]);
        // ******

        $managers = Manager::all();
        $portfolio = DB::table('portfolio')
            ->join('service_categories', 'portfolio.category_id', '=', 'service_categories.id')
            ->inRandomOrder(4)
            ->select('portfolio.*', 'service_categories.title_ru as categoryName_ru', 'service_categories.title_en as categoryName_en', 'service_categories.slug as categorySlug')
            ->get();

        View::composer(['*'], function ($view) use ($request, $appLangs, $managers, $portfolio) {

            $view
                ->with([
                    'langSuf' => $appLangs['suf'],
                    'managers' => $managers,
                    'portfolioFooter' => $portfolio
                ]);
        });
        /*
         * Backend
         */
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
