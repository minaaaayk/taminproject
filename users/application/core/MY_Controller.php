<?php
/**
 * Created by PhpStorm.
 * User: Mina2
 * Date: 3/11/2018
 * Time: 8:38 AM
 */

class MY_Controller extends CI_Controller
{

    protected $data = array();
    protected $access = array();

    function __construct()
    {
        parent::__construct();


        $this->load->library(array('form_validation'));
        $this->load->model(array('CI_captcha', 'CI_encrypt','CI_auth','CI_menu'));
        $this->load->helper(array('html','form', 'url'));
        //$this->load->database();

        if($this->CI_auth->check_logged()=== false)
        {
            $usercookie = $this->input->cookie('ci_user');
            $passcookie = $this->input->cookie('ci_pass');
            if((!empty($usercookie)) && (!empty($passcookie)))
            {
                $username = $this->encryption->decrypt($usercookie);
                $password = $this->encryption->decrypt($passcookie);
                $login_array = array($username,$password);
                $r = $this->CI_auth->process_login($login_array);
                if($r != true)
                {
                    //login successfull
                    redirect("users/login");
                }

            }
            else
            {
                redirect("users/login");
            }
        }
        if(empty($this->data))
        {
            $user_id =  $this->CI_auth->logged_id();
            $this->access = $this->CI_menu->get_user_access($user_id);
            $tempmenu = $this->CI_menu->get_sidebar_menu($this->access);
            $this->data['menus'] = $tempmenu['menus'];
            $this->data['submenus'] = $tempmenu['submenus'];
            $this->data['fname_lname'] = $this->CI_menu->get_top_menu_name($user_id);
        }
       // $this->template->load('public/index', $this->data);
    }
}