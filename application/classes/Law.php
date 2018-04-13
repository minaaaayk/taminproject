<?php
/**
 * Created by PhpStorm.
 * User: Mina2
 * Date: 11/29/2017
 * Time: 7:18 PM
 */
class Law
{
    public $Law_id;
    public $title;
    public $type;
    public $id_marja_tasvib;
    public $Date_tasvib;
    public $Date_eblagh;
    public $Date_enteshar;
    public $status;
    public $count_part;
    public $array_of_part = array();
    public function __construct()
    {
    }
}

class Bylaw
{
    public $BLaw_id;
    public $title;
    public $id_marja_tasvib;
    public $Date_tasvib;
    public $Date_ejra;
    public $fortype;
    public $law_id;
    public $A_id;
    public $N_id;
    public $count_part;
    public $array_of_part = array();
    public function __construct()
    {
    }
}

class Part
{
    public $Part_id;
    public $title;
    public $type_part;
    public $num;
    public $parent;
    public $count_article;
    public $array_of_article= array();
    public function __construct()
    {
        $this->num = 0;
        $this->parent = "law";
    }
}

class Article extends Text
{
    public $A_id;
    public $num;
    public $array_of_Note= array();
    public function __construct()
    {
        parent::__construct();

    }
}
class Amendment extends Text
{
    public $Am_id;
    public $parent_txt_id;
    public $number;
    public function __construct()
    {
        parent::__construct();

    }
}
class Note extends Text
{
    public $N_id;
    public $num;
    public $paragraph_flag = false;
    public $parent_paragraph_id;
    public function __construct()
    {
        parent::__construct();

    }
}
class Text
{
    public $txt_id;
    public $txt;
    public $id_marja_tasvib_txt;
    public $Date_tasvib_txt;
    public $count_paragraph ;
    public $array_of_paragraph  = array();
    public function __construct()
    {
    }

    public function setText($t)
    {
        $this->txt_id = $t->txt_id;
        $this->txt = $t->txt;
        $this->id_marja_tasvib_txt = $t->id_marja_tasvib_txt;
        $this->Date_tasvib_txt = $t->Date_tasvib_txt;
        $this->array_of_paragraph = $t->array_of_paragraph;

    }
}

class Paragraph
{
    public $paragraph_id;
    public $txt;
    public $num_or_partName;
    public $name_list;
    public $count_paragraph;
    public $parent_id_txt;
    public $parent_id_paragraph;
    public $array_of_paragraph = array();
    public function __construct()
    {
        $this->parent_id_txt = -1;
        $this->parent_id_paragraph = -1;
    }
}

class Node
{
    public $text;
    public $children;
    public $pseudo;
    public $collapsed;
    public function __construct($_title, $_text, $_collapsed)
    {
        $this->text = new temp_text();
        $this->collapsed = $_collapsed;
        $this->text->name =  $_text;
        $this->text->title =  $_title;
    }
}

class temp_text
{
    public $name;
    public $title;
}

$status = array(


);