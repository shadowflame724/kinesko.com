<?php
/**
 * Created by PhpStorm.
 * User: Back-End
 * Date: 23.10.2017
 * Time: 15:25
 */

namespace App\Http\Controllers;

use App\ServiceCategory;
use TCG\Voyager\Models\Page;

class MainController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', '')->first();
        $serviceCategories = ServiceCategory::with('services')->get();

        if ($page != null) {

            return view('client.index', [
                'page' => $page,
                'serviceCategories' => $serviceCategories
            ]);
        } else {
            return abort(404);
        }

    }
}