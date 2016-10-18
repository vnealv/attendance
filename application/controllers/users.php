<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set("Asia/Kuala_Lumpur");

class Users extends CI_Controller {

    var $data = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('attendance_model');
//        $this->check_loggedin();
    }

    private function check_loggedin() {
        echo 'QQQQ';
    }

    public function index() {
        $data["total_staff"] = $this->attendance_model->total_staff();
        $data["total_in"] = $this->attendance_model->total_staff(1);
        $data["total_out"] = $this->attendance_model->total_staff(0);

        $this->load->view('head', $data);
        $this->load->view('leftSidebar', $data);
        $this->load->view('users_v', $data);

        $this->load->view('foot', $data);
    }

    public function dashboard($time_frame = 1) {

        $data['total_staff'] = $this->entry_model->total_staff();
        $data['time_frame'] = $time_frame;

        $this->load->view('head', $data);
        $this->load->view('leftSidebar', $data);
        $this->load->view('dashboard_v', $data);

        $this->load->view('foot', $data);
    }

    public function dashboard_data() {
        $time_freame = (int) $this->input->get('time_frame');
        $first_date = "";
        $second_date = "";
        
        switch ($time_freame) {
            case 1:
                $first_date = date("Y-m-d 00:00:00",strtotime("-2 days"));
                $second_date = date("Y-m-d 23:59:59",strtotime("-2 days"));
                break;
            case 2:
                echo "Your favorite color is blue!";
                break;
            case 3:
                echo "Your favorite color is green!";
                break;
            case 4:
                echo "Your favorite color is green!";
                break;
            default:
                echo "Your favorite color is neither red, blue, nor green!";
        }



        $data = $this->entry_model->getRecords(array("time_update >=" => $first_date, "time_update <="=>$second_date));
        
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
        
        
    }

}
