<?php
/**
 * Created by PhpStorm.
 * User: Mina2
 * Date: 3/9/2018
 * Time: 5:48 PM
 */


// this class for send email and retiev?? user password
class CI_mail extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    function check_email($email)
    {
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('email',"$email");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return true;
        }
        return false;
    }
    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
}