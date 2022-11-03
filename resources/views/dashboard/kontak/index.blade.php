@extends("layouts.dashboard.master")
@section("page_title",$title)
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{route("admin.dashboard.index")}}">Home</a></li>
<li class="breadcrumb-item active">Saran & Pesan</li>
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
            
            {{-- <button type="submit" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">Tambah</button> --}}
          </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="data_kontak_reguler">
              <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal</th>
                    <th>Subject</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @if ($kontaks != null)
                @foreach ($kontaks as $kontak)
                <tr>
                    <td>{{$kontak->nama}}</td>
                    <td>{{$kontak->email}}</td>
                    <td>{{date("d M Y",strtotime($kontak->created_at))}}</td>
                    <td>{!!Str::limit($kontak->subject,100)!!}</td>
                  <td>
                      {{-- <a class="btn btn-primary" href="#">Lihat Koleksi</a> --}}
                      <a class="btn btn-info" href="{{route('admin.kontak.detail',encrypt($kontak->id))}}">Lihat</a>
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
    
  $("#data_kontak_reguler").DataTable({
      "responsive": true,
      "autoWidth": false,
  });

  $(".btn-danger").click(function (e) {
      const kontak_id = $(this).data("kontak_id");
      swal({
          title: "Yakin?",
          text: "Mau menghapus data ini?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
              window.location = "/dashboard/kontak/delete/"+kontak_id;
          }
      });
  });
</script>
@endsection
