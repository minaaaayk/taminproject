<?php
/**
 * Created by PhpStorm.
 * User: Mina2
 * Date: 3/10/2018
 * Time: 12:17 AM
 */

class Admin extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $this->template->load('public/index', $this->data);
    }
    function add_user()
    {
        //$sub_data['captcha_return'] ='';
        //$sub_data['cap_img'] = $this ->CI_captcha->make_captcha();
        //$this->template->load('admin/add-user', $sub_data, true);
        //$sub_data['menu'] = 'منو';
        if (!in_array(1, $this->access))
        {
            $this->template->load('public/index', $this->data);
        }
        else
        {
            $this->template->load('admin/add-user', $this->data);
        }
    }
    function add_user_validate()
    {

        if (!in_array(1, $this->access))
        {
            $this->template->load('public/index', $this->data);
        }
        else
        {
            $result = array();
            $result['status'] = 'error';
            $result['mstatus'] = 0;
            $result['ustatus'] = 0;
            $result['vstatus'] = 0;
            $result['cstatus'] = 0;


            $this->form_validation->set_rules('fname', 'نام', 'trim|required');
            $this->form_validation->set_rules('lname', 'نام خانوادگی', 'trim|required');
            $this->form_validation->set_rules('username', 'نام کاربری', 'trim|required|alpha_dash|min_length[4]|max_length[50]');
            $this->form_validation->set_rules('password', 'کلمه عبور', 'trim|required|min_length[4]|max_length[50]');
            $this->form_validation->set_rules('passconf', 'تایید کلمه عبور', 'trim|required|min_length[4]|max_length[50]');
            $this->form_validation->set_rules('email', 'ایمیل',  'trim|required|min_length[6]|max_length[30]|valid_email');
            $this->form_validation->set_rules('type', 'نوع کاربر', 'trim|required');

            // Set Custom messages
            $this->form_validation->set_message('required', '%s نمیتواند خالی باشد.');
            $this->form_validation->set_message('min_length', ' %s باید حداقل دارای %d حرف باشد ');
            $this->form_validation->set_message('max_length', ' %s باید حداکثر دارای %d حرف باشد.');
            $this->form_validation->set_message('valid_email', 'ایمیل وارد شده معتبر نیست');
            $this->form_validation->set_message('matches', 'با پسورد منطبق نیست');
            $this->form_validation->set_message('alpha_dash', '%s میتواند فقط شامل(حروف الفبا ,اعداد,خط تیره و آندرلاین)باشد. ');

            $username = $this->input->post('username',true);
            $email = $this->input->post('email',true);
            $this->load->model("CI_users");
            $check1 = $this->CI_users->check_email($email);
            $check2 = $this->CI_users->check_username($username);
            if ($check1 || $check2)
            {
                if($check1)
                {
                    $result['mstatus'] = 1;
                    $result['r_email'] = "ایمیل شما قبلا ثبت شده";
                }
                if($check2)
                {
                    $result['r_username'] = "نام کاربری تکراری است";
                    $result['ustatus'] = 1;
                }
            }

            if ($this->form_validation->run() == FALSE)
            {
                $result['vstatus'] = 1;
                $result['fname'] = form_error("fname");
                $result['lname'] = form_error("lname");
                $result['emaill'] = form_error("email");
                $result['username'] = form_error("username");
                $result['password'] = form_error("password");
                $result['passconf'] = form_error("passconf");
                $result['type'] = form_error("type");


            }
            else
            {
                $fname = $this->input->post('fname',true);
                $lname = $this->input->post('lname',true);
                $username = $this->input->post('username',true);
                $password = $this->input->post('password',true);
                $email = $this->input->post('email',true);
                $type = $this->input->post('type',true);
                $access = $this->input->post('access',true);

                $user_access = array();
                foreach ($access as $a)
                {
                    $temp = ($a -($type*10));
                    if(($temp > 0) && ($temp < 10))
                    {
                        $user_access[] = $temp;
                    }
                }
                if ($type == 3)
                {
                    $user_access[] = 9;
                }
                $access_level = implode(" ",$user_access);

                $rand_salt = $this->CI_encrypt->genRndSalt();
                $encrypt_pass = $this->CI_encrypt->encryptUserPwd($password,$rand_salt);

                $r = $this->CI_users->add_user($fname,$lname,$email,$username,$encrypt_pass,$rand_salt,$type,$access_level);
                if($r)
                {
                    $result['status'] = 'success';
                    $result['redirect_url'] = base_url()."users/Admin/add_user";
                }
                else
                {
                    $result['status'] = 'error';
                }
            }

            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($result));
            $string = $this->output->get_output();
            echo $string;
            exit();
        }

    }
   /* function testmenu()
    {
        $tempmenu = $this->CI_menu->get_sidebar_menu(2);
        $sub_data['menus'] = $tempmenu['menus'];
        $sub_data['submenus'] = $tempmenu['submenus'];
        $sub_data['fname_lname'] = $this->CI_menu->get_top_menu_name(2);
        $this->template->load('admin/add-user', $sub_data);
    }*/

}