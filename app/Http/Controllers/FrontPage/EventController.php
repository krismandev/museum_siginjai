<?php

namespace App\Http\Controllers\FrontPage;

use App\Event;
use App\Http\Controllers\Controller;
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
}
