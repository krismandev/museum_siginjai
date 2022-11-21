@extends('layouts.frontpage.master')
@section('linkheader')
<link href="{{asset('asset_frontpage/css/blog.css')}}" rel="stylesheet">
@endsection
@section('title','Event')

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
        <div class="bg-layer p_absolute l_0 parallax_none parallax-bg" data-parallax='{"y": 100}' style="background-image: url({{asset('asset_frontpage/images/menu_acara.png')}})"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1 class="d_block fs_60 lh_70 fw_bold mb_10">
                    
                    Acara
                    
                </h1>
                <span class="fw_bold" style="color: white;">Menampilkan acara dan pameran yang diselenggarakan oleh Museum Siginjei Jambi</span>
            </div>
        </div>
    </section>
    <div class="p_absolute centred" style="width: 100%; z-index:99999; margin-top: -50px;">
        <div class="search_card custom_box_shadow" style="background-color: white; width: 40%; height: auto; margin: 0 auto; border-radius: 10px;">
            <div class="sidebar-widget search-widget p_relative d_block pt_35 pr_20 pb_30 pl_20 b_radius_10">
                <div class="search-inner">
                    <form action="{{route('event')}}" method="get" class="search-form">
                        <div class="form-group p_relative m_0">
                            <button type="submit"><i class="icon-156"></i></button>
                            <input type="search" name="search" placeholder="Cari Acara" required value="{{request()->query('search') ?? ''}}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="blog-grid-one p_relative sec-pad">
        <div class="auto-container" style="max-width: 1200px;">
            <div class="row clearfix">
                @foreach ($events as $event)
                <div class="col-lg-4 col-md-6 col-sm-12 news-block" style="">
                    <div style="border: 0.5px solid; border-radius: 10px; padding: 20px; border-color: gray;">
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
                </div>
                @endforeach
            </div>
             <div class="pagination-wrapper centred">
                {{-- <ul class="pagination clearfix">
                    <li><a href="blog-3.html" class="current">1</a></li>
                    <li><a href="blog-3.html">2</a></li>
                    <li><a href="blog-3.html">3</a></li>
                    <li class="dot">...</li>
                    <li><a href="blog-3.html">9</a></li>
                    <li><a href="blog-3.html"><i class="icon-4"></i></a></li>
                </ul> --}}
                {{$events->links()}}
            </div>
        </div>
    </section>
    
@endsection
@section('linkfooter')
<script src="{{asset('asset_frontpage/js/jquery.paroller.min.js')}}"></script>
@endsection