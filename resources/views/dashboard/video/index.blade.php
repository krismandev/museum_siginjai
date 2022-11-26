@extends("layouts.dashboard.master")
@section("page_title",$title)
@section('linkheader')
{{-- <link rel="stylesheet" href="magnific-popup/magnific-popup.css"> --}}
@endsection
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{route("admin.dashboard.index")}}">Home</a></li>
<li class="breadcrumb-item active">Event</li>
@endsection
@section("title",$title)
@section("content")
<style>
  /* #headerPopup{
  width:75%;
  margin:0 auto;
}

#headerPopup iframe{
  width:100%;
  margin:0 auto;
} */

.holder {
  width: 560;
  height: 315px;
  position: relative;
}

.frame {
  width: 100%;
  height: 100%;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 560%;
  height: 315px;
  cursor: pointer;
}
</style>
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
            <a href="{{route('admin.video.create')}}" class="btn btn-primary">Tambah</a>
            {{-- <button type="submit" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">Tambah</button> --}}
          </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="data_video_reguler">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Video</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @if ($videos != null)
                @foreach ($videos as $video)
                <tr>
                  <td>{{$video->judul}}</td>
                  <td>
                    <a href="#headerPopup" id="headerVideoLink" class="btn btn-outline-danger popup-modal trigger" data-target="#videoModal"  data-toggle="modal" data-src="{{$video->link}}">  
                      <img src="{{$video->getThumbnail()}}" alt="" style="width: 150px;">
                    </a>
                    {{-- <div id="headerPopup" class="mfp-hide embed-responsive embed-responsive-21by9">
                      <iframe class="embed-responsive-item" width="854" height="480" src="https://www.youtube.com/embed/qN3OueBm9F4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div> --}}
                  </td>
                  <td>
                      {{-- <a class="btn btn-primary" href="#">Lihat Koleksi</a> --}}
                      <a class="btn btn-warning" href="{{route('admin.video.edit',encrypt($video->id))}}">Edit</a>
                      <a class="btn btn-danger" href="#"
                      data-video_id="{{encrypt($video->id)}}">Hapus</a>
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

  <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <button type="button" class="close btn-round btn-primary" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
@endsection
@section("linkfooter")
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script> --}}

<script type="text/javascript">
  $(document).ready(function () {
    // $('#headerVideoLink').magnificPopup({
    //   type:'inline',
    //   midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
    // });

    $(".trigger").click(function (e) { 
      e.preventDefault();
      var theModal = $(this).data("target");
      var videoSRC = $(this).data("src");
      var videoSRCauto = videoSRC + "?autoplay=1";
      $(theModal + ' iframe').attr('src', videoSRCauto);
      $(theModal).on('hidden.bs.modal', function(e) {
        $(theModal + ' iframe').attr('src', '');
      });


    });
  });
  $("#data_video_reguler").DataTable({
      "responsive": true,
      "autoWidth": false,
  });

  $(".btn-danger").click(function (e) {
      const video_id = $(this).data("video_id");
      swal({
          title: "Yakin?",
          text: "Mau menghapus data ini?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
              window.location = "/dashboard/video/delete/"+video_id;
          }
      });
  });
</script>
@endsection
