<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PBB.ORG.MY</title>
        <!--<link href="asset/css/signin.css" rel="stylesheet">-->
        <link href="<?php echo base_url("asset/css/bootstrap2.min.css"); ?>" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            
            <form class="form-horizontal" role="form" name="myForm" enctype="multipart/form-data" action="<?php echo base_url("home/submit_check"); ?>" method="post" onsubmit="return validate()" id="form">
                <fieldset>
                    <legend>
                        <div class="row">
                            <div class="col-lg-2 col-md-12 col-sm-12">
                                <P></P>
                                <img src="<?php echo base_url("asset/pbb-logo.png"); ?>" alt="PBB" style="width: 120px;">
                            </div>
                            <div class="col-lg-10 col-md-12 col-sm-12">
                                <p class="pull-left"><h2><b> PENDAFTARAN ONLINE </b></h2></p>
                                <p class="pull-left"><h3><b> PARTI PESAKA BUMIPUTERA BERSATU </b></h3></p>
                                <p class="pull-left"><h4> SARAWAK, MALAYSIA </h4></p>
                                
                            </div>
                        </div>
                    </legend>
                    <?php
            if (!empty($message)) {
                echo '<div class="alert alert-dismissable alert-warning">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <p><center>' . $message . '</center></p>
            </div>';
            }
            ?>
                </fieldset>
            </form>
        </div>

        <!-- /Scripts -->
        <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
        <script src="<?php echo base_url('asset/js/moment.js');?>"></script>
        <script src="<?php echo base_url('asset/js/bootstrap.min.js');?>"></script>  
        <script src="<?php echo base_url('asset/js/jquery.maskedinput.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('asset/js/jquery.dateSelectBoxes.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('asset/js/myFunctionsCheck.js');?>" type="text/javascript"></script>
        <!--<script src="<?php echo base_url('asset/js/myFunctions.js'); ?>" type="text/javascript"></script>-->
    </body>
</html>