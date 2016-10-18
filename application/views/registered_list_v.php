<div id="content" class="registered_list_v">
    <div class="outer">
        <div class="inner bg-light lter">

            <!--Begin Datatables-->
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if ($type == 1) {
                        echo '<h1>Contact & Validate</h1>';
                    } else if ($type == 2) {
                        echo '<h1>Print & Mailing</h1>';
                    } else if ($type == 3) {
                        echo '<h1>Admin & Status</h1>';
                    } else if ($type == 4) {
                        echo '<h1>Confirmed Members</h1>';
                    }
                    ?>

                    <div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <p>Click on a row for more detailed view.</p>
                    </div>
                    <div class="box">
                        <header>
                            <div class="icons">
                                <i class="fa fa-table"></i>
                            </div>
                            <h5>Registration List</h5>
                        </header>
                        <div id="collapse4" class="body">
                            <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>IC</th>
                                        <th>Date of Birth</th>
                                        <th>Gender</th>
                                        <th>DUN</th>
                                        <th>Address</th>
                                        <th>Hand Phone</th>
                                        <th>Date Registered</th>
                                        <?php
                                           if ($type == 1) {
                                                echo '<th>Contacted</th>';
                                            } else if ($type == 2) {
                                                echo '<th>Printed</th>';
                                            } else if ($type == 3) {
                                                echo '<th>Status</th>';
                                            } else if ($type == 4) {
                                                echo '<th>Online</th>';
                                            } 
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
<?php
foreach ($registered_people_list AS $row) {
    $span = "";
    $last_col = "";
    if ($type == 1) {
        if($row["contacted"] == 0){
            $last_col = "N / N";
        }
        else if($row["contacted"] == 1){
            $last_col = "C / N";
        }
        else if($row["contacted"] == 2){
            $last_col = "C / C";
        }
    } else if ($type == 2) {
        if($row["printed"] == 0){
            $last_col = "N / N";
        }
        else if($row["printed"] == 1){
            $last_col = "P / N";
        }
        else if($row["printed"] == 2){
            $last_col = "P / S";
        }
    } else if ($type == 3) {
        if($row["status"] == 0){
            $last_col = "Not R";
        }
        else if($row["status"] == 1){
            $last_col = "R / P";
        }
        else if($row["status"] == 2){
            $last_col = "R / R";
        }
        else if($row["status"] == 3){
            $last_col = "R / C";
        }
    } else if ($type == 4) {
        if($row["online"] == 1){
            $last_col = "YES";
        }
        else if($row["online"] == 0){
            $last_col = "NO";
        }
    } 
    
    
    
    if ($last_login_v < $row['date_entered'] && $row["viewed"] != 1) {
        $span = '<span class="label label-danger" id="newSpan' . $row["id"] . '">New</span> ';
    }
    echo '<tr onclick="pdf(\'' . $row["id"] . '_' . str_replace(array(' ', "'"), array('', "\'"), strtolower($row["nama"])) . '\', ' . $row["id"] . ');"  class="poi">'
    . '<td>' . $span . " " . $row["nama"] . '</td>'
    . '<td>' . $row["ic_baru"] . '</td>'
    . '<td>' . $row["tarikh"] . '</td>'
    . '<td>' . $row["jantina"] . '</td>'
    . '<td>' . $row["cawangan_dunid"] . " " . $row["cawangan_dun"] . '</td>'
    . '<td>' . $row["alamat_rumah"] . '</td>'
    . '<td>' . $row["telefon_bimbit"] . '</td>'
    . '<td>' . $row["date_entered"] . '</td>'
    . '<td>' . $last_col . '</td>'
    . '</tr>';
}
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->

            <!--End Datatables-->
            <div class="row" id="row2">

                <!-- .col-lg-6 -->
                <div class="col-lg-12" id="row2div">
                    <div class="box">
                        <header>
                            <div class="icons">
                                <i class="fa fa-th-large"></i>
                            </div>
                            <h5>Form</h5>

                            <!-- .toolbar -->
                            <div class="toolbar">
                                <nav style="padding: 8px;">
                                    <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                                        <i class="fa fa-times"></i>
                                    </a> 
                                </nav>
                            </div><!-- /.toolbar -->
                        </header>
                        <div class="body" id="formBox">

                        </div>
                    </div>

                </div><!-- /.col-lg-6 -->

                <div class="col-lg-12" id="row2div2">
                    <div class="box">
                        <header>
                            <div class="icons">
                                <i class="fa fa-th-large"></i>
                            </div>
                            <h5>Action</h5>

                            <!-- .toolbar -->
                            <div class="toolbar">
                                <nav style="padding: 8px;">
                                    <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                                        <i class="fa fa-times"></i>
                                    </a> 
                                </nav>
                            </div><!-- /.toolbar -->
                        </header>
                        <div class="body">
                            <form class="form-horizontal">
                                <input type="hidden" value="<?php echo $type; ?>" id="type">
                                <!--                                <div class="form-group">
                                                                    <label class="control-label col-lg-2 pull-left">Assign To: </label>
                                                                    <div class="col-lg-9 col-lg-offset-1">
                                                                        <select class="form-control" id="assign_to">
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option>5</option>
                                                                        </select>
                                                                    </div>
                                                                </div>-->

                                <?php
                                if ($type == 1) {
                                    echo '<div class="form-group">
                                    <label class="control-label col-lg-2 pull-left">Contacted: </label>
                                    <div class="col-lg-9 col-lg-offset-1">
                                        <select class="form-control" id="contacted" name="contacted">
                                            <option value="0">Not Contacted / Not Confirmed</option>
                                            <option value="1">Contacted / Not Confirmed</option>
                                            <option value="2">Contacted / Confirmed</option>
                                        </select>
                                    </div>
                                </div>';
                                } else if ($type == 2) {
                                    echo '<div class="form-group">
                                    <label class="control-label col-lg-2 pull-left">Printed: </label>
                                    <div class="col-lg-9 col-lg-offset-1">
                                        <select class="form-control" id="printed" name="printed">
                                            <option value="0">Not Printed / Not Sent</option>
                                            <option value="1">Printed / Not Sent</option>
                                            <option value="2">Printed / Sent</option>
                                        </select>
                                    </div>
                                </div>';
                                } else if ($type == 3) {
                                    echo '<div class="form-group">
                                    <label class="control-label col-lg-2 pull-left">Status: </label>
                                    <div class="col-lg-9 col-lg-offset-1">
                                        <select class="form-control" id="status" name="status">
                                            <option value="0">Not Received</option>
                                            <option value="1">Received / Pending</option>
                                            <option value="2">Received / Rejected</option>
                                            <option value="3">Received / Confirmed</option>
                                        </select>
                                    </div>
                                </div>';
                                } else if ($type == 4) {
                                    echo '';
                                }
                                ?>
<!--                                <div class="form-group">
                                    <label class="control-label col-lg-2 pull-left">Contacted: </label>
                                    <div class="col-lg-9 col-lg-offset-1">
                                        <select class="form-control" id="contacted">
                                            <option value="Pending">Pending</option>
                                            <option value="By Phone">By Phone</option>
                                            <option value="By Email">By Email</option>
                                            <option value="By Visit">By Visit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2 pull-left">Response: </label>
                                    <div class="col-lg-9 col-lg-offset-1">
                                        <select class="form-control" id="response">
                                            <option value="Not Contacted">Not Contacted</option>
                                            <option value="Confirmed">Confirmed</option>
                                            <option value="Not Interested">Not Interested</option>
                                            <option value="No Answer">No Answer</option>
                                            <option value="Invalid Contact">Invalid Contact</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2 pull-left">Status: </label>
                                    <div class="col-lg-9 col-lg-offset-1">
                                        <select class="form-control" id="status">
                                            <option value="Application Pending">Application Pending</option>
                                            <option value="PBB Confirmed Member">PBB Confirmed Member</option>
                                        </select>
                                    </div>-->
                                    <input type="hidden" id="option_id" value="0"/>
                                <!--</div>-->
                                <div class="row">
                                    <div class="col-lg-4 pull-right" id="buttondiv">
                                        <button type="button" class="btn btn-primary pull-right"  name="submit_options" id="submit_options" onclick="option_submit()">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.col-lg-6 -->

            </div>
        </div><!-- /.inner -->
    </div><!-- /.outer -->
</div><!-- /#content -->