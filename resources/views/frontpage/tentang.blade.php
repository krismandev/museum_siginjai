@extends('layouts.frontpage.master')
@section('title')
    Tentang
@endsection
@section('slider')
<style>
    span:active{
        border-bottom: 1px solid #1a2345;
        border-bottom-width: 3px;
        bottom: 0;
    }
</style>
@endsection
@section('content')
<section class="page-title p_relative centred">
    <div class="bg-layer p_absolute l_0 parallax_none parallax-bg" data-parallax='{"y": 100}' style="background-image: url({{asset('asset_frontpage/images/menu_tentang.png')}})"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1 class="d_block fs_60 lh_70 fw_bold mb_10">
                
                Tentang Kami
                
            </h1>
            {{-- <span class="fw_bold" style="color: white;">Anda dapat meninggalkan kritik, saran ataupun menghubungi kami melalui form dibawah ini</span> --}}
        </div>
    </div>
</section>

<section class="sidebar-page-container blog-standard-2 blog-details p_relative sec-pad">
    <div class="auto-container" style="max-width: 1200px;">
        
            <div class="tabs-box">
                <div class="row clearfix">
                    <div class="col-lg-2" style="border: solid 1px rgb(189, 189, 189); border-radius: 5px; ">
                        <div class="tab-btn-box p_relative d_block mb_35">
                            <ul class="tab-btns tab-buttons clearfix">
                                <li class="tab-btn p_10" data-tab="#tab-1"><span class="fs_20">Profil</span></li>
                                <li class="tab-btn p_10" data-tab="#tab-2"><span class="fs_20">Sejarah</span></li>
                                <li class="tab-btn p_10" data-tab="#tab-3"><span class="fs_20">Visi dan Misi</span></li>
                                <li class="tab-btn p_10" data-tab="#tab-4"><span class="fs_20">Struktur Organisasi</span></li>
                                <li class="tab-btn p_10" data-tab="#tab-5"><span class="fs_20">Tugas dan Fungsi</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="tabs-content">
                            <div class="tab active-tab" id="tab-1">
                                <div>
                                    {!!$tentang->profil!!}
                                </div>
                            </div>
                            <div class="tab" id="tab-2">
                                <div>
                                    {!!$tentang->sejarah!!}
                                </div>
                            </div>
                            <div class="tab" id="tab-3">
                                <div>
                                    {!!$tentang->visi_misi!!}
                                </div>
                            </div>
                            <div class="tab" id="tab-4">
                                <div>
                                    {!!$tentang->struktur_organisasi!!}
                                </div>
                            </div>
                            <div class="tab" id="tab-5">
                                <div>
                                    {!!$tentang->tugas_dan_fungsi!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- <div class="row clearfix">
            <div class="product-discription p_relative d_block mb_80">
                <div class="tabs-box">
                    <div class="tab-btn-box p_relative d_block mb_35">
                        <ul class="tab-btns tab-buttons clearfix">
                            <li class="tab-btn active-btn p_relative d_iblock fs_18 font_family_inter lh_20 float_left fw_medium z_1 mr_35 tran_5" data-tab="#tab-1">Description</li>
                            <li class="tab-btn p_relative d_iblock fs_18 font_family_inter lh_20 float_left fw_medium z_1 tran_5" data-tab="#tab-2">Reviews (1)</li>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="content-box">
                                <p class="font_family_poppins mb_25">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.enim ad minim veniam quis nostrud exercita mco laboris nisi ut aliquip ex ea commodo consequat. duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur consequuntur magni dolores.</p>
                                <p class="font_family_poppins ">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum nemo enim ipsam voluptatem quia voluptas sit aspernatur.</p>
                            </div>
                        </div>
                        <div class="tab" id="tab-2">
                            <div class="customer-inner">
                                <div class="customer-review p_relative d_block pb_65 mb_65">
                                    <h4 class="p_relative d_block fs_20 lh_30 fw_medium fw_sbold mb_40">1 Review for Lenevo Laptop 15.6”</h4>
                                    <div class="comment-box p_relative d_block pl_110">
                                        <figure class="comment-thumb p_absolute l_0 t_0 w_80 h_80 b_radius_55"><img src="assets/images/shop/comment-1.jpg" alt=""></figure>
                                        <h5 class="d_block fs_18 lh_20 fw_sbold">Keanu Reeves<span class="d_iblock fs_16 font_family_poppins"> - May 1, 2021</span></h5>
                                        <ul class="rating clearfix mb_15">
                                            <li class="p_relative d_iblock pull-left mr_3 fs_13"><i class="fas fa-star"></i></li>
                                            <li class="p_relative d_iblock pull-left mr_3 fs_13"><i class="fas fa-star"></i></li>
                                            <li class="p_relative d_iblock pull-left mr_3 fs_13"><i class="fas fa-star"></i></li>
                                            <li class="p_relative d_iblock pull-left mr_3 fs_13"><i class="fas fa-star"></i></li>
                                            <li class="p_relative d_iblock pull-left mr_5 fs_13"><i class="far fa-star"></i></li>
                                        </ul>
                                        <div class="text">
                                            <p class="fs_15 font_family_poppins">Excepteur sint occaecat cupidatat non proident sunt in culpa  qui officia deserunt mollit anim  est laborum. Sed perspiciatis unde omnis natus error sit voluptatem accusa dolore mque laudant totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi arch tecto beatae vitae dicta.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="customer-comments p_relative">
                                    <h4 class="p_relative d_block fs_20 lh_30 fw_medium fw_sbold mb_25">Be First to Add a Review</h4>
                                    <div class="rating-box clearfix mb_12">
                                        <h6 class="p_relative d_iblock fs_16 fw_medium mr_15 float_left">Your Rating</h6>
                                        <ul class="rating p_relative d_block clearfix float_left">
                                            <li class="p_relative d_iblock fs_12 lh_26 float_left mr_3"><i class="far fa-star"></i></li>
                                            <li class="p_relative d_iblock fs_12 lh_26 float_left mr_3"><i class="far fa-star"></i></li>
                                            <li class="p_relative d_iblock fs_12 lh_26 float_left mr_3"><i class="far fa-star"></i></li>
                                            <li class="p_relative d_iblock fs_12 lh_26 float_left mr_3"><i class="far fa-star"></i></li>
                                            <li class="p_relative d_iblock fs_12 lh_26 float_left"><i class="far fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <form action="shop-details.html" method="post" class="comment-form default-form">
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group mb_15">
                                                <label class="p_relative d_block fs_16 mb_3 font_family_poppins">Your Review</label>
                                                <textarea name="message"></textarea>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group mb_15">
                                                <label class="p_relative d_block fs_16 mb_3 font_family_poppins">Your Name</label>
                                                <input type="text" name="name" required="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group mb_15">
                                                <label class="p_relative d_block fs_16 mb_3 font_family_poppins">Your Email</label>
                                                <input type="email" name="email" required="">
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group mb_15">
                                                <div class="check-box pt_8 pb_9">
                                                    <input class="check" type="checkbox" id="checkbox">
                                                    <label for="checkbox" class="fs_16 font_family_poppins">Save my name, email, and website in this browser for the next time I comment</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn m_0">
                                                <button type="submit" class="theme-btn theme-btn-eight">Submit Your Review <i class="icon-4"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>
@endsection