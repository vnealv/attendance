<?php

require(APPPATH . '/libraries/REST_Controller.php');


class Api extends REST_Controller {

    private $username;
    private $userid;
    private $user_fullname;
    private $agensi;
    private $agensiid;
    private $locations;
    private $application;
    private $authentication;
    private $file_upload_error = array(
        0 => "There is no error, the file uploaded with success",
        1 => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
        2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
        3 => "The uploaded file was only partially uploaded",
        4 => "No file was uploaded",
        6 => "Missing a temporary folder"
    );

    function __construct() {
        // Construct our parent class
        parent::__construct();

        // Configure limits on our controller methods. Ensure
        // you have created the 'limits' table and enabled 'limits'
        // within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; //500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; //100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; //50 requests per hour per user/key


        $this->load->model('attendance_model');
        $this->load->helper('form');
    }
 
    //authentication & log--------------------------------------------------------------------------------------------------------------------------------------------

    

    //--------------------------------------------------------------------------------------------------------------------------------------------
    function test_get(){
        $this->response(array("success" => 1), 200);
    }
    function checkip_get() {
//        $this->load->view('info');
//        die();
        $this->response(array("server"=>$_SERVER), 200);
//        $ip = $_SERVER["HTTP_X_REAL_IP"];
//        if ((string) $ip == "121.121.12.73") {
//            echo "true";
//        } else {
//            echo "not";
//        }
    }

    function check_get() {
        $e = $this->get("e");
        $data['user'] = $this->attendance_model->get_user($e);

        $this->load->view('attendance_v', $data);
    }

    function login_post() {
        $checkin = $this->post('check-in');
        $id = $this->post('id');
//        a$ip = $this->post('o');
        $ip = "121.121.12.73";
        $user = $this->attendance_model->get_user($id);
        $data["user"] = $user;
        $checkout = $this->post('check-out');
//        $others = $this->post('others');
        $specify = $this->post('specify');
        $remarks = NULL;
//        die(var_dump($this->post()));
        if ((string) $ip == "121.121.12.73") {
            if ($checkin && !empty($user)) {
                if ($user->where == "Home" && $user->status == 0) {
                    $att = array(
                        "id" => md5($user->user_id . "Office" . date("Y-m-d")),
                        "timein" => date("H:i:s"),
                        "date" => date("Y-m-d"),
                        "from" => $user->where,
                        "to" => "Office",
                        "user_id" => $user->user_id,
                        "user_full_name" => $user->user_full_name,
                        "day" => date("l")
                    );

                    $check = $this->attendance_model->check_entry($att["id"]);
                    if ($check) {
                        $this->attendance_model->insert_ori("attendance", $att);
                        $this->attendance_model->update_others("users", array("status" => 1, "where" => "Office"), array("user_id" => $user->user_id));
                        echo "Check-In ";
                    }
                } elseif ($user->where != "Home" && $user->status == 0) {
                    $timeout = date("H:i:s");
                    $att = array(
                        'timeout' => $timeout
                    );
                    $date = date("Y-m-d");
                    if ((int) date("H") >= 0 && (int) date("H") < 6) {
                        $date = date("Y-m-d", strtotime("-1 days"));
                    }
                    $this->attendance_model->update_others("attendance", $att, array("id" => md5($user->user_id . $user->where . $user->counter . $date)));
                    $this->attendance_model->update_others("users", array("status" => 1, "where" => "Office", "counter" => ++$user->counter), array("user_id" => $user->user_id));
                } else {
                    die("Contact System Administrator!");
                }
                $data['where'] = "Office";
            } elseif (!empty($user) && $checkout) {
                $timeout = date("H:i:s");
                $att = array(
                    'timeout' => $timeout
                );
                $date = date("Y-m-d");
//                if ((int) date("H") >= 0 && (int) date("H") < 6) {
//                    $date = date("Y-m-d", strtotime("-1 days"));
//                }
//                die(md5($user->user_id . "Home" . $date));
                $this->attendance_model->update_others("attendance", $att, array("id" => md5($user->user_id . $user->where . $date)));
                $this->attendance_model->update_others("users", array("status" => 0, "where" => "Home", "counter" => ++$user->counter), array("user_id" => $user->user_id));
                $data['where'] = "Home";
                echo "Check-Out ";
            } elseif (!empty($user) && $specify) {
                $att = array(
                    "id" => md5($user->user_id . $specify . $user->counter . date("Y-m-d")),
                    "timein" => date("H:i:s"),
                    "date" => date("Y-m-d"),
                    "from" => $user->where,
                    "to" => $specify,
                    "remarks" => $remarks,
                    "user_id" => $user->user_id,
                    "user_full_name" => $user->user_full_name,
                    "day" => date("l")
                );
                $this->attendance_model->insert_ori("attendance", $att);
                $this->attendance_model->update_others("users", array("status" => 0, "where" => $specify), array("user_id" => $user->user_id));
                $data['where'] = $specify;
            }
//            $this->load->view('success_v', $data);
            echo 'DONE!';
        } else {
            $data["user"] = $user;
//            $this->load->view('fail_v', $data);
            echo 'FAIL! Try Again';
        }
    }

}

//(function() {
//$.ajax({
//        type: 'GET',
//                url: 'http://api.hostip.info/get_json.php',
//                success: function(response) { var t = JSON.parse(response);
//                        document.getElementById("ip").value = t.ip; },
//        });
//    if($("#check-out").length == 0){
//         $.ajax({
//                    type: 'POST',
//                    url: '<?php echo base_url('index.php/attendance/login') >',
//                    data: $('#myForm').serialize()+ '&check-in=1', 
//                    success: function(response) { alert(response); },
//                });
//    }
//            })();
//            $('#check-out').click(function(ev) {
//                ev.preventDefault();
//                var formData = $(this).closest('form').serializeArray();
//                formData.push({ name: this.name, value: this.value });
//                $.ajax({
//                    type: 'POST',
//                    url: '<?php echo base_url('index.php/attendance/login') >',
//                    data: formData, 
//                    success: function(response) { alert(response); },
//                });
//        });
//        $('#meeting').click(function(ev) {
//                ev.preventDefault();
//                var formData = $(this).closest('form').serializeArray();
//                formData.push({ name: this.name, value: this.value });
//                $.ajax({
//                    type: 'POST',
//                    url: '<?php echo base_url('index.php/attendance/login') >',
//                    data: formData, 
//                    success: function(response) { alert(response); },
//                });
//        });
//        $('#lunch').click(function(ev) {
//                ev.preventDefault();
//                var formData = $(this).closest('form').serializeArray();
//                formData.push({ name: this.name, value: this.value });
//                $.ajax({
//                    type: 'POST',
//                    url: '<?php echo base_url('index.php/attendance/login') >',
//                    data: formData, 
//                    success: function(response) { alert(response); },
//                });
//        });
//        $('#el').click(function(ev) {
//                ev.preventDefault();
//                var formData = $(this).closest('form').serializeArray();
//                formData.push({ name: this.name, value: this.value });
//                $.ajax({
//                    type: 'POST',
//                    url: '<?php echo base_url('index.php/attendance/login') >',
//                    data: formData, 
//                    success: function(response) { alert(response); },
//                });
//});