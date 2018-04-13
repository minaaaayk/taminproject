<?php
/**
 * Created by PhpStorm.
 * User: Mina2
 * Date: 3/8/2018
 * Time: 4:58 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{

    function index()
    {
        $this->load->view('start');
    }

}