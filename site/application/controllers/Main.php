<?php

   defined('BASEPATH') OR exit('No direct script access allowed');

   class Main extends CI_Controller {

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
       public $mainView = 'hotsale/';

       public function index() {




           $this->load->model('main_model');
           $tble_users = $this->main_model->get_table_();

           $d = array();
           $d['tble_users'] = $tble_users;
           $d['tbody'] = $this->load->view($this->mainView . 'tmpl/tbody_view', $d, true);

           $this->load->view($this->mainView . 'main_view', $d);
       }

       public function get_search_table() {

           if ($this->input->is_ajax_request() !== TRUE)
               return NULL;
           $this->load->library('wordslb');
           $this->load->model('main_model');

           $q = $this->wordslb->clearData($this->input->post('q'));

           $d = array();

           $d['tble_users'] = $this->main_model->get_search_in_table_($q);

           $this->sdjson->html = $this->load->view($this->mainView . 'tmpl/tbody_view', $d, true);
           return $this->sdjson->send_form();
       }

       public function addnew() {

           if ($this->input->is_ajax_request() !== TRUE)
               return NULL;

           $this->load->model('main_model');
           $this->load->library('wordslb');
           $dd = $d = array();

           $name = $this->wordslb->clearData($this->input->post('name'));
           $surname = $this->wordslb->clearData($this->input->post('surname'));
           $email = $this->wordslb->clearData($this->input->post('email'));
           $password = $this->wordslb->clearData($this->input->post('password'));
           $passwordt = $this->wordslb->clearData($this->input->post('passwordt'));

           if (strlen($password) < 6) {
               $this->sdjson->error_message = 'Пароль занад-то короткий, менше 6 сиволів!';
               return $this->sdjson->send_form();
           }
           if ($password !== $passwordt) {
               $this->sdjson->error_message = 'Паролі не співпадають!';
               return $this->sdjson->send_form();
           }


           $this->load->helper('email');
           if (!valid_email($email)) {
               $this->sdjson->error_message = 'Введіть правильно E-Mail!';
               return $this->sdjson->send_form();
           }


           $d = array();
           $d['name'] = $name;
           $d['surname'] = $surname;
           $d['email'] = $email;
           $d['paswrd'] = $password;
           $d['date_add'] = date('Y-m-d H:i:s');

           $id_return = $this->main_model->insert_new_($d);

           $this->sdjson->success_message = 'Запис додано!';
           return $this->sdjson->send_form();
       }

       public function change() {

           if ($this->input->is_ajax_request() !== TRUE)
               return NULL;

           $this->load->model('main_model');
           $this->load->library('wordslb');
           $dd = $d = array();

           $record = intval($this->wordslb->clearData($this->input->get('record')));

           $row = $this->main_model->get_one_($record);

           if (empty($row)) {
               $this->sdjson->error_message = 'Запис відсутній в базі!';
               return $this->sdjson->send_form();
           }
           settype($row, 'array');
           unset($row['paswrd']);
           unset($row['date_add']);
           unset($row['date_update']);

           $this->sdjson->data = $row;
           return $this->sdjson->send_form();
       }

       public function savechange() {

           if ($this->input->is_ajax_request() !== TRUE)
               return NULL;

           $this->load->model('main_model');
           $this->load->library('wordslb');
           $dd = $d = array();

           $record = intval($this->wordslb->clearData($this->input->post('record')));

           $row = $this->main_model->get_one_($record);

           if (empty($row)) {
               $this->sdjson->error_message = 'Запис відсутній в базі!';
               return $this->sdjson->send_form();
           }

           $name = $this->wordslb->clearData($this->input->post('name'));
           $surname = $this->wordslb->clearData($this->input->post('surname'));
           $email = $this->wordslb->clearData($this->input->post('email'));

           $this->load->helper('email');
           if (!valid_email($email)) {
               $this->sdjson->error_message = 'Введіть правильно E-Mail!';
               return $this->sdjson->send_form();
           }


           $d = array();
           $d['name'] = $name;
           $d['surname'] = $surname;
           $d['email'] = $email;
           $this->main_model->update_($record, $d);

           $this->sdjson->success_message = 'Запис змінено!';
           return $this->sdjson->send_form();
       }

       public function paswordsave() {

           if ($this->input->is_ajax_request() !== TRUE)
               return NULL;

           $this->load->model('main_model');
           $this->load->library('wordslb');
           $dd = $d = array();

           $record = intval($this->wordslb->clearData($this->input->post('record')));

           $row = $this->main_model->get_one_($record);

           if (empty($row)) {
               $this->sdjson->error_message = 'Запис відсутній в базі!';
               return $this->sdjson->send_form();
           }


           $password = $this->wordslb->clearData($this->input->post('password'));
           $passwordt = $this->wordslb->clearData($this->input->post('passwordt'));

           if (strlen($password) < 6) {
               $this->sdjson->error_message = 'Пароль занад-то короткий, менше 6 сиволів!';
               return $this->sdjson->send_form();
           }
           if ($password !== $passwordt) {
               $this->sdjson->error_message = 'Паролі не співпадають!';
               return $this->sdjson->send_form();
           }

           $d = array();
           $d['paswrd'] = $password;
           $this->main_model->update_($record, $d);

           $this->sdjson->success_message = 'Пароль змінено!';
           return $this->sdjson->send_form();
       }

       public function destroy() {

           if ($this->input->is_ajax_request() !== TRUE)
               return NULL;

           $this->load->model('main_model');
           $this->load->library('wordslb');
           $dd = $d = array();

           $record = intval($this->wordslb->clearData($this->input->get('record')));

           $row = $this->main_model->get_one_($record);

           if (empty($row)) {
               $this->sdjson->error_message = 'Запис відсутній в базі!';
               return $this->sdjson->send_form();
           }
           $this->main_model->delete_($record);

           $this->sdjson->success_message = 'Видалено!';
           return $this->sdjson->send_form();
       }
   }
   