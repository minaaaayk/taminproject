<?php
/**
 * Created by PhpStorm.
 * User: Mina2
 * Date: 4/10/2018
 * Time: 6:52 PM
 */

require_once  APPPATH . 'classes/gregorian_jalali.php';
class General extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('law_model');
    }
    function index()
    {
        //some...
    }
    function show_law()
    {
        $parts = $this->law_model->get_all_parts_detail();
        $this->data['parts']=$parts;

        //---------access for manipulate law's----------------------
        if (in_array(4, $this->access))
        {
            $this->data['manipulate'] = true;
        }
        else
        {
            $this->data['manipulate'] = false;
        }

        //---------access for seeing comment and commenting----------------------
        if (in_array(6, $this->access)) // for adding comment
        {
            $this->data['commenting'] = true;
            $this->data['see_comment'] = true;
        }
        else
        {
            $this->data['commenting'] = false;
            if (in_array(9, $this->access))// for seeing comment's
            {
                $this->data['see_comment'] = true;
            }
            else
            {
                $this->data['see_comment'] = false;
            }
        }
        $this->template->load('public/show-law', $this->data);
    }

    /*function pageload($name)
    {
        $parts = $this->law_model->get_all_parts_detail();
        $data['parts']=$parts;
        $this->load->view($name,$data);
    }*/
    function convert_to_jalali()
    {
        $current_date= $this->input->post('current_date');
        $orderdate = explode('-', $current_date);
        $year  = $orderdate[0];
        $month = $orderdate[1];
        $day   = $orderdate[2];
        $result['type'] = form_error("type");

        $result['date'] = gregorian_to_jalali ($year, $month, $day,"/");
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($result));
        $string = $this->output->get_output();
        echo $string;
        exit();
    }


    function print_paragraphs($array_of_paragraph, $txt_id, $flag, $note = array())
    {

        foreach ($array_of_paragraph as $p1)
        {

            if($p1->parent_id_txt == $txt_id)
            {
                echo "<div style=\"text-align: right; padding-right: 20px\">";
                echo $p1->name_list . " - " . $p1->txt . "<br>";
                if($flag == true)
                {
                    print_note_paragraphs($note, $p1->paragraph_id, true);
                }
                if(count($p1->array_of_paragraph) > 0)
                {
                    echo "<div style=\"text-align: right; padding-right: 20px\">";
                    foreach ($p1->array_of_paragraph as $p2)
                    {
                        echo $p2->name_list . " - " . $p2->txt . "<br>";
                        if($flag == true)
                        {
                            print_note_paragraphs($note, $p2->paragraph_id, true);
                        }
                    }
                    echo "</div>";
                }
                echo "</div>";

            }
        }
    }

    function print_note_paragraphs($arr_notes, $prent_paragraph_id = 0, $in_paragraph)
    {
        foreach ($arr_notes as $note)
        {
            if ($in_paragraph == true)
            {
                if ($note->paragraph_flag == 1)
                {
                    if ($note->parent_paragraph_id == $prent_paragraph_id)
                    {
                        echo "تبصره " . $note->num . " : ";
                        foreach ($note->txt as $txt)
                        {
                            echo $txt['data'] . "</br>";
                            print_paragraphs($note->array_of_paragraph, $txt['id'], false, null);
                        }
                    }
                }
            }
            else
            {
                echo "تبصره " . $note->num . " : ";
                foreach ($note->txt as $txt)
                {

                    echo $txt['data'] ."</br>";
                    print_paragraphs($note->array_of_paragraph, $txt['id'], false, null);
                }
            }
        }
    }

    function show_details($article)
    {
        foreach ($article->txt as $txt)
        {
            echo $txt['data'] ."</br>";
            print_paragraphs($article->array_of_paragraph, $txt['id'], true, $article->array_of_Note);
        }
        print_note_paragraphs($article->array_of_Note,  0, false);
    }
}