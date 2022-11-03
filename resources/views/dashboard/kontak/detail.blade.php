@extends("layouts.dashboard.master")
@section("page_title",$title)
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{route("admin.dashboard.index")}}">Home</a></li>
<li class="breadcrumb-item active">Detail Pesan</li>
@endsection
@section("title",$title)
@section("content")
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-tools">
          </div>
        </div>
        <div class="card-body p-10">
          <div class="row">
            <div class="col-lg-2">
              <b>Tanggal</b>
            </div>
            <div class="col-lg-1">
              :
            </div>
            <div class="col-lg-9">
              {{date('d M Y H:i:s',strtotime($kontak->created_at))}}
            </div>
          </div>
          <div class="row">
            <div class="col-lg-2">
              <b>Nama</b>
            </div>
            <div class="col-lg-1">
              :
            </div>
            <div class="col-lg-9">
              {{$kontak->nama}}
            </div>
          </div>
          <div class="row">
            <div class="col-lg-2">
              <b>Subjek</b>
            </div>
            <div class="col-lg-1">
              :
            </div>
            <div class="col-lg-9">
              {{$kontak->subject}}
            </div>
          </div>
          <div class="row">
            <div class="col-lg-2">
              <b>Pesan</b>
            </div>
            <div class="col-lg-1">
              :
            </div>
            <div class="col-lg-9">
              {{$kontak->pesan}}
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

@endsection
@section("linkfooter")
<script src="{{asset('asset_dashboard/plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('asset_dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script type="text/javascript">
   
</script>
@endsection
