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
    var $sender_mail;
    var $sender_name;
    var $pass;
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->sender_mail = "tamin.ejtemaei.basu@gmail.com";
        $this->sender_name = "Tamin ejtemaei";
        $this->pass = "921ldkh386";
    }

    function send_email($email,$id)
    {

        $slug = md5($id . $email . date('Ymd'));
        $url = base_url()."users/Login/active/".$id."/".$slug;
        $message = "برای وارد شدن به سامانه روی لینک زیر کلیک کنید:" ."\r\n". $url ;

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => $this->sender_mail,
            'smtp_pass' => $this->pass
        );
        $this->load->library('email',$config);

        //$newpass = $this->generateRandomString();
        $this->email->from($this->sender_mail, $this->sender_name);
        $this->email->set_newline("\r\n");
        $this->email->to($email);
        $this->email->subject('بازیابی رمز عبور');
        $this->email->message($message);

        if($this->email->send())
        {
            return true;
        }
        return false;
    }


    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
}