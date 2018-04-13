<?php
/**
 * Created by PhpStorm.
 * User: Mina2
 * Date: 11/27/2017
 * Time: 2:44 PM
 */

class Upload_model extends CI_Model
{
    var $File_path;
    var $File_path_url;


    public function __construct()
    {
       date_default_timezone_set('Asia/Tehran');
        parent::__construct();
        $this->File_path = realpath(APPPATH.'../../documents');
        $this->File_path_url = base_url().'documents/';
        $this->load->database();
    }

    public function file_upload()
    {
        $file = array();
        $config = array(
            'upload_path'=> $this->File_path,
            'allowed_types' =>'txt|xls|xlsx|docx',
            'overwrite' =>true,
            'file_name' => date("Y-m-d-h-i-sa-", time()).htmlentities($_FILES['myfile']['name'])
        );

        $this->load->library('upload', $config);
        if($this->upload->do_upload('myfile'))
        {
            $file['status'] = 1;
            $data = $this->upload->data();
            $file['path'] =  $data['full_path'];
            $file['filename'] = $_FILES['myfile']['name'];
        }
        else
        {
            $file['status'] = 0;
            $file['errors'] = $this->upload->display_errors('','');
        }
        return $file;
    }
    function getFileNames()
    {
        $files = scandir($this->File_path);
        $files = array_diff($files,array('.', '..'));

        return $files;

    }
}