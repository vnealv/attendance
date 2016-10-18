<?php
//require(APPPATH . '/libraries/phpqrcode/qrlib.php');
//ini_set('display_errors', 1);
//        ini_set('display_startup_errors', 1);
//ob_start("callback");
//        $param = "test";
////        // here DB request or some processing 
//        $codeText = 'DEMO - ' . $param;
////
////        // end of processing here 
//        $debugLog = ob_get_contents();
//        ob_end_clean();
//
//        // outputs image directly into browser, as PNG stream 
//        QRcode::png($codeText);
//
//$tempDir = '/Users/neal/Sites/attendance/asset';
//
//        $codeContents = 'This Goes From File';
//
//        // we need to generate filename somehow,  
//        // with md5 or with database ID used to obtains $codeContents... 
//        $fileName = '005_file_' . md5($codeContents) . '.jpeg';
//
//        $pngAbsoluteFilePath = $tempDir . $fileName;
//        $urlRelativeFilePath = base_url("asset/") . $fileName;
//
//        // generating 
//        if (!file_exists($pngAbsoluteFilePath)) {
//            QRcode::jpg($codeContents, $pngAbsoluteFilePath);
//            echo 'File generated!';
//            echo '<hr />';
//        } else {
//            echo 'File already generated! We can use this cached file to speed up site on common codes!';
//            echo '<hr />';
//        }
//
//        echo 'Server PNG File: ' . $pngAbsoluteFilePath;
//        echo '<hr />';
//
//        // displaying 
//        echo '<img src="' . $urlRelativeFilePath . '" />';
?>
<div id="content" class="dashboard_v">
    <div class="outer">
        <div class="inner bg-light lter">
            <div class="row">
                <form class="form-horizontal" id="2">
                    <P></P>
                    <div class="col-lg-12 col-md-12 col-sm-12">

                    </div>
                    <div class="col-lg-8">
                        <p></p>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Select Time Frame: </label>
                            <div class="col-lg-4 col-md-10 col-sm-10">
                                <div class="input-group">		
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar icon-calendar"></i>
                                    </span>
                                    <input class="form-control datetimepick" type="text" name="date1" id="date1" data-date-format="YYYY-MM-DD HH:mm" value="<?php echo date("Y-m-d 06:00"); ?>">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-10 col-sm-10">
                                <div class="input-group">		
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar icon-calendar"></i>
                                    </span>
                                    <input class="form-control datetimepick" type="text" name="date2" id="date2" data-date-format="YYYY-MM-DD HH:mm" value="<?php echo date("Y-m-d 23:59"); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <p></p>
                        <input hidden="hidden" value="<?php echo base_url(); ?>" id="base_url">
                        <div class="form-group">
                            <label class="control-label col-lg-4 pull-left">Select Employee: </label>
                            <div class="col-lg-8">
                                <select class="form-control" id="emp_sel" name="emp_sel">
                                    <option value="0" selected="selected">-- ALL --</option>
                                    <?php foreach ($employees AS $emp) { ?>
                                        <option value="<?php echo $emp["user_id"]; ?>"><?php echo $emp["user_full_name"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <p></p>
                        <button class="btn btn-default btn-circle btn-sm" type="button" onclick=search();>
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <legend></legend>
            <div class="text-center">
                <ul class="stats_box">
                    <li>
                        <div class="sparkline bar_week"></div>
                        <div class="stat_text">
                            <strong><?php echo $total_staff; ?></strong> Total Employee
<!--                                        <span class="percent down"> <i class="fa fa-caret-down"></i> -16%</span> -->
                        </div>
                    </li>
                    <li>
                        <div class="sparkline line_day"></div>
                        <div class="stat_text">
                            <strong><?php echo $employees_workin; ?></strong> Total Employee Working Now
                            <!--<span class="percent up"> <i class="fa fa-caret-up"></i> +23%</span>--> 
                        </div>
                    </li>                  
                </ul>
            </div>
            <hr>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Current Location</th>
                            <th>Date</th>
                            <th>Day</th>
                            <th>From</th>
                            <th>Time Start</th>
                            <th>To</th>
                            <th>Time End</th>
                            <th>Duration</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($table_data AS $data) {
                            $duration = "-";
                            $class = "";
                            $time = "";
                            if ($data["timeout"] == "00:00:00") {
                                $data["timeout"] = "-";
                            } else {
                                $duration = (strtotime($data["timeout"]) - strtotime($data["timein"]));
                                $duration = gmdate("H:i:s", $duration);

                                sscanf($duration, "%d:%d:%d", $hours, $minutes, $seconds);

                                $time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;

                                if ($data["to"] == "Lunch" && $data["from"] == "Office") {
                                    if ($time_seconds > 3600) {
                                        $class = 'class="text-danger"';
                                        $time = "(" . substr(gmdate("H:i:s", ($time_seconds - 3600)), 0, 5) . ")";
                                    }
                                } elseif ($data["to"] == "Office" && $data["from"] == "Home") {
                                    if ($time_seconds < 28800) {
                                        $class = 'class="text-danger"';
                                        $time = "(" . substr(gmdate("H:i:s", (28800 - $time_seconds)), 0, 5) . ")";
                                    } elseif ($time_seconds > 28800) {
                                        $class = 'class="text-success"';
                                        $time = "(" . substr(gmdate("H:i:s", ($time_seconds - 28800)), 0, 5) . ")";
                                    }
                                }
                            }
                            ?>
                            <tr>
                                <th scope="row"><?php echo $count; ?></th>
                                <td><?php echo $data["user_full_name"]; ?></td>
                                <td><?php echo $data["where"]; ?></td>
                                <td><?php echo $data["date"]; ?></td>
                                <td><?php echo $data["day"]; ?></td>
                                <td><?php echo $data["from"]; ?></td>
                                <td><?php echo $data["timein"]; ?></td>
                                <td><?php echo $data["to"]; ?></td>
                                <td><?php echo $data["timeout"]; ?></td>
                                <td <?php echo $class; ?> ><?php echo substr($duration, 0, 5) . $time; ?></td>
                                <td><?php echo $data["remarks"]; ?></td>
                            </tr>
                            <?php
                            $count++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>

        </div><!-- /.inner -->



    </div><!-- /.outer -->
</div><!-- /#content -->
</div>