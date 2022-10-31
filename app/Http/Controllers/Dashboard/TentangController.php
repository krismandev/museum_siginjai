<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function profilIndex()
    {
        $profil = Tentang::first();
        $title = 'Profil';
        return view('dashboard.tentang.profil',compact(['profil','title']));
    }

    public function profilUpdate(Request $request)
    {
        $tentang = Tentang::first();
        $tentang->update([
            "profil"=>$request->profil
        ]);

        return back()->with('success','Berhasil mengupdate data');
    }

    public function sejarahIndex()
    {
        $sejarah = Tentang::first();
        $title = 'Sejarah';
        return view('dashboard.tentang.sejarah',compact(['sejarah','title']));
    }

    public function sejarahUpdate(Request $request)
    {
        $tentang = Tentang::first();
        $tentang->update([
            "sejarah"=>$request->sejarah
        ]);

        return back()->with('success','Berhasil mengupdate data');
    }

    public function visimisiIndex()
    {
        $visimisi = Tentang::first();
        $title = 'Visi & Misi';
        return view('dashboard.tentang.visimisi',compact(['visimisi','title']));
    }

    public function visimisiUpdate(Request $request)
    {
        $tentang = Tentang::first();
        $tentang->update([
            "visi_misi"=>$request->visi_misi
        ]);

        return back()->with('success','Berhasil mengupdate data');
    }

    public function strukturIndex()
    {
        $struktur = Tentang::first();
        $title = 'Struktur Organisasi';
        return view('dashboard.tentang.struktur',compact(['struktur','title']));
    }

    public function strukturUpdate(Request $request)
    {
        $tentang = Tentang::first();
        $tentang->update([
            "struktur_organisasi"=>$request->struktur_organisasi
        ]);

        return back()->with('success','Berhasil mengupdate data');
    }

    public function tugasIndex()
    {
        $tugas = Tentang::first();
        $title = 'Tugas dan Fungsi';
        return view('dashboard.tentang.tugas',compact(['tugas','title']));
    }

    public function tugasUpdate(Request $request)
    {
        $tentang = Tentang::first();
        $tentang->update([
            "tugas_dan_fungsi"=>$request->tugas_dan_fungsi
        ]);

        return back()->with('success','Berhasil mengupdate data');
    }
}
