<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mykytka extends CI_Controller {

    
    public $nowLanguge = 1;

    public  $modal_content='';

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    
    
        public $mainView = 'mykytka/';





        public function index()
	{
            //$this->load->library('cachemy');
            
          //  $main_html =   $this->cachemy->load('mainpage');
            
          if(!empty($main_html)){
                echo $main_html;
                return NULL;
            };
            
            
            $nowLanguge =   $this->session->userdata('main_lang');
            if(!empty($nowLanguge)){
                $this->nowLanguge = $nowLanguge;
            }
            
            
            
            
            $this->load->model("first_model");
            $this->load->model('pay_model');
            $d = array();
            $d['main_content']= $this->getMain();
            $d['modal_content'] = $this->modal_content;
            
            $d['langrow']=$this->first_model->get_one_language($nowLanguge);
            $d['buttons']=$this->buttons_model->select_in_buttons(0, $this->nowLanguge);
            $d['buttons']=$this->buttons_model->select_in_buttons(0, $this->nowLanguge);
            $this->load->view($this->mainView.'main_view', $d);
            
            //$this->cachemy->save('mainpage', $main_html, 846000);
           // echo $main_html;
	}
        
        
        
        
        
        
        
         private function  getMain(){
              $d=array();
                  
            $id = $this->session->userdata('id_user');
            if(!empty($id)){
            $d['pay_comics'] = $this->pay_model->get_one_payment_active($id);
            $d['bc'] = $this->buttons_model->select_in_buttons(31, $this->nowLanguge);
            }
            
              
              
              $d['buttons']=$this->buttons_model->select_in_buttons(0, $this->nowLanguge);
              $d['bs']=$this->buttons_model->select_in_buttons(26, $this->nowLanguge);
              $d['buttons_about']=$this->buttons_model->select_in_buttons(8,$this->nowLanguge);
              $d['payosht_b']=$this->buttons_model->select_in_buttons(41,$this->nowLanguge);
              
              $d['language_table'] = $this->first_model->get_table_language();
              $d['pages_table_one'] = $this->first_model->get_table_pages(12, 1);
              $d['pages_table_two'] = $this->first_model->get_table_pages(13, 1);
              $d['obkladenka_t'] = $this->first_model->get_table_pages(14, 1);
              $d['about_comics'] = $this->buttons_model->select_table_in_pages(26, $this->nowLanguge);
              
                $comics_pages = $this->buttons_model->select_table_in_pages(14, $this->nowLanguge);
              
              
              
             
             if(!empty($comics_pages))
                 foreach ($comics_pages as $kc => $vc) {
                     $comics_pages[$kc]['galery'] = $this->buttons_model->select_table_in_pages_galery($vc['id']);
                     }
             
              
              $d['comics_pages'] =$comics_pages;
            /*  echo '<pre>';
              print_r($d['comics_pages']);
              echo '</pre>';*/
             $ses_id =date('YdmHis').rand(1,100000);  
              
            $this->session->set_userdata('ses_input',$ses_id);
            $d['hash'] = $ses_id; 
              
              
              
              $this->modal_content =  $this->load->view($this->mainView.'modal/modal_content_view',$d, true);
              return $this->load->view($this->mainView.'main/main_content_view', $d,true);
            
        }
        
        
        public function  change_lang(){
              $d=array();
            $id =   $this->input->get('id');
              
              $this->session->set_userdata('main_lang', $id);
              $this->sdjson->success_message = 'ok';
              $this->sdjson->send_form();
              
              
        }
        
       
        
         public function  get_one_page($id){
             
              $nowLanguge =   $this->session->userdata('main_lang');
            if(!empty($nowLanguge)){
                $this->nowLanguge = $nowLanguge;
            }
            $id_row = intval($id);
          
            $row = $this->buttons_model->select_one_page($id_row, $this->nowLanguge);
            if(empty($row)){
                 $this->sdjson->error_message = 'Not exist!';
          return    $this->sdjson->send_form(); 
                
            }
            
            $this->sdjson->data['body'] = $row;
            $this->sdjson->data['url'] =trim($row->dop1);
          return    $this->sdjson->send_form();
            
         }
        
        public function get_page_now_bf_af(){
             
            $this->load->library('wordslb');
            $id_now  = intval($this->wordslb->clearData($this->input->get('id')));
            $action  = $this->wordslb->clearData($this->input->get('action'));
            
              $nowLanguge =   $this->session->userdata('main_lang');
            if(!empty($nowLanguge)){
                $this->nowLanguge = $nowLanguge;
            }
            
            if(empty($id_now)){
                 $this->sdjson->error_message = 'Not exist!';
                 return $this->sdjson->send_form(); 
                
            }
            
            
          $table =   $this->buttons_model->select_table_in_pages(26, $this->nowLanguge);
          
            if(empty($table)){
                 $this->sdjson->error_message = 'Not exist!';
                 return $this->sdjson->send_form(); 
                
            }
          
            $key_st = '';
            $key_max = '';
         
            $table_tmp = array();
            $i = 1;
            foreach ($table as $kk  => $v){
            $table_tmp[$i]['id'] = $v['id'];
            $i++;
            }
            
            
            
            foreach ($table_tmp as $kt => $vt) {
                  if($vt['id']==$id_now){$key_st=$kt;}
                  $key_max = $kt;
                  }
              
          
            if($action=='beafore'){
                if($key_st>1){$key_st=$key_st-1;} 
                else {$key_st=$key_max;}
            }else{
                if($key_max>$key_st){
                    $key_st=$key_st+1;
                } else {
                  $key_st=1; 
                }
            }
        
            
         /*   echo $key_max;
          echo '<br/>';
            echo $key_st;
            
            echo '<pre>';
            print_r($table_tmp);
            echo '</pre>';
            return null;*/
            
            
            
            
          $id=$table_tmp[$key_st]['id'];
          
            
            $id_row = intval($id);
          
            $row = $this->buttons_model->select_one_page($id_row, $this->nowLanguge);
            if(empty($row)){
                 $this->sdjson->error_message = 'Not exist!';
          return    $this->sdjson->send_form(); 
                
            }
            
            $this->sdjson->data['body'] = $row;
            $this->sdjson->data['url'] =trim($row->dop1);
          return    $this->sdjson->send_form();
            
         }
         
         
         
         public function remve_first_cashe() {
           $this->load->library('cachemy');
           $this->cachemy->remove('mainpage');  
           $this->sdjson->success_message = 'Chashe remove!';
          return    $this->sdjson->send_form();  
         }
        
      
        
}
