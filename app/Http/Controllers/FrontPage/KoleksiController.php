<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use App\Jenis;
use App\Koleksi;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    public function index(Request $request)
    {   
        $pass_data = [];
        $jenises = Jenis::orderBy("no_jenis","asc")->get();
        $koleksis = Koleksi::orderBy("created_at","desc");
        if ($request->has("no_jenis")) {
            $koleksis = $koleksis->where("no_jenis",$request->no_jenis);
            $jenis_selected = Jenis::where("no_jenis",$request->no_jenis)->first();
            $pass_data["jenis"] = $jenis_selected;
        }
        if ($request->has("search")) {
            $koleksis = $koleksis->where("nama_koleksi","LIKE","%".$request->search."%");
        }
        $koleksis = $koleksis->paginate(12);
        return view("frontpage.koleksi.index",compact(["jenises","koleksis","pass_data"]));
    }

    public function detail($id)
    {
        $identifier = decrypt($id);
        $arr_identifier = explode("|",$identifier);
        $no_jenis = $arr_identifier[0];
        $no_koleksi = $arr_identifier[1];

        $koleksi = Koleksi::where("no_jenis",$no_jenis)->where("no_koleksi",$no_koleksi)->first();
        $ukuran = "";
        if ($koleksi->ukuran != null) {
            $arr_ukuran = json_decode($koleksi->ukuran,true);   
            foreach ($arr_ukuran as $key => $value) {
                $ukuran .= $key . '=' . $value . " ";
            }
        }
        $koleksi->ukuran = $ukuran;
        $random_koleksi = Koleksi::inRandomOrder()->paginate(4);
        return view("frontpage.koleksi.detail",compact(["koleksi","random_koleksi"]));
    }
}
