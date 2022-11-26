<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;

class VideoController extends Controller
{
    public function customValidate($request)
    {
        $fields = [
            "judul" =>"required",
            "link" =>"required",
        ];
        $request->validate($fields);
    }

    public function index()
    {
        $title = "Video";
        $videos = Video::orderBy("judul")->get();
        return view('dashboard.video.index',compact(['title','videos']));
    }

    public function create()
    {
        // dd("ok");
        $title = "Tambah Video Baru";
        // $classes = ClassModel::orderBy("nama_latin")->get();
        return view('dashboard.video.create',compact(['title']));
    }

    public function store(Request $request)
    {
        $this->customValidate($request);

        try {
            $link_awal = $request->link;
            $sebelum = 'watch?v=';
            $sesudah = ['embed/'];
            $link_youtube = Str::replaceArray($sebelum,$sesudah,$link_awal);
            $data = Video::create([
                "judul" => $request->judul,
                "user_id"=>auth()->user()->id,
                "link"=>$link_youtube
            ]);

        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }

        return redirect()->route('admin.video.index')->with('success','Berhasil menambah data');
    }

    public function edit($id)
    {
        $id_video = decrypt($id);
        $title = "Edit Video";
        $video = Video::where('id',$id_video)->first();
        // $classes = ClassModel::orderBy("nama_latin")->get();
        return view('dashboard.video.create',compact(['video','title']));
    }

    public function update(Request $request)
    {
        $this->customValidate($request);
        $id_video = decrypt($request->video_id);
        $video = Video::where('id',$id_video)->first();
        // dd($video);
        // dd($request->all());
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time().".".$gambar->getClientOriginalExtension();
            // $tujuan_upload = 'spesies';
            // $gambar->move($tujuan_upload,$nama_gambar);
            $upload = Storage::putFileAs('public/video',$request->file('gambar'),$nama_gambar);
        }else{
            $nama_gambar = $video->gambar;
        }
        try {
            $video->update([
                "judul" => $request->judul,
                "deskripsi" => $request->deskripsi,
                "tanggal"=>date('Y-m-d',strtotime($request->tanggal)),
                "gambar"=> $nama_gambar,
                "user_id"=>auth()->user()->id
            ]);
        } catch (\Exception $e){
            return back()->with('error',$e->getMessage());
        }

        return redirect()->route('admin.video.index')->with('success','Berhasil mengubah data');

    }

    public function delete($id)
    {
        try {
            $id = decrypt($id);
            $video = Video::find($id);
            $video->delete();
        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }
        
        return redirect()->route('admin.video.index')->with('success','Berhasil menghapus data');
    }
}
