<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PBB.ORG.MY</title>
        <!--<link href="asset/css/signin.css" rel="stylesheet">-->
        <link href="asset/css/bootstrap2.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">

            <form class="form-horizontal" role="form" name="myForm" enctype="multipart/form-data" action="<?php echo base_url("home/submit_check"); ?>" method="post" onsubmit="return validate()" id="form">
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
                    <?php
                    if (!empty($message)) {
                        echo '<div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <p><center>' . $message . '</center></p>
            </div>';
                    }
                    ?>
                    <div class="well col-lg-8 col-lg-offset-2 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="inputBaruLama" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">No. Kad Pengenalan</p></label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <input type="text" class="form-control" id="inputBaru" name="inputBaru" placeholder="Baru">
                            </div>
                        </div>
                    </div>

                    

                    <!--</div>-->
                    <div class="form-group inline col-lg-12 col-md-12 col-sm-12">
                        <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12">
                            <center>
                                <button type="submit" class="btn btn-primary" value="Submit" name="submit" type="submit" id="submit">Hantar</button>
                                <button class="btn btn-danger" type="reset">Batal</button>
                            </center>
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12">
                        <!--<p class="lead"></p><p> En Petrus Igat Mathias (Ibupejabat PBB) di: +082 448298/448299</p><p>atau email keahlian@pbb.org.my</p>-->
                        <address>
                            <strong>Ibupejabat PBB didalam proses mengemaskini maklumat, sekiranya berlaku percanggahan maklumat sila hubungi:</strong><br><br>
                            En. Awang Bujang B. Awang Antek, En. Buang B. Haji Bolhassan atau En. Petrus Igat Mathias (Ibupejabat PBB)<br>
       
                            <abbr title="Phone">Tel. :</abbr> +082 448298 / 448299<br>
                            <a href="mailto:#">keahlian@pbb.org.my</a>
                        </address>
                    </div>
                </fieldset>
            </form>
        </div>

        <!-- /Scripts -->
        <script src="<?php echo base_url('asset/js/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/moment.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/bootstrap.min.js'); ?>"></script>  
        <script src="<?php echo base_url('asset/js/jquery.maskedinput.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('asset/js/jquery.dateSelectBoxes.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('asset/js/myFunctionsCheck.js'); ?>" type="text/javascript"></script>
        <!--<script src="<?php echo base_url('asset/js/myFunctions.js'); ?>" type="text/javascript"></script>-->
    </body>
</html>