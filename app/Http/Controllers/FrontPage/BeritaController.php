<?php

namespace App\Http\Controllers\FrontPage;

use App\Berita;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {   
        $pass_data = [];
        $beritas = Berita::orderBy("created_at","desc");
        if ($request->has("search")) {
            $beritas = $beritas->where("judul","LIKE","%".$request->search."%");
        }
        $beritas = $beritas->paginate(8);
        $berita_lainnya = Berita::inRandomOrder()->paginate(6);
        $latest_berita = Berita::orderBy('created_at','desc')->paginate(3);
        return view("frontpage.berita.index",compact(["beritas","pass_data","berita_lainnya","latest_berita"]));
    }

    public function detail($id)
    {
        $id = decrypt($id);
        $berita = Berita::find($id);
        $berita_lainnya = Berita::inRandomOrder()->paginate(5);
        return view("frontpage.berita.detail",compact(["berita","berita_lainnya"]));
    }
}
