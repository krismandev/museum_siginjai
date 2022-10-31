<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    protected $guarded = [];

    public function getImage()
    {
        if ($this->gambar != null) {
            return asset("storage/slider/".$this->gambar);
        }else{
            return asset("asset_dashboard/images/default_museum_item.jpg");
        }
    }
}
