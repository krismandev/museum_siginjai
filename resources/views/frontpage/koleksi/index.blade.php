@extends('layouts.frontpage.master')
@section('title','Koleksi')

@section('content')
    <style>
        @media screen and (min-width: 480px) {
            .search-card{
                width: 70% !important;
            }
        }
    </style>
    <!-- Page Title -->
    <section class="page-title p_relative centred">
        <div class="bg-layer p_absolute l_0 parallax_none parallax-bg" data-parallax='{"y": 100}' style="background-image: url({{asset('asset_frontpage/images/menu_koleksi.png')}})"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1 class="d_block fs_60 lh_70 fw_bold mb_10">
                    @if (isset($pass_data["jenis"]))
                        Koleksi {{$pass_data["jenis"]->nama_jenis}}
                    @else
                    Semua Koleksi Bersejarah
                    @endif
                </h1>
                <span class="fw_bold" style="color: white;">Menampilkan semua koleksi benda - benda bersejarah di Museum Siginjei Jambi</span>
            </div>
            {{-- <div class="inner-container p_absolute p_relative p_relative pt_65" style="background-color: white; margin-top: 100px !important; z-index:99999;">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content p_relative d_block mr_20">
                            <h1>OKEE</h1>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="blog-sidebar p_relative d_block ml_20">
                            <h1>SIAP</h1>
                            
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <div class="p_absolute centred" style="width: 100%; z-index:99999; margin-top: -50px;">
        <div class="search_card custom_box_shadow" style="background-color: white; width: 40%; height: auto; margin: 0 auto; border-radius: 10px;">
            <div class="sidebar-widget search-widget p_relative d_block pt_35 pr_20 pb_30 pl_20 b_radius_10">
                <div class="search-inner">
                    <form action="{{route('koleksi')}}" method="get" class="search-form">
                        <div class="form-group p_relative m_0">
                            <button type="submit"><i class="icon-156"></i></button>
                            @if (isset($pass_data["jenis"]))
                                <input type="hidden" name="no_jenis" value="{{$pass_data["jenis"]->no_jenis}}">
                            @endif
                            <input type="search" name="search" placeholder="Cari Koleksi" required value="{{request()->query('search') ?? ''}}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <section class="sidebar-page-container blog-details-3 p_relative pb_150">
        <div class="bg-image p_absolute l_0 t_0" style="background-color: #4b76ed;"></div>
        <div class="auto-container" style="max-width:1200px;">
            <div class="inner-container p_relative p_relative pt_65" style="margin-top: 200px !important;">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content p_relative d_block mr_20">
                            <h1>OKEE</h1>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="blog-sidebar p_relative d_block ml_20">
                            <h1>SIAP</h1>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End Page Title -->
        {{-- <section class="row">
            <div class="col-lg-6" style="margin-left: auto; margin-right: auto; padding: 10px;">
                <div class="card">
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control">Search...
                        </div>
                    </form>
                </div>
            </div>
        </section> --}}
    
    <section class="sidebar-page-container blog-standard-2 blog-list p_relative sec-pad">
        <div class="auto-container" style="margin:0 20px !important;">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar p_relative d_block ml_20 custom_border b_radius_10">
                        {{-- <div class="sidebar-widget search-widget p_relative d_block pt_35 pr_20 pb_30 pl_20 b_radius_10">
                            <div class="widget-title p_relative d_block mb_35">
                                <h3 class="d_block fs_24 lh_30">Cari Koleksi</h3>
                            </div>
                            <div class="search-inner">
                                <form action="blog.html" method="post" class="search-form">
                                    <div class="form-group p_relative m_0">
                                        <input type="search" name="search-field" placeholder="Search" required>
                                        <button type="submit"><i class="icon-156"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div> --}}
                        <div class="sidebar-widget category-widget p_relative d_block pt_35 pr_20 pb_25 pl_20 b_radius_10">
                            {{-- <div class="widget-title p_relative d_block mb_25">
                                <h3 class="d_block fs_24 lh_30">Categories</h3>
                            </div> --}}
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    <li class="p_relative d_block mb_11"><a href="{{route('koleksi')}}" class="color_black p_relative d_iblock fs_16 font_family_poppins">Semua Koleksi</a></li>
                                    @foreach ($jenises as $jenis)
                                        <li class="p_relative d_block mb_11"><a href="{{route('koleksi',['no_jenis'=>$jenis->no_jenis])}}" class="color_black p_relative d_iblock fs_16 font_family_poppins {{request()->query('no_jenis') == $jenis->no_jenis ? 'current' : ''}}">{{$jenis->nama_jenis}} ({{$jenis->jumlahKoleksi()}})</a></li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-sm-12 content-side">
                    <div class="auto-container">
                        @if (request()->query('search'))
                        <div class="pb_10">
                            <b class="custom-main-color">Hasil pencarian "{{request()->query('search')}}"</b>
                        </div>
                        @endif
                        <div class="row clearfix">
                            @foreach ($koleksis as $koleksi)
                            <div class="col-lg-4 col-md-6 col-sm-12 news-block mb_10">
                                <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                                    <div class="inner-box p_relative d_block b_radius_10 custom_border">
                                        {{-- <div class="pattern-layer" style="background-image: url({{asset('asset_frontpage/images/shape/shape-60.png')}});"></div> --}}
                                        <div class="lower-content d_block pt_10 pr_20 pb_20 pl_20">
                                            <div class="col-lg-12" style="padding: 0 0;">
                                                {{-- <div style="max-height: 300px;"> --}}
                                                    <img src="{{asset('storage/koleksi/'.$koleksi->gambar)}}" alt="" style="object-fit: cover; object-position: center; height: 300px; width: 100%; border-radius: 10px;">
                                                {{-- </div> --}}
                                            </div>
                                            <h4 class="d_block fs_20 lh_30 mb_15 mt_10"><a href="{{route("koleksi.detail",encrypt($koleksi->no_jenis."|".$koleksi->no_koleksi))}}">{{$koleksi->nama_koleksi}}</a></h4>
                                            <p class="d_block mb_20">{{Str::limit(strip_tags(preg_replace('/<[^>]*>/','',str_replace(array("&nbsp;","\n","\r"),"",html_entity_decode($koleksi->deskripsi,ENT_QUOTES,'UTF-8')))),70)}}</p>
                                            <div class="btn-box">
                                                <a style="border: none; padding-left: 0px;" href="{{route("koleksi.detail",encrypt($koleksi->no_jenis."|".$koleksi->no_koleksi))}}" class="theme-btn theme-btn-two"><span data-text="Lihat Koleksi">Lihat Koleksi</span></a>
                                            </div>
                                            {{-- <b>
                                                <a style="color: #1a2345;" href="{{route("koleksi.detail",encrypt($koleksi->no_jenis."|".$koleksi->no_koleksi))}}">Lihat Koleksi</a>
                                            </b> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection