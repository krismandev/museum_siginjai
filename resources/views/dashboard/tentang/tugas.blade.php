@extends("layouts.dashboard.master")
@section("page_title",$title)
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{route("admin.dashboard.index")}}">Home</a></li>
<li class="breadcrumb-item active">Tugas & Fungsi</li>
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
            <form role="form" action="{{route('admin.tentang.tugas.update')}}" method="post">
                @csrf
                @method("PATCH")
                <div class="card-body">
                  <div class="form-group">
                    <label for="namaLatin">Tugas & Fungsi</label>
                    <textarea name="tugas_dan_fungsi" class="form-control ckeditor">
                        @isset($tugas)
                            {!!$tugas->tugas_dan_fungsi!!}
                        @endisset
                    </textarea> 
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
<script type="text/javascript">
   
</script>
@endsection
