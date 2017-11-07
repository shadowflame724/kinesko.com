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

        View::composer(['*'], function ($view) use ($request, $appLangs, $managers) {

            $view
                ->with([
                    'langSuf' => $appLangs['suf'],
                    'managers' => $managers
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
