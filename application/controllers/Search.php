<?php
/**
 * Created by PhpStorm.
 * User: Mina2
 * Date: 3/8/2018
 * Time: 3:25 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Search extends CI_Controller
{
    function index()
    {
        //$this->load->library('template');
        $this->template->load('search/index');
    }

}