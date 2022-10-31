@extends("layouts.dashboard.master")
@section("page_title",$title)
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{route("admin.dashboard.index")}}">Home</a></li>
<li class="breadcrumb-item active">Jenis</li>
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
            <form role="form" action="{{isset($berita) ? route('admin.berita.update') : route('admin.berita.store')}}" method="post" enctype="multipart/form-data">
                @if(isset($berita))
                  @csrf
                  @method("PATCH")
                  <input type="hidden" name="berita_id" value="{{encrypt($berita->id)}}">
                @else
                  @csrf
                @endif
                <div class="card-body">
                  @if(isset($berita))
                  <div class="form-group">
                    <div class="row" style="margin: auto;">
                      <img src="{{$berita->getImage()}}" alt="" style="max-width: 200px;">
                    </div>
                  </div>
                  @endif
                  <div class="form-group">
                    <label for="exampleInputFile">Gambar</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="gambar" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Gambar</span>
                      </div>
                    </div>
                    <small>abaikan jika tidak ingin mengubah gambar</small>
                  </div>
                  <div class="form-group">
                    <label for="namaLatin">Judul</label>
                    <input type="text" class="form-control" placeholder="Masukkan judul berita" name="judul" value="{{$berita->judul ?? ''}}">
                  </div>
                  <div class="form-group">
                    <label for="namaLatin">Konten</label>
                    <textarea name="konten" id="" cols="30" rows="10" class="form-control ckeditor">{{$berita->konten ?? ''}}</textarea>
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
