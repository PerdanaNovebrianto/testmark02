<!DOCTYPE html>
<html>
    <head>
        <title>Sertifikat Calon Pengantin</title>
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
            .background-gambar{
                height: 680px;
                width: auto;
                background-image: url("{{ asset('assets/image/sertifikat.png') }}");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center; 
            }
            .col-100{
                float: left;
                width: 100%;
            }
            .container {
                position: relative;
            }
            .text01 {
                position: absolute;
                top: 135px;
                left: 588px;
                font-size: 19px;
                font-weight: bold;
                padding: 3px;
                background-color: white;
                letter-spacing: 3px;
            }
            .text02 {
                position: absolute;
                top: 296px;
                left: 280px;
                font-size: 13px;
                font-weight: lighter;
                padding: 3px;
                background-color: white;
                letter-spacing: 2px;
            }
            .text03 {
                position: absolute;
                top: 347px;
                left: 380px;
                font-size: 13px;
                font-weight: lighter;
                padding: 3px;
                background-color: white;
                letter-spacing: 2px;
            }
            .text04 {
                position: absolute;
                top: 367px;
                left: 380px;
                font-size: 13px;
                font-weight: lighter;
                padding: 3px;
                background-color: white;
                letter-spacing: 2px;
            }
            .text05 {
                position: absolute;
                top: 387px;
                left: 380px;
                font-size: 13px;
                font-weight: lighter;
                padding: 3px;
                background-color: white;
                letter-spacing: 2px;
            }
            .text06 {
                position: absolute;
                top: 416px;
                left: 606px;
                font-size: 14px;
                font-weight: lighter;
                padding: 3px;
                background-color: white;
                letter-spacing: 2px;
            }
            .text07 {
                position: absolute;
                top: 460px;
                left: 698px;
                font-size: 14px;
                font-weight: lighter;
                padding: 5px;
                padding-right: 15px;
                background-color: white;
                letter-spacing: 2px;
            }
            .text08 {
                position: absolute;
                top: 540px;
                left: 650px;
                font-size: 14px;
                font-weight: lighter;
                padding: 3px;
                background-color: white;
                letter-spacing: 2px;
            }
        </style>
    </head>
    <body>
        <div class="row" style="margin-bottom: 3px;">
            <div class="col-100">
                <div class="background-gambar">
                    <div class="container">
                        <div class="text01">
                            <?php echo strtoupper($puskesmas->Puskesmas); ?>
                        </div>
                        <div class="text02">
                            <?php echo strtoupper($puskesmas->Puskesmas); ?>
                        </div>
                        <div class="text03">
                            <?php echo strtoupper($user->nama_pria); ?>
                        </div>
                        <div class="text04">
                            <?php 
                                $tanggal_lahir = explode('-', $user->tanggal_lahir_pria);
                                $tanggal_lahir = $tanggal_lahir[2].'-'.$tanggal_lahir[1].'-'.$tanggal_lahir[0];
                                echo $tanggal_lahir;
                            ?>
                        </div>
                        <div class="text05">
                            <?php echo strtoupper($user->desa).' / '.strtoupper($user->kecamatan); ?>
                        </div>
                        <div class="text06">
                            <?php 
                                $tanggal = explode(' ', $answer->created_at);
                                $tanggal = explode('-', $tanggal[0]);
                                $tanggal = $tanggal[2].'-'.$tanggal[1].'-'.$tanggal[0];
                                echo $tanggal;
                            ?>
                        </div>
                        <div class="text07">
                            <?php echo $tanggal; ?>
                        </div>
                        <div class="text08">
                            <?php echo $puskesmas->Kapus; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-100">
                <div class="background-gambar" style="height: 680px;">
                    <div class="container">
                        <div class="text01">
                            <?php echo strtoupper($puskesmas->Puskesmas); ?>
                        </div>
                        <div class="text02">
                            <?php echo strtoupper($puskesmas->Puskesmas); ?>
                        </div>
                        <div class="text03">
                            <?php echo strtoupper($user->nama_wanita); ?>
                        </div>
                        <div class="text04">
                            <?php 
                                $tanggal_lahir = explode('-', $user->tanggal_lahir_wanita);
                                $tanggal_lahir = $tanggal_lahir[2].'-'.$tanggal_lahir[1].'-'.$tanggal_lahir[0];
                                echo $tanggal_lahir;
                            ?>
                        </div>
                        <div class="text05">
                            <?php echo strtoupper($user->desa).' / '.strtoupper($user->kecamatan); ?>
                        </div>
                        <div class="text06">
                            <?php 
                                $tanggal = explode(' ', $answer->created_at);
                                $tanggal = explode('-', $tanggal[0]);
                                $tanggal = $tanggal[2].'-'.$tanggal[1].'-'.$tanggal[0];
                                echo $tanggal;
                            ?>
                        </div>
                        <div class="text07">
                            <?php echo $tanggal; ?>
                        </div>
                        <div class="text08">
                            <?php echo $puskesmas->Kapus; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>