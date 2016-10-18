
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
        <meta name="msapplication-TileColor" content="#5bc0de" />
        <meta name="msapplication-TileImage" content="<?php echo base_url("asset/img/CD-new-logo.png"); ?>" />

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url("asset/css/bootstrap.min.css"); ?>">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url("asset/font-awesome/css/font-awesome.min.css"); ?>">

        <!-- Metis core stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url("asset/css/main.min.css"); ?>">
        <!--<link rel="stylesheet" href="asset/lib/animate.css/animate.min.css">-->
    </head>
    <body class="login">
        <?php if($message){
            echo '<div class="row">
                <div class="col-lg-8 col-lg-offset-2">
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <center><strong>Please Check your Username and Password</strong></center>
            </div>
            </div>
        </div>';
        }?>
        <div class="form-signin">
            <div class="text-center">
                <img src="<?php echo base_url("asset/img/CD-new-logo.png"); ?>" alt="CD Logo">
            </div>
            <hr>
            <div class="tab-content">
                <div id="login" class="tab-pane active">
                    <?php
                    $this->load->helper('form');
                    $attributes = array('class' => 'form-horizontal', 'id' => 'login_from', 'role' => "form", 'action' => base_url('login/submit'), "method" => "POST");

                    echo form_open('login/submit', $attributes);
                    ?>
                    <p class="text-muted text-center">
                        Enter your username and password
                    </p>
                    <input type="email" placeholder="Email" class="form-control top" name="email" value="">
                    <input type="password" placeholder="Password" class="form-control bottom" name="password" value="">
                    <button class="btn btn-lg btn-primary btn-block" type="submit" value="submit">Sign in</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <hr>
        </div>
        <script src="<?php echo base_url("asset/js/jquery.min.js"); ?>"></script>
        <script src="<?php echo base_url("asset//js/bootstrap.min.js"); ?>"></script>
    </body>
</html>
