@extends("layouts.dashboard.master")
@section("page_title",$title)
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{route("admin.dashboard.index")}}">Home</a></li>
<li class="breadcrumb-item active">jenis</li>
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
            <a href="{{route('admin.jenis.create')}}" class="btn btn-primary">Tambah</a>
            {{-- <button type="submit" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">Tambah</button> --}}
          </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="data_jenis_reguler">
              <thead>
                <tr>
                  <th>No Jenis</th>
                  <th>Nama Jenis</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @if ($jenises != null)
                @foreach ($jenises as $jenis)
                <tr>
                  <td>{{$jenis->no_jenis}}</td>
                  <td>{{$jenis->nama_jenis}}</td>
                  <td>
                      <a class="btn btn-primary" href="{{route('admin.koleksi-perjenis.index',$jenis->no_jenis)}}">Lihat Koleksi</a>
                      <a class="btn btn-warning" href="{{route('admin.jenis.edit',encrypt($jenis->no_jenis))}}">Edit</a>
                      <a class="btn btn-danger" href="#"
                      data-jenis_id="{{encrypt($jenis->no_jenis)}}">Hapus</a>
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
    
  $("#data_jenis_reguler").DataTable({
      "responsive": true,
      "autoWidth": false,
  });

  $(".btn-danger").click(function (e) {
      const jenis_id = $(this).data("jenis_id");

      swal({
          title: "Yakin?",
          text: "Mau menghapus data ini?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
              window.location = "/dashboard/jenis/delete/"+jenis_id;
          }
      });
  });
</script>
@endsection
