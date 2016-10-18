</div><!-- /#wrap -->
<footer class="Footer bg-dark dker">
    <p>2015 &copy; AGA</p>
</footer><!-- /#footer -->


<!--jQuery -->
<script src="<?php echo base_url("asset/js/jquery.min.js"); ?>"></script>
<!--<script src="<?php echo base_url("asset/js/prism.min.js"); ?>"></script>-->

<!--Bootstrap -->
<script src="<?php echo base_url("asset/js/bootstrap.min.js"); ?>"></script>
<script src="<?php echo base_url("asset/js/moment.js"); ?>"></script>

<!-- MetisMenu -->
<script src="<?php echo base_url("asset/js/metisMenu.min.js"); ?>"></script>


<!-- Screenfull -->
<script src="<?php echo base_url("asset/js/screenfull.min.js"); ?>"></script>

<!-- Metis core scripts -->
<script src="<?php echo base_url("asset/js/core.min.js"); ?>"></script>

<!-- Metis demo scripts -->
        <script src="<?php echo base_url("asset/js/app.js"); ?>"></script>
<!--<script src="<?php echo base_url("asset/js/style-switcher.js"); ?>"></script>-->
<script src="<?php echo base_url("asset/js/jquery.cookie.js"); ?>"></script>
<script src="<?php echo base_url("asset/js/bootstrap-datetimepicker.min.js"); ?>"></script>

<!-- DASHBOARD -->
<?php echo ($this->uri->segment(2) == "dashboard" ? '<script src="'.base_url("asset/js/app.js").'"></script>' : '') ?>
<?php echo ($this->uri->segment(2) == "dashboard" ? '<script src="'.base_url("asset/js/jquery.sparkline.min.js").'"></script>' : '') ?>
<?php echo ($this->uri->segment(2) == "dashboard" ? '<script src="'.base_url("asset/js/prism.min.js").'"></script>' : '') ?>
<?php echo (true ? '<script src="'.base_url("asset/js/jquery.sparkline.min.js").'"></script>' : '') ?>
<?php echo (true ? '<script src="'.base_url("asset/js/prism.min.js").'"></script>' : '') ?>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>-->

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/highcharts-more.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<!-- REGISTERED LIST -->
<?php echo ($this->uri->segment(2) == "rigistered_list" || $this->uri->segment(2) == "pbb_members" ? '<script src="'.base_url("asset/js/jquery.notyfy.js").'"></script>' : '') ?>
<?php echo ($this->uri->segment(2) == "rigistered_list" || $this->uri->segment(2) == "pbb_members" ? '<script src="'.base_url("asset/js/jquery-ui.min.js").'"></script>' : '') ?>
<?php echo ($this->uri->segment(2) == "rigistered_list" || $this->uri->segment(2) == "pbb_members" ? '<script src="'.base_url("asset/js/spin.min.js").'"></script>' : '') ?>
<?php echo ($this->uri->segment(2) == "rigistered_list" || $this->uri->segment(2) == "pbb_members" ? '<script src="'.base_url("asset/js/jquery.dataTables.js").'"></script>' : '') ?>
<?php echo ($this->uri->segment(2) == "rigistered_list" || $this->uri->segment(2) == "pbb_members" ? '<script src="'.base_url("asset/js/dataTables.bootstrap.js").'"></script>' : '') ?>
<?php echo ($this->uri->segment(2) == "rigistered_list" || $this->uri->segment(2) == "pbb_members" ? '<script src="'.base_url("asset/js/jquery.tablesorter.min.js").'"></script>' : '') ?>
<?php echo ($this->uri->segment(2) == "rigistered_list" || $this->uri->segment(2) == "pbb_members" ? '<script src="'.base_url("asset/js/jquery.ui.touch-punch.min.js").'"></script>' : '') ?>



<script src="<?php echo base_url("asset/js/myFunctions_admin.js"); ?>"></script>
</body>