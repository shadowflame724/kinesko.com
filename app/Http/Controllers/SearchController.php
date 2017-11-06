<?php
/**
 * Created by PhpStorm.
 * User: Back-End
 * Date: 23.10.2017
 * Time: 15:25
 */

namespace App\Http\Controllers;

use App\Block;
use App\Post;
use App\Portfolio;
use App\Service;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{

    public function __invoke(Request $request)
    {
        $sql = [
            'portfolio' => [],
            'blog' => [],
            'services' => []
        ];


        $query = Input::get('query');
        $category = Input::get('category');
        $searchCondition = Input::get('search-condition');
        $page = Input::get('page', 1);
        $perPage = 5;

        if (strlen($query) > 1) {
            switch ($category) {
                case 'portfolio':
                    switch ($searchCondition) {
                        case 'in-header':
                            $sql['portfolio'] = Portfolio::where('title_ru', 'LIKE', '%' . $query . '%')
                                ->orWhere('title_en', 'LIKE', '%' . $query . '%')
                                ->with('category')
                                ->get();

                            break;
                        case 'in-text':
                            $idsArr = [];

                            $blocks = Block::where('title_ru', 'LIKE', '%' . $query . '%')
                                ->orWhere('title_en', 'LIKE', '%' . $query . '%')
                                ->orWhere('body_ru', 'LIKE', '%' . $query . '%')
                                ->orWhere('body_en', 'LIKE', '%' . $query . '%')
                                ->get(['id'])->toArray();

                            foreach ($blocks as $block){
                                $idsArr[] = $block['id'];
                            }

                            foreach ($idsArr as $id){
                                $items[] = Portfolio::where('block_ids', 'LIKE', '%' . $id . '%')->get();
                            }

                            foreach (array_unique($items) as $value){
                                if($value->isNotEmpty()){
                                    array_push($sql['portfolio'], $value);
                                }
                            }

                            break;
                        default:
                            $sql['portfolio'] = Portfolio::where('title_ru', 'LIKE', '%' . $query . '%')
                                ->orWhere('title_en', 'LIKE', '%' . $query . '%')
                                ->with('category')
                                ->get();

                            break;
                    }
                    break;
                case 'blog':
                    switch ($searchCondition) {
                        case 'in-header':
                            $sql['blog'] = Post::where('title_ru', 'LIKE', '%' . $query . '%')
                                ->orWhere('title_en', 'LIKE', '%' . $query . '%')
                                ->with('category')
                                ->with('author')
                                ->get();
                            break;
                        case 'in-text':
                            $sql['blog'] = Post::where('body_1_ru', 'LIKE', '%' . $query . '%')
                                ->orWhere('body_1_en', 'LIKE', '%' . $query . '%')
                                ->orWhere('body_2_ru', 'LIKE', '%' . $query . '%')
                                ->orWhere('body_2_en', 'LIKE', '%' . $query . '%')
                                ->with('category')
                                ->with('author')
                                ->get();
                            break;
                        default:
                            $sql['blog'] = Post::where('title_ru', 'LIKE', '%' . $query . '%')
                                ->orWhere('title_en', 'LIKE', '%' . $query . '%')
                                ->orWhere('body_1_ru', 'LIKE', '%' . $query . '%')
                                ->orWhere('body_1_en', 'LIKE', '%' . $query . '%')
                                ->orWhere('body_2_ru', 'LIKE', '%' . $query . '%')
                                ->orWhere('body_2_en', 'LIKE', '%' . $query . '%')
                                ->with('category')
                                ->with('author')
                                ->get();
                            break;
                    }
                    break;
                case 'services':
                    switch ($searchCondition) {
                        case 'in-header':
                            $sql['services'] = Service::where('title_ru', 'LIKE', '%' . $query . '%')
                                ->orWhere('title_en', 'LIKE', '%' . $query . '%')
                                ->with('category')
                                ->get();
                            break;
                        case 'in-text':
                            $idsArr = [];
                            $sql['services'] = new Collection();

                            $blocks = Block::where('title_ru', 'LIKE', '%' . $query . '%')
                            ->orWhere('title_en', 'LIKE', '%' . $query . '%')
                            ->orWhere('body_ru', 'LIKE', '%' . $query . '%')
                            ->orWhere('body_en', 'LIKE', '%' . $query . '%')
                            ->get(['id'])->toArray();

                            foreach ($blocks as $block){
                                $idsArr[] = $block['id'];
                            }

                            foreach ($idsArr as $id){
                                $items[$id] = Service::where('block_ids', 'LIKE', '%' . $id . '%')->get();
                            }

                            foreach (array_unique($items) as $value){
                                if($value->isNotEmpty()){
                                    array_push($sql['services'], $value);
                                }
                            }

                            break;
                        default:
                            $sql['services'] = Service::where('title_ru', 'LIKE', '%' . $query . '%')
                                ->orWhere('title_en', 'LIKE', '%' . $query . '%')
                                ->with('category')
                                ->get();
                            break;
                    }
                    break;
                default:
                    $sql['portfolio'] = Portfolio::where('title_ru', 'LIKE', '%' . $query . '%')
                        ->orWhere('title_en', 'LIKE', '%' . $query . '%')
                        ->with('category')
                        ->get();
                    $sql['posts'] = Post::where('title_ru', 'LIKE', '%' . $query . '%')
                        ->orWhere('title_en', 'LIKE', '%' . $query . '%')
                        ->orWhere('body_1_ru', 'LIKE', '%' . $query . '%')
                        ->orWhere('body_1_en', 'LIKE', '%' . $query . '%')
                        ->orWhere('body_2_ru', 'LIKE', '%' . $query . '%')
                        ->orWhere('body_2_en', 'LIKE', '%' . $query . '%')
                        ->with('category')
                        ->with('author')
                        ->get();
                    $sql['services'] = Service::where('title_ru', 'LIKE', '%' . $query . '%')
                        ->orWhere('title_en', 'LIKE', '%' . $query . '%')
                        ->with('category')
                        ->get();
                    break;
            }
        }

        $results = [];

        foreach ($sql as $item) {
            foreach ($item as $value) {
                $results[] = $value;
            }
        }
        $allResults = collect($results);
        $resultsForCurrentPage = $allResults->forPage($page, $perPage)->shuffle();
        $results = new LengthAwarePaginator($resultsForCurrentPage, count($allResults), $perPage, $page, ['path' => $request->url()]);

        return view('client.search', compact('results', 'query'));
    }
}