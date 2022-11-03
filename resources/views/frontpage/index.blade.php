@extends('layouts.frontpage.master')
@section('title')
    Museum Siginjei
@endsection
@section('slider')
<style>
    @media screen and (max-width: 600px) {
        .section-berita{
            size: 200px
        }
        .recent-news-right{
            display: none;
        }
        .recent-news{
            padding-left: 10px;
            padding-right: 10px;
        }
    }
</style>
<!-- banner-section -->
<section class="slider-three p_relative">
    <div class="pattern-layer p_absolute l_0 b_0 z_2" style="background-image: url(assets/images/shape/shape-33.png);"></div>
    <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
        @foreach ($sliders as $slider)
        <div class="slide-item p_relative">
            <div class="image-layer p_absolute" style="background-image:url({{$slider->getImage()}})"></div>
            {{-- <div class="auto-container">
                <div class="content-box p_relative d_block z_5" style="margin: 0 auto !important;">
                    <h2 class="p_relative fw_bold fs_80 lh_90 mb_15 font_family_oxygen"><span class="slider-text-anim">{{$slider->judul}}</span></h2>
                    <p class="d_block fs_18 mb_45 font_family_oxygen">{!!$slider->deskripsi!!}</p>
                    <div class="btn-box clearfix">
                        <a href="index-3.html" class="theme-btn theme-btn-four">Get Started <i class="icon-4"></i></a>
                    </div>
                </div> 
            </div> --}}
            <div class="content-box p_relative z_5" style="text-align: center">
                <h2 class="p_relative" style="margin-left: auto; margin-right: auto;"><span class="slider-text-anim">{{$slider->judul}}</span></h2></h2>
                <p class="d_block fs_18 mb_45">{!!$slider->deskripsi!!}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section class="sidebar-page-container">
    <div class="auto-container" style="max-width: 1200px; margin-bottom: 0px; margin-top: 50px;">
        <div class="row">
            <div class="col-lg-3">
                <div style="margin: 0;
                position: absolute;
                top: 50%;
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);">
                    <h3>Tentang Museum Siginjei Jambi</h3>
                </div>
            </div>
            <div class="col-lg-3" style="padding: 10px">
                <div style="border: 0.5px solid; border-radius: 10px; margin: 0px; padding: 20px; border-color: #c8c8c8; height: 200px;">
                    <span>01</span>
                    <h4>Diresmikan Th 2012</h4>  
                    <p class="mt_10">Museum Siginjei Jambi diresmikan pada 30 Oktober 2012</p>
                </div>
            </div>
            
            <div class="col-lg-3" style="padding: 10px">
                <div style="border: 0.5px solid; border-radius: 10px; margin: 0px; padding: 20px; border-color: #c8c8c8; height: 200px;">
                    <span>02</span>
                    <h4>Lokasi Strategis</h4>
                    <p class="mt_10">Museum Siginjei Jambi terletak di daerah perkotaan kota Jambi </p>
                </div>
            </div>
            <div class="col-lg-3" style="padding: 10px">
                <div style="border: 0.5px solid; border-radius: 10px; margin: 0px; padding: 20px; border-color: #c8c8c8; height: 200px;">
                    <span>03</span>
                    <h4>Ribuan Koleksi</h4>
                    <p class="mt_10">Museum Siginjei Jambi memiliki ribuan koleksi - koleksi bersejarah</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sidebar-page-container blog-standard-2 blog-list p_relative mt_50" style="margin-bottom: 0px;">
    <div class="auto-container" style="max-width: 1200px; margin-bottom: 0px;">
        <h2 class="mb_10">Koleksi Museum Siginjei Jambi</h2>
        <p class="text">Menyediakan banyak koleksi benda bersejarah di Museum Siginjei Jambi</p>
        <div class="row clearfix mt_10">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="auto-container">
                    <div class="row clearfix">
                        @foreach ($koleksis as $koleksi)
                        <div class="col-lg-3 col-md-6 col-sm-6 news-block mb_10">
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
<!-- banner-section end -->


<section class="sidebar-page-container mt_30 sec-pad">
    <div class="auto-container" style="max-width: 1200px;">
        <div class="row clearfix">
            <div class="col-lg-4 col-sm-4">
                <div style="margin: 0;
                position: absolute;
                top: 50%;
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);">
                    <h3>Akses Virtual Tour Museum Siginjei Jambi dimana saja</h3>
                    <p class="mt_10">Lihat lokasi dan koleksi - koleksi benda bersejarah Museum Siginjei Jambi dengan view 360&#176; dimana saja dan kapanpun</p>
                    <div class="btn-box mt_10">
                        <a href="index-13.html" class="theme-btn btn-five" style="background: #1a2345;"><span data-text="Get Started" style="color: white !important;">MULAI VIRTUAL TOUR</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-sm-8">
                <iframe src="https://virtual-tour.e-siginjeimuseum.online/" frameborder="0" width="100%" style="height: 500px; border-radius: 10px;"></iframe>
            </div>
        </div>
    </div>
</section>

<section class="blog-grid-one p_relative sec-pad">
    <div class="auto-container" style="max-width: 1200px;">
        <h2 class="mb_10">Acara di Museum Siginjei Jambi</h2>
        <div class="row clearfix">
            @foreach ($events as $event)
            <div class="col-lg-4 col-md-6 col-sm-12 news-block" style="border: 0.5px solid; border-radius: 10px; margin: 10px; padding: 20px; border-color: gray;">
                <div class="news-block-one wow fadeInUp animated animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                    <div class="inner-box p_relative d_block mb_20">
                        <div class="image-box p_relative d_block">
                            <figure class="image p_relative d_block"><a href="{{route('event.detail',encrypt($event->id))}}"><img src="{{$event->getImage()}}" alt=""></a></figure>
                            {{-- <div class="post-date-two p_absolute l_30 t_30 w_60 centred pt_10 pb_10 b_shadow_6"><h4 class="fs_20 font_family_oxygen fw_bold lh_20">27 <span class="d_block fs_14">Oct</span></h4></div> --}}
                        </div>
                        <div class="lower-content p_relative d_block pt_25">
                            <h4 class="d_block fs_20 lh_30 mb_6"><a href="{{route('event.detail',encrypt($event->id))}}">{{$event->judul}}</a></h4>
                            <ul class="post-info clearfix p_relative d_block mb_16">
                                <li class="p_relative d_iblock float_left mr_30 fs_16 font_family_poppins">{{date("d M Y",strtotime($event->tanggal))}}</li>
                                {{-- <li class="p_relative d_iblock float_left fs_16 font_family_poppins">3 Comments</li> --}}
                            </ul>
                            <p class="d_block mb_25 font_family_poppins" style="margin-top: 0px !important;">{!!Str::limit($event->deskripsi,200)!!}</p>
                            <div class="btn-box">
                                <a href="{{route('event.detail',encrypt($event->id))}}" class="theme-btn theme-btn-six">Lihat Acara</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="sec-pad p_relative recent-news" style="margin-bottom: 200px; padding-top: 5px !important;" id="section-berita">
    <div class="auto-container" style="max-width:1200px;">
        <h2>Berita</h2>
        <div class="row" style="max-height: 500px;">
            <div class="col-lg-7 col-sm-12 p_relative" style="padding: 0;">
                <a href="{{route('berita.detail',encrypt($beritas[0]->id))}}">
                    <div class="" style="width: 100%; height: 500px;" style="">
                        <img src="{{$beritas[0]->getImage()}}" style="height: 500px; width: 100%; border-radius: 10px; object-fit: cover; object-position: center;" alt="">
                    </div>
                    <div class="p_absolute" style="width: 100%; height: 150px; bottom: 8px; z-index: 99; background:rgba(0,0,0,0.4); border-radius: 10px;">
                        <div class="pl_20">
                            <span style="color: white;">{{date("d M Y",strtotime($beritas[0]->created_at))}}</span>
                            <h4 style="z-index: 999; color: white; opacity: 1 !important;">{{Str::limit($beritas[0]->judul,150)}}</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-5 col-sm-12 p_relative recent-news-right" style="padding: 0px;">
                {{-- <div class="row"> --}}
                    <div class="col-lg-12 col-sm-6 p_relative" style="padding-bottom: 10px;">
                        <a href="{{route('berita.detail',encrypt($beritas[1]->id))}}">
                            <div class="" style="width: 100%; height: 250px;" style="">
                                <img src="{{$beritas[1]->getImage()}}" style="height: 250px; width: inherit; border-radius: 10px; object-fit: cover; object-position: center;" alt="">
                            </div>
                            <div class="p_absolute" style="width: 94%; height: 100px; bottom: 8px; z-index: 99; background:rgba(0,0,0,0.4); border-radius: 10px;">
                                <div class="pl_20">
                                    <span style="color: white;">{{date("d M Y",strtotime($beritas[1]->created_at))}}</span>
                                    <h5 style="z-index: 999; color: white; opacity: 1 !important;">{{Str::limit($beritas[1]->judul,100)}}</h5>
                                </div>
                            </div>
                        </a>

                    </div>
                {{-- </div> --}}
                {{-- <div class="row"> --}}
                    <div class="col-lg-12 col-sm-6 p_relative">
                        <a href="{{route('berita.detail',encrypt($beritas[2]->id))}}">
                            <div class="" style="width: 100%; height: 250px;" style="">
                                <img src="{{$beritas[2]->getImage()}}" style="height: 250px; width: inherit; border-radius: 10px; object-fit: cover; object-position: center;" alt="">
                            </div>
                            <div class="p_absolute" style="width: 94%; height: 100px; bottom: 8px; z-index: 99; background:rgba(0,0,0,0.4); border-radius: 10px;">
                                <div class="pl_20">
                                    <span style="color: white;">{{date("d M Y",strtotime($beritas[2]->created_at))}}</span>
                                    <h5 style="z-index: 999; color: white; opacity: 1 !important;">{{Str::limit($beritas[2]->judul,100)}} </h5>
                                </div>
                            </div>
                        </a>

                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</section>

@endsection
@section('content')
    
@endsection