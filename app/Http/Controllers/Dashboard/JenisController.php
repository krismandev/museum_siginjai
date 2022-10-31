<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function customValidate($request)
    {
        $fields = [
            "no_jenis" =>"required|unique:jenis,no_jenis",
            // "no_jenis" =>"required",
            "nama_jenis" =>"required",
        ];
        if ($request->has("jenis_id")) {
            unset($fields["no_jenis"]);
        }
        $request->validate($fields);
    }

    public function index()
    {
        $title = "Data Jenis";
        $jenises = Jenis::orderBy("nama_jenis")->get();
        return view('dashboard.jenis.index',compact(['title','jenises']));
    }

    public function create()
    {
        // dd("ok");
        $title = "Tambah Jenis Baru";
        // $classes = ClassModel::orderBy("nama_latin")->get();
        return view('dashboard.jenis.create',compact(['title']));
    }

    public function store(Request $request)
    {
        $this->customValidate($request);
        try {
            $data = Jenis::create([
                "no_jenis" => $request->no_jenis,
                "nama_jenis" => $request->nama_jenis,
            ]);

        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }

        return redirect()->route('admin.jenis.index')->with('success','Berhasil menambah data');
    }

    public function edit($id)
    {
        $no_jenis = decrypt($id);
        $title = "Edit Jenis";
        $jenis = Jenis::where('no_jenis',$no_jenis)->first();
        // $classes = ClassModel::orderBy("nama_latin")->get();
        return view('dashboard.jenis.create',compact(['jenis','title']));
    }

    public function update(Request $request)
    {
        $this->customValidate($request);
        $no_jenis = decrypt($request->jenis_id);
        $jenis = Jenis::where('no_jenis',$no_jenis)->first();
        // dd($jenis);
        // dd($request->all());
        try {
            $jenis->update([
                "nama_jenis" => $request->nama_jenis,
            ]);
        } catch (\Exception $e){
            return back()->with('error',$e->getMessage());
        }

        return redirect()->route('admin.jenis.index')->with('success','Berhasil mengubah data');

    }

    public function delete($id)
    {
        try {
            $id = decrypt($id);
            $jenis = Jenis::find($id);
            $jenis->delete();
        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }
        
        return redirect()->route('admin.jenis.index')->with('success','Berhasil menghapus data');
    }
}
