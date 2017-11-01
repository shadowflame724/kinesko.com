<?php
/**
 * Created by PhpStorm.
 * User: Back-End
 * Date: 23.10.2017
 * Time: 15:25
 */

namespace App\Http\Controllers;

use TCG\Voyager\Models\Page;

class CompanyController extends Controller
{
    public function __invoke()
    {
        $page = Page::where('slug', 'company')->first();

        if ($page != null) {

            return view('client.company', [
                'page' => $page
            ]);
        } else {
            return abort(404);
        }

    }
}