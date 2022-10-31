@extends('layouts.frontpage.master')
@section('linkheader')
<link href="{{asset('asset_frontpage/css/blog.css')}}" rel="stylesheet">
@endsection
@section('title','Berita')

@section('content')
<section class="sidebar-page-container blog-standard-2 blog-details p_relative sec-pad">
    <div class="auto-container" style="max-width: 1200px;">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="blog-details-content p_relative d_block mr_20">
                    <div class="blog-post p_relative d_block mb_60">
                        <div class="content-one p_relative d_block mb_60">
                            <div class="post-title p_relative d_block mb_60">
                                {{-- <div class="category p_relative d_block mb_7"><a href="blog-details.html" class="d_iblock fs_16 font_family_poppins uppercase">Business</a></div> --}}
                                <h3 class="d_block fs_40 lh_50 fw_bold mb_7">{{$berita->judul}}</h3>
                                <ul class="post-info clearfix p_relative d_block">
                                    <li class="p_relative d_iblock mr_30 fs_16">{{date("d M Y",strtotime($berita->created_at))}}</li>
                                    {{-- <li class="p_relative d_iblock fs_16">2 Comments</li> --}}
                                </ul>
                            </div>
                            <figure class="image-box p_relative d_block b_radius_5 mb_65"><img src="{{$berita->getImage()}}" alt=""></figure>
                            <div class="text">
                                <p class="font_family_poppins mb_25">{!!$berita->konten!!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="post-share-option clearfix p_relative d_block pt_35 pb_35 mb_70">
                        {{-- <ul class="tags-list clearfix pull-left">
                            <li class="p_relative pull-left mr_20"><h6 class="fs_16 fw_medium lh_40">Tags:</h6></li>
                            <li class="p_relative pull-left mr_10"><a href="blog-details.html" class="p_relative d_iblock fs_14 lh_20 font_family_poppins color_black b_radius_5">Creative</a></li>
                            <li class="p_relative pull-left mr_10"><a href="blog-details.html" class="p_relative d_iblock fs_14 lh_20 font_family_poppins color_black b_radius_5">Marketing</a></li>
                            <li class="p_relative pull-left"><a href="blog-details.html" class="p_relative d_iblock fs_14 lh_20 font_family_poppins color_black b_radius_5">Idea</a></li>
                        </ul> --}}
                        {{-- <ul class="social-list clearfix pull-right">
                            <li class="p_relative pull-left mr_20"><h6 class="fs_16 fw_medium lh_40">Share on:</h6></li>
                            <li class="p_relative pull-left mr_10"><a href="blog-details.html" class="p_relative d_iblock fs_14 lh_20 font_family_poppins b_radius_50 w_40 h_40 lh_40 centred"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="p_relative pull-left mr_10"><a href="blog-details.html" class="p_relative d_iblock fs_14 lh_20 font_family_poppins b_radius_50 w_40 h_40 lh_40 centred"><i class="fab fa-twitter"></i></a></li>
                            <li class="p_relative pull-left"><a href="blog-details.html" class="p_relative d_iblock fs_14 lh_20 font_family_poppins b_radius_50 w_40 h_40 lh_40 centred"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul> --}}
                    </div>
                    {{-- <div class="nav-btn p_relative d_block mb_70">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 btn-column">
                                <div class="single-btn prev-btn p_relative d_block b_radius_5 pt_25 pr_30 pb_25 pl_30 tran_5">
                                    <h6 class="d_block fs_15 fw_sbold mb_11"><a href="blog-details.html" class="d_iblock color_black"><i class="far fa-long-arrow-left"></i>Previous</a></h6>
                                    <h5 class="d_block fs_17 lh_24 fw_sbold">How to Make Most of the Non Traditional Startup?</h5>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 btn-column">
                                <div class="single-btn next-btn text-right p_relative d_block b_radius_5 pt_25 pr_30 pb_25 pl_30 tran_5">
                                    <h6 class="d_block fs_15 fw_sbold mb_11"><a href="blog-details.html" class="d_iblock color_black">Next<i class="far fa-long-arrow-right"></i></a></h6>
                                    <h5 class="d_block fs_17 lh_24 fw_sbold">Take Action for the Best Strategy Benefits</h5>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="author-box p_relative d_block pt_45 pr_30 pb_40 pl_170 mb_60">
                        <figure class="author-thumb p_absolute l_40 t_40 w_100 h_100 b_radius_50"><img src="assets/images/news/author-1.jpg" alt=""></figure>
                        <h4 class="d_block fs_20 lh_30 mb_11">Charlton Heston</h4>
                        <p class="font_family_poppins">Enim ad minim veniam quis nostrud exercitation lamco laboris nisi ex ea commodo consequat aute irure.</p>
                    </div> --}}
                    {{-- <div class="comments-form-area">
                        <div class="group-title p_relative d_block mb_15">
                            <h3 class="fs_30 lh_40">Leave a Comment</h3>
                        </div>
                        <div class="form-inner">
                            <form method="post" action="sendemail.php" id="contact-form" novalidate="novalidate"> 
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="username" placeholder="Your Name" required="" aria-required="true">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Your email" required="" aria-required="true">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="phone" required="" placeholder="Phone" aria-required="true">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <div class="check-box">
                                            <input class="check" type="checkbox" id="checkbox">
                                            <label for="checkbox">I agree that my submitted data is being collected and stored. *</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn mr-0">
                                        <button class="theme-btn theme-btn-five" type="submit" name="submit-form">Send Message <i class="icon-4"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> --}}
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
                                <figure class=" p_absolute l_0 t_4 w_80 h_80 b_radius_5"><a href="blog-details.html"><img src="{{$berita->getImage()}}" alt=""></a></figure>
                                <h5 class="d_block fs_18 lh_24 mb_7"><a href="blog-details.html" class="d_iblock color_black">{{$berita->judul}}</a></h5>
                                <span class="post-date p_relative d_block fs_16 font_family_poppins">{{date("d M Y",strtotime($berita->created_at))}}</span>
                            </div>
                            @endforeach
                            {{-- <div class="post p_relative d_block pl_100 pb_20 mb_16">
                                <figure class="post-thumb p_absolute l_0 t_4 w_80 h_80 b_radius_5"><a href="blog-details.html"><img src="assets/images/news/post-2.jpg" alt=""></a></figure>
                                <h5 class="d_block fs_18 lh_24 mb_7"><a href="blog-details.html" class="d_iblock color_black">Great food is not just eating energy.</a></h5>
                                <span class="post-date p_relative d_block fs_16 font_family_poppins">Oct 20, 2021</span>
                            </div>
                            <div class="post p_relative d_block pl_100 pb_20">
                                <figure class="post-thumb p_absolute l_0 t_4 w_80 h_80 b_radius_5"><a href="blog-details.html"><img src="assets/images/news/post-3.jpg" alt=""></a></figure>
                                <h5 class="d_block fs_18 lh_24 mb_7"><a href="blog-details.html" class="d_iblock color_black">The smell of good bread baking.</a></h5>
                                <span class="post-date p_relative d_block fs_16 font_family_poppins">Oct 20, 2021</span>
                            </div> --}}
                        </div>
                    </div>
                    {{-- <div class="sidebar-widget archives-widget p_relative d_block pt_35 pr_40 pb_20 pl_40 b_radius_10">
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
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('linkfooter')
<script src="{{asset('asset_frontpage/js/jquery.paroller.min.js')}}"></script>
@endsection