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
                        . ' email, '
                        . 'surname,, '
                        . 'email,'
                        . 'paswrd, '
                        . 'date_add, '
                        . 'date_update')
                ->from('users')
                ->order_by('id DESC');
        return $querty->get()
                        ->result_array();
    }
    
     public function get_one_($id) {
        $querty = $this->db->select('id, name, surname, '
                        . ' email, '
                        . 'surname,, '
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
