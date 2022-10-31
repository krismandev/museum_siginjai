<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $guarded = [];

    public function getImage()
    {
        if ($this->gambar != null) {
            return asset("storage/event/".$this->gambar);
        }else{
            return asset("asset_dashboard/images/default_museum_item.jpg");
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
