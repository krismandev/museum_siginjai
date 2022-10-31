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
            <form role="form" action="{{isset($jenis) ? route('admin.jenis.update') : route('admin.jenis.store')}}" method="post">
                @if(isset($jenis))
                  @csrf
                  @method("PATCH")
                  <input type="hidden" name="jenis_id" value="{{encrypt($jenis->no_jenis)}}">
                @else
                  @csrf
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="namaLatin">No. Jenis</label>
                    <input type="text" class="form-control" placeholder="Cth: 01" name="no_jenis" value="{{$jenis->no_jenis ?? ''}}">
                  </div>
                  <div class="form-group">
                    <label for="namaLatin">Nama Jenis</label>
                    <input type="text" class="form-control" placeholder="Cth: Geologika" name="nama_jenis" value="{{$jenis->nama_jenis ?? ''}}"> 
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
