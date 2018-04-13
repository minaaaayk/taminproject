<?php
/**
 * Created by PhpStorm.
 * User: Mina2
 * Date: 3/8/2018
 * Time: 5:49 PM
 */

class Login extends  CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->model(array('CI_captcha', 'CI_encrypt','CI_auth','CI_menu'));
        $this->load->helper(array('html','form', 'url'));
    }
    public $sub_data = array();
    function index()
    {
        if($this->check_login())
        {
            $user_id =  $this->CI_auth->logged_id();
            $tempmenu = $this->CI_menu->get_sidebar_menu($user_id);
            $sub_data['menus'] = $tempmenu['menus'];
            $sub_data['submenus'] = $tempmenu['submenus'];
            $sub_data['fname_lname'] = $this->CI_menu->get_top_menu_name($user_id);
            $this->template->load('public/index', $sub_data);
        }
    }
    function check_login()
    {
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
                    $this->load->view("login");
                    return false;
                }
            }
            else
            {
                $this->load->view("login");
                return false;
            }
        }
        return true;
    }
    function auth()
    {
        if (isset($_POST['forgot']))
        {
           //?????? redirect('users/login/forgot');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'username',
                'label' => 'نام کاربری',
                'rules' => 'required',
                'errors' => array(
                    'required' => ' %s نمیتواند خالی باشد. '
                )
            ),
            array(
                'field' => 'password',
                'label' => 'کلمه عبور',
                'rules' => 'required',
                'errors' => array(
                    'required' => ' %s نمیتواند خالی باشد. '
                )
            ),
            array(
                'field' => 'remember',
                'label' => 'فراموشی',
                'rules' => 'numeric'
            )
        );

        $this->form_validation->set_rules($config);

        $result = array();

        if($this->form_validation->run() == false)
        {
            $result['status'] = 'error';
            $result['message'] = validation_errors('<div class="error">', '</div>');
        }
        else
        {
            $username= $this->input->post('username',true);
            $password = $this->input->post('password',true);
            $remember = $this->input->post('remember',true);

            $login_array = array($username,$password);
            $r = $this->CI_auth->process_login($login_array);
            if($r == true)
            {
                //login successfull
                $this->set_remember($remember,$username,$password);
                $result['status'] = 'success';
                $result['redirect_url'] = base_url()."users/login/redirect_dashboard";
            }
            else
            {
                $result['status'] = 'error';
                $result['message'] = '<div class="error">'. "نام کاربری یا کلمه عبور نامعتبر است" .'</div>';
            }

        }

        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($result));
        $string = $this->output->get_output();
        echo $string;
        exit();

    }
    function set_remember($remember,$username,$password)
    {
        if((isset($remember)) && ($remember == 1))
        {
            $user_enc = $this->encryption->encrypt("{$username}");
            $pass_enc = $this->encryption->encrypt("{$password}");

            $cookieUsername = array(
                'name'   => 'ci_user',
                'value'  => "{$user_enc}",
                'expire' => time()+60*60*24*365
            );

            $cookiePassword = array(
                'name'   => 'ci_pass',
                'value'  => "{$pass_enc}",
                'expire' => time()+60*60*24*365
            );


            //$this->input->set_cookie($cookieUsername);
            //$this->input->set_cookie($cookiePassword);
            setcookie("ci_user", "{$user_enc}", time()+60*60*24*366, "/");
            setcookie("ci_pass", "{$pass_enc}", time()+60*60*24*366, "/");

        }
    }
    function logout()
    {
        $this->session->unset_userdata('logged_user');
        $this->session->sess_destroy();
        session_destroy();
        $cookieUsername = array(
            'name'   => 'ci_user',
            'value'  => '',
            'expire' => ''
        );

        $cookiePassword = array(
            'name'   => 'ci_pass',
            'value'  => '',
            'expire' => ''
        );

        $this->input->set_cookie($cookieUsername);
        $this->input->set_cookie($cookiePassword);
        redirect(base_url());
    }
    function redirect_dashboard()
    {
        if($this->check_login())
        {
            $user_id =  $this->CI_auth->logged_id();
            $access = $this->CI_menu->get_user_access($user_id);
            $tempmenu = $this->CI_menu->get_sidebar_menu($access);
            $sub_data['menus'] = $tempmenu['menus'];
            $sub_data['submenus'] = $tempmenu['submenus'];
            $sub_data['fname_lname'] = $this->CI_menu->get_top_menu_name($user_id);
            $this->template->load('public/index', $sub_data);
        }
    }

}