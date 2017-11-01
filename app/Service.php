<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';


    public function category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function getWhiteBlocks()
    {
        $blocks = Block::whereIn('id', json_decode($this->block_ids, true))->where('color', 'WHITE')->get()->sortBy('order');

        return $blocks;
    }

    public function getBlackBlocks()
    {
        $blocks = Block::whereIn('id', json_decode($this->block_ids, true))->where('color', 'BLACK')->get()->sortBy('order');

        return $blocks;
    }
}
