<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>PBB.ORG.MY</title>

        <!--<link href="asset/css/signin.css" rel="stylesheet">-->
        <link href="<?php echo base_url("asset/css/bootstrap2.min.css"); ?>" rel="stylesheet">
        <!--<link href="asset/css/register.css" rel="stylesheet">-->
        <!--<link href="asset/css/ltr.css" rel="stylesheet">-->
        <!--<link href="<?php echo base_url("asset/css/jasny-bootstrap.min.css"); ?>" rel="stylesheet" type="text/css"/>-->
        <!--<script src="asset/js/holder.js"></script>-->
        <!--<link href="asset/css/fv.css" rel="stylesheet" type="text/css"/>-->
        <!--<link href="<?php echo base_url("asset/css/bootstrap-datetimepicker.min.css"); ?>" rel="stylesheet" type="text/css"/>-->
        <style>
            .custom{
                font-size: larger
            }
        </style>

    </head>
    <body>
        <div class="container">

            <form class="form-horizontal" role="form" name="myForm" enctype="multipart/form-data" action="<?php echo base_url("submit"); ?>" method="post" onsubmit="return validate()" id="form">

                <fieldset>
                    <legend>
                        <div class="row">
                            <div class="col-lg-2 col-md-12 col-sm-12">
                                <p></p>
                                <img src="<?php echo base_url("asset/pbb-logo.png"); ?>" alt="PBB" style="width: 120px;">
                            </div>
                            <div class="col-lg-10 col-md-12 col-sm-12">
                                <p class="pull-left"><h2><b> PENDAFTARAN ONLINE </b></h2></p>
                                <p class="pull-left"><h3><b> PARTI PESAKA BUMIPUTRERA BERSATU </b></h3></p>
                                <p class="pull-left"><h4> SARAWAK, MALAYSIA </h4></p>
                                <p class="pull-left"><h3><b> BORANG PERMOHONAN KEAHLIAN PBB </b></h3></p>
                                <p class="pull-left"><h4>Sila isi Borang Menggunakan Huruf Besar dan Tandakan yang Berkenaan Sahaja </h4></p>


                            </div>

                        </div>
                    </legend>

                    <!--<div class="form-group well">-->
                    <?php
                    if (!empty($picture)) {

                        echo '<div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="well">
                            <div class="form-group">
                                <label for="inputName" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Nama: </p></label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <p class="custom">' . $nama . '</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCawangan" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Cawangan: </p></label>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">N </span>
                                        <p class="custom">' . $cawangan_dunid .' '. $cawangan_dun.'</p>
                                    </div>
                                </div>

                                <label for="inputRanting" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Ranting: </p></label>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="custom">' . $ranting . '</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        
                                <img src="' . base_url('uploads/' . $picture) . '" alt="Image" style="max-width: 200px; max-height: 160px;">
                            
                    </div>';
                    } else {
                        echo '<div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="well">
                            <div class="form-group">
                                <label for="inputName" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Nama: </p></label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <p class="custom">' . $nama . '</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCawangan" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Cawangan: </p></label>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">N </span>
                                        <p class="custom">' . $cawangan_dunid .' '. $cawangan_dun.'</p>
                                    </div>
                                </div>

                                <label for="inputRanting" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Ranting: </p></label>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="custom">' . $ranting . '</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                    }
                    ?>



                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="well">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Tarikh Lahir: </p></label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <p class="custom"><?php echo $tarikh; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputTempatLahir" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Tempat Lahir: </p></label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <p class="custom"><?php echo $tempat_lahir; ?></p>
                                </div>
                            </div>

                        </div>



                        <div class="well">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Janita: </label>
                                <div class="col-lg-10 col-md-10 col-sm-10">

                                    <p class="custom"><?php echo $jantina; ?></p>


                                </div>
                            </div>
                        </div>


                        <div class="well">
                            <div class="form-group">
                                <label for="inputBaruLama" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">No. Kad Pengenalan: </p></label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <p class="custom"><?php echo $ic_baru; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputBaruLama" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left"></p></label>
                                <div class="col-lg-10 col-md-10 col-sm-10">

                                    <p class="custom"><?php echo $ic_lama; ?></p>

                                </div>
                            </div>
                        </div>


                        <div class="well">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Alamat Rumah: </label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <p class="custom"><?php echo $alamat_rumah; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Alamat Pejabat: </label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <p class="custom"><?php echo $alamat_pejabat; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Alamat Surat: </label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <p class="custom"><?php echo $alamat_surat; ?></p>
                                </div>
                            </div>

                        </div>


                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="well">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Agama: </label>
                                <div class="col-lg-10 col-md-10 col-sm-10">

                                    <p class="custom"><?php echo $agama; ?></p>
                                    
                                </div>
                            </div>
                        </div>


                        <div class="well">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Bangsa: </label>
                                <div class="col-lg-10 col-md-10 col-sm-10">

                                    <p class="custom"><?php echo $bangsa; ?></p>
                                    
                                </div>
                            </div>
                        </div>


                        <div class="well">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Pekerjaan: </label>
                                <div class="col-lg-10 col-md-10 col-sm-10">

                                    <p class="custom"><?php echo $pekerjaan; ?></p>
                                    <p class="custom"><?php echo $pekerjaan_more; ?></p>
                                </div>
                            </div>
                        </div>



                        <div class="well">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Telefon Rumah: </label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <p class="custom"><?php echo $telefon_rumah; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Telefon Pejabat: </label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <p class="custom"><?php echo $telefon_pejabat; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Telefon Bimbit: </label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <p class="custom"><?php echo $telefon_bimbit; ?></p>
                                </div>
                            </div>

                        </div>


                        <div class="well">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Email: </label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <p class="custom"><?php echo $email; ?></p>


                                </div>
                            </div>
                        </div>


                    </div>
                    <!--</div>-->


                </fieldset>
            </form>
            <div class="row">
                <p class="pull-left">Created At: <?php echo $date_entered; ?></p>
            </div>
        </div>
    </body>

    <!-- /Scripts -->
<!--    <script src="<?php echo base_url("asset/js/jquery.js"); ?>"></script>
    <script src="<?php echo base_url("asset/js/moment.js"); ?>"></script>
    <script src="<?php echo base_url("asset/js/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("asset/js/bootstrap-datetimepicker.js"); ?>"></script>

    <script src="<?php echo base_url("asset/js/jasny-bootstrap.min.js"); ?>" type="text/javascript"></script>

    <script src="asset/js/multifield.js" type="text/javascript"></script>
    <script src="asset/js/validator.js" type="text/javascript"></script>
    <script src="<?php echo base_url("asset/js/bootstrap-datetimepicker.js"); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url("asset/js/jquery.maskedinput.min.js"); ?>" type="text/javascript"></script>

    

    <script src="<?php echo base_url("asset/js/myFunctions.js"); ?>" type="text/javascript"></script>-->


</body>
</html>