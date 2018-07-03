<?php
/**
 * Created by PhpStorm.
 * User: Mina2
 * Date: 3/11/2018
 * Time: 3:12 PM
 */

class CI_menu  extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }
    function get_user_access($user_id)
    {

        $this->db->select("*");
        $this->db->from('role');
        $this->db->where('user_id',"{$user_id}");
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            $row = $query->row();
            $access_level = $row->access_level;
            $levels = explode(" ",$access_level);
            return $levels;
        }
        return null;
    }
    function get_sidebar_menu($levels)
    {
        $menus  = array();
        $submenus  = array();

        if (isset($levels))
        {
            foreach ($levels as $level)
            {
                if ($level>0)
                {
                    $this->db->select("*");
                    $this->db->from('menu');
                    $this->db->where('access_id',"{$level}");
                    $all_menu = $this->db->get();

                    if($all_menu->num_rows() > 0)
                    {
                        foreach ($all_menu->result() as $r)
                        {
                            if(isset($r->parent_id))
                            {
                                $t = $this->fill_temp($r);
                                $t['parent_id'] = $r->parent_id;
                                $submenus[] = $t;
                            }
                            else
                            {
                                $menus[]=$this->fill_temp($r);
                            }
                        }
                    }
                }
            }
        }
        $this->db->select("*");
        $this->db->from('menu');
        $this->db->where('access_id',"0");
        $all_menu = $this->db->get();
        foreach ($all_menu->result() as $r)
        {
            if(isset($r->parent_id))
            {
                $t = $this->fill_temp($r);
                $t['parent_id'] = $r->parent_id;
                $submenus[] = $t;
            }
            else
            {
                $menus[]=$this->fill_temp($r);
            }
        }
        $menus2 = array();
        foreach($menus as $menu)
        {
            $menu['classes'] = "arrow-r";
            foreach($submenus as $submenu)
            {
                if($submenu['parent_id'] == $menu['id'])
                {
                    $menu['classes'] = "collapsible-header waves-effect arrow-r";
                    break;
                }
            }
            $menus2[] = $menu;
        }

        //var_dump($menus2);
        //var_dump($submenus);
        return array('menus'=>$menus2, 'submenus'=>$submenus);
    }
    function fill_temp($r)
    {
        $temp =array('title'=>"", 'id'=>'','url'=>"",'classes'=>"");
        $temp['title'] = $r->title;
        $temp['id'] = $r->id;
        if(isset($r->uri))
        {
            if($r->acive == 1)
            {
                $temp['url'] = base_url()."{$r->uri}";
            }
            else
            {
                $temp['url'] = "";
            }
        }
        else
        {
            $temp['url'] = "";
        }
        return $temp;
    }
    function get_top_menu_name($user_id)
    {
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('id',"$user_id");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            $row = $query->row();
            $name = $row->name;
            $family = $row->family;
            return $name . " " . $family;
        }
        return " ";
    }
}