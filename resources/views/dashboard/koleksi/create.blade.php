@extends("layouts.dashboard.master")
@section("page_title",$title)
@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{route("admin.dashboard.index")}}">Home</a></li>
<li class="breadcrumb-item"> <a href="{{route('admin.koleksi.index')}}">Koleksi</a></li>
<li class="breadcrumb-item active">Tambah Baru</li>
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
            <form role="form" action="{{isset($koleksi) ? route('admin.koleksi.update') : route('admin.koleksi.store')}}" method="post" enctype="multipart/form-data">
                @if(isset($koleksi))
                  @csrf
                  @method("PATCH")
                  <input type="hidden" name="id" value="{{encrypt($koleksi->no_jenis."|".$koleksi->no_koleksi)}}">
                @else
                  @csrf
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Jenis</label>
                    <select name="no_jenis" class="form-control" {{isset($koleksi->no_jenis) ? "readonly" : ""}}>
                        <option value="">Pilih Jenis</option>
                        @if (isset($koleksi->no_jenis))
                          <option value="{{$koleksi->no_jenis}}" selected>{{$koleksi->no_jenis}} {{$koleksi->jenis->nama_jenis}}</option>
                        @endif
                        @foreach ($jenises as $item)
                            <option value="{{$item->no_jenis}}" {{isset($koleksi->no_jenis) ? "disabled" : ""}}>{{$item->no_jenis}} {{$item->nama_jenis}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">No. Koleksi</label>
                    <input type="text" class="form-control" placeholder="Cth: 01" name="no_koleksi" value="{{isset($koleksi->no_koleksi) ? $koleksi->no_koleksi : old('no_koleksi')}}" {{isset($koleksi->no_koleksi) ? "readonly" : ""}}>
                  </div>
                  <div class="form-group">
                    <label for="">Nama Koleksi</label>
                    <input type="text" class="form-control"  name="nama_koleksi" value="{{isset($koleksi->nama_koleksi) ? $koleksi->nama_koleksi : old('nama_koleksi')}}"> 
                  </div>
                  <div class="form-group">
                    <label for="">No. Registrasi</label>
                    <input type="text" class="form-control"  name="no_registrasi" value="{{isset($koleksi->no_registrasi) ? $koleksi->no_registrasi : old('no_registrasi')}}"> 
                  </div>
                  <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file"placeholder="" name="gambar"> 
                  </div>
                  <div class="form-group">
                    <label for="">Asal Perolehan</label>
                    <input type="text" class="form-control" placeholder="" name="asal_perolehan" value="{{isset($koleksi->asal_perolehan) ? $koleksi->asal_perolehan : old('asal_perolehan')}}"> 
                  </div>
                  <div class="form-group">
                    <label for="">Tanggal Perolehan</label>
                    <input type="date" class="form-control" placeholder="" name="tanggal_perolehan" value="{{isset($koleksi->tanggal_perolehan) ? $koleksi->tanggal_perolehan : old('tanggal_perolehan')}}"> 
                  </div>
                  <div class="form-group">
                    <label for="">Tempat Pembuatan</label>
                    <input type="text" class="form-control" placeholder="" name="tempat_pembuatan" value="{{isset($koleksi->tempat_pembuatan) ? $koleksi->tempat_pembuatan : old('tempat_pembuatan')}}"> 
                  </div>
                  <div class="form-group">
                    <label for="">Tempat Penyimpanan</label>
                    <input type="text" class="form-control" placeholder="" name="tempat_penyimpanan" value="{{isset($koleksi->tempat_penyimpanan) ? $koleksi->tempat_penyimpanan : old('tempat_penyimpanan')}}"> 
                  </div>
                  <div class="form-group">
                    <label for="">Ukuran</label>
                    <div class="col-lg-12">
                      @if (isset($koleksi) && $koleksi->ukuran != null)
                        @php
                            $ukuran = json_decode($koleksi->ukuran, true);
                        @endphp    
                        @foreach ($ukuran as $key => $value)
                        <div class="row mt-2">
                          <div class="col-lg-4">
                              <input type="text" class="form-control" placeholder="Dimensi Ukuran. Cth: Panjang, Berat, Lebar" name="key_ukuran[]" value="{{$key}}"> 
                          </div>
                          <div class="col-lg-6">
                              <input type="text" class="form-control" placeholder="Nilai" name="value_ukuran[]" value="{{$value}}"> 
                          </div>
                          <div class="col-lg-2">
                              <a href="#" style="color: red;" class="btn-remove-row">Hapus</a>
                          </div>
                        </div>
                        @endforeach
                      @else 
                      @include('dashboard.koleksi.partials.row-ukuran')
                      @endif
                    </div>
                    <a title="Add New Row" href="#" class="btooltip btn mt-2 btn-add-row" style="background:#eee;" data-target="#template-row">
                      <i data-feather="plus"></i> Tambah Dimensi
                    </a>
                  </div>
                  <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" id="" class="form-control ckeditor" rows="5">{{isset($koleksi->deskripsi) ? $koleksi->deskripsi : ""}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Kurator</label>
                    <input type="text" class="form-control" placeholder="" name="kurator" value="{{isset($koleksi->kurator) ? $koleksi->kurator : old('kurator')}}"> 
                  </div>
                  <div class="form-group">
                    <label for="">Tanggal </label>
                    <input type="date" class="form-control" placeholder="" name="tanggal" value="{{$koleksi->tanggal ?? date("Y-m-d",strtotime(now()))}}"> 
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
  <template id="template-row">
    @include('dashboard.koleksi.partials.row-ukuran')
  </template>

@endsection
@section("linkfooter")
<script src="{{asset('asset_dashboard/plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('asset_dashboard/plugins/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">

$(document).ready(function () {
  $(document).on('click', ".btn-add-row", function(e){
      e.preventDefault();


      targetClone = $(this).closest('.form-group').find('.col-lg-12 .row:last-child');
      target = $(this).attr('data-target');
      cln = $(target).html();

      targetClone.after(cln);
      $(".bs-tooltip").tooltip();
  });

  $(document).on('click', '.btn-remove-row', function(e){
    e.preventDefault();
    if($(this).closest('.col-lg-12').find('.row').length > 1){
			$(this).tooltip('hide');
			$(this).closest('.row').remove();
		}
		else{
			$(this).closest('.row').find('input').val('');
			$(this).closest('.row').find('input:first').focus();
		}
  });
});
   
</script>
@endsection
