<?php

namespace App\Http\Controllers\Dashboard;

use App\Berita;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function customValidate($request)
    {
        $fields = [
            "judul" =>"required",
            "gambar" =>"required",
            "konten" =>"required",
        ];
        if ($request->has("berita_id")) {
            unset($fields["gambar"]);
        }
        $request->validate($fields);
    }

    public function index()
    {
        $title = "Berita";
        $beritas = Berita::orderBy("judul")->get();
        return view('dashboard.berita.index',compact(['title','beritas']));
    }

    public function create()
    {
        // dd("ok");
        $title = "Tambah Berita Baru";
        // $classes = ClassModel::orderBy("nama_latin")->get();
        return view('dashboard.berita.create',compact(['title']));
    }

    public function store(Request $request)
    {
        $this->customValidate($request);
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time().".".$gambar->getClientOriginalExtension();
            // $tujuan_upload = 'spesies';
            // $gambar->move($tujuan_upload,$nama_gambar);
            $upload = Storage::putFileAs('public/berita',$request->file('gambar'),$nama_gambar);
        }
        try {
            $data = Berita::create([
                "judul" => $request->judul,
                "konten" => $request->konten,
                "gambar"=>$nama_gambar,
                "user_id"=>auth()->user()->id
            ]);

        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }

        return redirect()->route('admin.berita.index')->with('success','Berhasil menambah data');
    }

    public function edit($id)
    {
        $id_berita = decrypt($id);
        $title = "Edit Berita";
        $berita = Berita::where('id',$id_berita)->first();
        // $classes = ClassModel::orderBy("nama_latin")->get();
        return view('dashboard.berita.create',compact(['berita','title']));
    }

    public function update(Request $request)
    {
        $this->customValidate($request);
        $id_berita = decrypt($request->berita_id);
        $berita = Berita::where('id',$id_berita)->first();
        // dd($berita);
        // dd($request->all());
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time().".".$gambar->getClientOriginalExtension();
            // $tujuan_upload = 'spesies';
            // $gambar->move($tujuan_upload,$nama_gambar);
            $upload = Storage::putFileAs('public/berita',$request->file('gambar'),$nama_gambar);
        }else{
            $nama_gambar = $berita->gambar;
        }
        try {
            $berita->update([
                "judul" => $request->judul,
                "konten" => $request->konten,
                "gambar"=> $nama_gambar
            ]);
        } catch (\Exception $e){
            return back()->with('error',$e->getMessage());
        }

        return redirect()->route('admin.berita.index')->with('success','Berhasil mengubah data');

    }

    public function delete($id)
    {
        try {
            $id = decrypt($id);
            $berita = Berita::find($id);
            $berita->delete();
        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }
        
        return redirect()->route('admin.berita.index')->with('success','Berhasil menghapus data');
    }
}
