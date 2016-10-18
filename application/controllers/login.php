<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    var $data = array();

    public function __construct() {
        parent::__construct();
//			$this->check_isvalidated();
//                        $this->output->cache(10000000);
    }

    //this private method is to validate if the user is logged in	
    private function check_isvalidated() {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }

    public function index() {
        $this->session->sess_destroy();
        $data["message"] = 0;
        $this->load->view("login_v", $data);
    }

    public function submit() {
        $this->load->model("users_model");
        $username = $this->input->post("email");
        $password = md5($this->input->post("password"));
//        die($password);
        $where = "user_email LIKE '$username' AND password LIKE '$password'";
        $user = $this->users_model->getRecords($where);


        if (empty($user)) {
            $data["message"] = 1;
            $this->load->view("login_v", $data);
        } else {
            foreach ($user AS $row) {
                $user_session = array(
                    "id" => $row["user_id"],
                    "user_level" => $row["user_level"],
                    "user_full_name" => $row["user_full_name"],
                    "email" => $row["user_email"],
                    "logged_in" => TRUE
                );
                $this->session->set_userdata($user_session);
//                $this->_model->update($user_session["id"], array("last_login" => date("Y-m-d H:i:s")));

                redirect(base_url("home"));
            }
        }
    }

    //this method is to create the session for the user and to confirm that hes logged in
    public function savesession() {
        $authKey = $this->input->post("auth_key");
        $userId = $this->input->post("userid");
        $stateId = $this->input->post("stateid");
        $parId = $this->input->post("parid");
        $dunId = $this->input->post("dunid");
        $pdmId = $this->input->post("pdmid");
        $username = $this->input->post("username");
        $agensiId = $this->input->post("agensiid");
        $agensi = $this->input->post("agensi");
        $role = $this->input->post("role");
        $last_login = $this->input->post('last_login');

        $newdata = array(
            'authKey' => $authKey,
            'id' => $userId,
            'username' => $username,
            'name' => $username,
            'stateid' => $stateId,
            'parid' => $parId,
            'dunid' => $dunId,
            'pdmid' => $pdmId,
            'agensiid' => $agensiId,
            'agensi' => $agensi,
            'role' => $role,
            'user_level' => $role,
            'last_login' => $last_login,
            'logged_in' => TRUE
        );
//        die(print_r($newdata));
        if($userId == 22 || $userId == 212 || $userId == 51){
            $this->session->set_userdata($newdata);
        }
    }

    //this method is to logout from the website and destroy the session.
    public function do_logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
