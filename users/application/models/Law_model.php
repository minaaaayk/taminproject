<?php
/**
 * Created by PhpStorm.
 * User: Mina2
 * Date: 4/11/2018
 * Time: 10:23 AM
 */

require_once  APPPATH . 'classes/Law.php';
class Law_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getnitial()
    {

        $this->load->database();
        $data = array(
            'txt_id' => 1,
            'paragraph_id' => 1,
            'Part_id'=>1,
            'N_id'=>1,
            'A_id'=>1);

        $last = $this->db->order_by('id',"desc")
            ->limit(1)
            ->get('text')
            ->row();
        if(isset($last))
        {
            $data['txt_id'] = ($last->id + 1);
        }

        $last = $this->db->order_by('paragraph_id ',"desc")
            ->limit(1)
            ->get('paragraph')
            ->row();
        if(isset($last))
        {
            $data['paragraph_id'] = ($last->paragraph_id + 1);
        }

        $last = $this->db->order_by('Part_id ',"desc")
            ->limit(1)
            ->get('part')
            ->row();
        if(isset($last))
        {
            $data['Part_id'] = ($last->Part_id + 1);
        }

        $last = $this->db->order_by('N_id ',"desc")
            ->limit(1)
            ->get('note')
            ->row();
        if(isset($last))
        {
            $data['N_id'] = ($last->N_id + 1);
        }

        $last = $this->db->order_by('A_id ',"desc")
            ->limit(1)
            ->get('aticle')
            ->row();
        if(isset($last))
        {
            $data['A_id'] = ($last->A_id + 1);
        }


        return $data;
    }

    function insert_law($law1)
    {
        $array = array(
            'title' =>$law1->title,
            'type' =>  $law1->type,
            'Date_tasvib' => $law1->Date_tasvib,
            'id_marja_tasvib' => $law1->id_marja_tasvib,
            'Date_eblagh' => $law1->Date_eblagh,
            'num_eblagh' => $law1->num_eblagh,
            'Date_enteshar' => $law1->Date_enteshar,
            'Date_emza' => $law1->Date_emza,
            'Date_taeid' => $law1->Date_taeid,
            'status' => $law1->status
        );

        $this->db->set($array);
        $this->db->insert('law');
        $lawID = $this->db->insert_id();
        $this->insert_part_law($law1->array_of_part, $lawID);
    }

    function insert_part_law($parts ,$parentID)
    {
        foreach ($parts as $p) {
            $array = array(
                'Part_id' => $p->Part_id,
                'title' => $p->title,
                'type' => $p->type_part,
                'num' => $p->num,
                'parent' => $p->parent,
                'blaw_id' => null,
                'law_id' => null
            );

            if($p->parent == "law")
                $array['law_id'] = $parentID;
            else
                $array['blaw_id'] = $parentID;
            $this->db->set($array);
            $this->db->insert('part');
            $p->Part_id = $this->db->insert_id();
            foreach ($p->array_of_article as $article)
            {

                $artc= array(
                    'A_id' => $article->A_id,
                    'num' => $article->num,
                    'part_id' =>$p->Part_id ,
                );
                $this->db->set($artc);
                $this->db->insert('aticle');

                $arrtxt = array(
                    'type_txt_id'=>1,
                    'parent_id' => $article->A_id,
                    'id_marja_tasvib_txt' =>12
                );
                $this->db->set($arrtxt);
                $this->db->insert('middle_txt');
                $article->txt_id = $this->db->insert_id();

                $this->insert_text($article);
                $this->insert_paragraph($article->array_of_paragraph);

                foreach ($article->array_of_Note as $note)
                {

                    $nt= array(
                        'N_id' => $note->N_id,
                        'num' => $note->num,
                        'article_id' => $article->A_id ,
                    );

                    if($note->paragraph_flag)
                    {
                        $nt['paragraph_flag'] = true;
                        $nt['parent_paragraph_id'] = $note->parent_paragraph_id;
                    }
                    $this->db->set($nt);
                    $this->db->insert('note');

                    $arrtxt = array(
                        'type_txt_id'=>2,
                        'parent_id' => $note->N_id,
                        'id_marja_tasvib_txt' =>12
                    );
                    $this->db->set($arrtxt);
                    $this->db->insert('middle_txt');
                    $note->txt_id = $this->db->insert_id();

                    $this->insert_text($note);
                    $this->insert_paragraph($note->array_of_paragraph);
                }
            }
        }
    }

    function insert_text($data)
    {
        foreach ($data->txt as $txt)
        {
            $arrtxt1 = array(
                'id' => $txt['id'],
                'text' => $txt['data'],
                'parent_txt_id'=> $data->txt_id
            );
            $this->db->set($arrtxt1);
            $this->db->insert('text');
        }
    }
    function insert_paragraph($array_of_paragraph)
    {
        foreach ($array_of_paragraph as $prg1)
        {
            $p1 = array(
                'paragraph_id' => $prg1->paragraph_id,
                'txt'=> $prg1->txt,
                'num_or_partName' =>$prg1->num_or_partName,
                'name_list' => $prg1->name_list,
                'parent_id_txt'=> $prg1->parent_id_txt,
            );
            $this->db->set($p1);
            $this->db->insert('paragraph');

            foreach ($prg1->array_of_paragraph as $prg2)
            {
                $p2 = array(
                    'paragraph_id' => $prg2->paragraph_id,
                    'txt'=> $prg2->txt,
                    'num_or_partName' =>$prg2->num_or_partName,
                    'name_list' => $prg2->name_list,
                    'parent_id_paragraph'=> $prg2->parent_id_paragraph,
                );
                $this->db->set($p2);
                $this->db->insert('paragraph');
            }
        }
    }

    function get_marja_tasvib($priority = true)
    {
        $query= "";
        if($priority == true)
        {
            $this->db->select("*");
            $this->db->from('marja_tavib');
            $this->db->where('priority',1);
            $this->db->where('active',1);
            $query = $this->db->get();
        }
        else
        {
            $this->db->select("*");
            $this->db->from('marja_tavib');
            $this->db->where('active',1);
            $query = $this->db->get();
        }

        $array = array();

        foreach ($query->result() as $m)
        {
            $data['id']= $m->id;
            $data['title'] = $m->title;
            $array[] = $data;
            //var_dump($p);
        }
        return $array;
    }

    function get_law_table($limit, $start, $st = "", $orderField, $orderDirection)
    {

        $this->db->select('law.*, marja_tavib.id , marja_tavib.title as marja_tasvib_title, status.*');
        $this->db->from('law');
        $this->db->join('marja_tavib', 'marja_tavib.id = law.id_marja_tasvib');
        $this->db->join('status', 'status.id = law.status');
        $this->db->like('law.title', $st);
        $this->db->limit($limit, $start);
        $this->db->order_by($orderField, $orderDirection);
        $query = $this->db->get();
        return $query->result();

    }
    function count_law_table($st = "", $orderField, $orderDirection)
    {
        $query = $this->db->or_like('title', $st)->order_by($orderField, $orderDirection)->get('law');
        return $query->num_rows();
    }
    function gett_all_laws()
    {
        $this->db->select("*");
        $query = $this->db->get('law');
        $laws = array();
        foreach ($query->result() as $law)
        {
           $laws[] = $law;
        }
        return $laws;

    }
    //function get_all_parts_detail($law_id)
    function get_all_parts_detail()
    {

        $this->db->select("*");
        //$this->db->where('$law_id','$law_id');
        $query = $this->db->get('part');

        $array_of_part = array();

        foreach ($query->result() as $part)
        {
            $p = new Part();
            $p->Part_id = $part->Part_id;
            $p->title = $part->title;
            $p->type_part = $part->type;
            $p->parent = $part->parent;
            $p->num = $part->num;
            $p->array_of_article = $this->get_all_Article_detail($part->Part_id);
            $array_of_part[] = $p;
            //var_dump($p);
        }
        return $array_of_part;
    }

    function get_all_Article_detail($part_id)
    {
        $this->db->select("*");
        $this->db->from('aticle');
        $this->db->where('part_id',$part_id);
        $query = $this->db->get();

        $array_of_article = array();
        foreach($query->result() as $article)
        {
            $a = new Article();
            $a->A_id = $article->A_id;
            $a->num = $article->num;
            $txt=$this->get_all_text($a->A_id, 1);
            $a->setText($txt);
            $a->array_of_Note = $this->get_all_note_detail($a->A_id);
            $array_of_article[] = $a;
        }
        return $array_of_article;
    }

    function get_all_note_detail($article_id)
    {
        $this->db->select("*");
        $this->db->from('note');
        $this->db->where('article_id',$article_id);
        $query = $this->db->get();

        $array_of_note = array();
        foreach($query->result() as $note)
        {
            $n = new Note();
            $n->N_id = $note->N_id;
            $n->num = $note->num;
            $n->paragraph_flag = $note->paragraph_flag ;
            $n->parent_paragraph_id = $note->parent_paragraph_id;
            $txt  = $this->get_all_text($n->N_id, 2);
            $n->setText($txt);
            $array_of_note[] = $n;
        }
        return $array_of_note;
    }

    function get_all_text($parent_id, $type_txt)
    {
        $this->db->select("*");
        $this->db->from('middle_txt');
        $this->db->where('parent_id',$parent_id);
        $this->db->where('type_txt_id',$type_txt);
        $query = $this->db->get();
        $t = new Text();
        foreach ($query->result() as $text)
        {
            $t->txt_id = $text->txt_id;
            $t->id_marja_tasvib_txt = $text->id_marja_tasvib_txt;
            $t->Date_tasvib_txt = $text->Date_tasvib_txt;
            $row = $this->get_txt($t->txt_id);
            $t->txt = $row['txt'];
            $t->array_of_paragraph = $row['paragraph'];
        }
        return $t;
    }

    function get_txt($parent_id)
    {
        $row = array();
        $text = array();
        $paragraph = array();

        $this->db->select("*");
        $this->db->from('text');
        $this->db->where('parent_txt_id',$parent_id);
        $query = $this->db->get();
        foreach ($query->result() as $t)
        {
            $arr = array(
                'id' => $t->id,
                'data' => $t->text
            );
            $text[] = $arr;
            $paragraph = array_merge($paragraph,$this->get_paragraphs_for($t->id));
        }
        $row['txt'] = $text;
        $row['paragraph'] = $paragraph;
        return $row;

    }
    function get_paragraphs_for($text_id)
    {
        $this->db->select("*");
        $this->db->from('paragraph');
        $this->db->where('parent_id_txt',$text_id);
        $query = $this->db->get();

        $array_of_paragraph1 = array();

        foreach ($query->result() as $prg)
        {
            $p1 = new Paragraph();
            $p1->paragraph_id = $prg->paragraph_id;
            $p1->txt = $prg->txt;
            $p1->num_or_partName = $prg->num_or_partName;
            $p1->name_list = $prg->name_list;
            $p1->parent_id_txt = $text_id;


            $this->db->select("*");
            $this->db->from('paragraph');
            $this->db->where('parent_id_paragraph',$p1->paragraph_id);
            $query2 = $this->db->get();

            $array_of_paragraph2 = array();

            foreach ($query2->result() as $prg2)
            {
                $p2 = new Paragraph();
                $p2->paragraph_id = $prg2->paragraph_id;
                $p2->txt = $prg2->txt;
                $p2->num_or_partName = $prg2->num_or_partName;
                $p2->name_list = $prg2->name_list;
                $p2->parent_id_paragraph = $p1->paragraph_id;

                $array_of_paragraph2[] = $p2;
            }

            $p1->array_of_paragraph = $array_of_paragraph2;
            $array_of_paragraph1[] = $p1;
        }
        return $array_of_paragraph1;
    }
}