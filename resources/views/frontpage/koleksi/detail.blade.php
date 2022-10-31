@extends('layouts.frontpage.master')
@section('title','Detail Koleksi')

@section('content')
<style>
    .line_bottom{
        border-bottom: dashed 1px;
    }
</style>
<section class="sidebar-page-container blog-standard-2 blog-details p_relative sec-pad" style="margin-bottom: 0px !important;">
    <div class="auto-container" style="max-width: 1200px; !important;">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 sidebar-side">
                    <img src="{{asset("storage/koleksi/".$koleksi->gambar)}}" alt="" style="object-fit: cover; object-position: center; height: 600px; width: 100%; border-radius: 10px;">
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 content-side">
                <div class="auto-container">
                    <h2>{{$koleksi->nama_koleksi}}</h2>
                    <p>{!!$koleksi->deskripsi!!}</p>

                    <div class="mt_20">
                        <div class="auto-container">
                            <div class="row mt_10 line_bottom">
                                <b>Nomor Registrasi : </b>&ensp; {{$koleksi->no_registrasi}}
                            </div>
                            <div class="row mt_10 line_bottom">
                                <b>Tanggal Perolehan : </b>&ensp; {{date("d M Y",strtotime($koleksi->tanggal_perolehan))}}
                            </div>
                            <div class="row mt_10 line_bottom">
                                <b>Tempat Pembuatan : </b>&ensp; {{$koleksi->tempat_pembuatan}}
                            </div>
                            <div class="row mt_10 line_bottom">
                                <b>Tempat Penyimpanan : </b>&ensp; {{$koleksi->tempat_penyimpanan}}
                            </div>
                            <div class="row mt_10 line_bottom">
                                <b>Ukuran : </b>&ensp; {{$koleksi->ukuran}}
                            </div>
                            <div class="row mt_10 line_bottom">
                                <b>Kurator : </b>&ensp; {{$koleksi->kurator}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="p_relative mb_50">
    <div class="auto-container" style="max-width: 1200px; !important;">
        <h3>Koleksi Lainnya</h3>
    </div>
    <div class="auto-container" style="max-width: 1200px; !important;">
        <div class="row">
            @foreach ($random_koleksi as $koleksi)
            <div class="col-lg-3 col-md-6 col-sm-12 news-block" style="margin: 0 0 !important;">
                <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                    <div class="inner-box p_relative d_block b_radius_10 b_shadow_6">
                        {{-- <div class="pattern-layer" style="background-image: url({{asset('asset_frontpage/images/shape/shape-60.png')}});"></div> --}}
                        <div class="lower-content d_block pt_10 pr_20 pb_20 pl_20">
                            <div class="col-lg-12" style="padding: 0 0;">
                                {{-- <div style="max-height: 300px;"> --}}
                                    <img src="{{asset('storage/koleksi/'.$koleksi->gambar)}}" alt="" style="object-fit: cover; object-position: center; height: 200px; width: 100%; border-radius: 10px;">
                                {{-- </div> --}}
                            </div>
                            <h4 class="d_block fs_20 lh_30 mb_15 mt_10"><a href="blog-details.html">{{$koleksi->nama_koleksi}}</a></h4>
                            <p class="d_block mb_20">{{Str::limit(strip_tags(preg_replace('/<[^>]*>/','',str_replace(array("&nbsp;","\n","\r"),"",html_entity_decode($koleksi->deskripsi,ENT_QUOTES,'UTF-8')))),120)}}</p>
                            <div class="btn-box">
                                <a href="{{route("koleksi.detail",encrypt($koleksi->no_jenis."|".$koleksi->no_koleksi))}}" class="theme-btn theme-btn-two"><span data-text="Lihat detail">Lihat detail</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    
</section>
@endsection