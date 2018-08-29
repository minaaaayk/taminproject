<?php
/**
 * Created by PhpStorm.
 * User: Mina2
 * Date: 3/10/2018
 * Time: 12:18 AM
 */

require_once  APPPATH . 'classes/gregorian_jalali.php';
class Employee extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('parser_model');

    }
    function index()
    {
        $this->template->load('public/index', $this->data);
    }
    function add_some()
    {
        if (!in_array(4, $this->access))
        {
            $this->template->load('public/index', $this->data);
        }
        else
        {
            $this->load->model('law_model');
            $marja_tasvib = $this->law_model->get_marja_tasvib(true);
            $this->data['marja_tasvib'] = $marja_tasvib;
            $this->template->load('employee/add-all', $this->data);
        }

    }
    function add_law_validate()
    {
        if (!in_array(4, $this->access))
        {
            $this->template->load('public/index', $this->data);
        }
        else
        {

            $result['ok'] = 0;
            $result['title'] = "";
            $result['path'] = "";
            $result['tasvib_date'] ="";
            $result['eblagh_date'] ="";
            $result['enteshar_date'] ="";
            $result['emza_date'] ="";
            $result['taeid_date'] ="";
            $result['eblagh_num'] ="";


            $this->form_validation->set_rules('title', 'عنوان', 'trim|required');
            $this->form_validation->set_rules('path', 'فایل', 'trim|required');
            $this->form_validation->set_rules('tasvib-date', 'تاریخ تصویب', 'trim|required|callback_date_valid');
            // Set Custom messages

            $dates = array(
                'tasvib-date'=>"",
                'eblagh-date' => "",
                'enteshar-date' => "",
                'emza-date' => "",
                'taeid-date' => ""
            );
            foreach ($this->input->post('check1') as $check)
            {
                $dates[$check] = null;
            }
            foreach ($dates as $key => $item)
            {
                if( $dates[$key]  !== null)
                {
                    $dates[$key] = str_replace('/','-', $this->input->post($key));
                    $this->form_validation->set_rules($key, 'تاریخ ', 'trim|required|callback_date_check');
                    if($key == "eblagh-date")
                    {
                        $this->form_validation->set_rules("eblagh-num", 'شماره ابلاغ ', 'trim|required');
                    }
                }

            }

            $this->form_validation->set_message('required', '%s نمیتواند خالی باشد.');
            $this->form_validation->set_message('date_check','تاریخ نامعتبر است');


            if ($this->form_validation->run() == FALSE)
            {
                $result['title'] = form_error("title");
                $result['path'] = form_error("path");
                $result['tasvib_date'] = form_error("tasvib-date");
                $result['eblagh_date'] = form_error("eblagh-date");
                $result['eblagh_num'] = form_error("eblagh-num");
                $result['enteshar_date'] = form_error("enteshar-date");
                $result['emza_date'] = form_error("emza-date");
                $result['taeid_date'] = form_error("taeid-date");
            }
            else
            {

                $law1 = new Law();

                $law1->Date_tasvib = $dates['tasvib-date'];
                $law1->Date_eblagh = $dates['eblagh-date'];
                $law1->Date_enteshar = $dates['enteshar-date'];
                $law1->Date_emza = $dates['emza-date'];
                $law1->Date_taeid = $dates['taeid-date'];


                $law1->title = $this->input->post('title');
                $law1->type = $this->input->post('type');
                $law1->id_marja_tasvib = $this->input->post('marja');
                $law1->status = $this->input->post('statuss');
                $law1->num_eblagh =  $this->input->post('eblagh-num');
                $file = $this->input->post('path');


                $law1->array_of_part = $this->parser_model->pars_law($file,"law");
                $law1->count_part = count($law1->array_of_part);

                $this->law_model->insert_law($law1);
                $result['ok'] = 1;
            }

            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($result));
            $string = $this->output->get_output();
            echo $string;
            exit();
        }


    }

    public function date_check($str)
    {
        return date_valid($str);
    }
}