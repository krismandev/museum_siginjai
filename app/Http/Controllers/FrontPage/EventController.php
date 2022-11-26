<?php

namespace App\Http\Controllers\FrontPage;

use App\Event;
use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {   
        $pass_data = [];
        $events = Event::orderBy("created_at","desc");
        if ($request->has("search")) {
            $events = $events->where("judul","LIKE","%".$request->search."%");
        }
        $events = $events->paginate(6);
        return view("frontpage.event.index",compact(["events","pass_data"]));
    }

    public function detail($id)
    {
        $id = decrypt($id);
        $event = Event::find($id);
        $event_lainnya = Event::inRandomOrder()->paginate(3);
        return view("frontpage.event.detail",compact(["event","event_lainnya"]));
    }

    public function videoDokumenterIndex(Request $request)
    {   
        $pass_data = [];
        $videos = Video::orderBy("created_at","desc");
        if ($request->has("search")) {
            $videos = $videos->where("judul","LIKE","%".$request->search."%");
        }
        $videos = $videos->paginate(6);
        return view("frontpage.video.index",compact(["videos","pass_data"]));
    }
}
