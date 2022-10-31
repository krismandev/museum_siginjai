<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImage()
    {
        if ($this->gambar != null) {
            return asset("storage/berita/".$this->gambar);
        }else{
            return asset("asset_dashboard/images/default_museum_item.jpg");
        }
    }
}
