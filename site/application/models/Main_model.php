<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of keywords_model
 *
 * @author Администратор
 */
class Main_model extends CI_Model {

   



    public function get_count() {
        $querty = $this->db->select('count(id) as count')
                ->from('users');


        return $querty->order_by('id', 'ASC')
                        ->get()
                        ->row()
                ->count;
    }

   

    public function get_table_() {
        $querty = $this->db->select('id, name, surname, '
                        . 'email,'
                        . 'paswrd, '
                        . 'date_add, '
                        . 'date_update')
                ->from('users')
                ->order_by('id DESC');
        return $querty->get()
                        ->result_array();
    }
    
    
    
    public function get_search_in_table_($search) {
          
        $this->db->query( " CREATE TEMPORARY TABLE IF NOT EXISTS  
            tmp_page (`page` int(11) NOT NULL, 
            KEY `page` (`page`) ) ENGINE = MEMORY ");
        
        $where = '';
        
        if(!empty($search)){
          $search_arr = explode(' ', $search);
          if(!empty($search_arr))
          foreach ($search_arr as $val) {
              if(!empty($where)) $where .= ' AND ';
          $where .= ' CONCAT_WS( " ", id, name, surname,  email, paswrd  )  LIKE '. "'%".$val."%' ";
          }
          }
        if(!empty($where)) $where = ' WHERE '. $where;
        
         $this->db->query("INSERT INTO tmp_page (page )"
                . " SELECT id   FROM ( users ) 
             $where  ORDER BY  id DESC; ");
        
        
        
        
      $querty = $this->db->select('id, name, surname, '
                        . 'email,'
                        . 'paswrd, '
                        . 'date_add, '
                        . 'date_update')
                ->from('users')
              ->join('tmp_page','tmp_page.page=users.id')
                ->order_by('id DESC');
        return $querty->get()
                        ->result_array();
      
    }










    public function get_one_($id) {
        $querty = $this->db->select('id, name, surname, '
                        . 'email,'
                        . 'paswrd, '
                        . 'date_add, '
                        . 'date_update')
                ->from('users')
                ->order_by('id DESC')
                ->limit(1)
                ->where('id',$id);
        return $querty->get()
                        ->row();
    }
    
      public function insert_new_($d) {
        $this->db->insert('users', $d);
        return $this->db->insert_id();
    }
  public function update_($id, $data) {
        $id = intval($id);
        if ($id > 0) {
            $this->db->where('id', $id)
                    ->limit(1)
                    ->update('users', $data);
        }
    }
    
    
     public function delete_($id) {
        if ($id > 0) {
            $this->db->where('id', $id)
                    ->limit(1)
                    ->delete('users');
           
           
        }
    }
  
    

}

?>
