<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $table = 'service_categories';

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id', 'id');
    }

    public function portfolio()
    {
        return $this->hasMany(Portfolio::class);
    }
}
