<?php
/**
 * Created by PhpStorm.
 * User: Back-End
 * Date: 23.10.2017
 * Time: 15:25
 */

namespace App\Http\Controllers;

class SearchController extends Controller
{

    public function __invoke()
    {
        return view('client.search');
    }
}