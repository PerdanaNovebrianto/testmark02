<!DOCTYPE html>
<html>
    <head>
        <title>Assesment Calon Pengantin</title>
        <style>
            *{
                box-sizzing: border-box;
            }
            body {
                height: 100%;
                width: 100%;
                font-family: "Helvetica";
            }
            .row:after{
                content: "";
                display: table;
                clear: both;
            }
            .col-100{
                float: left;
                width: 100%;
            }
            .col-70{
                float: left;
                width: 70%;
            }
            .col-30{
                float: left;
                width: 30%;
            }
            table{
                border-collapse: collapse;
                width: 100%;
            }
            th, td{
                border: 1px solid black;
            }
            th{
                text-align: center;
            }
            .pertanyaan{
                padding: 2px;
            }
            .profil td{
                border: none;
            }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="col-100">
                <div align="center">
                    <h3>CEKLIST SELF ASSESMENT</h3>
                    <h3>RESIKO KEHAMILAN PADA CALON PENGANTIN</h3>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-100">
                <table>
                    <tbody>
                        <tr class="profil">
                            <td style="width: 185px;">Nama Catin Laki-laki</td>
                            <td style="width: 15px;"> : </td>
                            <td>{{ $user->nama_pria }}</td>
                        </tr>
                        <tr class="profil">
                            <td style="width: 185px;">Nama Catin Perempuan</td>
                            <td style="width: 15px;"> : </td>
                            <td>{{ $user->nama_wanita }}</td>
                        </tr>
                        <tr class="profil">
                            <td style="width: 185px;">Alamat</td>
                            <td style="width: 15px;"> : </td>
                            <td>{{ $user->desa }}, {{ $user->kecamatan }}</td>
                        </tr>
                        <tr class="profil">
                            <td style="width: 185px;">Nomor HP</td>
                            <td style="width: 15px;"> : </td>
                            <td>{{ $user->no_hp }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-100">
                <table>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>JENIS FAKTOR RESIKO</th>
                            <th>JAWABAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($assesments as $assesment): ?>
                            <tr>
                                <td align="center"><?php echo $no; ?></td>
                                <td class="pertanyaan">{{ $assesment->pertanyaan }}</td>
                                <td align="center">{{ $assesment->jawaban }}</td>
                            </tr>
                        <?php $no++; ?>
                        <?php endforeach; ?>
                        <tr>
                            <td height="100" colspan="3" valign="top">Rekomendasi petugas kesehatan (diisi oleh petugas/konselor catin):</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-70">
            </div>
            <div class="col-30">
                <div align="center">
                    <p>KONSELOR CATIN</p>
                    <br>
                    <br>
                    <br>
                    <hr>
                </div>
            </div>
        </div>
    </body>
</html>