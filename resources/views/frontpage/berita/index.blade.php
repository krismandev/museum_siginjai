@extends('layouts.frontpage.master')
@section('linkheader')
<link href="{{asset('asset_frontpage/css/blog.css')}}" rel="stylesheet">
@endsection
@section('title','Berita')

@section('content')
    <style>
        @media screen and (max-width: 600px) {
            .search-card{
                width: 70% !important;
            }
            .right-popular-news{
                margin-top: 20px;
            }
        }
    </style>
    <section class="page-title p_relative centred">
        <div class="bg-layer p_absolute l_0 parallax_none parallax-bg" data-parallax='{"y": 100}' style="background-color: #4b76ed;"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1 class="d_block fs_60 lh_70 fw_bold mb_10">
                    
                    Berita
                    
                </h1>
                <span class="fw_bold" style="color: white;">Update berita terlengkap seputar Museum Siginjei Jambi</span>
            </div>
        </div>
    </section>
    <div class="p_absolute centred" style="width: 100%; z-index:99999; margin-top: -50px;">
        <div class="search_card" style="background-color: white; width: 40%; height: auto; margin: 0 auto; border-radius: 10px; box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.2);">
            <div class="sidebar-widget search-widget p_relative d_block pt_35 pr_20 pb_30 pl_20 b_radius_10">
                <div class="search-inner">
                    <form action="{{route('berita')}}" method="get" class="search-form">
                        <div class="form-group p_relative m_0">
                            <button type="submit"><i class="icon-156"></i></button>
                            <input type="search" name="search" placeholder="Cari Berita" required value="{{request()->query('search') ?? ''}}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <section class="sec-pad p_relative recent-news" style="margin-bottom: 50px; padding-top: 5px !important; margin-top: 100px;" id="section-berita">
        <div class="auto-container" style="max-width:1200px;">
            <h2>Berita Terbaru</h2>
            <div class="row" style="max-height: 500px;">
                <div class="col-lg-7 col-sm-12 p_relative" style="padding: 0;">
                    <a href="{{route('berita.detail',encrypt($latest_berita[0]->id))}}">
                        <div class="" style="width: 100%; height: 500px;" style="">
                            <img src="{{$latest_berita[0]->getImage()}}" style="height: 500px; width: 100%; border-radius: 10px; object-fit: cover; object-position: center;" alt="">
                        </div>
                        <div class="p_absolute" style="width: 100%; height: 150px; bottom: 8px; z-index: 99; background:rgba(0,0,0,0.4); border-radius: 10px;">
                            <div class="pl_20">
                                <span style="color: white;">{{date("d M Y",strtotime($latest_berita[0]->created_at))}}</span>
                                <h4 style="z-index: 999; color: white; opacity: 1 !important;">{{Str::limit($latest_berita[0]->judul,150)}}</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-5 col-sm-12 p_relative recent-news-right" style="padding: 0px;">
                    {{-- <div class="row"> --}}
                        <div class="col-lg-12 col-sm-6 p_relative" style="padding-bottom: 10px;">
                            <a href="{{route('berita.detail',encrypt($latest_berita[1]->id))}}">
                                <div class="" style="width: 100%; height: 250px;" style="">
                                    <img src="{{$latest_berita[1]->getImage()}}" style="height: 250px; width: inherit; border-radius: 10px; object-fit: cover; object-position: center;" alt="">
                                </div>
                                <div class="p_absolute" style="width: 94%; height: 100px; bottom: 8px; z-index: 99; background:rgba(0,0,0,0.4); border-radius: 10px;">
                                    <div class="pl_20">
                                        <span style="color: white;">{{date("d M Y",strtotime($latest_berita[1]->created_at))}}</span>
                                        <h5 style="z-index: 999; color: white; opacity: 1 !important;">{{Str::limit($latest_berita[1]->judul,100)}}</h5>
                                    </div>
                                </div>
                            </a>
    
                        </div>
                    {{-- </div> --}}
                    {{-- <div class="row"> --}}
                        <div class="col-lg-12 col-sm-6 p_relative">
                            <a href="{{route('berita.detail',encrypt($latest_berita[2]->id))}}">
                                <div class="" style="width: 100%; height: 250px;" style="">
                                    <img src="{{$latest_berita[2]->getImage()}}" style="height: 250px; width: inherit; border-radius: 10px; object-fit: cover; object-position: center;" alt="">
                                </div>
                                <div class="p_absolute" style="width: 94%; height: 100px; bottom: 8px; z-index: 99; background:rgba(0,0,0,0.4); border-radius: 10px;">
                                    <div class="pl_20">
                                        <span style="color: white;">{{date("d M Y",strtotime($latest_berita[2]->created_at))}}</span>
                                        <h5 style="z-index: 999; color: white; opacity: 1 !important;">{{Str::limit($latest_berita[2]->judul,100)}} </h5>
                                    </div>
                                </div>
                            </a>
    
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </section>

    <section class="sidebar-page-container blog-standard-2 blog-list p_relative sec-pad" style="padding-top: 0px !important;">
        <div class="auto-container" style="max-width: 1200px;">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 blog-grid-one p_relative content-side">
                    <div class="auto-container">
                        <div class="row clearfix">
                            @foreach ($beritas as $berita)
                            <div class="col-lg-12 col-md-6 col-sm-12 news-block">
                                <div class="news-block-one wow fadeInUp animated animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                                    <div class="inner-box p_relative d_block mb_70">
                                        <div class="image-box p_relative d_block">
                                            <figure class="p_relative d_block"><a href="{{route("berita.detail",encrypt($berita->id))}}"><img src="{{$berita->getImage()}}" alt="" style="width: 100%; object-fit: cover; object-position: center; max-height: 450px;"></a></figure>
                                            <div class="post-date-two p_absolute l_30 t_30 w_60 centred pt_10 pb_10 b_shadow_6"><h4 class="fs_20 font_family_oxygen fw_bold lh_20">{{date('d',strtotime($berita->created_at))}} <span class="d_block fs_14">{{date('M',strtotime($berita->created_at))}}</span></h4></div>
                                        </div>
                                        <div class="lower-content p_relative d_block pt_25">
                                            <h4 class="d_block fs_20 lh_30 mb_6"><a href="{{route("berita.detail",encrypt($berita->id))}}">{{$berita->judul}}</a></h4>
                                            <ul class="post-info clearfix p_relative d_block mb_16">
                                                {{-- <li class="p_relative d_iblock float_left mr_30 fs_16 font_family_poppins"><a href="blog-details.html">Business</a></li> --}}
                                                {{-- <li class="p_relative d_iblock float_left fs_16 font_family_poppins">3 Comments</li> --}}
                                            </ul>
                                            <p class="d_block mb_25 font_family_poppins">{!!Str::limit($berita->konten,250)!!}</p>
                                            <div class="btn-box" style="padding: 5px !important;">
                                                <a href="blog-details.html" class="theme-btn theme-btn-six">Selengkapnya...</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div>
                                {{$beritas->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar p_relative d_block ml_20 b_shadow_6 b_radius_10">
                        <div class="sidebar-widget post-widget p_relative d_block pt_35 pr_40 pb_10 pl_40 b_radius_10">
                            <div class="widget-title p_relative d_block mb_30">
                                <h3 class="d_block fs_24 lh_30">Berita Lainnya</h3>
                            </div>
                            <div class="post-inner">
                                @foreach ($berita_lainnya as $berita)
                                    <div class="post p_relative d_block pl_100 pb_20 mb_16">
                                        <figure class="post-thumb p_absolute l_0 t_4 w_80 h_80 b_radius_5"><a href="blog-details.html"><img src="{{$berita->getImage()}}" alt="" style="height: 100%; object-fit: cover; object-position: center;"></a></figure>
                                        <h5 class="d_block fs_18 lh_24 mb_7"><a href="blog-details.html" class="d_iblock color_black">{{Str::limit($berita->judul,50)}}</a></h5>
                                        <span class="post-date p_relative d_block fs_16 font_family_poppins">{{date('d M Y',strtotime($berita->created_at))}}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="sidebar-page-container blog-standard-2 blog-list p_relative sec-pad">
        <div class="auto-container" style="max-width:1200px;">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-list-content p_relative d_block mr_20">
                        @foreach ($beritas as $berita)
                            <div class="news-block-one wow fadeInUp animated animated animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                                <div class="inner-box p_relative d_block b_shadow_6 mb_30">
                                    <div class="image-box p_relative d_block p_absolute l_0 t_0">
                                        <figure class="image p_relative d_block"><a href="blog-details.html"><img src="{{$berita->getImage()}}" alt="" style="width: 370px; height:370px; object-fit: cover; object-position: center;"></a></figure>
                                        <div class="post-date-two p_absolute l_30 t_30 w_60 centred pt_10 pb_10 b_shadow_6"><h4 class="fs_20 font_family_oxygen fw_bold lh_20">27 <span class="d_block fs_14">Oct</span></h4></div>
                                    </div>
                                    <div class="lower-content p_relative d_block pt_30 pr_55 pb_40 pl_40">
                                        <div class="category p_relative d_block mb_6"><a href="blog-details.html" class="d_iblock fs_16 font_family_poppins uppercase">Standard</a></div>
                                        <h4 class="d_block fs_24 lh_30 mb_5"><a href="blog-details.html">{{Str::limit($berita->judul,50)}}</a></h4>
                                        <ul class="post-info clearfix p_relative d_block mb_13">
                                            <li class="p_relative d_iblock float_left mr_30 fs_16 font_family_poppins"><a href="blog-details.html">Business</a></li>
                                            <li class="p_relative d_iblock float_left fs_16 font_family_poppins">3 Comments</li>
                                        </ul>
                                        <p class="d_block mb_25">{!!Str::limit($berita->konten,100)!!}</p>
                                        <div class="btn-box">
                                            <a href="blog-details.html" class="theme-btn theme-btn-six">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="pagination-wrapper p_relative d_block pt_40">
                            <ul class="pagination clearfix">
                                <li><a href="blog.html" class="current">1</a></li>
                                <li><a href="blog.html">2</a></li>
                                <li><a href="blog.html">3</a></li>
                                <li class="dot">...</li>
                                <li><a href="blog.html">9</a></li>
                                <li><a href="blog.html"><i class="icon-4"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar p_relative d_block ml_20 b_shadow_6 b_radius_10">
                        <div class="sidebar-widget search-widget p_relative d_block pt_35 pr_40 pb_30 pl_40 b_radius_10">
                            <div class="widget-title p_relative d_block mb_35">
                                <h3 class="d_block fs_24 lh_30">Search</h3>
                            </div>
                            <div class="search-inner">
                                <form action="blog.html" method="post" class="search-form">
                                    <div class="form-group p_relative m_0">
                                        <input type="search" name="search-field" placeholder="Search" required="">
                                        <button type="submit"><i class="icon-156"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget category-widget p_relative d_block pt_35 pr_40 pb_25 pl_40 b_radius_10">
                            <div class="widget-title p_relative d_block mb_25">
                                <h3 class="d_block fs_24 lh_30">Categories</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    <li class="p_relative d_block mb_11"><a href="blog-details.html" class="p_relative d_iblock fs_16 font_family_poppins color_black">Business (3)</a></li>
                                    <li class="p_relative d_block mb_11"><a href="blog-details.html" class="p_relative d_iblock fs_16 font_family_poppins color_black">Design (7)</a></li>
                                    <li class="p_relative d_block mb_11"><a href="blog-details.html" class="p_relative d_iblock fs_16 font_family_poppins color_black">Development (2)</a></li>
                                    <li class="p_relative d_block mb_11"><a href="blog-details.html" class="p_relative d_iblock fs_16 font_family_poppins color_black">Software (1)</a></li>
                                    <li class="p_relative d_block mb_11"><a href="blog-details.html" class="p_relative d_iblock fs_16 font_family_poppins color_black">Tecnology (3)</a></li>
                                    <li class="p_relative d_block"><a href="blog-details.html" class="p_relative d_iblock fs_16 font_family_poppins color_black">General (9)</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget post-widget p_relative d_block pt_35 pr_40 pb_10 pl_40 b_radius_10">
                            <div class="widget-title p_relative d_block mb_30">
                                <h3 class="d_block fs_24 lh_30">Recent Posts</h3>
                            </div>
                            <div class="post-inner">
                                <div class="post p_relative d_block pl_100 pb_20 mb_16">
                                    <figure class="post-thumb p_absolute l_0 t_4 w_80 h_80 b_radius_5"><a href="blog-details.html"><img src="assets/images/news/post-1.jpg" alt=""></a></figure>
                                    <h5 class="d_block fs_18 lh_24 mb_7"><a href="blog-details.html" class="d_iblock color_black">Baking can be done with a few things.</a></h5>
                                    <span class="post-date p_relative d_block fs_16 font_family_poppins">Oct 20, 2021</span>
                                </div>
                                <div class="post p_relative d_block pl_100 pb_20 mb_16">
                                    <figure class="post-thumb p_absolute l_0 t_4 w_80 h_80 b_radius_5"><a href="blog-details.html"><img src="assets/images/news/post-2.jpg" alt=""></a></figure>
                                    <h5 class="d_block fs_18 lh_24 mb_7"><a href="blog-details.html" class="d_iblock color_black">Great food is not just eating energy.</a></h5>
                                    <span class="post-date p_relative d_block fs_16 font_family_poppins">Oct 20, 2021</span>
                                </div>
                                <div class="post p_relative d_block pl_100 pb_20">
                                    <figure class="post-thumb p_absolute l_0 t_4 w_80 h_80 b_radius_5"><a href="blog-details.html"><img src="assets/images/news/post-3.jpg" alt=""></a></figure>
                                    <h5 class="d_block fs_18 lh_24 mb_7"><a href="blog-details.html" class="d_iblock color_black">The smell of good bread baking.</a></h5>
                                    <span class="post-date p_relative d_block fs_16 font_family_poppins">Oct 20, 2021</span>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget archives-widget p_relative d_block pt_35 pr_40 pb_20 pl_40 b_radius_10">
                            <div class="widget-title p_relative d_block mb_25">
                                <h3 class="d_block fs_24 lh_30">Archives</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="archives-list clearfix">
                                    <li class="p_relative d_block mb_11"><a href="blog-details.html" class="p_relative d_iblock fs_16 font_family_poppins color_black">2016 Nevember (3)</a></li>
                                    <li class="p_relative d_block mb_11"><a href="blog-details.html" class="p_relative d_iblock fs_16 font_family_poppins color_black">2017 December (7)</a></li>
                                    <li class="p_relative d_block mb_11"><a href="blog-details.html" class="p_relative d_iblock fs_16 font_family_poppins color_black">2018 January (2)</a></li>
                                    <li class="p_relative d_block mb_11"><a href="blog-details.html" class="p_relative d_iblock fs_16 font_family_poppins color_black">2019 February (1)</a></li>
                                    <li class="p_relative d_block mb_11"><a href="blog-details.html" class="p_relative d_iblock fs_16 font_family_poppins color_black">Tecnology (3)</a></li>
                                    <li class="p_relative d_block"><a href="blog-details.html" class="p_relative d_iblock fs_16 font_family_poppins color_black">2020 March (3)</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget tags-widget p_relative d_block pt_35 pr_40 pb_40 pl_40 b_radius_10">
                            <div class="widget-title p_relative d_block mb_35">
                                <h3 class="d_block fs_24 lh_30">Tags</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="tags-list clearfix">
                                    <li class="p_relative d_iblock pull-left mr_5 ml_5 mb_10"><a href="blog-details.html" class="d_iblock fs_14 font_family_poppins color_black b_radius_5">Creative</a></li>
                                    <li class="p_relative d_iblock pull-left mr_5 ml_5 mb_10"><a href="blog-details.html" class="d_iblock fs_14 font_family_poppins color_black b_radius_5">Marketing</a></li>
                                    <li class="p_relative d_iblock pull-left mr_5 ml_5 mb_10"><a href="blog-details.html" class="d_iblock fs_14 font_family_poppins color_black b_radius_5">Idea</a></li>
                                    <li class="p_relative d_iblock pull-left mr_5 ml_5 mb_10"><a href="blog-details.html" class="d_iblock fs_14 font_family_poppins color_black b_radius_5">Consulting</a></li>
                                    <li class="p_relative d_iblock pull-left mr_5 ml_5 mb_10"><a href="blog-details.html" class="d_iblock fs_14 font_family_poppins color_black b_radius_5">Target</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
@section('linkfooter')
<script src="{{asset('asset_frontpage/js/jquery.paroller.min.js')}}"></script>
@endsection