@extends('layouts.frontpage.master')
@section('linkheader')
<link href="{{asset('asset_frontpage/css/blog.css')}}" rel="stylesheet">
@endsection
@section('title',$event->judul)

@section('content')
<section class="sidebar-page-container blog-details-2 blog-details p_relative pt_140 pb_150">
    <div class="auto-container" style="max-width: 1200px;">
        <div class="blog-details-content p_relative d_block mr_20">
            <div class="blog-post p_relative d_block mb_60">
                <div class="content-one p_relative d_block mb_60">
                    <h3 class="d_block fs_30 lh_30 mb_5">{{$event->judul}}</h3>
                    <p class="text d_iblock float_left fs_16 font_family_poppins">{{date("d M Y",strtotime($event->tanggal))}}</p><br>
                    <p class="text d_iblock float_left fs_16 font_family_poppins">Penulis : </p><span class="text d_iblock float_left fs_16 font_family_poppins">{{$event->user->name}}</span>
                    {{-- <div class="row clearfix">
                        <div class="col-lg-8 col-md-12 col-sm-12 offset-lg-2 big-column">
                            <div class="text">
                                <p class="font_family_poppins mb_25">Lorem ipsum dolor sit amet consectur adipisicing sed do eiusmod tempor incidunt labore desk dolore magna aliqua enim ad minim veniam quis nostrud exercitation lamco laboris nisi ut aliq uip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse  sint cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <p class="font_family_poppins mb_60">Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudant totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                <h3 class="d_block fs_30 lh_30 mb_30">Ready to Maximizing Products</h3>
                                <p class="font_family_poppins">Aliqua enim ad minim veniam quis nostrud exercitation lamco laboris nisi ut aliquip ex ea com modo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eufu giat nulla pariatur excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deser unt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <figure class="image-box p_relative d_block b_radius_5 mb_65"><img src="{{$event->getImage()}}" alt=""></figure>
                <div class="content-two p_relative d_block mb_60">
                    <div class="row clearfix">
                        <div class="col-lg-8 col-md-12 col-sm-12 offset-lg-2 big-column">
                            <div class="text">
                                <p class="font_family_poppins mb_25">{!!$event->deskripsi!!}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-grid-one p_relative sec-pad" style="padding-top: 0px !important;">
    <div class="auto-container" style="max-width: 1200px;">
        <h2>Event lainnya</h2>
        <div class="row clearfix">
            @foreach ($event_lainnya as $event)
            <div class="col-lg-4 col-md-6 col-sm-12 news-block" style="border: 0.5px solid; border-radius: 10px; margin: 10px; padding: 20px; border-color: gray;">
                <div class="news-block-one wow fadeInUp animated animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                    <div class="inner-box p_relative d_block mb_20">
                        <div class="image-box p_relative d_block">
                            <figure class="image p_relative d_block"><a href="{{route('event.detail',encrypt($event->id))}}"><img src="{{$event->getImage()}}" alt=""></a></figure>
                            {{-- <div class="post-date-two p_absolute l_30 t_30 w_60 centred pt_10 pb_10 b_shadow_6"><h4 class="fs_20 font_family_oxygen fw_bold lh_20">27 <span class="d_block fs_14">Oct</span></h4></div> --}}
                        </div>
                        <div class="lower-content p_relative d_block pt_25">
                            <h4 class="d_block fs_20 lh_30 mb_6"><a href="blog-details.html">{{$event->judul}}</a></h4>
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
@endsection
@section('linkfooter')
<script src="{{asset('asset_frontpage/js/jquery.paroller.min.js')}}"></script>
@endsection