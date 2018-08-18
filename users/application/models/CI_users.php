<?php
/**
 * Created by PhpStorm.
 * User: Mina2
 * Date: 8/16/2018
 * Time: 10:50 AM
 */

class CI_users extends CI_Model
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
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return true;
        }
        return false;
    }
    function check_username($username)
    {
        $this->db->select("*");
        $this->db->from('login');
        $this->db->where('username',"$username");
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return true;
        }
        return false;
    }

    function add_user($fname,$lname,$email,$username,$encrypt_pass,$rand_salt,$type,$access_level)
    {
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
            return true;
        }
        else
            return false;
    }
    function get_id_by_email($email)
    {
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('email',"$email");
        $query = $this->db->get();
        $record = $query->row();
        return $record->id;
    }

    function get_user($user_id)
    {
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('id',"$user_id");
        $query = $this->db->get();
        if ($query->num_rows())
        {
            return $query->row();
        }
        return false;
    }
    function update_password($user_id, $encrypt_pass, $rand_salt)
    {
        $data = array(
            'hash_pass' => $encrypt_pass,
            'salt_pass' => $rand_salt
        );
        $this->db->where('user_id', "$user_id");
        $this->db->update('login', $data);
    }
}