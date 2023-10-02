<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    
    public $nowLanguge = 1;


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
          
                 $this->load->model("first_model");
            
            $nowLanguge =   $this->session->userdata('main_lang');
            if(!empty($nowLanguge)){
                $this->nowLanguge = $nowLanguge;
            }
            
           
            
            
            
	 
            $d = array();
            $d['main_content']= $this->getMain();
            
            $d['langrow']=$this->first_model->get_one_language($nowLanguge);
            $d['buttons']=$this->buttons_model->select_in_buttons(0, $this->nowLanguge);
            $d['page'] =   $this->buttons_model->select_one_page(35, $this->nowLanguge);
            $this->load->view($this->mainView.'main_view', $d);
	}
        
        
        
        
        
        
        
         private function  getMain(){
              $d=array();
                   $this->load->model("first_model");
              $d['buttons']=$this->buttons_model->select_in_buttons(0, $this->nowLanguge);
             // $d['bs']=$this->buttons_model->select_in_buttons(26, $this->nowLanguge);
             // $d['buttons_about']=$this->buttons_model->select_in_buttons(8,$this->nowLanguge);
              
              $d['language_table'] = $this->first_model->get_table_language();
              $d['about_comics'] = $this->buttons_model->select_table_in_pages(26, $this->nowLanguge);
              $d['about_comics'] = $this->buttons_model->select_table_in_pages(26, $this->nowLanguge);
               $d['about'] =   $this->buttons_model->select_one_page(35, $this->nowLanguge);
              return $this->load->view($this->mainView.'main/about_view', $d,true);
            
        }
        
        
        
        
   
        
        
        
        
        
}
