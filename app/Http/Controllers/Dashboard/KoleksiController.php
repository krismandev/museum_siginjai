<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Jenis;
use App\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KoleksiController extends Controller
{
    public function customValidate($request)
    {
        $fields = [
            "no_jenis" =>"required",
            "no_koleksi" =>"required",
            "nama_koleksi" =>"required",
            "gambar" =>"required|file|mimes:png,jpg,jpeg",
        ];
        if ($request->has("id")) {
            unset($fields["gambar"]);
        }
        $request->validate($fields);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $qry_koleksi = Koleksi::orderBy("no_jenis","asc")->orderBy("nama_koleksi","asc");
            if (isset($request->no_jenis) && $request->no_jenis != null) {
                $qry_koleksi = $qry_koleksi->where("no_jenis",$request->no_jenis);
            }
            $koleksis = $qry_koleksi->get();
            return view("dashboard.koleksi.partials.table-content-koleksi",compact(['koleksis']))->render();
        }

        $title = "Data Koleksi";
        $koleksis = Koleksi::orderBy("no_jenis","asc")->orderBy("nama_koleksi","asc")->get();
        $jenises = Jenis::orderBy("no_jenis","asc")->get();
        return view('dashboard.koleksi.index',compact(['title','koleksis','jenises']));
    }

    public function create()
    {
        // dd("ok");
        $title = "Tambah Koleksi Baru";
        $jenises = Jenis::orderBy("no_jenis")->get();
        return view('dashboard.koleksi.create',compact(['title','jenises']));
    }

    public function store(Request $request)
    {
        $this->customValidate($request);
        try {
            $ukuran = [];
            $arr_key_ukuran = $request->key_ukuran;
            $arr_value_ukuran = $request->value_ukuran;
            foreach ($arr_key_ukuran as $key => $value) {
                if ($value != null) {
                    $key_ukuran = $value;
                    $value_ukuran = $arr_value_ukuran[$key];
                    $ukuran[$key_ukuran] = $value_ukuran;
                }
            }
            if (!empty($ukuran)) {
                $ukuran = json_encode($ukuran);
            }else{
                $ukuran = "";
            }

            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $nama_gambar = time().".".$gambar->getClientOriginalExtension();
                // $tujuan_upload = 'spesies';
                // $gambar->move($tujuan_upload,$nama_gambar);
                $upload = Storage::putFileAs('public/koleksi',$request->file('gambar'),$nama_gambar);
            }else{
                $nama_gambar = null;
            }
            $data = Koleksi::create([
                "no_jenis" => $request->no_jenis,
                "no_koleksi" => $request->no_koleksi,
                "nama_koleksi" => $request->nama_koleksi,
                "no_registrasi" => $request->no_registrasi,
                "gambar" => $nama_gambar,
                "asal_perolehan" => $request->asal_perolehan,
                "tanggal_perolehan" => $request->tanggal_perolehan ? date("Y-m-d",strtotime($request->tanggal_perolehan)) : null,
                "tempat_pembuatan" => $request->tempat_pembuatan,
                "tempat_penyimpanan" => $request->tempat_penyimpanan,
                "ukuran" => $ukuran,
                "deskripsi" => $request->deskripsi,
                "kurator" => $request->kurator,
                "tanggal" => $request->tanggal ? date("Y-m-d",strtotime($request->tanggal)) : null,
                "user_id" => auth()->user()->id
            ]);

        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return back()->with('error',"nomor koleksi pada jenis tersebut telah digunakan");
            }else{
                return back()->with('error',$e->getMessage());
            }
        } 
        catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }

        return redirect()->route('admin.koleksi.index')->with('success','Berhasil menambah data');
    }

    public function edit($id)
    {
        //berisi no_jenis dan no_koleksi
        $identifier = decrypt($id);
        $arr_identifier = explode("|",$identifier);
        $no_jenis = $arr_identifier[0];
        $no_koleksi = $arr_identifier[1];

        $koleksi = Koleksi::where("no_jenis",$no_jenis)->where("no_koleksi",$no_koleksi)->first();
        $title = "Edit Koleksi ".$koleksi->nama_koleksi;
        $jenises = Jenis::orderBy("no_jenis")->get();
        return view('dashboard.koleksi.create',compact(['title','jenises','koleksi']));
    }

    public function update(Request $request)
    {
        $identifier = decrypt($request->id);
        try {
            $arr_identifier = explode("|",$identifier);
            $no_jenis = $arr_identifier[0];
            $no_koleksi = $arr_identifier[1];
    
            $koleksi = Koleksi::where("no_jenis",$no_jenis)->where("no_koleksi",$no_koleksi)->first();

            $arr_key_ukuran = $request->key_ukuran;
            $arr_value_ukuran = $request->value_ukuran;
            foreach ($arr_key_ukuran as $key => $value) {
                if ($value != null) {
                    $key_ukuran = $value;
                    $value_ukuran = $arr_value_ukuran[$key];
                    $ukuran[$key_ukuran] = $value_ukuran;
                }
            }
            if (!empty($ukuran)) {
                $ukuran = json_encode($ukuran);
            }else{
                $ukuran = "";
            }

            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $nama_gambar = time().".".$gambar->getClientOriginalExtension();
                // $tujuan_upload = 'spesies';
                // $gambar->move($tujuan_upload,$nama_gambar);
                $upload = Storage::putFileAs('public/koleksi',$request->file('gambar'),$nama_gambar);
            }else{
                $nama_gambar = $koleksi->gambar;
            }

            $koleksi->update([
                "no_jenis" => $request->no_jenis,
                "no_koleksi" => $request->no_koleksi,
                "nama_koleksi" => $request->nama_koleksi,
                "no_registrasi" => $request->no_registrasi,
                "gambar" => $nama_gambar,
                "asal_perolehan" => $request->asal_perolehan,
                "tanggal_perolehan" => $request->tanggal_perolehan ? date("Y-m-d",strtotime($request->tanggal_perolehan)) : null,
                "tempat_pembuatan" => $request->tempat_pembuatan,
                "tempat_penyimpanan" => $request->tempat_penyimpanan,
                "ukuran" => $ukuran,
                "deskripsi" => $request->deskripsi,
                "kurator" => $request->kurator,
                "tanggal" => $request->tanggal ? date("Y-m-d",strtotime($request->tanggal)) : null,
                "user_id" => auth()->user()->id
            ]);

        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return back()->with('error',"nomor koleksi pada jenis tersebut telah digunakan");
            }else{
                return back()->with('error',$e->getMessage());
            }
        } 
        catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }

        return redirect()->route('admin.koleksi.index')->with('success','Berhasil mengupdate data');
    }

    public function delete($id)
    {
        $identifier = decrypt($id);
        $arr_identifier = explode("|",$identifier);
        $no_jenis = $arr_identifier[0];
        $no_koleksi = $arr_identifier[1];

        $koleksi = Koleksi::where("no_jenis",$no_jenis)->where("no_koleksi",$no_koleksi)->first();
        $file = "public/koleksi/".$koleksi->gambar;
        Storage::delete($file);
        $koleksi->delete();

        return redirect()->back()->with('success','Berhasil menghapus data');

    }

    public function exportToWordTable(Request $request)
    {
        $koleksis = Koleksi::orderBy("no_jenis","asc")->orderBy("nama_koleksi","asc");
        $new_koleksis = [];
        if (isset($request->no_jenis)) {
            $koleksis = $koleksis->where("no_jenis",$request->no_jenis);
        }
        $koleksis = $koleksis->get();
        foreach ($koleksis as $koleksi) {
            $temp_koleksi = $koleksi;
            if ($koleksi->ukuran != null) {
                $arr_ukuran = json_decode($koleksi->ukuran,true);
                $ukuran = "";
                foreach ($arr_ukuran as $key => $value) {
                    $ukuran .= $key . " " . $value . " \n";
                }
                // $ukuran = implode(", ",$arr_ukuran);
                $temp_koleksi->ukuran = $ukuran;
            }
            array_push($new_koleksis,$temp_koleksi);
        }

        $koleksis = $new_koleksis;
        $headers = array(
            "Content-type"        => "text/html",
            "Content-Disposition" => "attachment;Filename=report.doc"
        );

        $content =  view('dashboard.koleksi.partials.export-table-word', [
            'koleksis' => $koleksis,
        ])->render();

        return \Response::make($content,200, $headers);
    }

    public function exportToWordDocument(Request $request)
    {
        // dd(storage_path("app/public/word_template/template_document_word.docx"));
        $qry_koleksis = Koleksi::orderBy("no_jenis","asc")->orderBy("no_koleksi","asc");

        if ($request->has("no_jenis")) {
            $qry_koleksis = $qry_koleksis->where("no_jenis",$request->no_jenis);
            $jenis = Jenis::where("no_jenis",$request->no_jenis)->first();
        }

        $koleksis = $qry_koleksis->get();

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("template_document_word.docx");
        $templateProcessor->cloneBlock('CLONEBLOCK', $koleksis->count());

        foreach ($koleksis as $koleksi) {
            $ukuran = "";
            if ($koleksi->ukuran != null) {
                $arr_ukuran = json_decode($koleksi->ukuran,true);   
                foreach ($arr_ukuran as $key => $value) {
                    $ukuran .= $key . '=' . $value . " space ";
                }
            }
            

            $new_ukuran = str_replace('space', '</w:t><w:br/><w:t>', $ukuran);
            // dd($new_ukuran);
            $templateProcessor->setvalue("no_inventaris",$koleksi->no_jenis.".".$koleksi->no_koleksi,1);
            $templateProcessor->setvalue("nama_koleksi",$koleksi->nama_koleksi,1);
            $templateProcessor->setvalue("no_registrasi",$koleksi->no_registrasi,1);
            $templateProcessor->setvalue("asal_perolehan",$koleksi->asal_perolehan,1);
            $templateProcessor->setvalue("tanggal_perolehan",$koleksi->tanggal_perolehan,1);
            $templateProcessor->setvalue("tempat_pembuatan",$koleksi->tempat_pembuatan,1);
            $templateProcessor->setvalue("tempat_penyimpanan",$koleksi->tempat_penyimpanan,1);
            $templateProcessor->setvalue("deskripsi",strip_tags(preg_replace('/<[^>]*>/','',str_replace(array("&nbsp;","\n","\r"),"",html_entity_decode($koleksi->deskripsi,ENT_QUOTES,'UTF-8')))));
            $templateProcessor->setvalue("kurator",$koleksi->kurator,1);
            $templateProcessor->setvalue("ukuran",$new_ukuran,1);

            $templateProcessor->setImageValue('gambar',  array('path' => storage_path('app/public/koleksi/'. $koleksi->gambar),'wrappingStyle' => \PhpOffice\PhpWord\Style\Image::WRAPPING_STYLE_BEHIND, 'width' => 200, 'height' => 200, 'ratio' => false),1);
        }

        $file_name = "inventaris";

        if ($request->has("no_jenis")) {
            $file_name .= "-".$jenis->nama_jenis.".docx";
        }else{
            $file_name .= ".docx";
        }

        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=".$file_name);
        // $templateProcessor->saveAs($file_name.".docx");
        $templateProcessor->saveAs('php://output');

        // return back();
        
    }

    public function koleksiPerjenis($no_jenis)
    {
        // if ($request->ajax()) {
        //     $qry_koleksi = Koleksi::orderBy("no_jenis","asc")->orderBy("nama_koleksi","asc");
        //     if (isset($request->no_jenis) && $request->no_jenis != null) {
        //         $qry_koleksi = $qry_koleksi->where("no_jenis",$request->no_jenis);
        //     }
        //     $koleksis = $qry_koleksi->get();
        //     return view("dashboard.koleksi.partials.table-content-koleksi",compact(['koleksis']))->render();
        // }

        $jenis = Jenis::where("no_jenis",$no_jenis)->first();
        // dd($jenis);
        $title = "Data Koleksi ".$jenis->nama_jenis;
        $koleksis = Koleksi::orderBy("no_jenis","asc")->orderBy("nama_koleksi","asc")->where("no_jenis",$no_jenis)->get();
        $jenises = Jenis::orderBy("no_jenis","asc")->get();
        return view('dashboard.koleksi.index-perjenis',compact(['title','koleksis','jenises','jenis']));
    }

}
