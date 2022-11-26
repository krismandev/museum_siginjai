@extends("layouts.dashboard.master")
@section("page_title",$title)
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{route("admin.dashboard.index")}}">Home</a></li>
<li class="breadcrumb-item active">Event</li>
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
        <div class="card-body p-0">
            <form role="form" action="{{isset($video) ? route('admin.video.update') : route('admin.video.store')}}" method="post" enctype="multipart/form-data">
                @if(isset($video))
                  @csrf
                  @method("PATCH")
                  <input type="hidden" name="video_id" value="{{encrypt($video->id)}}">
                @else
                  @csrf
                @endif
                <div class="card-body">
                  @if(isset($video))
                  <div class="form-group">
                    <div class="row" style="margin: auto;">
                      <img src="{{$video->getImage()}}" alt="" style="max-width: 200px;">
                    </div>
                  </div>
                  @endif
                  <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control" placeholder="Masukkan judul video" name="judul" value="{{$video->judul ?? old('judul')}}">
                  </div>
                  <div class="form-group">
                    <label>Link Video Youtube</label>
                    <input type="text" class="form-control" placeholder="Copy dan paste link youtube disini" name="link" value="{{$video->link ?? old('link')}}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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
