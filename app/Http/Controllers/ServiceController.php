<?php
/**
 * Created by PhpStorm.
 * User: Back-End
 * Date: 23.10.2017
 * Time: 15:25
 */

namespace App\Http\Controllers;

use App\Block;
use App\Service;
use App\ServiceCategory;
use TCG\Voyager\Models\Page;

class ServiceController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'services')->first();
        $serviceCategories = ServiceCategory::with('services')->get();

        if ($page != null) {
            return view('client.services.index', [
                'page' => $page,
                'serviceCategories' => $serviceCategories
            ]);
        } else {
            return abort(404);
        }

    }

    public function show($serviceSlug)
    {
        $service = Service::where('slug', $serviceSlug)->with('category')->first();
        $blocksIdsArr = json_decode($service->block_ids);
        $blocks = Block::whereIn('id', $blocksIdsArr)->get();

        $whiteBlocks = $blocks->where('color', 'WHITE')->sortBy('order');
        $blackBlocks = $blocks->where('color', 'BLACK')->sortBy('order');

        if ($service != null) {
            return view('client.services.show', [
                'service' => $service,
                'whiteBlocks' => $whiteBlocks,
                'blackBlocks' => $blackBlocks
            ]);
        } else {
            return abort(404);
        }

    }
}