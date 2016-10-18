<div id="content" class="dashboard_v">
    <div class="outer">
        <div class="inner bg-light lter">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <legend><h2>Employees Panel</h2></legend>
                </div>
            </div>
            <div class="row">
                
            </div>
            
            

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Current Location</th>
                            <th>Last Update</th>
                            <th>Email</th>
                            <th>organization</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; foreach ($list AS $data) { 
//                            $duration = "-";
//                            if($data["timeout"] == "00:00:00"){
//                                $data["timeout"] = "-";
//                            }
//                            else{
//                              $duration = (strtotime($data["timeout"]) - strtotime($data["timein"]));
//                              $duration = gmdate("H:i:s", $duration);
//                            }
                            ?>
                            <tr id="<?php echo $data["user_id"] ?>">
                                <th scope="row"><?php echo $count; ?></th>
                                <td><?php echo $data["user_full_name"]; ?></td>
                                <td><?php echo $data["where"]; ?></td>
                                <td><?php echo $data["last_update"]; ?></td>
                                <td><?php echo $data["user_email"]; ?></td>
                                <td><?php echo $data["organization"]; ?></td>
                                <td><button class="btn btn-danger btn-sm" onclick="delete_emp(<?php echo $data["user_id"] ?>, '<?php echo $data["md5_id"] ?>');" type="button"><i class="glyphicon glyphicon-remove"> Delete</i></button>
</td>
                            </tr>
                        <?php $count++; } ?>

                    </tbody>
                </table>
            </div>

        </div><!-- /.inner -->



    </div><!-- /.outer -->
</div><!-- /#content -->
