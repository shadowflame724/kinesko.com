<?php
/**
 * Created by PhpStorm.
 * User: Back-End
 * Date: 25.10.2017
 * Time: 14:24
 */

namespace App\Http\Controllers;

use App\Block;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Exception\ErrorException;

class BlockController extends Controller
{
    public function store(Request $request)
    {
        $blocks = $request->blocks;
        $blockIds = [];

        try {
            foreach ($blocks as $blockArr) {
                if ($blockArr['id'] == '') {
                    $block = new Block();
                } else {
                    $block = Block::find($blockArr['id']);
                }
                $block->title_ru = isset($blockArr['title_ru']) ? $blockArr['title_ru'] : null;
                $block->title_en = isset($blockArr['title_en']) ? $blockArr['title_en'] : null;

                $block->body_ru = isset($blockArr['body_ru']) ? $blockArr['body_ru'] : null;
                $block->body_en = isset($blockArr['body_en']) ? $blockArr['body_en'] : null;

                $block->order = $blockArr['order'];
                $block->color = $blockArr['color'];
                $block->type = $blockArr['type'];

                $block->save();

                $blockIds[] = $block->id;
            }
        }catch (ErrorException $ex){
            return response($ex->getMessage(), $ex->getCode());
        }

        return response(json_encode($blockIds), 200);
    }

    public function destroy(Request $request)
    {
        $itemId = $request->itemId;
        $itemType = $request->itemType;

        $item = DB::table($itemType)->where('id', $itemId)->first();
        $blockIds = json_decode($item->block_ids);
        $blocks = Block::whereIn('id', $blockIds)->get();

        foreach ($blocks as $block) {
            if ($block != null) {
                $block->delete();
            }
        }

        return response('success', 200);
    }
}