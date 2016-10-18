<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>PBB.ORG.MY</title>

        <!--<link href="asset/css/signin.css" rel="stylesheet">-->
        <link href="<?php echo base_url('asset/css/bootstrap2.min.css'); ?>" rel="stylesheet">
        <!--<link href="asset/css/register.css" rel="stylesheet">-->
        <!--<link href="asset/css/ltr.css" rel="stylesheet">-->
        <link href="<?php echo base_url('asset/css/jasny-bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <!--<script src="asset/js/holder.js"></script>-->
        <!--<link href="asset/css/fv.css" rel="stylesheet" type="text/css"/>-->
        <link href="<?php echo base_url('asset/css/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('asset/css/select2.min.css'); ?>" rel="stylesheet" type="text/css"/>

        <style>
            .upper {
                text-transform: uppercase;
            }
            textarea {
                text-transform: uppercase;
            }
        </style>

    </head>
    <body>
        <div class="container">
            <?php
            if (!empty($message)) {
                echo '<div class="alert alert-dismissable alert-warning">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <p>' . $message . '</p>
            </div>';
            }
            echo "IC:", $ic;
            ?>
            <form class="form-horizontal" role="form" name="myForm" enctype="multipart/form-data" action="<?php echo base_url("submit"); ?>" method="post" onsubmit="return validate()" id="form">

                <fieldset>
                    <legend>
                        <div class="row">
                            <div class="col-lg-2 col-md-12 col-sm-12">
                                <P></P>
                                <img src="asset/pbb-logo.png" alt="PBB" style="width: 120px;">
                            </div>
                            <div class="col-lg-10 col-md-12 col-sm-12">
                                <p class="pull-left"><h2><b> PENDAFTARAN ONLINE </b></h2></p>
                                <p class="pull-left"><h3><b> PARTI PESAKA BUMIPUTERA BERSATU </b></h3></p>
                                <p class="pull-left"><h4> SARAWAK, MALAYSIA </h4></p>
                                <p class="pull-left"><h3><b> BORANG PERMOHONAN KEAHLIAN PBB </b></h3></p>
                                <p class="pull-left"><h4>Sila isi Borang Menggunakan Huruf Besar dan Tandakan yang Berkenaan Sahaja </h4></p>


                            </div>

                        </div>
                    </legend>

                    <div class="alert alert-dismissable alert-info">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <p><center>Setiap permohonan Online akan dicetak oleh Ibupejabat dan dihantar ke cawangan dan disemak oleh Jawatankuasa Ranting untuk mendapat kelulusan.</center></p>
                    </div>

                    <!--<div class="form-group well">-->
                    <input type="hidden" class="form-control" id="inputBaru" name="inputBaru" value="<?php echo $ic ?>">
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="well">
                            <div class="form-group">
                                <label for="inputName" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">*Nama</p></label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <input type="text" class="form-control upper" id="inputNama" name="inputNama" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCawangan" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Cawangan</p></label>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">N </span>
<!--                                        <input type="text" class="form-control upper" placeholder="" id="inputCawangan" name="inputCawangan">-->
                                        <select class="form-control sel" id="inputCawangan" name="inputCawangan"> 
                                        <option value="0">--Pilih Cawangan--</option>
                                        <?php foreach ($cawangan as $row): ?>
                                            <option value="<?php echo $row["dunid"] ?>"><?php echo $row["dunid"] ." ". $row["dun"] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    </div>
                                </div>

                                <label for="inputRanting" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left" style="margin-left: 60px;">Ranting</p></label>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <input type="text" class="form-control upper" id="inputRanting" name="inputRanting" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="max-width: 200px; max-height: 160px;">
                                <img src="asset/img/bg.png" alt="Image" >
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 160px;"></div>
                            <div>
                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file"  id="imageUpload"  name="imageUpload"></span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>

                    <!--                    </div>-->
                    <!--<div class="form-group">-->

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="well">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">*Tarikh Lahir</p></label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <!--                                    <div class="input-group">		-->
                                    <!--                                        <span class="input-group-addon">
                                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                                            </span>
                                                                            <input class="form-control datetimepick" type="text" name="inputTarikh" id="inputTarikh" data-date-format="YYYY-MM-DD">-->
                                    <span >
                                        <select id="day3" name="day"></select>
                                        <select id="month3" name="month"></select>
                                        <select id="year3" name="year"></select>
                                    </span>
                                    <!--</div>-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputTempatLahir" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Tempat Lahir</p></label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <input type="text" class="form-control upper" id="inputTempatLahir" name="inputTempatLahir" placeholder="Tempat Lahir">
                                </div>
                            </div>

                        </div>



                        <div class="well">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Jantina</label>
                                <div class="col-lg-10 col-md-10 col-sm-10">

                                    <label class="radio radio-inline">
                                        <input type="radio" name="janitaRadio" id="janitaRadio1" value="Lelaki">
                                        Lelaki
                                    </label>

                                    <label class="radio radio-inline">
                                        <input type="radio" name="janitaRadio" id="janitaRadio2" value="Perempuan">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="well">
                            <!--                            <div class="form-group">
                                                            <label for="inputBaruLama" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">No. Kad Pengenalan</p></label>
                                                            <div class="col-lg-10 col-md-10 col-sm-10">
                                                                <input type="text" class="form-control" id="inputBaru" name="inputBaru" placeholder="Baru">
                                                            </div>
                                                        </div>-->
                            <div class="form-group">
                                <label for="inputBaruLama" class="col-lg-2 col-md-2 col-sm-2 control-label">IC Lama</label>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <input type="text" class="form-control upper" id="inputLama" name="inputLama" placeholder="Lama">
                                </div>
                            </div>
                        </div>


                        <div class="well">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">*Alamat</label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <textarea class="form-control" rows="3" id="Kediaman" name="Kediaman" placeholder="*Kediaman/Rumah"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label"></label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <textarea class="form-control" rows="3" id="office" name="office" placeholder="Pejabat"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label"></label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <textarea class="form-control" rows="3" id="Surat" name="Surat" placeholder="Surat-Menyurat"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="well">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Agama</label>
                                <div class="col-lg-10 col-md-10 col-sm-10" id="agamadiv">

                                    <!--                                    <label class="radio radio-inline">-->
                                    <!--                                        <input type="radio" name="agamaRadio" id="agamaRadio1" >-->

                                    <select class="form-control sel" id="agamaSel" name="agamaselect"> 
                                        <option value="0">--Pilih Agama--</option>
                                        <?php foreach ($agama as $row): ?>
                                            <option value="<?php echo $row["religionid"] ?>"><?php echo $row["religion"] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <!--</label>-->
                                    <p class="help-block">Sila masukkan agama jika tiada didalam senarai.</p>

                                    <!--                                    <label class="radio radio-inline">
                                                                            <input type="radio"  id="agamaRadio2" name="agamaRadio" value="Kristian" >
                                                                            Kristian
                                                                        </label>-->
                                    <!--                                    <div class="form-group">
                                                                            <div class="radio col-md-3" style="margin-left: -98px;">
                                                                                                                            <label>
                                                                                                                                <input type="radio"  id="agamaRadio3" name="agamaRadio" value="Lain-Lain"> Lain-Lain 
                                                                                                                            </label>
                                                                            </div>
                                                                            <input type="text" class="form-control" id="inputLainLainAgama" name="inputLainLainAgama" placeholder="Nyatakan" style="width: 150px;">
                                                                        </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="well">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Bangsa</label>
                                <div class="col-lg-10 col-md-10 col-sm-10" id="bangsadiv">
                                    <!--
                                                                        <label class="radio radio-inline">
                                                                            <input type="radio"  id="bangsaRadio1" name="bangsaRadio" value="Melayu" >
                                                                            Melayu/Melanau
                                                                        </label>
                                    
                                    
                                                                        <label class="radio radio-inline">
                                                                            <input type="radio"  id="bangsaRadio2" name="bangsaRadio" value="Kedayan" >
                                                                            Kedayan
                                                                        </label>
                                    
                                                                        <label class="radio radio-inline">
                                                                            <input type="radio"  id="bangsaRadio3" name="bangsaRadio" value="Kayan" >
                                                                            Kayan
                                                                        </label>
                                    
                                    
                                    
                                                                        <label class="radio radio-inline">
                                                                            <input type="radio"  id="bangsaRadio4" name="bangsaRadio" value="Kenyah" >
                                                                            Kenyah
                                                                        </label>
                                    
                                                                        <label class="radio radio-inline">
                                                                            <input type="radio"  id="bangsaRadio5" name="bangsaRadio" value="Iban" >
                                                                            Iban
                                                                        </label>
                                    
                                    
                                    
                                                                        <label class="radio radio-inline">
                                                                            <input type="radio"  id="bangsaRadio6" name="bangsaRadio" value="Bidayuh" >
                                                                            Bidayuh
                                                                        </label>
                                    
                                                                        <label class="radio radio-inline">
                                                                            <input type="radio"  id="bangsaRadio7" name="bangsaRadio" value="Kelabit" >
                                                                            Kelabit
                                                                        </label>
                                    
                                    
                                    
                                                                        <label class="radio radio-inline">
                                                                            <input type="radio"  id="bangsaRadio8" name="bangsaRadio" value="LunBawang" >
                                                                            Lun Bawang
                                                                        </label>
                                    
                                                                        <div class="radio col-md-3" style="margin-left: -98px;">
                                                                                                                    <label>
                                                                                                                        <input type="radio"  id="bangsaRadio9" name="bangsaRadio" value="Lain-Lain" > Lain-Lain
                                                                                                                    </label>
                                                                        </div>
                                                                        <input type="text" class="form-control" id="inputLainLainBangsa" name="inputLainLainBangsa" placeholder="Nyatakan" style="width: 150px;">-->

                                    <select class="form-control sel" id="bangsaSel" name="bangsaselect"> 
                                        <option value="0">--Pilih Bangsa--</option>
                                        <?php foreach ($bangsa as $row): ?>
                                            <option value="<?php echo $row["kaumjpnid"] ?>"><?php echo $row["kaum"] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <p class="help-block">Sila masukkan bangsa jika tiada didalam senarai.</p>
                                </div>
                            </div>
                        </div>


                        <div class="well">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Pekerjaan</label>
                                <div class="col-lg-10 col-md-10 col-sm-10">

                                    <div class="radio">
                                        <label>
                                            <input type="radio"  id="pekerjanRadio1" name="pekerjanRadio" value="Kerajaan">
                                            Kerajaan
                                            <input type="text" class="form-control upper" id="inputKerajaan" name="inputKerajaan" placeholder="Nyatakan">
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio"  id="pekerjanRadio2" name="pekerjanRadio" value="Swasta">
                                            Swasta
                                            <input type="text" class="form-control upper" id="inputSwasta" name="inputSwasta" placeholder="Nyatakan">
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio"  id="pekerjanRadio3" name="pekerjanRadio" value="Sendiri">
                                            Sendiri
                                            <input type="text" class="form-control upper" id="inputSendiri" name="inputSendiri" placeholder="Nyatakan">
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio"  id="pekerjanRadio4" name="pekerjanRadio" value="Lain-Lain">
                                            Lain-Lain
                                            <input type="text" class="form-control upper" id="inputLainLainPekerjan" name="inputLainLainPekerjan" placeholder="Nyatakan">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="well">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">*Telefon</label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <input type="text" onkeypress="validatein(event)" class="form-control" id="inputRumah" name="inputRumah" placeholder="Rumah">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label"></label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <input type="text" onkeypress="validatein(event)" class="form-control" id="inputPejabat" name="inputPejabat" placeholder="Pejabat">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label"></label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <input type="text" onkeypress="validatein(event)" class="form-control" id="inputBimbit" name="inputBimbit" placeholder="*Bimbit">
                                </div>
                            </div>
                        </div>
                        <div class="well">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Email</label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">


                                </div>
                            </div>
                        </div>


                    </div>
                    <!--</div>-->
                    <div class="form-group inline" style="margin-left: 200px;">
                        <div class="col-lg-4 col-lg-offset-4 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary" value="Submit" name="submit" type="submit" id="submit">Hantar</button>
                            <button class="btn btn-danger" type="reset">Batal</button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>


        <!-- /Scripts -->
        <script src="<?php echo base_url('asset/js/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/moment.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/bootstrap-datetimepicker.js'); ?>"></script>

        <script src="<?php echo base_url('asset/js/jasny-bootstrap.min.js'); ?>" type="text/javascript"></script>

<!--    <script src="asset/js/multifield.js" type="text/javascript"></script>
    <script src="<?php echo base_url('asset/js/validator.js'); ?>" type="text/javascript"></script>-->
        <script src="<?php echo base_url('asset/js/bootstrap-datetimepicker.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('asset/js/jquery.maskedinput.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('asset/js/jquery.dateSelectBoxes.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('asset/js/select2.min.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('asset/js/myFunctions.js'); ?>" type="text/javascript"></script>


    </body>
</html>