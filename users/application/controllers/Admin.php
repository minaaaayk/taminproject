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
        /*???????????????????? if($this->CI_auth->check_logged()=== true)
            redirect(base_url().'member_area/');*/

        //var_dump($_POST);
        //echo $this->input->post('access');

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


            //if($this->input->post('submit'))
            {

                $this->form_validation->set_rules('fname', 'نام', 'trim|required');
                $this->form_validation->set_rules('lname', 'نام خانوادگی', 'trim|required');
                $this->form_validation->set_rules('username', 'نام کاربری', 'trim|required|alpha_dash|min_length[4]|max_length[50]');
                $this->form_validation->set_rules('password', 'کلمه عبور', 'trim|required|min_length[4]|max_length[50]');
                $this->form_validation->set_rules('passconf', 'تایید کلمه عبور', 'trim|required|min_length[4]|max_length[50]');
                $this->form_validation->set_rules('email', 'ایمیل',  'trim|required|min_length[6]|max_length[30]|valid_email');
                $this->form_validation->set_rules('type', 'نوع کاربر', 'trim|required');
                //$this->form_validation->set_rules('captcha', 'Captcha', 'required');

                // Set Custom messages
                $this->form_validation->set_message('required', '%s نمیتواند خالی باشد.');
                $this->form_validation->set_message('min_length', ' %s باید حداقل دارای %d حرف باشد ');
                $this->form_validation->set_message('max_length', ' %s باید حداکثر دارای %d حرف باشد.');
                $this->form_validation->set_message('valid_email', 'ایمیل وارد شده معتبر نیست');
                $this->form_validation->set_message('matches', 'با پسورد منطبق نیست');
                $this->form_validation->set_message('alpha_dash', '%s میتواند فقط شامل(حروف الفبا ,اعداد,خط تیره و آندرلاین)باشد. ');


                if ($this->form_validation->run() == FALSE)
                {
                    /*$sub_data['captcha_return'] ='';
                    $sub_data['cap_img'] = $this ->CI_captcha->make_captcha();
                    $this->template->load('admin/add-user', $sub_data, true);*/

                    $result['vstatus'] = 1;
                    $result['fname'] = form_error("fname");
                    $result['lname'] = form_error("lname");
                    $result['emaill'] = form_error("email");
                    $result['username'] = form_error("username");
                    $result['password'] = form_error("password");
                    $result['passconf'] = form_error("passconf");
                    $result['type'] = form_error("type");

                    $this->output->set_content_type('application/json');
                    $this->output->set_output(json_encode($result));
                    $string = $this->output->get_output();
                    echo $string;
                    exit();
                }
                else
                {
                    //if($this->CI_captcha->check_captcha()==TRUE)
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


                        $this->db->select("*");
                        $this->db->from('user');
                        $this->db->where('email',"$email");
                        $check_query1 = $this->db->get();

                        $this->db->select("*");
                        $this->db->from('login');
                        $this->db->where('username',"$username");
                        $check_query2 = $this->db->get();

                        if (($check_query1->num_rows() > 0) || ($check_query2->num_rows() > 0))
                        {
                            if($check_query1->num_rows() > 0)
                            {
                                $result['mstatus'] = 1;
                                $result['r_email'] = "ایمیل شما قبلا ثبت شده";
                            }
                            if($check_query1->num_rows() > 0)
                            {
                                $result['r_username'] = "نام کاربری تکراری است";
                                $result['ustatus'] = 1;
                            }
                            $this->output->set_content_type('application/json');
                            $this->output->set_output(json_encode($result));
                            $string = $this->output->get_output();
                            echo $string;
                            exit();
                        }
                        else
                        {
                            $rand_salt = $this->CI_encrypt->genRndSalt();
                            $encrypt_pass = $this->CI_encrypt->encryptUserPwd($password,$rand_salt);

                            $input_user = array(
                                'name' => "$fname",
                                'family' => "$lname",
                                'email' => "$email"
                            );
                            if($this->db->insert('user', $input_user))
                            {
                                $user_id = $this->db->insert_id();
                                $input_login = array(
                                    'user_id' =>$user_id,
                                    'username' => "$username",
                                    'hash_pass' => $encrypt_pass,
                                    'salt_pass' => $rand_salt
                                );
                                $input_role =array(
                                    'user_id' =>$user_id,
                                    'type' => $type,
                                    'access_level' =>$access_level
                                );
                                $this->db->insert('login', $input_login);
                                $this->db->insert('role', $input_role);

                                $result['status'] = 'success';
                                $result['redirect_url'] = base_url()."users/Admin/add_user";

                                $this->output->set_content_type('application/json');
                                $this->output->set_output(json_encode($result));
                                $string = $this->output->get_output();
                                echo $string;
                                exit();
                            }
                        }
                    }
                    /*else
                    {
                        $sub_data['captcha_return'] = "The characters you entered didn't match the word verification. Please try again. <br/>";
                        $data['body']  = $this->load->view('_join_form', $sub_data, true);
                    }*/
                }

            }
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