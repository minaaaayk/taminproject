<?php
/**
 * Created by PhpStorm.
 * User: Mina2
 * Date: 11/27/2017
 * Time: 1:26 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

class Upload extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('upload_model');
        $this->load->model('law_model');
    }
    public function index()
    {
        //$this->load->view('up2view');
        //$this->load->view('start');
        //$this->load->view('tets2');
        // $this->load->view('test3forms');
        //$this->load->view('backup');
        //$this->load->view('clander-test');
        $this->load->view('template-dashboard');
        //$this->load->view('testjson');
    }

    public function do_upload2()
    {
        $this->load->model('upload_model');
        $file = $this->upload_model->file_upload();
        echo json_encode($file);
        exit;
    }

    function ShowFileName()
    {
        $this->load->model('upload_model');
        $files = $this->upload_model->getFileNames();
        foreach ($files as $file)
        {
            echo htmlentities($file) ."<br>";
        }

    }
}
