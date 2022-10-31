@extends("layouts.dashboard.master")
@section("page_title",$title)
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{route("admin.dashboard.index")}}">Home</a></li>
<li class="breadcrumb-item active">koleksi</li>
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
      <div class="row">
        <div class="col-lg-4">
          <select name="no_jenis" id="" class="form-control">
            <option value="">Filter Jenis (Semua)</option>
            @foreach($jenises as $jenis)
            <option value="{{$jenis->no_jenis}}">{{$jenis->no_jenis. " ". $jenis->nama_jenis}} </option>
            @endforeach
          </select>
        </div>
        <div class="col-lg-4">
          <a href="{{route('admin.koleksi.export-word-table')}}" class="btn btn-info export-to-word-table">Export as Word Table</a>
          <a href="{{route('admin.koleksi.export-word-document')}}" class="btn btn-info export-to-word-document">Export as Word Document</a>
        </div>
        <div class="col-lg-4">
        </div>
      </div>
      <div class="card mt-2">
        <div class="card-header">
          <div class="card-tools">
            <a href="{{route('admin.koleksi.create')}}" class="btn btn-primary">Tambah</a>
            {{-- <button type="submit" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">Tambah</button> --}}
          </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="data_koleksi_reguler">
              <thead>
                <tr>
                  <th>No Koleksi</th>
                  <th>Nama Koleksi</th>
                  <th>No Registrasi</th>
                  <th>Tempat Penyimpanan</th>
                  <th>Gambar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @if ($koleksis != null)
                @foreach ($koleksis as $koleksi)
                <tr>
                  <td> 
                    <a href="#">
                      <span class="badge badge-info">{{$koleksi->no_jenis}}</span> {{$koleksi->no_koleksi}}
                    </a>
                  </td>
                  <td>{{$koleksi->nama_koleksi}} <span class="badge badge-secondary">{{$koleksi->jenis->nama_jenis}}</span> </td>
                  <td>{{$koleksi->no_registrasi}}</td>
                  <td>{{$koleksi->tempat_penyimpanan}}</td>
                  <td>
                    <img src="{{$koleksi->getImage()}}" alt="" style="max-width: 150px;">
                  </td>
                  <td>
                      <a class="btn btn-warning" href="{{route('admin.koleksi.edit',encrypt($koleksi->no_jenis."|".$koleksi->no_koleksi))}}">Edit</a>
                      <a class="btn btn-danger" href="#"
                      data-koleksi_id="{{encrypt($koleksi->no_jenis."|".$koleksi->no_koleksi)}}">Hapus</a>
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
    
  $("#data_koleksi_reguler").DataTable({
      "responsive": true,
      "autoWidth": false,
  });

  $(".btn-danger").click(function (e) {
      const koleksi_id = $(this).data("koleksi_id");

      swal({
          title: "Yakin?",
          text: "Mau menghapus data ini?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
              window.location = "/dashboard/koleksi/delete/"+koleksi_id;
          }
      });
  });

  $("select[name='no_jenis']").change(function (e) { 
    e.preventDefault();
    let no_jenis = $(this).val();
    let param = {
      no_jenis: no_jenis
    }
    doAjax(param)
  });

  $(".export-to-word-table").click(function (e) { 
    e.preventDefault();
    let no_jenis = $("select[name='no_jenis']").val()
    let url = "/dashboard/koleksi/export/word-table"
    if (no_jenis != "") {
      url += "?no_jenis="+no_jenis
    }

    window.location.href = url;
  });

  $(".export-to-word-document").click(function (e) { 
    e.preventDefault();
    let no_jenis = $("select[name='no_jenis']").val()
    let url = "/dashboard/koleksi/export/word-document"
    if (no_jenis != "") {
      url += "?no_jenis="+no_jenis
    }

    window.location.href = url;
  });

  function doAjax(param){
    $.ajax({
      type: "GET",
      url: "/dashboard/koleksi",
      data: param,
      dataType: "html",
      success: function (response) {
        $("#data_koleksi_reguler").empty();
        $("#data_koleksi_reguler").html(response)
      },
      error : function(response){
        console.log(response);
      }
    });
  }
</script>
@endsection
