<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function customValidate($request)
    {
        $fields = [
            "judul" =>"required",
            "gambar" =>"required",
            "deskripsi" =>"required",
        ];
        if ($request->has("slider_id")) {
            unset($fields["gambar"]);
        }
        $request->validate($fields);
    }

    public function index()
    {
        $title = "Slider";
        $sliders = Slider::orderBy("judul")->get();
        return view('dashboard.slider.index',compact(['title','sliders']));
    }

    public function create()
    {
        // dd("ok");
        $title = "Tambah Slider Baru";
        // $classes = ClassModel::orderBy("nama_latin")->get();
        return view('dashboard.slider.create',compact(['title']));
    }

    public function store(Request $request)
    {
        $this->customValidate($request);
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time().".".$gambar->getClientOriginalExtension();
            // $tujuan_upload = 'spesies';
            // $gambar->move($tujuan_upload,$nama_gambar);
            $upload = Storage::putFileAs('public/slider',$request->file('gambar'),$nama_gambar);
        }
        try {
            $data = Slider::create([
                "judul" => $request->judul,
                "deskripsi" => $request->deskripsi,
                "gambar"=>$nama_gambar,
            ]);

        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }

        return redirect()->route('admin.slider.index')->with('success','Berhasil menambah data');
    }

    public function edit($id)
    {
        $id_slider = decrypt($id);
        $title = "Edit Slider";
        $slider = Slider::where('id',$id_slider)->first();
        // $classes = ClassModel::orderBy("nama_latin")->get();
        return view('dashboard.slider.create',compact(['slider','title']));
    }

    public function update(Request $request)
    {
        $this->customValidate($request);
        $id_slider = decrypt($request->slider_id);
        $slider = Slider::where('id',$id_slider)->first();
        // dd($slider);
        // dd($request->all());
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time().".".$gambar->getClientOriginalExtension();
            // $tujuan_upload = 'spesies';
            // $gambar->move($tujuan_upload,$nama_gambar);
            $upload = Storage::putFileAs('public/slider',$request->file('gambar'),$nama_gambar);
        }else{
            $nama_gambar = $slider->gambar;
        }
        try {
            $slider->update([
                "judul" => $request->judul,
                "deskripsi" => $request->deskripsi,
                "gambar"=> $nama_gambar
            ]);
        } catch (\Exception $e){
            return back()->with('error',$e->getMessage());
        }

        return redirect()->route('admin.slider.index')->with('success','Berhasil mengubah data');

    }

    public function delete($id)
    {
        try {
            $id = decrypt($id);
            $slider = Slider::find($id);
            $slider->delete();
        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }
        
        return redirect()->route('admin.slider.index')->with('success','Berhasil menghapus data');
    }
}
