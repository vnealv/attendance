<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome to CD Attendance System</title>
        <link href="<?php echo "http://dinamik.aga.my/static/css/bootstrap.min.css"; ?>" rel="stylesheet">


    </head>
    <body>
        <?php
        $attributes = array('class' => 'form-horizontal', 'id' => 'myForm');
        echo form_open(site_url("attendance/login"), $attributes);
        ?>
        <div class="jumbotron">
            <div id="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">Welcome back <?php echo $user->user_full_name; ?> !</h2>
                            </div>
                            <div class="panel-body">
                                <input type="hidden" value="<?php echo $user->md5_id; ?>" name="id" />
                                
                                <?php if ($user->where == "Home") { ?>
                                    <input type="hidden" value="0" id="status" />
                                    <p>Have a good productive day!</p>
                                <?php } else { ?>
                                        <input type="hidden" value="1" id="status" />
                                        <p>Goodbye!</p>
                                <?php } ?>
                            </div>
                            <div class="panel-footer"><p><strong><?php echo date("r"); ?></strong></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        
        <script type="application/javascript">
        (function() {

    if($("#status").val() == 0){
         $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('index.php/api/login') ?>',
                    data: $('#myForm').serialize()+ '&check-in=1', 
                    success: function(response) { alert(response); },
                });
    } else{
        $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('index.php/api/login') ?>',
                    data: $('#myForm').serialize()+ '&check-out=1', 
                    success: function(response) { alert(response); },
                });
    }
            })();
            
        </script>
        <script type="text/javascript">
window.onbeforeunload = function () {
    return "You will be checked in if you refresh!";
};
        </script>
    </body>
</html>