<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

    public $nowLanguge = 1;

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public $mainView = 'mykytka/';
    
    
    private $url_download = '';




   public function __construct() {
       parent::__construct();
        $this->url_download = $_SERVER['DOCUMENT_ROOT'] . '/comics_ftp_inner_/';
       
    }

    


    private function file_force_download($file, $fileName) {
        if (file_exists($file)) {
            // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
            // если этого не сделать файл будет читаться в память полностью!
            if (ob_get_level()) {
                ob_end_clean();
            }
            // заставляем браузер показать окно сохранения файла
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            // читаем файл и отправляем его пользователю
            if ($fd = fopen($file, 'rb')) {
                while (!feof($fd)) {
                    print fread($fd, 1024);
                }
                fclose($fd);
            }
            exit;
        }
    }

    
    public function index(){
         
        $this->load->model('pay_model');
       $id = $this->session->userdata('id_user');
       //$id=2;
        $this->load->helper('url');
        if (empty($id)) {
            redirect(base_url(), 'location');
        }

        $dd['active'] = 1;
        $this->pay_model->payment_update($id, $dd);
        
        
        $row = $this->pay_model->get_one_payment_active($id);
        
        if (empty($row)) {
            redirect(base_url(), 'location');
        }
        
         $pp = $this->buttons_model->select_in_buttons(31, $this->nowLanguge);

       
     
        
        
        
        $this->load->model("first_model");
        $nowLanguge = $this->session->userdata('main_lang');
        if (!empty($nowLanguge)) {
            $this->nowLanguge = $nowLanguge;
        }

        
      
        
        
      $d =  $dd = array();
      $dd['page'] = $this->buttons_model->select_one_page(38, $this->nowLanguge);
      $dd['pay_comics']=$row;
      $dd['bc']=$pp;
      $dd['buttons'] = $this->buttons_model->select_in_buttons(0, $this->nowLanguge);
    //  $dd['email_text'] = str_replace('<br>','</p><p>', $email_text);
      $d['main_content'] = $this->load->view($this->mainView . 'download/d_main_view', $dd, true);
      $d['langrow'] = $this->first_model->get_one_language($nowLanguge);
      $d['buttons'] = $this->buttons_model->select_in_buttons(0, $this->nowLanguge);
      $d['page'] = $this->buttons_model->select_one_page(38, $this->nowLanguge);
      $this->load->view($this->mainView . 'main_small_view', $d);  
         
        
        
        
    }

    
    private function checked_active(){
       $this->load->model("pay_model");
        $id = $this->session->userdata('id_user');
        //$id=2;
        $this->load->helper('url');

        
        $flag = true;
        
        if (empty($id)) {
           // return $this->error_get();
        
            $flag =false;
        }
        
       $row =  $this->pay_model-> get_one_payment($id);
       if (empty($row)) {
          //  return $this->error_get();
           $flag =false;
        }
         
       $ses_id= $this->uri->segment(3);
         
         if(!empty($ses_id)){
            $row =  $this->pay_model->get_one_payment_by_sess($ses_id);
            if(empty($row)){
                $flag = false;
            }else{
                $flag = true;
            $id = $row->id; 
                
            }
         }
         
         $active_row =  $this->pay_model->chack_active_payment($id);
         if(empty($active_row)){
           $flag = false;  
         }
         
       
         if(!empty($row->download_count))
         if($row->download_count>1){
          $flag = false;   
          } 
         if($row->id_comics==10123){
         if($row->download_count<10){
          $flag = true;   
          }else{
           $flag = false;   
          }    
             
         }
         
         
          if($row->id_comics==103){
         if($row->download_count<7){
          $flag = true;   
          }else{
           $flag = false;   
          }    
             
         }
         
         
         
         
         
         
         
        if($flag==false){
            return Null;
        } 
        
        return $row;
       
         
         
    }
     private function update_dowload($id) {

        $this->load->model("pay_model");
        $row = $this->pay_model->get_one_payment($id);

        $d = array();
        $d['download_count'] = intval($row->download_count) + 1;

        $this->pay_model->payment_update($id, $d);
        return 1;
    }





    public function one() {

        $row =    $this->checked_active();
        if(empty($row)){
         return $this->error_get();    
         }
         
         
         
       /*  if($row->id_comics==1 or $row->id_comics==2 ){
           return $this->error_get();   
         }*/ 
         $fl = false;
         switch ($row->id_comics) {
             case 1:$fl =true;  break;
             case 10123:$fl =true; break;
             default:
                 $fl =false;
         }
         
         
         
         if($fl ==false ){
           return $this->error_get();   
         }
          $this->update_dowload($row->id);
          
          
        $filename =  $this->url_download.'_p1.pdf';
        return $this->file_force_download($filename, 'Prygody_Mykytky_1.pdf');
    }

    public function two() {

        
         $row =    $this->checked_active();
        if(empty($row)){
         return $this->error_get();    
         }
        
         
   
         
         $fl = false;
         switch ($row->id_comics) {
             case 10123:$fl =true;  break;
             case 2:$fl =true; break;
             default:
                 $fl =false;
         }
         
         
         
         if($fl ==false ){
           return $this->error_get();   
         }
         
          $this->update_dowload($row->id);
          

        $filename = $this->url_download.'_p2.pdf';
        return $this->file_force_download($filename, 'Prygody_Mykytky_2.pdf');
    }
    
    

  

    public function tree() {

        
         $row =    $this->checked_active();
        if(empty($row)){
         return $this->error_get();    
         }
         
         $fl = false;
         switch ($row->id_comics) {
             case 10123:$fl =true;  break;
             case 103:$fl =true; break;
             default:
                 $fl =false;
         }
         
         if($fl ==false ){
           return $this->error_get();   
         }
         
        $this->update_dowload($row->id);
        $filename = $this->url_download.'_p3.pdf';
        return $this->file_force_download($filename, 'Prygody_Mykytky_3.pdf');
    }

   

    private function error_get() {

        $this->load->model("first_model");
      $this->load->model("pay_model");

        $nowLanguge = $this->session->userdata('main_lang');
        if (!empty($nowLanguge)) {
            $this->nowLanguge = $nowLanguge;
        }

        $this->session->unset_userdata('id_user');

        $dd = array();

        $dd['buttons'] = $this->buttons_model->select_in_buttons(0, $this->nowLanguge);
        $dd['language_table'] = $this->pay_model->get_table_language();
        $dd['about_comics'] = $this->buttons_model->select_table_in_pages(26, $this->nowLanguge);
        $dd['about_comics'] = $this->buttons_model->select_table_in_pages(26, $this->nowLanguge);
        $dd['about'] = $this->buttons_model->select_one_page(39, $this->nowLanguge);
        $dd['ab'] = $this->buttons_model->select_in_buttons(36, $this->nowLanguge);

        $d = array();
        $d['main_content'] = $this->load->view($this->mainView . 'download/error_view', $dd, true);
        
        $d['langrow'] = $this->first_model->get_one_language($nowLanguge);
        $d['buttons'] = $this->buttons_model->select_in_buttons(0, $this->nowLanguge);
        $d['page'] = $this->buttons_model->select_one_page(39, $this->nowLanguge);
        $this->load->view($this->mainView . 'main_view', $d);
    }

}
