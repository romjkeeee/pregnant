<?php

namespace App;

use App\Traits\StoreImageTrait;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use StoreImageTrait;

    protected $table = 'slider';
    protected $guarded = [];
    protected $image = ['image'];

    /**
     * @return \Illuminate\Contracts\Routing\UrlGenerator|\Illuminate\Foundation\Application|string
     */

    public function getImageAttribute()
    {
        return url($this->attributes['image']);
    }
}
