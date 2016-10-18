<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set("Asia/Kuala_Lumpur");
require(APPPATH . '/libraries/phpqrcode/qrlib.php');

//require(APPPATH . '/libraries/phpqrcode/qrconfig.php');

class Home extends CI_Controller {

    var $data = array();
    var $userid;

    public function __construct() {
        parent::__construct();
        $this->load->model('attendance_model');
        $this->check_loggedin();
    }

    private function check_loggedin() {
//        echo 'QQQQ';
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        $this->userid = $this->session->userdata('id');
    }

    public function index() {
        $data['user'] = $this->session->userdata('user_full_name');
        $this->load->view('head', $data);
        $this->load->view('leftSidebar', $data);


        $this->load->view('foot', $data);
    }

    public function check() {

        $tempDir = '/Users/neal/Sites/attendance/asset';

        $codeContents = 'This Goes From File';

        // we need to generate filename somehow,  
        // with md5 or with database ID used to obtains $codeContents... 
        $fileName = '005_file_' . md5($codeContents) . '.jpeg';

        $pngAbsoluteFilePath = $tempDir . $fileName;
        $urlRelativeFilePath = base_url("asset/") . $fileName;

        // generating 
        if (!file_exists($pngAbsoluteFilePath)) {
            QRcode::jpg($codeContents, $pngAbsoluteFilePath);
            echo 'File generated!';
            echo '<hr />';
        } else {
            echo 'File already generated! We can use this cached file to speed up site on common codes!';
            echo '<hr />';
        }

        echo 'Server PNG File: ' . $pngAbsoluteFilePath;
        echo '<hr />';

        // displaying 
        echo '<img src="' . $urlRelativeFilePath . '" />';
    }

    public function dashboard() {

        $org = $this->input->get('org');
        $date1 = $this->input->get('date1') . ":00";
        $date2 = $this->input->get('date2') . ":00";
        $employee = $this->input->get('employee');
        if ($date1 == ":00") {
//            $date1 = "2015-01-01 00:00:00";
            $date1 = date("Y-m-d 00:00:00");
        }
        if ($date2 == ":00") {
            $date2 = date("Y-m-d H:i:s");
        }
        $employees = $this->attendance_model->total_staff(3, $org);
        $data['employees_workin'] = count($this->attendance_model->total_staff(1, $org));
        $data['total_staff'] = count($employees);
        $data['employees'] = $employees;


        $data['table_data'] = $this->attendance_model->table_data($org, $date1, $date2, $employee);
        $data['user'] = $this->session->userdata('user_full_name');

        $this->load->view('head', $data);
        $this->load->view('leftSidebar', $data);
        $this->load->view('dashboard_v', $data);

        $this->load->view('foot', $data);
    }

    public function view() {
        $org = $this->input->get('org');

        $data["total_staff"] = $this->attendance_model->total_staff(3, $org);
        $data["total_in"] = $this->attendance_model->total_staff(1, $org);
        $data["total_out"] = $this->attendance_model->total_staff(0, $org);
        $data['user'] = $this->session->userdata('user_full_name');

        $this->load->view('head', $data);
        $this->load->view('leftSidebar', $data);
        $this->load->view('users_v', $data);

        $this->load->view('foot', $data);
    }

    public function panel() {
//        $this->load->helper('form');
        $org = $this->input->get('org');
        $data['list'] = $this->attendance_model->total_staff(3, $org);
        $data['user'] = $this->session->userdata('user_full_name');

        $this->load->view('head', $data);
        $this->load->view('leftSidebar', $data);
        $this->load->view('panel_v', $data);
        $this->load->view('foot', $data);
    }

    public function form() {
        $this->load->helper('form');


        $data['user'] = $this->session->userdata('user_full_name');

        $this->load->view('head', $data);
        $this->load->view('leftSidebar', $data);
        $this->load->view('form', $data);
        $this->load->view('foot', $data);
    }

    public function add() {
        $name = $this->input->post('name');
        $email = $this->input->post('email');


        if (!empty($name) && !empty($email)) {
            $check = $this->attendance_model->total_staff(3, 'ALL', $email);
            if (count($check) > 0) {
                echo 'This Employee Already exists!';
            } else {
                $fields = array(
                    "user_full_name" => $name,
                    "user_email" => $email
                );
                $id = $this->attendance_model->insert($fields);
                $this->attendance_model->update($id, array('md5_id' => md5($id . $name . $email)));


                $tempDir = '/home/attconsid/public_html/qrcodes/';
//                $tempDir = '/Applications/MAMP/htdocs/attendance/qrcodes/';

                // we building raw data 
                $codeContents = 'http://attendance.considerdigital.com/api/check?e=' . md5($id . $name . $email);
                //me = ec68ac6faaff4c5e5b9beebbde96c02e
                // we need to generate filename somehow,  
                // with md5 or with database ID used to obtains $codeContents... 
                $fileName = md5($id . $name . $email) . '.png';

                $pngAbsoluteFilePath = $tempDir . $fileName;
                $urlRelativeFilePath = base_url("qrcodes/" . $fileName);

// generating 
                if (!file_exists($pngAbsoluteFilePath)) {
                    QRcode::png($codeContents, $pngAbsoluteFilePath);
//                    echo 'File generated! QR code could not be generated. Contact Admin';
                }

                // displaying 
//                echo '<img src="' . $urlRelativeFilePath . '" />';



                $body = '<p>Dear ' . $name . ',</p><p>Welcome to Consider Digital!</p><p>This email has been send to inform you that, you will have to scan your unique QR code based on the instructions below.</p><p>You may use any QR code scanner, as long as the device is connected to "..." WiFi network</p>'
                        . '<p>Also there will be a designated tablet where you can use it for scanning purposes.</p>'
                        . '             <p>You have to scan and update the system, whenever you are:<p>'
                        . '             <ol>'
                        . '<li>Coming to office.</li>'
                        . '<li>Leaving office.</li>'
                        . '</ol>'
                        . '<p></p>'
                        . '<p>Kindly find your unique QR Code and steps to use below:</p>'
                        . '<p>To check-in:</p>'
                        . '<ol>'
                        . '<li>Make sure your device is connected to the specified WiFi network</li>'
                        . '<li>Open the QR code scanner application, you have installed or use the tablet provided. (you can use any free QR scanner just search in your application store for "QR Scanner", and then install it)</li>'
                        . '<li>"Scan" your unique QR code</li>'
                        . '<li>Once you scan your code, "open the link" that will appear to you</li>'
                        . '<li>You will be redirected to your phone browser</li>'
                        . '<li>A pop up message will appear on your browser saying "DONE!", which means that you updated your status.</li>'
                        . '</ol>'
                        . '<p></p>'
                        . '<p>Your unique QR Code: </p><img src="' . $urlRelativeFilePath . '" />'
                        . '<p>For further inquiries please contat HR Department.</p>'
                        . '<p></p>'
                        . '<p>Your kind cooperation is preceded with many thanks.</p>'
                        . '<p>Best Regards,</p>'
                        . '<p>Consider Digital Management.</p>';


                $this->load->library('My_PHPMailer');

                $mail = new PHPMailer(); // create a new object
                $mail->IsSMTP(); // enable SMTP
                $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true; // authentication enabled
                $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465; // or 587
                $mail->IsHTML(true);
                $mail->Username = "nael@considerdigital.com";
                $mail->Password = "";
                $mail->SetFrom("nael@considerdigital.com");
                $mail->Subject = "Attendance";
                $mail->Body = $body;
                $mail->AddAddress($email);
                $mail->SMTPDebug = 0;

                /*
                 * SMTP = 202.171.45.237
                  smtp_port = 25
                  username = admin@agagroup.my
                  password = @g@gr0up@dmin
                  sendmail_from = admin@agagroup.my
                 */






                if (!$mail->Send()) {
//                    echo "Mailer Error: " . $mail->ErrorInfo;
                    echo 'Something went wrong, Please contact Admin.';
                } else {
                     echo 'An auto-generated email will be sent to the new employee!';
                }

//                if ($this->email->send()) {
//                    echo 'An auto-generated email will be sent to the new employee!';
//                } else {
//                    echo 'Something went wrong, Please contact Admin.';
//                }
            }
        }
    }

    public function email() {
//        $this->load->library('email');
        $this->load->library('My_PHPMailer');
        echo "<pre>";

        $mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "nael@considerdigital.com";
        $mail->Password = "";
        $mail->SetFrom("nael@considerdigital.com");
        $mail->Subject = "Test";
        $mail->Body = "hello";
        $mail->AddAddress("neal.alwani@gmail.com");

        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent";
        }


//        $this->load->view('sent_mail', $data);
//        $config = Array(
//            'protocol' => 'smtp',
//            'smtp_host' => 'ssl://smtp.gmail.com',
//            'smtp_port' => 465,
//            'smtp_user' => 'smoky.candy@gmail.com',
//            'smtp_pass' => 'vv*4627257',
//            'mailtype' => 'html',
//            'charset' => 'iso-8859-1',
//            'wordwrap' => TRUE,
//            'smtp_crypto' => NULL,
//            'newline' => "\r\n",
//            'crlf' => "\r\n"
//        );
//        $this->email->initialize($config);
//
//
//        $this->email->from('smoky.candy@gmail.com', "Attendance System");
//        $this->email->to("neal.alwani@gmail.com");
////        $this->email->cc("testcc@domainname.com");
//
//        $this->email->subject("Welcom To ");
//
//        $this->email->message('<p>wwww</p>');
//
//
//
//        if ($this->email->send()) {
//            return true;
//        } else {
//            return false;
//        }
    }

    public function dashboard_data() {

        $d = $this->input->get('org');
        die($d);
        $date1 = $this->input->get('date1') . ":00";
        $date2 = $this->input->get('date2') . ":00";

        $employee = $this->input->get('employee');
//        $date1 = "1991-01-01 00:00:00";
//        $date2 = "2017-01-01 00:00:00";
//        $employee = 0;

        if ($employee == 0) {
            $where = "entrytime BETWEEN '$date1' AND '$date2'";
        } else {
            $where = "user_id = $employee AND entrytime BETWEEN '$date1' AND '$date2'";
        }
//        $this->attendance_model->custom($where);
//        die($where);
        $data = $this->attendance_model->getRecords($where);
//        die(print_r($data));
        $xls_filename = date("Y-m-d-H:i:s") . ".xls";
        // Header info settings
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$xls_filename");
        header("Pragma: no-cache");
        header("Expires: 0");
        $fields = array("id", "timein", "timeout", "date", "from", "to", "remarks", "user_id", "user_full_name", "day", "entrytime", "lastupdate");
        /*         * *** Start of Formatting for Excel **** */
        // Define separator (defines columns in excel &amp; tabs in word)
        $sep = "\t"; // tabbed character
        // Start of printing column names as names of MySQL fields
        foreach ($fields AS $f) {
            echo $f . "\t";
        }
        print("\n");
// End of printing column names
// Start while loop to get data
        foreach ($data AS $row) {
            $schema_insert = "";
            foreach ($fields AS $f) {
                if (!isset($row[$f])) {
                    $schema_insert .= "NULL" . $sep;
                } elseif ($row[$f] != "") {
                    $schema_insert .= "$row[$f]" . $sep;
                } else {
                    $schema_insert .= "" . $sep;
                }
            }
            $schema_insert = str_replace($sep . "$", "", $schema_insert);
            $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
            $schema_insert .= "\t";
            echo(trim($schema_insert));
            echo "\n";
        }
    }

    public function delete_employee() {
        $emp = $this->input->post('emp');
        $file = $this->input->post('md5');
        if (!empty($emp)) {
            if (is_file("/var/www/html/workingfolder/attendance/qrcodes/" . $file . ".png")) {
                unlink("/var/www/html/workingfolder/attendance/qrcodes/" . $file . ".png");
            }
            if ($this->attendance_model->delete($emp)) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }

    public function update_status() {
        $check = $this->input->post('check');
        $user_id = $this->input->post('user_id');
        $where = $this->input->post('where');
        $time = $this->input->post('time');
        $counter = $this->input->post('counter');
        $remarks = $this->input->post('remarks');
        $status = $this->input->post('status');
        $specify = $this->input->post('specify');
        $user_full_name = $this->input->post('user_full_name');

        if ($check == 'Out') {
            if ($status == 'Out') {
                $timeout = substr($time, 11, 8);
                $att = array(
                    'timeout' => $timeout
                );
                $date = substr($time, 0, 10);

//                die(md5($user->user_id . "Home" . $date));
                $this->attendance_model->update_others("attendance", $att, array("id" => md5($user_id . $where . $date)));
                $this->attendance_model->update_others("aga_users", array("status" => 0, "where" => "Home", "counter" => ++$counter), array("user_id" => $user_id));
            } else {
                $att = array(
                    "id" => md5($user_id . $status . $counter . date("Y-m-d")),
                    "timein" => substr($time, 11, 8),
                    "date" => substr($time, 0, 10),
                    "from" => $where,
                    "to" => $status,
                    "remarks" => $remarks,
                    "user_id" => $user_id,
                    "user_full_name" => $user_full_name,
                    "day" => date("l")
                );
                $this->attendance_model->insert("attendance", $att);
                $this->attendance_model->update_others("aga_users", array("status" => 0, "where" => $status), array("user_id" => $user_id));
            }
        } elseif ($check == 'In') {
            if ($where == "Home" && $user->status == 0) {
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
                    $this->attendance_model->insert("attendance", $att);
                    $this->attendance_model->update_others("aga_users", array("status" => 1, "where" => "Office"), array("user_id" => $user->user_id));
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
                $this->attendance_model->update_others("aga_users", array("status" => 1, "where" => "Office", "counter" => ++$user->counter), array("user_id" => $user->user_id));
            } else {
                die("Contact System Administrator!");
            }
        } else {
            
        }
    }

    public function update2() {
        $checkin = $this->input->post('check_in');
        $id = $this->input->post('id');
//        a$ip = $this->post('o');
        $user = $this->attendance_model->get_user($id);
//        $data["user"] = $user;
        $checkout = $this->input->post('check_out');
//        $others = $this->post('others');
        $specify = $this->input->post('specify');
        $remarks = $this->input->post('remarks');
        $time = $this->input->post('time');
//        die(var_dump($this->post()));
        if ($checkin && !empty($user)) {
            if ($user->where == "Home" && $user->status == 0) {
                $att = array(
                    "id" => md5($user->user_id . "Office" . date("Y-m-d")),
                    "timein" => substr($time, 11, 8),
                    "date" => date("Y-m-d"),
                    "from" => $user->where,
                    "to" => "Office",
                    "remarks" => $remarks,
                    "user_id" => $user->user_id,
                    "user_full_name" => $user->user_full_name,
                    "day" => date("l")
                );

                $check = $this->attendance_model->check_entry($att["id"]);
                if ($check) {
                    $this->attendance_model->insert_others("attendance", $att);
                    $this->attendance_model->update_others("aga_users", array("status" => 1, "where" => "Office"), array("user_id" => $user->user_id));
                }
            } elseif ($user->where != "Home" && $user->status == 0) {
                $timeout = substr($time, 11, 8);
                $att = array(
                    'timeout' => $timeout
                );
                $date = date("Y-m-d");
                if ((int) date("H") >= 0 && (int) date("H") < 6) {
                    $date = date("Y-m-d", strtotime("-1 days"));
                }
                $this->attendance_model->update_others("attendance", $att, array("id" => md5($user->user_id . $user->where . $user->counter . $date)));
                $this->attendance_model->update_others("aga_users", array("status" => 1, "where" => "Office", "counter" => ++$user->counter), array("user_id" => $user->user_id));
            } else {
                die(0);
            }
//                $data['where'] = "Office";
        } elseif (!empty($user) && $checkout) {
            $timeout = substr($time, 11, 8);
            $att = array(
                'timeout' => $timeout
            );
            $date = date("Y-m-d");
            if ((int) date("H") >= 0 && (int) date("H") < 6) {
                $date = date("Y-m-d", strtotime("-1 days"));
            }
//                die(md5($user->user_id . "Home" . $date));
            $this->attendance_model->update_others("attendance", $att, array("id" => md5($user->user_id . $user->where . $date)));
            $this->attendance_model->update_others("aga_users", array("status" => 0, "where" => "Home", "counter" => ++$user->counter), array("user_id" => $user->user_id));
//                $data['where'] = "Home";
        } elseif (!empty($user) && $specify) {
            $att = array(
                "id" => md5($user->user_id . $specify . $user->counter . date("Y-m-d")),
                "timein" => substr($time, 11, 8),
                "date" => date("Y-m-d"),
                "from" => $user->where,
                "to" => $specify,
                "remarks" => $remarks,
                "user_id" => $user->user_id,
                "user_full_name" => $user->user_full_name,
                "day" => date("l")
            );
            $this->attendance_model->insert_others("attendance", $att);
            $this->attendance_model->update_others("aga_users", array("status" => 0, "where" => $specify), array("user_id" => $user->user_id));
//                $data['where'] = $specify;
        }
//            $this->load->view('success_v', $data);
        echo 1;
    }

    public function update_remarks() {
        $id = $this->input->post('id');
        $user = $this->attendance_model->get_user($id);
        $remarks = $this->input->post('remarks');
        if ($user->where != "Office") {
            $att_id = md5($user->user_id . $user->where . $user->counter . date("Y-m-d"));
        } else {
            $att_id = md5($user->user_id . $user->where . date("Y-m-d"));
        }
        $att = array(
            "remarks" => $remarks
        );
        $check = $this->attendance_model->update_others("attendance", $att, array("id" => $att_id));
        if (!empty($check)) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function s(){
        $this->load->model('attendance_model');

        $s = $this->attendance_model->getRecord("id", 1);

        die(var_dump($s));
    }

}
