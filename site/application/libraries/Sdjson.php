<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sdjson {
     public $error_message;
    public $success_message;
    public $html;
    public $data;
    private $CI;
    public function __construct() {
        $this->CI = & get_instance();
    }
    

    public function send_form() {
        $d = array();
        if (!empty($this->error_message)){
        $this->CI->output->set_status_header('500','Internal Server Error');
        $this->CI->output->set_header("HTTP/1.0 500 Internal Server Error");
        $this->CI->output->set_header("HTTP/1.1 500 Internal Server Error");
            
        $d['error'] = $this->error_message;}
        if (!empty($this->success_message))
            $d['success'] = $this->success_message;
        if (!empty($this->html))
            $d['html'] = $this->html;

        if (!empty($this->data))
            $d['danue'] = $this->data;

        $this->CI->output
                ->set_content_type('application/json')
                ->set_output(json_encode($d));

        return 1;
    }
}




