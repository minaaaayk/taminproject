<?php
/**
 * Created by PhpStorm.
 * User: Mina2
 * Date: 3/10/2018
 * Time: 12:18 AM
 */

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
            $this->template->load('employee/add-some', $this->data);
        }

    }
    function add_law()
    {
        if (!in_array(4, $this->access))
        {
            $this->template->load('public/index', $this->data);
        }
        else
        {
            $this->load->model('law_model');
            $marja_tasvib = $this->law_model->get_marja_tasvib(true);
            $data['marja_tasvib'] = $marja_tasvib;
            $theHTMLResponse = $this->load->view('employee/add-law',$data,true);
            $result['theHTMLResponse'] = $theHTMLResponse;
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($result));
            $string = $this->output->get_output();
            echo $string;
            exit();
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
            $law1 = new Law();
            $law1->title = $this->input->post('title');
            $law1->Date_tasvib = $this->input->post('tasvib-date');
            $law1->type = $this->input->post('type');
            $law1->id_marja_tasvib = $this->input->post('marja');
            $law1->status = $this->input->post('statuss');
            $file = $this->input->post('path');

            $law1->array_of_part = $this->parser_model->pars_law($file);

            $law1->count_part = count($law1->array_of_part);
            /* $this->law_model->insert_part_law($parts);*/
        }


    }
    function add_bylaw()
    {

        if (!in_array(4, $this->access))
        {
            $this->template->load('public/index', $this->data);
        }
        else
        {
            $theHTMLResponse= $this->load->view('employee/add-bylaw','',true);
            $result['theHTMLResponse'] = $theHTMLResponse;
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($result));
            $string = $this->output->get_output();
            echo $string;
            exit();
        }

    }
    function add_correctness()
    {

        if (!in_array(4, $this->access))
        {
            $this->template->load('public/index', $this->data);
        }
        else
        {
            $theHTMLResponse=  $this->load->view('employee/add-correctness','',true);
            $result['theHTMLResponse'] = $theHTMLResponse;
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($result));
            $string = $this->output->get_output();
            echo $string;
            exit();
        }

    }

}