@extends('layouts.frontpage.master')
@section('title')
    Kontak
@endsection
@section('slider')
<style>
</style>
@endsection
@section('content')
<section class="page-title p_relative centred">
    <div class="bg-layer p_absolute l_0 parallax_none parallax-bg" data-parallax='{"y": 100}' style="background-color: #4b76ed;"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1 class="d_block fs_60 lh_70 fw_bold mb_10">
                
                Hubungi Kami
                
            </h1>
            <span class="fw_bold" style="color: white;">Anda dapat meninggalkan kritik, saran ataupun menghubungi kami melalui form dibawah ini</span>
        </div>
    </div>
</section>
<section class="contact-seven p_relative pb_150 sec-pad">
    <div class="auto-container" style="max-width: 1200px;">
        @if (session("success"))
            <div class="alert alert-success" role="alert">
                {{session("success")}}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12">
                {{-- <form>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                    </div>
                </form> --}}
                <form method="post" action="{{route('kontak.store')}}" novalidate="novalidate"> 
                    @csrf
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required="" aria-required="true" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required="" aria-required="true" required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <div class="form-group">
                                <label>Subjek</label>
                                <input type="text" name="subject" class="form-control" placeholder="Masukkan subjek / judul" required="" aria-required="true" required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <div class="form-group">
                                <label>Pesan</label>
                                <textarea name="pesan" class="form-control" placeholder="Pesan" rows="10" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                            <button class="theme-btn" style="padding: 13px 26px 11px 26px;
                            background: #1a2345;" type="submit" name="submit-form">Send Message <i class="icon-4"></i></button>
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 info-column">
                <div class="info-inner">
                    <div class="sec-title p_relative d_block mb_30">
                        <h3 class="d_block fs_30 lh_40 fw_bold mb_25">Hubungi Kami</h3>
                        <p>Alamat: </p>
                        <p class="font_family_poppins color_black">Jalan Jendral Urip Sumoharjo, Sungai Putri, Kecamatan Telanaipura, Kota Jambi, Jambi 36124</p>
                    </div>
                    <ul class="info-list clearfix">
                        <li class="p_relative d_block mb_20">
                            <p>Email:</p>
                            <p class="font_family_inter color_black">museumsiginjei@gmail.com</p>
                        </li>
                        <li class="p_relative d_block mb_20">
                            <p>Instagram</p>
                            <p class="font_family_inter color_black">museum.siginjeijambi</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
