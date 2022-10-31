@extends("layouts.dashboard.master")
@section("page_title",$title)
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{route("admin.dashboard.index")}}">Home</a></li>
<li class="breadcrumb-item active">Slider</li>
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
            <form role="form" action="{{isset($slider) ? route('admin.slider.update') : route('admin.slider.store')}}" method="post" enctype="multipart/form-data">
                @if(isset($slider))
                  @csrf
                  @method("PATCH")
                  <input type="hidden" name="slider_id" value="{{encrypt($slider->id)}}">
                @else
                  @csrf
                @endif
                <div class="card-body">
                  @if(isset($slider))
                  <div class="form-group">
                    <div class="row" style="margin: auto;">
                      <img src="{{$slider->getImage()}}" alt="" style="max-width: 200px;">
                    </div>
                  </div>
                  @endif
                  <div class="form-group">
                    <label for="namaLatin">Gambar</label>
                    <input type="file" class="form-control" name="gambar">
                    @if(isset($slider)) <small>abaikan jika tidak ingin mengubah gambar</small> @endif
                  </div>
                  <div class="form-group">
                    <label for="namaLatin">Judul</label>
                    <input type="text" class="form-control" placeholder="Masukkan judul slider" name="judul" value="{{$slider->judul ?? ''}}">
                  </div>
                  <div class="form-group">
                    <label for="namaLatin">Deskripsi</label>
                    <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control ckeditor">{{$slider->deskripsi ?? ''}}</textarea>
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
