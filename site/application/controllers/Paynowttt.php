<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paynowttt extends CI_Controller {

    public $nowLanguge = 1;

    public $public_key = 'i78160881345';
    
    public $private_key = 'AOwC8W5hbryF4tdymZD4foTrLj4teoQRNw2U4TJU';




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

    public function index() {

        $this->load->model("first_model");

        $nowLanguge = $this->session->userdata('main_lang');
        if (!empty($nowLanguge)) {
            $this->nowLanguge = $nowLanguge;
        }

        $d = array();
        $d['main_content'] = $this->getMain();
        $d['modal_content']= $this->load->view($this->mainView.'modal/modal_pay_view', $d,true);

        $d['langrow'] = $this->first_model->get_one_language($nowLanguge);
        $d['buttons'] = $this->buttons_model->select_in_buttons(0, $this->nowLanguge);
        $d['page'] = $this->buttons_model->select_one_page(37, $this->nowLanguge);
        $this->load->view($this->mainView . 'main_small_view', $d);
    }
    
    private function getMain() {
        
        $d = array();
        $d['row'] = 1;

        return $this->load->view($this->mainView . 'paymenttt/payment_main_view', $d, true);
    }
    
    
    
    public function buy_comics()
    {
        $is_ajax = $this->input->is_ajax_request();
         $this->load->helper('url');
        
        if($is_ajax) {
            $post = $this->input->post();
             
            $order_id = 'comics_'.rand(10000, 99999);
           $urlPay =  $_SERVER['DOCUMENT_ROOT'].'/site/application/libraries/LiqPay.php';
            
            
            require($urlPay);
         
 
 
            $liqpay = new LiqPay($this->public_key, $this->private_key);
            $form = $liqpay->cnb_form(array(
                'version'        => '3',
                'action'        =>  'pay',
                'amount'         => 10, //сума
                'currency'       => 'UAH',
                'description'    => 'Pay comics comics.in.ua',
                'order_id'       => $order_id,
                'language'      => 'uk',
                //'paytypes'          => 'card',
                'result_url'    => 'https://comics.in.ua/paynowttt/pay_ok/',
                'verifycode' => 'Y',
                'server_url' =>'https://comics.in.ua/paynowttt/set_ok_pay/'
            ));
 
            

            
            
        $this->sdjson->success_message = $form;
        
        }
        else{
           $this->sdjson->error_message = 'Не проплачено!';
         
        }
        
        return $this->sdjson->send_form(); 
    }
    
    
    
    
    public function pay_ok() {

        $this->load->model("first_model");

        $nowLanguge = $this->session->userdata('main_lang');
        if (!empty($nowLanguge)) {
            $this->nowLanguge = $nowLanguge;
        }

        $d = array();
        $d['main_content'] = 'ok_skfdjkldjsfkljdslkf';
        $d['modal_content']= $this->load->view($this->mainView.'modal/modal_pay_view', $d,true);

        $d['langrow'] = $this->first_model->get_one_language($nowLanguge);
        $d['buttons'] = $this->buttons_model->select_in_buttons(0, $this->nowLanguge);
        $d['page'] = $this->buttons_model->select_one_page(37, $this->nowLanguge);
        $this->load->view($this->mainView . 'main_small_view', $d);
    }
    
    
        private function set_ok_pay()
    {
            $data = 'ok';
             
                $url_file=   $_SERVER['DOCUMENT_ROOT'].'telegram_api.txt';
             
        $fh = fopen($url_file, 'a') or die('can\'t open file');
        fwrite($fh, date('d.m.Y H:i:s') . "\n");
        ((is_array($data)) || (is_object($data))) ? fwrite($fh, print_r($data, TRUE) . "\n") : fwrite($fh, $data . "\n");
        fclose($fh);
    }
    
    
    
/*
    private function getMain() {
        $d = array();
        $this->load->model("pay_model");
        $id = $this->session->userdata('id_user');
        $this->load->helper('url');
        if (empty($id)) {
            redirect(base_url(), 'location');
        }

        $d['buttons'] = $this->buttons_model->select_in_buttons(0, $this->nowLanguge);
        $d['language_table'] = $this->pay_model->get_table_language();
        $d['about_comics'] = $this->buttons_model->select_table_in_pages(26, $this->nowLanguge);
        $d['about_comics'] = $this->buttons_model->select_table_in_pages(26, $this->nowLanguge);
        $d['about'] = $this->buttons_model->select_one_page(37, $this->nowLanguge);
        $d['ab'] = $this->buttons_model->select_in_buttons(36, $this->nowLanguge);
        
        $row = $this->pay_model->get_one_payment($id);

        if (empty($row)) {
            redirect(base_url(), 'location');
        }
        $kod = 'payment_one_kod_view';

        switch ($row->id_comics) {
            case '1':$kod = 'payment_one_kod_view';
                break;
            case '2':$kod = 'payment_one_and_two_kod_view';
                break;
            case '3':$kod = 'payment_two_kod_view';
                break;
            default: $kod = 'payment_one_kod_view';
                break;
        }
        $d['row'] = $row;

        return $this->load->view($this->mainView . 'payment/payment_main_view', $d, true) .
                $this->load->view($this->mainView . 'payment/' . $kod, $d, true);
    }

    */
    
}
