<div id="content" class="members_list_v">
    <div class="outer">
        <div class="inner bg-light lter">

            <!--Begin Datatables-->
            <div class="row">
                <div class="col-lg-12">
                    <p></p>
                    <form class="form-horizontal" id="2">
                        <input hidden="hidden" value="<?php echo $base_url; ?>" id="base_url">
                        <div class="form-group">
                            <label class="control-label col-lg-2 pull-left">Select a Cawangan (DUN): </label>
                            <div class="col-lg-4">
                                <select class="form-control" id="dun_sel" name="dun_sel">
                                    <option value="0">0 Not Assigned</option>
                                        <?php foreach ($cawangan as $row): ?>
                                    <?php if ($dunid == $row["dunid"]){?>
                                            <option value="<?php echo $row["dunid"] ?>" selected="selected"><?php echo $row["dunid"] ." ". $row["dun"] ?></option>
                                    <?php } else{?>
                                            <option value="<?php echo $row["dunid"] ?>"><?php echo $row["dunid"] ." ". $row["dun"] ?></option>
                                    <?php }?>
                                        <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1>PBB Members</h1>

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
                                        <th>No Ahli</th>
                                        <th>Date Registered</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
foreach ($registered_people_list AS $row) {
    $span = "";
    $last_col = "";
    
    
    
    
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
    . '<td>' . $row["noahli"] . '</td>'
    . '<td>' . $row["date_entered"] . '</td>'
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