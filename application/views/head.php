<!doctype html>
<html class=" no-js">
    <head>
        <meta charset="UTF-8">
        <title>CD HR Panel</title>

        <!--IE Compatibility modes-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!--Mobile first-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url("asset/css/bootstrap.min.css"); ?>">

        <!-- Font Awesome -->

        <link href="<?php echo base_url("asset/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css"/>

        <!-- Metis core stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url("asset/css/main.min.css"); ?>">

        <!-- metisMenu stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url("asset/css/metisMenu.min.css"); ?>">
        
        <link href="<?php echo base_url("asset/css/bootstrap-datetimepicker.min.css"); ?>" rel="stylesheet">
        <?php echo ($this->uri->segment(2) == "dashboard" ? '<link rel="stylesheet" href="'.base_url("asset/css/prism.min.css").'">' : '') ?>
        
        
        <?php echo ($this->uri->segment(2) == "rigistered_list" || $this->uri->segment(2) == "pbb_members" ? '<link rel="stylesheet" href="'.base_url("asset/css/dataTables.bootstrap.css").'">' : '') ?>
        <?php echo ($this->uri->segment(2) == "rigistered_list" || $this->uri->segment(2) == "pbb_members" ? '<link rel="stylesheet" href="'.base_url("asset/css/jquery.notyfy.css").'">' : '') ?>
        <?php echo ($this->uri->segment(2) == "rigistered_list" || $this->uri->segment(2) == "pbb_members" ? '<link rel="stylesheet" href="'.base_url("asset/css/default.css").'">' : '') ?>
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

        <!--[if lt IE 9]>
          <script src="asset/lib/html5shiv/html5shiv.js"></script>
          <script src="asset/lib/respond/respond.min.js"></script>
          <![endif]-->

        <!--For Development Only. Not required -->
<!--        <script>
            less = {
                env: "development",
                relativeUrls: false,
                rootpath: "../asset/"
            };
        </script>
        --><link rel="stylesheet" href="<?php echo base_url("asset/css/style-switcher.css"); ?>"> 
        <link rel="stylesheet/less" type="text/css" href="<?php echo base_url("asset/less/theme.less"); ?>">
        <script src="<?php echo base_url("asset/js/less.min.js"); ?>"></script>

        <!--Modernizr-->
        <script src="<?php echo base_url("asset/js/modernizr.min.js"); ?>"></script>
        <!-- Style -->
        <link rel="stylesheet" href="<?php echo base_url("asset/css/style.css"); ?>">
    </head>
    <body id="body" class="  " style="background-image: url('<?php echo base_url('asset/img/pattern/arches.png'); ?>'); background-repeat: repeat; padding-top: 54px;">
        <div class="bg-dark dk" id="wrap">
            <div id="top">

                <!-- .navbar -->
                <nav class="navbar navbar-inverse navbar-fixed-top">
                    <div class="container-fluid">

                        <!-- Brand and toggle get grouped for better mobile display -->
                        <header class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <span class="sr-only">Toggle navigation</span> 
                                <span class="icon-bar"></span> 
                                <span class="icon-bar"></span> 
                                <span class="icon-bar"></span> 
                            </button>
                            <a href="<?php echo base_url(); ?>" class="navbar-brand">
                                <img src="<?php echo base_url("asset/img/CD-new-logo.png"); ?>" alt="" height="50px" width="80px">
                            </a> 
                        </header>
                        <div class="topnav">
                            <div class="btn-group">
                                <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip" class="btn btn-default btn-sm" id="toggleFullScreen">
                                    <i class="glyphicon glyphicon-fullscreen"></i>
                                </a> 
                            </div>
                            <div class="btn-group">
                                <a data-placement="bottom" data-original-title="Notifications" data-toggle="tooltip" class="btn btn-default btn-sm">
                                    <i class="fa fa-flag"></i>
                                    <!-- The total number of new entries since last login of the user $numberOfEnries -->
                                    <span class="label label-warning"><?php //echo $notification ?>0</span> 
                                </a>                             
                                <!--                                <a data-toggle="modal" data-original-title="Help" data-placement="bottom" class="btn btn-default btn-sm" href="#helpModal">
                                                                    <i class="fa fa-question"></i>
                                                                </a> -->
                            </div>
                            <div class="btn-group">
                                <a href="<?php echo base_url("login/do_logout"); ?>" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                                    <i class="fa fa-power-off"></i>
                                </a> 
                            </div>
                            <div class="btn-group">
                                <a data-placement="bottom" data-original-title="Show / Hide Left" data-toggle="tooltip" class="btn btn-primary btn-sm toggle-left" id="menu-toggle">
                                    <i class="fa fa-bars"></i>
                                </a> 
<!--                                <a data-placement="bottom" data-original-title="Show / Hide Right" data-toggle="tooltip" class="btn btn-default btn-sm toggle-right"> <span class="glyphicon glyphicon-comment"></span>  </a> -->
                            </div>
                        </div>
                        <div class="collapse navbar-collapse navbar-ex1-collapse">

                            <!-- .nav -->
                            <ul class="nav navbar-nav">
                                <li> <a href="<?php echo base_url(); ?>">Home</a>  </li>
                                <!-- For admin user only -->
                                <!--<li> <a href="<?php echo base_url("users"); ?>">Users</a>  </li>-->
                            </ul><!-- /.nav -->
                        </div>
                    </div><!-- /.container-fluid -->
                </nav><!-- /.navbar -->
                <header class="head">
                    <div class="main-bar">
                        <h3>
                            <i class="fa fa-edit"></i>&nbsp; CD HR Panel</h3>
                    </div><!-- /.main-bar -->
                </header><!-- /.head -->
            </div><!-- /#top -->
            <input type="hidden" value='<?php echo base_url("adminc/"); ?>' id="url">