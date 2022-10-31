@extends("layouts.dashboard.master")
@section("page_title",$title)
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{route("admin.dashboard.index")}}">Home</a></li>
<li class="breadcrumb-item active">Slider</li>
@endsection
@section("title",$title)
@section("content")
<div class="row">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-tools">
            <a href="{{route('admin.slider.create')}}" class="btn btn-primary">Tambah</a>
            {{-- <button type="submit" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">Tambah</button> --}}
          </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="data_slider_reguler">
              <thead>
                <tr>
                  <th>Gambar</th>
                  <th>Title</th>
                  <th>Deskripsi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @if ($sliders != null)
                @foreach ($sliders as $slider)
                <tr>
                  <td>
                    <img src="{{$slider->getImage()}}" alt="" style="max-width: 150px;">
                  </td>
                  <td>{{$slider->judul}}</td>
                  <td>{!!Str::limit($slider->deskripsi,100)!!}</td>
                  <td>
                      {{-- <a class="btn btn-primary" href="#">Lihat Koleksi</a> --}}
                      <a class="btn btn-warning" href="{{route('admin.slider.edit',encrypt($slider->id))}}">Edit</a>
                      <a class="btn btn-danger" href="#"
                      data-slider_id="{{encrypt($slider->id)}}">Hapus</a>
                  </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

@endsection
@section("linkfooter")
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    
  $("#data_slider_reguler").DataTable({
      "responsive": true,
      "autoWidth": false,
  });

  $(".btn-danger").click(function (e) {
      const slider_id = $(this).data("slider_id");
      swal({
          title: "Yakin?",
          text: "Mau menghapus data ini?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
              window.location = "/dashboard/slider/delete/"+slider_id;
          }
      });
  });
</script>
@endsection
