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
            <a class="btn btn-warning" href="{{route('admin.koleksi.edit',encrypt($koleksi->no_koleksi))}}">Edit</a>
            <a class="btn btn-danger" href="#"
            data-koleksi_id="{{encrypt($koleksi->no_koleksi)}}">Hapus</a>
        </td>
    </tr>
    @endforeach
    @endif
</tbody>