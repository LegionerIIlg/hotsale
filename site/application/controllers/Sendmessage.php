<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


    
       
       
       
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of form_library
 *
 * @author Администратор
 */
class Sendmessage extends CI_Controller {


    
    
       private $array_email = array('inuabeststart@gmail.com', 'ivko_piter@ukr.net', 'yurko2012.yk@gmail.com' );
      
       private $email_from1 = 'info@comics.in.ua';
       private $email_from2 = 'support@dovidkove.com';
    

    public function __construct() {
        parent::__construct();
    }

    public function index() {
           
              if ($this->input->is_ajax_request() !== TRUE)
            return NULL;
              
        $this->load->library('wordslb');
        $name = $this->wordslb->clearData($this->input->post('pip'));
        $phone = $this->wordslb->clearData($this->input->post('phone'));
        $email = $this->wordslb->clearData($this->input->post('email'));
      $ses_id = $this->wordslb->clearData($this->input->post('ses_id'));
    
       
      $ses_id_ses =   $this->session->userdata('ses_input');
        
        if (strlen($ses_id) < 5) {
            $this->sdjson->error_message = 'Перезавантажте сторінку та спробуйте знову!';
            return $this->sdjson->send_form();
        }
         if (strlen($ses_id_ses) < 5) {
            $this->sdjson->error_message = 'Перезавантажте сторінку та спробуйте знову!';
            return $this->sdjson->send_form();
        }
        
         if ($ses_id_ses !== $ses_id) {
            $this->sdjson->error_message = 'Перезавантажте сторінку та спробуйте знову!';
            return $this->sdjson->send_form();
        }
        
        $textmessage = $this->wordslb->clearData($this->input->post('message'));

        if (strlen($name) < 3) {
            $this->sdjson->error_message = 'Невказано П.І.П!';
            return $this->sdjson->send_form();
        }




        if (strlen($phone) < 8) {
            $this->sdjson->error_message = 'Невказано телефон!';
            return $this->sdjson->send_form();
        }
        if (strlen($email) < 3) {
            $this->sdjson->error_message = 'Невказано email!';
            return $this->sdjson->send_form();
        }


        if (strlen($textmessage) < 4) {
            $this->sdjson->error_message = 'Невказано повідомлення!';
            return $this->sdjson->send_form();
        }
        
          if (strlen($textmessage) > 300) {
            $this->sdjson->error_message = 'Текст завеликий!';
            return $this->sdjson->send_form();
        }
        


        $email_text = '<b>П.І.П:</b> ' . $name . '<br>'; // $this->load->view('email/email_view', $row, TRUE);
        $email_text .= '<b>Email:</b>  ' . $email . '<br>';
        $email_text .= '<b>Телефон:</b>  ' . $phone . '<br>';

        $email_text .= '<b>Повідомлення:</b>  ' . nl2br($textmessage);

        $this->load->library('email');
        $this->load->helper('url');
        $arr_src = array('http://', 'https://', '/');

        $name_url = str_replace($arr_src, '', base_url());

        $email_table = $this->array_email;

        if (!empty($email_table))
            foreach ($email_table as $ke => $ve) {
                $this->email->from($this->email_from1, $name_url)
                        ->to($ve)
                        ->subject('Povidomlennya z saytu ' . $name_url)
                        ->message($email_text)
                        ->set_mailtype('html');
                $this->email->send();
                $this->email->clear();
            }


            $this->email->from($this->email_from2, $name_url)
                        ->to( $this->email_from1)//($this->email_sente)
                        ->subject('Povidomlennya z saytu ' . $name_url)
                        ->message($email_text)
                        ->set_mailtype('html');
                $this->email->send();
                $this->email->clear();



        $this->load->model('sendmessage_model');
        $d = array();
        $d['name'] = $name;
        $d['phone'] = $phone;
        $d['quest'] = $textmessage;
        $d['datein'] = date('Y-m-d H:i:s');
        $d['email'] = $email;
        $this->sendmessage_model->insert_new_message($d);

        $this->sdjson->success_message = "Повідомлення надіслано!<br> "
                . "Дякуємо за Ваше повідомленн!<br>"
                . " Слава Україні!";
        return $this->sdjson->send_form();
    }

}

?>
