<?php

namespace App\Http\Controllers\FrontPage;

use App\Berita;
use App\Event;
use App\Http\Controllers\Controller;
use App\Koleksi;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::inRandomOrder()->get();
        $koleksis = Koleksi::inRandomOrder()->paginate(4);
        $events = Event::orderBy("created_at", "DESC")->paginate(4);
        $beritas = Berita::orderBy("created_at", "DESC")->paginate(3);
        return view("frontpage.index",compact(['sliders','koleksis','events','beritas']));
    }

}
