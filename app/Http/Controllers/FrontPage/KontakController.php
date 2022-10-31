<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use App\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view("frontpage.kontak");
    }

    public function store(Request $request)
    {
        $request->validate([
            "nama"=>"required",
            "email"=>"required",
            "subject"=>"required",
            "pesan"=>"required",
        ]);

        Kontak::create([
            "nama"=>$request->nama,
            "email"=>$request->email,
            "subject"=>$request->subject,
            "pesan"=>$request->pesan,
        ]);

        return back()->with('success','Berhasil mengirim saran');
        
    }
}
