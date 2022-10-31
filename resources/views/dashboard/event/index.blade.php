@extends("layouts.dashboard.master")
@section("page_title",$title)
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{route("admin.dashboard.index")}}">Home</a></li>
<li class="breadcrumb-item active">Event</li>
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
            <a href="{{route('admin.event.create')}}" class="btn btn-primary">Tambah</a>
            {{-- <button type="submit" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">Tambah</button> --}}
          </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="data_event_reguler">
              <thead>
                <tr>
                  <th>Gambar</th>
                  <th>Tanggal</th>
                  <th>Title</th>
                  <th>Deskripsi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @if ($events != null)
                @foreach ($events as $event)
                <tr>
                  <td>
                    <img src="{{$event->getImage()}}" alt="" style="max-width: 150px;">
                  </td>
                  <td>{{date("d M Y",strtotime($event->tanggal))}}</td>
                  <td>{{$event->judul}}</td>
                  <td>{!!Str::limit($event->deskripsi,100)!!}</td>
                  <td>
                      {{-- <a class="btn btn-primary" href="#">Lihat Koleksi</a> --}}
                      <a class="btn btn-warning" href="{{route('admin.event.edit',encrypt($event->id))}}">Edit</a>
                      <a class="btn btn-danger" href="#"
                      data-event_id="{{encrypt($event->id)}}">Hapus</a>
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
    
  $("#data_event_reguler").DataTable({
      "responsive": true,
      "autoWidth": false,
  });

  $(".btn-danger").click(function (e) {
      const event_id = $(this).data("event_id");
      swal({
          title: "Yakin?",
          text: "Mau menghapus data ini?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
              window.location = "/dashboard/event/delete/"+event_id;
          }
      });
  });
</script>
@endsection
