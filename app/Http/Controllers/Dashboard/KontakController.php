<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $title = "Pesan & Saran";
        $kontaks = Kontak::orderBy("created_at")->get();
        return view('dashboard.kontak.index',compact(['title','kontaks']));
    }

    public function detail($id)
    {
        $id_kontak = decrypt($id);
        $title = "Detail";
        $kontak = Kontak::where('id',$id_kontak)->first();
        return view('dashboard.kontak.detail',compact(['kontak','title']));
    }
}
