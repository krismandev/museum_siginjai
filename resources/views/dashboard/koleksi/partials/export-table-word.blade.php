<html>
    <head>
        <meta charset="utf-8">
    </head>
    {{-- <style>
        table, th, td {
            border: 1px solid;
        }
    </style> --}}
    <style>
        table {
        
        color: #232323;
        border-collapse: collapse;
        }

        table, th, td {
        border: 1px solid;
        padding: 8px 20px;
        }
    </style>
    <body>
        <br>
        <h3 style="align-content: center;">RE-INVENTARIS ETNOGRAFIKA</h3>
        <table style="color: #232323; border-collapse: collapse; border: 1px solid; padding: 8px 20px;">
                <tr>
                    <th style="border: 1px solid; padding: 8px 20px;">No. Inv</th>
                    <th style="border: 1px solid; padding: 8px 20px;">No. Reg</th>
                    <th style="border: 1px solid; padding: 8px 20px;">Nama Koleksi</th>
                    <th style="border: 1px solid; padding: 8px 20px;">Tahun Perolehan</th>
                    <th style="border: 1px solid; padding: 8px 20px;">Asal Perolehan</th>
                    <th style="border: 1px solid; padding: 8px 20px;">Ukuran</th>
                    <th style="border: 1px solid; padding: 8px 20px;">Tempat Penyimpanan</th>
                </tr>
                @foreach ($koleksis as $koleksi)
                    <tr>
                        <td style="border: 1px solid; padding: 8px 20px;">{{$koleksi->no_jenis}}.{{$koleksi->no_koleksi}}</td>
                        <td style="border: 1px solid; padding: 8px 20px;">{{$koleksi->no_registrasi}}</td>
                        <td style="border: 1px solid; padding: 8px 20px;">{{$koleksi->nama_koleksi}}</td>
                        <td style="border: 1px solid; padding: 8px 20px;">{{$koleksi->tanggal_perolehan}}</td>
                        <td style="border: 1px solid; padding: 8px 20px;">{{$koleksi->asal_perolehan}}</td>
                        <td style="border: 1px solid; padding: 8px 20px;">{{$koleksi->ukuran}}</td>
                        <td style="border: 1px solid; padding: 8px 20px;">{{$koleksi->tempat_penyimpanan}}</td>
                    </tr>
                @endforeach
            
        </table>
        {{-- <table>
            <tr>
              <th>Firstname</th>
              <th>Lastname</th>
            </tr>
            <tr>
              <td>Peter</td>
              <td>Griffin</td>
            </tr>
            <tr>
              <td>Lois</td>
              <td>Griffin</td>
            </tr>
          </table> --}}
    </body>
</html>