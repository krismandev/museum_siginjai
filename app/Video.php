<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';
    protected $guarded = [];

    public function getThumbnail()
    {
        $arr_video_id = explode("embed/",$this->link);

        $video_id = $arr_video_id[1];

        $img_link = "http://img.youtube.com/vi/".$video_id."/0.jpg";

        return $img_link;
    }
}
