<div id="content" class="users_v">
    <div class="outer">
        <div class="inner bg-light lter">
            <div class="row">
                
            </div>
            <legend></legend>
            <div class="row">
                <div class="col-lg-6">
                    <p></p>
                </div>
                <div class="col-lg-6">
                    <p></p>

                </div>
            </div>
            <div class="text-center">
                <ul class="stats_box">
                    <li>
                        <div class="sparkline bar_week"></div>
                        <div class="stat_text">
                            <strong><?php echo count($total_staff); ?></strong> Total Staff
<!--                                        <span class="percent down"> <i class="fa fa-caret-down"></i> -16%</span> -->
                        </div>
                    </li>
                    <li>
                        <div class="sparkline line_day"></div>
                        <div class="stat_text">
                            <strong><?php echo count($total_in); ?></strong> Total In
                            <!--<span class="percent up"> <i class="fa fa-caret-up"></i> +23%</span>--> 
                        </div>
                    </li>
                    <li>
                        <div class="sparkline line_day"></div>
                        <div class="stat_text">
                            <strong><?php echo count($total_out); ?></strong> Total Out
                            <!--<span class="percent up"> <i class="fa fa-caret-up"></i> +23%</span>--> 
                        </div>
                    </li>

                </ul>
            </div>
            <hr>
            <form class="form-horizontal" id="3">
                <div class="text-center">
                    <div class="panel panel-success">
                        <div class='panel-heading'>
                            <h3 class="panel-title">IN</h3>
                        </div>
                        <div class='panel-body'>
                            <?php $count = 0; ?>
                            <?php foreach ($total_in AS $row) { ?>
                                <div class='well well-sm col-lg-3 clickable' id='in<?php echo $count; ?>' value='<?php echo $row['user_id']; ?>' data-toggle="modal" data-target="#in_modal_<?php echo $count; ?>">
                                    <p><strong><?php echo $row["user_full_name"]; ?></strong></p>
                                    <span class="label label-success"><?php echo $row["where"]; ?></span>
                                    <span class="label label-info"><?php echo $row["last_update"]; ?></span>
                                </div>
                                <div class='col-lg-1'></div>
                                <div class="modal fade" id="in_modal_<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Update Status</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <input type="hidden" id="id_<?php echo $count; ?>" value="<?php echo md5($row["user_id"] . "Office" . date("Y-m-d")); ?>"/>
                                                    <div class="form-group">
                                                        <label class="control-labe col-lg-4 text-right">Status: </label>
                                                        <div class="col-lg-6 col-md-10 col-sm-10">
                                                            <select class="form-control" id="status_<?php echo $count; ?>" name="status_<?php echo $count; ?>">
                                                                <option value="0">Select Status</option>
                                                                <option value="Out">Out(Home)</option>
                                                                <option value="Meeting">Meeting</option>
                                                                <option value="Lunch">Lunch/Dinner</option>
                                                                <option value="EL">Emergency Leave</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-2"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-4 text-right">At: </label>
                                                        <div class="col-lg-6 col-md-10 col-sm-10">
                                                            <div class="input-group">		
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar icon-calendar"></i>
                                                                </span>
                                                                <input class="form-control datetimepick" type="text" name="date_<?php echo $count; ?>" id="date_<?php echo $count; ?>" data-date-format="YYYY-MM-DD HH:mm:ss" value="<?php echo date("Y-m-d HH:ii:ss"); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-4">Remarks: </label>
                                                        <div class="col-lg-6 col-md-10 col-sm-10">
                                                            <input class="form-control" id="remarks_<?php echo $count; ?>" name="remarks_<?php echo $count; ?>" placeholder="Remarks" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="update_in(<?php echo $count . ", '" . $row["md5_id"] . "', '" . $row["where"] . "'"; ?>);">Save changes</button>
                                                <button type="button" class="btn btn-info" onclick="update_remarks(<?php echo $count . ", '" . $row["md5_id"] . "', '" . $row["where"] . "'"; ?>);">Update Remarks Only</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $count++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="text-center">
                    <div class="panel panel-danger">
                        <div class='panel-heading'>
                            <h3 class="panel-title">OUT</h3>
                        </div>
                        <div class='panel-body'>
                            <?php $count = 0; ?>
                            <?php foreach ($total_out AS $row) { ?>
                                <div class='well well-sm col-lg-3 clickable' id='out<?php echo $count; ?>' value='<?php echo $row['user_id']; ?>' data-toggle="modal" data-target="#out_modal_<?php echo $count; ?>">
                                    <p><strong><?php echo $row["user_full_name"]; ?></strong></p>
                                    <span class="label label-danger"><?php echo $row["where"]; ?></span>
                                    <span class="label label-info"><?php echo $row["last_update"]; ?></span>
                                </div>
                                <div class='col-lg-1'></div>
                                <div class="modal fade" id="out_modal_<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Update Status</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <input type="hidden" id="id_out_<?php echo $count; ?>" value="<?php echo md5($row["user_id"] . "Office" . date("Y-m-d")); ?>"/>
                                                    <div class="form-group">
                                                        <label class="control-labe col-lg-4 text-right">Status: </label>
                                                        <div class="col-lg-6 col-md-10 col-sm-10">
                                                            <select class="form-control" id="status_out_<?php echo $count; ?>" name="status_<?php echo $count; ?>">
                                                                <option value="0">Select Status</option>
                                                                <option value="Office">Office</option>
<!--                                                                <option value="Meeting">Meeting</option>
                                                                <option value="Lunch">Lunch/Dinner</option>
                                                                <option value="EL">Emergency Leave</option>-->
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-2"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-4 text-right">At: </label>
                                                        <div class="col-lg-6 col-md-10 col-sm-10">
                                                            <div class="input-group">		
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar icon-calendar"></i>
                                                                </span>
                                                                <input class="form-control datetimepick" type="text" name="date_out_<?php echo $count; ?>" id="date_out_<?php echo $count; ?>" data-date-format="YYYY-MM-DD HH:mm:ss" value="<?php echo date("Y-m-d HH:ii:ss"); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-lg-4">Remarks: </label>
                                                        <div class="col-lg-6 col-md-10 col-sm-10">
                                                            <input class="form-control" id="remarks_out_<?php echo $count; ?>" name="remarks_out_<?php echo $count; ?>" placeholder="Remarks" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="update_out(<?php echo $count . ", '" . $row["md5_id"] . "', '" . $row["where"] . "'"; ?>);">Save changes</button>
                                                <button type="button" class="btn btn-info" onclick="update_remarks_out(<?php echo $count . ", '" . $row["md5_id"] . "', '" . $row["where"] . "'"; ?>);">Update Remarks Only</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $count++;
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <hr>
            </form>
        </div>

    </div><!-- /.inner -->




</div><!-- /.outer -->

