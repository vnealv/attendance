<div id="content" class="form_v">
    <div class="outer">
        <div class="inner bg-light lter">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <?php
                    $attributes = array('class' => 'form-horizontal', 'id' => 'myform');

                    echo form_open('home/add', $attributes);
                    ?>
                    <fieldset>
                        <legend>Add Employee</legend>
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="button" id="add_b" onclick="add();" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                    </form>
                </div>
                <legend></legend>
            </div>
        </div>

        <hr>
    </div>

</div><!-- /.inner -->




</div><!-- /.outer -->

