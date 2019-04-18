<?php
/**
 * Created by PhpStorm.
 * User: Mina2
 * Date: 4/11/2018
 * Time: 10:44 AM
 */
require_once  APPPATH . 'classes/DocxConversion.php';
require_once  APPPATH . 'classes/Law.php';

class Parser_model extends CI_Model
{
    public function index()
    {
        parent::__construct();
        $this->load->model('law_model');
    }

    function multiexplode ($delimiters,$string) {

        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }
    //function ShowFile($file)
    function pars_law($file,$parentType="")
    {
        $alphabet = 'الف ب پ ت ث ج چ ح خ د ذ ر ز ژ ص ض ط ظ ع غ ف ق ک گ ل م ن و ه ی';
        $abjad = explode(' ', $alphabet);
        //$file = "F:/program10/VertrigoServ/www/php_for_project/CodeIgniterTest/testupload/documents/2017-11-29-05-26-00pm-taminejtemaee.docx";
        //$file = "F:/program10/VertrigoServ/www/php_for_project/CodeIgniterTest/testupload/documents/2017-11-29-02-21-46pm-test.docx";
        //$file = "F:/program10/VertrigoServ/www/php_for_project/CodeIgniterTest/testupload/documents/mina.docx";

        //var_dump($_POST);
        //var_dump($file);
        //die();
        $docObj = new DocxConversion($file);
        $docText= $docObj->convertToText();
        $exploded = $this->multiexplode(array("\n", '&gt;' ),$docText);

        $parts = array(); //array of parts
        $prt = new Part();
        $prt->parent = $parentType;
        $part_index = 0;

        $Articles = array(); //array of article in a part
        $artcl = new Article();
        $Article_index = 0;

        $Notes = array();  //array of article in a Articles
        $nt = new Note();
        $Note_index = 0;

        $paragraph_flag = false;
        $parent_paragraph_id = 0;

        //arrays of Paragraphs in (a article) or (a Note) or (other Paragraph)
        $Paragraphs_1 = array();
        $pgr1 = new Paragraph();

        $Paragraphs_2 = array();
        $pgr2 = new Paragraph();


        $this->load->model('law_model');
        $data = $this->law_model->getnitial();

        $text_id = $data['txt_id'];
        $paragraph_id = $data['paragraph_id'];
        $part_id = $data['Part_id'];
        $A_id = $data['A_id'];
        $N_id = $data['N_id'];

        $pre3_flag = "";// P for part ,A for article, N for note, 1 for para1 , 2 for para2, ...
        $pre2_flag = "";// P for part ,A for article, N for note, 1 for para1 , 2 for para2, ...
        $pre1_flag = "";// P for part ,A for article, N for note, 1 for para1 , 2 for para2, ...
        $current_flag= "P"; // P for part ,A for article, N for note, 1 for para1 , 2 for para2, ...



        foreach ($exploded as $line)
        {

            if(isset($line) && ($line != ""))
            {
                $words = $this->Find4FirstWord($line);
                //var_dump($words);
                if (isset($words[0]))
                {
                    if ($words[0] == "مبحث")
                    {
                        continue;
                    }
                    //echo "text_id = $text_id </br>";
                    if (($words[0] == "فصل") || ($words[0] == "بخش") || ($words[0] == "ماده") || ($words[0] == "تبصره"))
                    {
                        if($current_flag == "1")
                        {
                            $Paragraphs_1[] = $pgr1;
                            if($pre1_flag == "A")
                            {
                                $artcl->array_of_paragraph = $Paragraphs_1;
                            }
                            if($pre1_flag == "N")
                            {

                                $nt->array_of_paragraph = $Paragraphs_1;
                            }

                            if($words[0] == "تبصره")
                            {
                                $paragraph_flag = true;
                                $parent_paragraph_id = $pgr1->paragraph_id;
                            }
                            $current_flag=$pre1_flag;
                            $pre1_flag = $pre2_flag;
                            $pre2_flag = $pre3_flag;
                            $pre3_flag = "";
                        }
                        if($current_flag == "2")
                        {
                            $Paragraphs_2[] = $pgr2;
                            if($pre1_flag == "1")
                            {
                                $pgr1->array_of_paragraph= $Paragraphs_2;
                                $Paragraphs_1[] = $pgr1;
                                if($pre2_flag == "A")
                                {
                                    $artcl->array_of_paragraph = $Paragraphs_1;
                                }
                                if($pre2_flag == "N")
                                {
                                    $nt->array_of_paragraph = $Paragraphs_1;
                                }
                            }

                            if($words[0] == "تبصره")
                            {
                                $paragraph_flag = true;
                                $parent_paragraph_id = $pgr2->paragraph_id;
                            }

                            $current_flag=$pre2_flag;
                            $pre1_flag = $pre3_flag;
                            $pre2_flag = "";
                            $pre3_flag = "";
                        }

                        $Paragraphs_1 = array();
                        $pgr1 = new Paragraph();
                        $Paragraphs_2= array();
                        $pgr2  = new Paragraph();

                    }
                    if (($words[0] == "فصل") || ($words[0] == "بخش"))
                    {
                        if($part_index != 0)
                        {
                            if($current_flag == "N")
                            {
                                $Notes[] = $nt;
                                $current_flag = $pre1_flag;
                            }
                            if($current_flag == "A")
                            {
                                $artcl->array_of_Note = $Notes;
                                $Articles [] = $artcl;
                            }
                            $prt->array_of_article =  $Articles;
                            $parts[] = $prt;

                            $artcl = new Article();

                            $Notes = array();
                            $nt = new Note();
                            $Note_index = 0;
                        }
                        $prt = new Part();
                        $prt->parent = $parentType;
                        $Articles = Array();
                        //echo "new part..."."</br>";
                        $prt->type_part = $words[0];
                        $prt->Part_id = $part_id;
                        $part_id++;
                        $part_index++;

                        if(is_numeric($words[1]))
                        {
                            if($part_index == $words[1])
                            {
                                $prt->num = $part_index;
                            }
                            else
                            {
                                //echo "errrrrrrrrorrrrr"."</br>";
                            }

                            $p = strpos($line,"ماده");
                            if($p != false) ///////////--------------------------------if part title contain an article
                            {
                                $s = substr($line,0, $p);
                                $s = $this->convertPersianNumbersToEnglish($s, $s);
                                $p = strpos($s,$words[1]);
                                $sbstr = substr($s, $p+ strlen($words[1]));
                                $prt->title = $sbstr;
                                //echo "title : " .  $prt->title . "<br>";
                                $p = strpos($line,"ماده");
                                $sbstr = substr($line, $p);
                                $words = $this->Find4FirstWord($sbstr);
                            }
                            else
                            {
                                $p = strpos($line,$words[2]);
                                $sbstr = substr($line, $p);
                                $prt->title = $sbstr;
                                //echo "title : " .  $prt->title . "<br>";
                            }
                            $pre3_flag = "";
                            $pre2_flag = "";
                            $pre1_flag = "";
                            $current_flag = "P";
                        }

                        $paragraph_flag = false;
                        $parent_paragraph_id = 0;

                        //echo "current_flag = " . $current_flag  . "</br>";
                        //echo "pre1_flag =" . $pre1_flag . "</br>";
                        //echo "pre2_flag = ". $pre2_flag . "</br>";
                        //echo "pre3_flag = ". $pre3_flag . "</br>";
                    }
                    if ($words[0] == "ماده")
                    {
                        $Article_index++;
                        if(($Article_index != 1))
                        {
                            if ($Note_index == 1)
                            {
                                $artcl->array_of_Note[0] = $nt;
                            }
                            else
                            {
                                if($Note_index > 1)
                                {
                                    $Notes[] = $nt;
                                    $artcl->array_of_Note = $Notes;
                                }
                            }
                            if (isset($artcl->num))
                            {
                                $Articles[] = $artcl;
                            }
                        }
                        $Notes = array();
                        $nt = New Note();
                        $artcl = new Article();
                        $artcl->A_id = $A_id;
                        $A_id++;
                        $Note_index = 0;


                        if((is_numeric($words[1])) || ($words[1] == "واحده"))
                        {
                            if($Article_index == $words[1])
                            {
                                $artcl->num = $Article_index;
                            }
                            else
                            {

                                if(($Article_index == 1) && (($words[1] == "واحده")))
                                {
                                    $artcl->num = "واحده";
                                }
                                else
                                {
                                    echo "errrrrrrrrorrrrr"."</br>";
                                    $dist = $words[1] - $Article_index;
                                    if($dist == 1)
                                    {
                                        echo "missing : " . $Article_index."</br>";
                                    }
                                    else
                                    {
                                        echo "missing : (" . $Article_index . " - " . ($words[1] -1) .")"."</br>";
                                    }
                                    $artcl->num = $words[1];
                                    $Article_index = $words[1];
                                }
                            }
                            $pre3_flag = "";
                            $pre2_flag = "";
                            $pre1_flag = "";
                            $current_flag = "A";

                            if (($words[2] != "") && isset($words[2]))
                            {
                                $p = strpos($line,$words[2]);
                                $sbstr = substr($line, $p);
                                $data = array(
                                    'data' => $sbstr,
                                    'id' => $text_id
                                );
                                $text_id++;
                                $artcl->txt[] = $data;
                            }
                        }

                        $paragraph_flag = false;
                        $parent_paragraph_id = 0;

                        //echo "current_flag = " . $current_flag  . "</br>";
                        //echo "pre1_flag =" . $pre1_flag . "</br>";
                        //echo "pre2_flag = ". $pre2_flag . "</br>";
                        //echo "pre3_flag = ". $pre3_flag . "</br>";
                    }
                    if ($words[0] == "تبصره")
                    {
                        $Note_index++;
                        if($Note_index != 1)
                        {
                            $Notes[] = $nt;
                        }
                        $nt = new Note();
                        $nt->N_id = $N_id;
                        if($paragraph_flag)
                        {
                            $nt->paragraph_flag = true;
                            $nt->parent_paragraph_id = $parent_paragraph_id;
                        }
                        $N_id++;
                        $s = "";
                        $count = 0;
                        if(is_numeric($words[1]))
                        {
                            if ($Note_index != $words[1])
                            {
                                //echo "errrrrrrrrorrrrr" . "</br>";
                                $dist = $words[1] - $Note_index;
                                if ($dist == 1)
                                {
                                    echo "missing : " . $Note_index . "</br>";
                                } else
                                {
                                    echo "missing : (" . $Note_index . " - " . ($words[1] - 1) . ")" . "</br>";
                                }
                                $Note_index = $words[1];
                            }

                            if (isset($words[2]) &&  ($words[2] != "") )
                            {
                                $count = 2;
                            }
                        }
                        else
                        {
                            if ((isset($words[1])) && ($words[1] != ""))
                            {
                                $count = 1;
                            }
                        }

                        if(($count == 1) || ($count == 2))
                        {

                            if($words[$count] == "الف") ///////////--------------------------------if part title contain a paragraph
                            {
                                $p = strpos($line,"الف");
                                $sbstr = substr($line, $p);
                                $words = $this->Find4FirstWord($sbstr);
                                $data = array(
                                    'data' => " ",
                                    'id' => $text_id
                                );
                                $text_id++;
                                $nt->txt[] = $data;
                                //var_dump($words);
                            }
                            else
                            {
                                $p = strpos($line,$words[$count]);
                                $sbstr = substr($line, $p);
                                $data = array(
                                    'data' => $sbstr,
                                    'id' => $text_id
                                );
                                $text_id++;
                                $nt->txt[] = $data;
                            }
                            /* $p = strpos($line,$words[$count]);
                             $sbstr = substr($line, $p);
                             $data = array(
                                 'data' => $sbstr,
                                 'id' => $text_id
                             );
                             $text_id++;
                             $nt->txt[] = $data;*/
                        }

                        $nt->num = $Note_index;

                        if($current_flag == "A")
                        {
                            $current_flag = "N";
                            $pre1_flag = "A";
                        }
                        /*if(is_numeric($current_flag))
                        {
                            $current_flag = "N";
                            $pre1_flag = "A";
                        }*/

                        //echo "current_flag = " . $current_flag  . "</br>";
                        //echo "pre1_flag =" . $pre1_flag . "</br>";
                        //echo "pre2_flag = ". $pre2_flag . "</br>";
                        //echo "pre3_flag = ". $pre3_flag . "</br>";
                    }
                    if((is_numeric($words[0])))
                    {
                        //echo 'yes numeric'."</br>";
                        if(($current_flag == "2"))
                        {
                            if($pgr1->num_or_partName == "abjad")
                            {
                                $words[4] = 1;
                            }
                        }
                        if ($words[0] == 1)
                        {
                            //echo 'New Paragraph'."</br>";
                            if($pre1_flag != "")
                            {
                                if($pre2_flag !="") // New paraghraph in a Paragraph in a Note
                                {
                                    $pre3_flag = $pre2_flag;
                                    $pre2_flag = $pre1_flag;
                                    $pre1_flag = $current_flag;
                                    if($current_flag == "1")
                                    {
                                        $words[4] = 1;
                                        $current_flag = "2";
                                    }

                                }
                                else// New paraghraph (in a Note Or in a paragraph) in a Article
                                {
                                    $pre2_flag = $pre1_flag;
                                    $pre1_flag = $current_flag;
                                    if($current_flag == "1") //New paraghraph  in a paragraph in a Article
                                    {
                                        $words[4] = 1;
                                        $current_flag = "2";
                                    }
                                    else //New paraghraph in a Note in a Article
                                    {
                                        $current_flag = "1";
                                    }
                                }
                            }
                            else// new paragraph in a Article
                            {
                                $pre1_flag = $current_flag;
                                $current_flag = "1";
                            }
                        }
                        else
                        {

                            if(($current_flag == "2") && ((!isset($words[4])) || ($words[4] == 0)))
                            {
                                $Paragraphs_2[] = $pgr2;
                                $pgr1->array_of_paragraph = $Paragraphs_2;
                                $pgr2= new Paragraph();
                                $Paragraphs_2 = array();

                                $current_flag = "1";
                                $pre1_flag = $pre2_flag;
                                $pre2_flag = $pre3_flag;
                                $pre3_flag = "";
                            }

                            if(($current_flag == "2") &&  (isset($words[4]) && ($words[4] != 0)))
                            {
                                $Paragraphs_2[] = $pgr2;
                                $pgr2 = new Paragraph();
                            }

                            if($current_flag=="1")
                            {
                                if( ($pgr1->name_list + 1)  != $words[0])
                                {
                                    if($pre1_flag == "N")
                                    {
                                        $Paragraphs_1[] = $pgr1;
                                        $nt->array_of_paragraph = $Paragraphs_1;
                                        $Paragraphs_1 = array();
                                        $pre1_flag = $pre2_flag;
                                        $pre2_flag = $pre3_flag;
                                        $pre3_flag = "";
                                    }
                                }
                                else
                                {
                                    if(count($artcl->array_of_paragraph) > 0)
                                    {
                                        $Paragraphs_1 =  $artcl->array_of_paragraph;
                                    }
                                    $Paragraphs_1[] = $pgr1;
                                }
                                $pgr1 = new Paragraph();
                            }
                        }

                        if($current_flag=="1")
                        {
                            if($words[0] == 1)
                            {
                                $pgr1 = $this->createParagraph($line,$words,$text_id,null,$paragraph_id, "number");
                            }
                            else
                            {
                                end($Paragraphs_1);
                                $key = key($Paragraphs_1);
                                $temp = $Paragraphs_1[$key];
                                $pgr1 = $this->createParagraph($line,$words,($temp->parent_id_txt+1),null,$paragraph_id, "number");

                            }
                        }
                        if($current_flag=="2")
                        {

                            if($words[0] == 1)
                            {
                                $pgr2= $this->createParagraph($line,$words,null,$pgr1->paragraph_id,$paragraph_id, "number");
                            }
                            else
                            {
                                end($Paragraphs_2);
                                $key = key($Paragraphs_2);
                                $temp = $Paragraphs_2[$key];
                                $pgr2= $this->createParagraph($line,$words,null,$temp->parent_id_paragraph,$paragraph_id, "number");
                            }

                        }

                        if( ($current_flag != "1") && ($current_flag != "2"))
                        {
                            if($current_flag == "N")
                            {

                                end($artcl->array_of_paragraph);
                                $key = key($artcl->array_of_paragraph);
                                $temp = $artcl->array_of_paragraph[$key];

                                if(($temp->name_list + 1) == $words[0])
                                {

                                    $current_flag=1;
                                    $Paragraphs_1 = $artcl->array_of_paragraph;
                                    $pgr1 = $this->createParagraph($line,$words,($temp->parent_id_txt+1),null,$paragraph_id, "number");
                                }
                            }
                        }
                        $paragraph_id++;
                        //echo "current_flag = " . $current_flag  . "</br>";
                        //echo "pre1_flag =" . $pre1_flag . "</br>";
                        //echo "pre2_flag = ". $pre2_flag . "</br>";
                        //echo "pre3_flag = ". $pre3_flag . "</br>";

                    }
                    if (in_array($words[0], $abjad))
                    {
                        //echo "ابجد";
                        //echo "</br>";
                        if($current_flag == "2")
                        {
                            if($pgr1->num_or_partName == "number")
                            {
                                $words[4] = 1;
                            }
                        }
                        if ($words[0] == "الف")
                        {
                            //echo 'New Paragraph'."</br>";
                            if($pre1_flag != "")
                            {
                                if($pre2_flag !="") // New paraghraph in a Paragraph in a Note
                                {
                                    $pre3_flag = $pre2_flag;
                                    $pre2_flag = $pre1_flag;
                                    $pre1_flag = $current_flag;
                                    if($current_flag == "1")
                                    {
                                        $current_flag = "2";
                                    }

                                }
                                else// New paraghraph (in a Note Or in a paragraph) in a Article
                                {
                                    $pre2_flag = $pre1_flag;
                                    $pre1_flag = $current_flag;
                                    if($current_flag == "1") //New paraghraph  in a paragraph in a Article
                                    {
                                        $current_flag = "2";
                                    }
                                    else //New paraghraph in a Note Or in a Article
                                    {
                                        $current_flag = "1";
                                    }
                                }
                            }
                            else// new paragraph in a Article
                            {
                                $pre1_flag = $current_flag;
                                $current_flag = "1";
                            }
                        }
                        else
                        {
                            if(($current_flag == "2") && ((!isset($words[4])) || ($words[4] == 0)))
                            {
                                $Paragraphs_2[] = $pgr2;
                                $pgr1->array_of_paragraph = $Paragraphs_2;
                                $pgr2= new Paragraph();
                                $Paragraphs_2 = array();

                                $current_flag = "1";
                                $pre1_flag = $pre2_flag;
                                $pre2_flag = $pre3_flag;
                                $pre3_flag = "";
                            }
                            if(($current_flag == "2") &&  (isset($words[4]) && ($words[4] != 0)))
                            {
                                $Paragraphs_2[] = $pgr2;
                                $pgr2 = new Paragraph();
                            }
                            if($current_flag=="1")
                            {
                                $Paragraphs_1[] = $pgr1;
                                $pgr1 = new Paragraph();
                            }
                        }
                        if($current_flag=="1")
                        {
                            $pgr1 = $this->createParagraph($line,$words,$text_id,null,$paragraph_id, "abjad");
                            //var_dump($pgr1);
                        }
                        if($current_flag=="2")
                        {
                            $pgr2= $this->createParagraph($line,$words,null,$pgr1->paragraph_id,$paragraph_id, "abjad");
                            //var_dump($pgr2);
                        }
                        $paragraph_id++;
                        //echo "current_flag = " . $current_flag  . "</br>";
                        //echo "pre1_flag =" . $pre1_flag . "</br>";
                        //echo "pre2_flag = ". $pre2_flag . "</br>";
                        //echo "pre3_flag = ". $pre3_flag . "</br>";
                    }

                    if((!in_array($words[0], $abjad)) && (!is_numeric($words[0]))
                        && ($words[0] != "فصل") && ($words[0] != "بخش") && ($words[0] != "ماده") && ($words[0] != "تبصره")
                        && ($words[0] != '') && ($words[0] != ' ') && ($words[0] != " ") && ($words[0] != "") && ($words[0] != "\n") && ($words[0] != "\r") && ($words[0] != "\t"))
                    {


                        if($current_flag == "P")
                        {
                            $prt->title  =  $prt->title . $line;
                        }
                        if($current_flag == "A")
                        {

                            end($artcl->txt);
                            $key = key($artcl->txt);
                            //echo "key = $key </br>";
                            $line2 = "</br>".$line;
                            $artcl->txt[$key]['data'] .= $line2;
                        }
                        if($current_flag == "N")
                        {
                            end($nt->txt);
                            $key = key($nt->txt);
                            //echo "key = $key </br>";
                            $line2 = "</br>".$line;
                            $nt->txt[$key]['data'] .= $line2;
                        }

                        if(($current_flag == "1") || ($current_flag == "2"))
                        {
                            if($current_flag == "1")
                            {
                                $Paragraphs_1[] = $pgr1;
                                if($pre1_flag == "A")
                                {
                                    $artcl->array_of_paragraph = $Paragraphs_1;
                                    $data = array(
                                        'data' => $line,
                                        'id' => $text_id
                                    );
                                    $text_id++;
                                    $artcl->txt[] = $data;

                                }
                                if($pre1_flag == "N")
                                {
                                    $nt->array_of_paragraph = $Paragraphs_1;
                                    $data = array(
                                        'data' => $line,
                                        'id' => $text_id
                                    );
                                    $text_id++;
                                    $nt->txt[] = $data;
                                }
                                $current_flag=$pre1_flag;
                                $pre1_flag = $pre2_flag;
                                $pre2_flag = $pre3_flag;
                                $pre3_flag = "";

                                $Paragraphs_1 = array();
                                $pgr1 = new Paragraph();
                            }
                            if($current_flag == "2")
                            {
                                $Paragraphs_2[] = $pgr2;
                                if($pre1_flag == "1")
                                {
                                    $pgr1->array_of_paragraph= $Paragraphs_2;
                                    $Paragraphs_1[] = $pgr1;
                                    if($pre2_flag == "A")
                                    {
                                        $artcl->array_of_paragraph = $Paragraphs_1;
                                        $data = array(
                                            'data' => $line,
                                            'id' => $text_id
                                        );
                                        $text_id++;
                                        $artcl->txt[] = $data;
                                    }
                                    if($pre2_flag == "N")
                                    {
                                        $nt->array_of_paragraph = $Paragraphs_1;
                                        $data = array(
                                            'data' => $line,
                                            'id' => $text_id
                                        );
                                        $text_id++;
                                        $nt->txt[] = $data;
                                    }
                                }
                                $current_flag=$pre2_flag;
                                $pre1_flag = $pre3_flag;
                                $pre2_flag = "";
                                $pre3_flag = "";

                                $Paragraphs_1 = array();
                                $pgr1 = new Paragraph();
                                $Paragraphs_2 = array();
                                $pgr2 = new Paragraph();
                            }


                        }

                        //echo "current_flag = " . $current_flag  . "</br>";
                        //echo "pre1_flag =" . $pre1_flag . "</br>";
                        //echo "pre2_flag = ". $pre2_flag . "</br>";
                        //echo "pre3_flag = ". $pre3_flag . "</br>";

                    }
                }

            }

        }


        if($current_flag=="2")
        {
            $Paragraphs_2[] = $pgr2;
            if($pre1_flag == "1")
            {
                $pgr1->array_of_paragraph= $Paragraphs_2;
                $Paragraphs_1[] = $pgr1;
                if($pre2_flag == "A")
                {
                    $artcl->array_of_paragraph = $Paragraphs_1;
                }
                if($pre2_flag == "N")
                {
                    $nt->array_of_paragraph = $Paragraphs_1;
                }
            }
            $current_flag=$pre2_flag;
            $pre1_flag = $pre3_flag;
            $pre2_flag = "";
            $pre3_flag = "";
        }

        if($current_flag == "1")
        {
            $Paragraphs_1[] = $pgr1;
            if($pre1_flag == "A")
            {
                $artcl->array_of_paragraph = $Paragraphs_1;
            }
            if($pre1_flag == "N")
            {
                $nt->array_of_paragraph = $Paragraphs_1;
            }
            $current_flag=$pre1_flag;
            $pre1_flag = $pre2_flag;
            $pre2_flag = $pre3_flag;
            $pre3_flag = "";
        }

        if($current_flag == "N")
        {
            $Notes[] = $nt;
            $current_flag=$pre1_flag;
        }
        if($current_flag == "A")
        {
            $artcl->array_of_Note = $Notes;
            $Articles [] = $artcl;
        }
        $prt->array_of_article =  $Articles;

        if($part_index == 0)
        {
            $prt->Part_id = $part_id;
        }
        $parts[] = $prt;
     /*   foreach ($parts as  $pa)
        {
            echo"فصل ". ($pa->num).  "  :  " ;
            echo ($pa->title) . "</br>";
            $articl = $pa->array_of_article;
            foreach ($articl as $a)
            {
                echo "ماده " . ($a->num) . " : ";

                foreach($a->txt as $t)
                {
                    var_dump($t);
                }

                foreach($a->array_of_paragraph as $t)
                {
                    var_dump($t);
                }
                foreach($a->array_of_Note as $key)
                {
                    echo "تبصره " . ($key->num) . " : " . "<br>";
                    foreach($key->txt as $t)
                    {
                        var_dump($t);
                    }
                    if($key->paragraph_flag)
                    {
                        var_dump($key->parent_paragraph_id);
                    }
                    foreach($key->array_of_paragraph as $p)
                    {
                        var_dump($p);
                    }
                }
            }

        }*/
        //   var_dump($law1);

        /* $this->law_model->insert_part_law($parts);*/
        return $parts;
    }
    function convertPersianNumbersToEnglish($srting, $line)
    {
        $srting = str_replace('۰', '0', $srting);
        $srting = str_replace('۱', '1', $srting);
        $srting = str_replace('۲', '2', $srting);
        $srting = str_replace('۳', '3', $srting);
        $srting = str_replace('۴', '4', $srting);
        $srting = str_replace('۵', '5', $srting);
        $srting = str_replace('۶', '6', $srting);
        $srting = str_replace('۷', '7', $srting);
        $srting = str_replace('۸', '8', $srting);
        $srting = str_replace('۹', '9', $srting);

        $flag = 0;
        $p = strpos($line, "فصل");
        if($p !== false)
        {
            $flag = 1;
        }
        $p = strpos($line, "بخش");
        if($p !== false)
        {
            $flag = 1;
        }
        if($flag == 1)
        {
            $srting = str_replace('اول', '1', $srting);
            $srting = str_replace('دوم', '2', $srting);
            $srting = str_replace('سوم', '3', $srting);
            $srting = str_replace('چهارم', '4', $srting);
            $srting = str_replace('پنجم', '5', $srting);
            $srting = str_replace('ششم', '6', $srting);
            $srting = str_replace('هفتم', '7', $srting);
            $srting = str_replace('هشتم', '8', $srting);
            $srting = str_replace('نهم', '9', $srting);
            $srting = str_replace('يازدهم', '11', $srting);
            //echo "string = " . $srting . "<br>";
            $srting = str_replace('دوازدهم', '12', $srting);
            $srting = str_replace('سیزدهم', '13', $srting);
            $srting = str_replace('چهاردهم', '14', $srting);
            $srting = str_replace('پانزدهم', '15', $srting);
            $srting = str_replace('شانزدهم', '16', $srting);
            $srting = str_replace('هفدهم', '17', $srting);
            $srting = str_replace('هجدهم', '18', $srting);
            $srting = str_replace('نوزدهم', '19', $srting);
            $srting = str_replace('دهم', '10', $srting);
            //echo "string = " . $srting . "<br>";
            $srting = str_replace('بیستم', '20', $srting);
        }
        return $srting;
    }

    function cleanSpaces($string) {
        while(substr($string, 0,1)==" ")
        {
            $string = substr($string, 1);
            $this->cleanSpaces($string);
        }
        /*while(substr($string, -1)==" ")
        {
            $string = substr($string, 0, -1);
            $this->cleanSpaces($string);
        }*/
        return $string;
    }
    function clean($string)
    {
        $string = str_replace('&zwnj;', " ", $string);
        $string = str_replace('zwnj;', " ", $string);
        $string = str_replace('&nbsp;', " ", $string);
        $string = str_replace('nbsp;', " ", $string);
        $string = str_replace('&mbp;', " ", $string);
        $string = str_replace('&amp;', " ", $string);
        $string = str_replace('amp;', " ", $string);
        // $string = preg_replace('/[a-zA-Z]/', '', $string);
        return $string;

    }

    function Find4FirstWord($line)
    {
        //echo htmlentities($line) . "</br>";
        $line2 = $this->clean($line);
        $str =  $this->multiexplode(array(" ", '-', ')', ':' ,'.'),htmlentities($line2));
        //var_dump($str);
        $t = implode(" ",($str));

        $t = $this->cleanSpaces(htmlentities($t));
        $t = $this->clean(htmlentities($t));
        $str = explode(" ",htmlentities($t));
        $count = 0;
        $words = array();
        foreach ($str as $s)
        {
            $flag1 = 0;
            if($count < 4)
            {
                if(strlen($s) != 0)
                {
                    if(($s != "") && ($s != " "))
                    {

                        $s = $this->convertPersianNumbersToEnglish($s, $line);
                        if(!is_numeric($s))
                        {
                            preg_match('/[0-9]+/',$s,$matches);
                            if(isset($matches[0]))
                            {
                                // echo "<br>";
                                $pos1 = strpos($s,$matches[0]);
                                $word = preg_replace("/[0-9]/", "", $s);
                                $pos2 = strpos($s,$word);
                                if($pos1 < $pos2)
                                {
                                    $words[$count++] = $matches[0];
                                    $words[$count++] = $word;
                                }
                                else
                                {
                                    $words[$count++] = $word;
                                    $words[$count++] = $matches[0];
                                }
                                $flag1 = 1;

                                $words[4] =  substr_count($words[0], '*');
                                if($words[4] != 0)
                                {
                                    $words[0] = $words[1];
                                    $count--;
                                }
                            }
                        }
                        if($flag1 == 0)
                        {
                            $words[$count++] = $s;
                        }
                    }
                }
            }
            else
            {
                break;
            }
        }
        return $words;
    }

    function show_parts_test()
    {
        $this->load->model('law_model');
        $this->law_model->get_all_parts_detail();
    }

    function createParagraph($line, $words ,$parent_text_id, $parent_paragraph_id,  $paragraph_id, $type)
    {
        $pgr = new Paragraph();
        $p = strpos($line,$words[1]);
        $sbstr = substr($line, $p);
        $pgr->txt = $sbstr;
        $pgr->paragraph_id = $paragraph_id ;
        $pgr->parent_id_txt = ($parent_text_id - 1);
        $pgr->parent_id_paragraph = $parent_paragraph_id;
        $pgr->num_or_partName = $type;
        $pgr->name_list = $words[0];
        return $pgr;
    }
}