<?php
/**
 * Created by PhpStorm.
 * User: Mina2
 * Date: 3/9/2018
 * Time: 5:30 PM
 */

class CI_auth extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        //$this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->model(array('CI_encrypt'));
    }

    function process_login($login_array_input = NULL)
    {
        if (!isset($login_array_input) OR count($login_array_input) != 2)
            return true;

            //set its variable
        $username = $login_array_input[0];
        $password = $login_array_input[1];
        // select data from database to check user exist or not?

        $this->db->select("*");
        $this->db->from('login');
        $this->db->where('username',"$username");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            $row = $query->row();
            $user_id = $row->id;
            $user_pass = $row->hash_pass;
            $user_salt = $row->salt_pass;
            if($this->CI_encrypt->encryptUserPwd( $password,$user_salt) === $user_pass)
            {
                $this->session->set_userdata('logged_user', $user_id);
                return true;
            }
            return false;
        }
        return false;
    }

    function check_logged()
    {
        return ($this->session->userdata('logged_user'))?TRUE:FALSE;
    }


    function logged_id()
    {
        return ($this->check_logged())?$this->session->userdata('logged_user'):'';
    }

}