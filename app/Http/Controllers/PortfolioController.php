<?php
/**
 * Created by PhpStorm.
 * User: Back-End
 * Date: 23.10.2017
 * Time: 15:25
 */

namespace App\Http\Controllers;

use App\Block;
use App\Events\PortfolioShown;
use App\Portfolio;
use App\ServiceCategory;
use TCG\Voyager\Models\Page;

class PortfolioController extends Controller
{
    public function index($categorySlug = null)
    {
        $categories = ServiceCategory::all();
        $page = Page::where('slug', 'portfolio')->first();
        $categoryId = null;

        if ($categorySlug == null) {
            $portfolio = Portfolio::with('category')->get();
        } else {
            $category = ServiceCategory::where('slug', $categorySlug)->first();
            $categoryId = $category->id;
            $portfolio = Portfolio::where('category_id', $categoryId)->with('category')->get();
        }

        if ($page != null) {
            return view('client.portfolio.index', [
                'page' => $page,
                'categories' => $categories,
                'portfolio' => $portfolio,
                'categoryId' => $categoryId
            ]);
        } else {
            return abort(404);
        }

    }

    public function show($categorySlug, $portfolioSlug)
    {
        $portfolio = Portfolio::where('slug', $portfolioSlug)->with('category')->first();
        $blocksIdsArr = json_decode($portfolio->block_ids);
        $blocks = Block::whereIn('id', $blocksIdsArr)->get();

        $whiteBlocks = $blocks->where('color', 'WHITE')->sortBy('order');
        $blackBlocks = $blocks->where('color', 'BLACK')->sortBy('order');

        if ($portfolio != null) {
            event(new PortfolioShown($portfolio));

            return view('client.portfolio.show', [
                'portfolio' => $portfolio,
                'whiteBlocks' => $whiteBlocks,
                'blackBlocks' => $blackBlocks
            ]);
        } else {
            return abort(404);
        }

    }
}