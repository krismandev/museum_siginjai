<?php

namespace App\Http\Controllers\Dashboard;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function customValidate($request)
    {
        $fields = [
            "judul" =>"required",
            "gambar" =>"required",
            "deskripsi" =>"required",
        ];
        if ($request->has("event_id")) {
            unset($fields["gambar"]);
        }
        $request->validate($fields);
    }

    public function index()
    {
        $title = "Event";
        $events = Event::orderBy("judul")->get();
        return view('dashboard.event.index',compact(['title','events']));
    }

    public function create()
    {
        // dd("ok");
        $title = "Tambah Event Baru";
        // $classes = ClassModel::orderBy("nama_latin")->get();
        return view('dashboard.event.create',compact(['title']));
    }

    public function store(Request $request)
    {
        $this->customValidate($request);
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time().".".$gambar->getClientOriginalExtension();
            // $tujuan_upload = 'spesies';
            // $gambar->move($tujuan_upload,$nama_gambar);
            $upload = Storage::putFileAs('public/event',$request->file('gambar'),$nama_gambar);
        }
        try {
            $data = Event::create([
                "judul" => $request->judul,
                "deskripsi" => $request->deskripsi,
                "tanggal"=>$request->tanggal,
                "gambar"=>$nama_gambar,
                "user_id"=>auth()->user()->id
            ]);

        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }

        return redirect()->route('admin.event.index')->with('success','Berhasil menambah data');
    }

    public function edit($id)
    {
        $id_event = decrypt($id);
        $title = "Edit Event";
        $event = Event::where('id',$id_event)->first();
        // $classes = ClassModel::orderBy("nama_latin")->get();
        return view('dashboard.event.create',compact(['event','title']));
    }

    public function update(Request $request)
    {
        $this->customValidate($request);
        $id_event = decrypt($request->event_id);
        $event = Event::where('id',$id_event)->first();
        // dd($event);
        // dd($request->all());
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time().".".$gambar->getClientOriginalExtension();
            // $tujuan_upload = 'spesies';
            // $gambar->move($tujuan_upload,$nama_gambar);
            $upload = Storage::putFileAs('public/event',$request->file('gambar'),$nama_gambar);
        }else{
            $nama_gambar = $event->gambar;
        }
        try {
            $event->update([
                "judul" => $request->judul,
                "deskripsi" => $request->deskripsi,
                "tanggal"=>date('Y-m-d',strtotime($request->tanggal)),
                "gambar"=> $nama_gambar,
                "user_id"=>auth()->user()->id
            ]);
        } catch (\Exception $e){
            return back()->with('error',$e->getMessage());
        }

        return redirect()->route('admin.event.index')->with('success','Berhasil mengubah data');

    }

    public function delete($id)
    {
        try {
            $id = decrypt($id);
            $event = Event::find($id);
            $event->delete();
        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }
        
        return redirect()->route('admin.event.index')->with('success','Berhasil menghapus data');
    }
}
