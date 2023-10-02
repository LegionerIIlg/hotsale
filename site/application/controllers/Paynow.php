<?php

   defined('BASEPATH') OR exit('No direct script access allowed');

   class Paynow extends CI_Controller {

       public $nowLanguge = 1;
       private $public_key = 'i78160881345';
       private $private_key = 'AOwC8W5hbryF4tdymZD4foTrLj4teoQRNw2U4TJU';

       private $array_email = array('inuabeststart@gmail.com', 'ivko_piter@ukr.net', 'yurko2012.yk@gmail.com');
      
       private $email_from1 = 'info@comics.in.ua';
       private $email_from2 = 'support@dovidkove.com';




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
  
       
       private function sendmessage_chack_pay($row, $id_comics) {
          
           if (empty($row)) {
               return NULL;
           }
       
           
           
           
              
                 
                 
           $email_text = '<b>Спроби купити: </b>' . $row['name'] . '<br>';
          if(!empty($row['novapost_name'])){ 
          $email_text .= '<b>Прізвище: </b>' . $row['novapost_name']. '<br>';}
           $email_text .= '<b>Дата: </b>' . date('d.m.Y H:i:s', strtotime($row['datein'])) . '<br>';
           $email_text .= '<b>Ваш телефон: </b>' . $row['phone'] . '<br>';
           $email_text .= '<b>Ваш Email: </b>' . $row['email'] . '<br>';
           
           $email_text .= '<b>Сума замовлення: </b>' . $row['summ'] . '<br>';
           if (intval($row['id_comics']) == 1) {
               $email_text .= '<b>Кількість: </b>' . $row['count_pay'] . '<br>';
               $email_text .= '<b>Адреса доставки: </b>' . $row['adressa'] . '<br>';
           }
           $email_text .= '<b>Замовлено:</b>  ' . $row['name_comics'];

                 $this->load->helper('url');
           $this->load->library('email');
           $email_table = $this->array_email;
     
              $baseUrl = str_replace('https://', '', base_url());
           $baseUrl = str_replace('/', '', $baseUrl);

           if (!empty($email_table))
               foreach ($email_table as $ke => $ve) {
                   $this->email->from($this->email_from1, $baseUrl)
                           ->to($ve)//($this->email_sente)
                           //->subject('Sproba kupivli')
                           ->subject($id_comics.' - Zapovnennya zayavku na kupivlyu')
                           ->message($email_text)
                           ->set_mailtype('html');
                   $this->email->send();
                   $this->email->clear();
               }  
           
           return 'ok';
           
       }






       public function index() {

           $this->load->model("first_model");

           $nowLanguge = $this->session->userdata('main_lang');
           if (!empty($nowLanguge)) {
               $this->nowLanguge = $nowLanguge;
           }

           $d = array();
           $d['main_content'] = $this->getMain();

           $d['langrow'] = $this->first_model->get_one_language($nowLanguge);
           $d['buttons'] = $this->buttons_model->select_in_buttons(0, $this->nowLanguge);
           $d['page'] = $this->buttons_model->select_one_page(37, $this->nowLanguge);
           $this->load->view($this->mainView . 'main_small_view', $d);
       }

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

           $d['data_kod'] = $this->session->userdata('dd');
           $d['signature_kod'] = $this->session->userdata('ss');

           $row = $this->pay_model->get_one_payment($id);

           if (empty($row)) {
               redirect(base_url(), 'location');
           }

           $kod = 'payment_kod_view';

           $d['row'] = $row;

           return $this->load->view($this->mainView . 'payment/payment_main_view', $d, true) .
                   $this->load->view($this->mainView . 'payment/' . $kod, $d, true);
       }

       public function get_pay_now() {

           if ($this->input->is_ajax_request() !== TRUE)
               return NULL;

           $this->load->model('pay_model');
           $this->load->library('wordslb');
           $dd = $d = array();
           // $dd['br'] = $this->buttons_model->select_table_buttons('34', 1);

           $name = $this->wordslb->clearData($this->input->post('pip'));
           $email = $this->wordslb->clearData($this->input->post('email'));
           $phone = $this->wordslb->clearData($this->input->post('phone'));
           $sum = floatval($this->wordslb->clearData($this->input->post('summ')));
           $id_comics = $this->wordslb->clearData($this->input->post('idc'));
           $name_comics = $this->wordslb->clearData($this->input->post('name_comics'));
           $oplata = 0; // intval($this->wordslb->clearData($this->input->post('oplata')));

           $this->load->helper('email');
           if (!valid_email($email)) {
               $this->sdjson->error_message = 'Введіть правильно E-Mail!';
               return $this->sdjson->send_form();
           }
           $d = array();
           $d['name'] = $name;
           $d['phone'] = $phone;
           $d['email'] = $email;
           $d['oplata_carttka'] = $oplata;
           $d['summ'] = $sum;
           $d['sses_id'] = session_id();
           $d['id_comics'] = $id_comics;
           $d['name_comics'] = $name_comics;
           $d['datein'] = date('Y-m-d H:i:s');

             $id_return = $this->pay_model->insert_new_($d);
             
           $this->sendmessage_chack_pay($d, $id_return);
           
           
          
           $this->session->set_userdata('id_user', $id_return);
           $this->sdjson->data['id'] = $id_return;

           $urlPay = $_SERVER['DOCUMENT_ROOT'] . '/site/application/libraries/LiqPay.php';
           require($urlPay);

           $liqpay = new LiqPay($this->public_key, $this->private_key);
           $form = $liqpay->cnb_form(array(
               'version' => '3',
               'action' => 'pay',
               'amount' => $sum, //сума
               'currency' => 'UAH',
               'description' => $id_return.', Pay comics ' . $name_comics . ', by ' . $name . ', email:' . $email . ',phone: ' . $phone,
               'order_id' => $id_return,
               'language' => 'uk',
               //'paytypes'          => 'card',
               'result_url' => 'https://comics.in.ua/',
               'verifycode' => 'Y',
               'server_url' => 'https://comics.in.ua/'
           ));

           $this->session->set_userdata('dd', $form['data']);
           $this->session->set_userdata('ss', $form['signature']);

           $this->sdjson->success_message = 'Acsept!';
           return $this->sdjson->send_form();
       }

       public function get_pay_now_druk() {

           if ($this->input->is_ajax_request() !== TRUE)
               return NULL;

           $this->load->model('pay_model');
           $this->load->library('wordslb');
           $dd = $d = array();
           // $dd['br'] = $this->buttons_model->select_table_buttons('34', 1);

           $name = $this->wordslb->clearData($this->input->post('pip'));
           $novapost_name = $this->wordslb->clearData($this->input->post('novapost_name'));
           $email = $this->wordslb->clearData($this->input->post('email'));
           $phone = $this->wordslb->clearData($this->input->post('phone'));
           $adresa = $this->wordslb->clearData($this->input->post('addresa', true));
           $count_pay = intval($this->wordslb->clearData($this->input->post('count_p', true)));
           
           
           $sum = floatval($this->wordslb->clearData($this->input->post('summ')));
           $id_comics = $this->wordslb->clearData($this->input->post('idc'));
           $name_comics = $this->wordslb->clearData($this->input->post('name_comics'));
           $oplata = 0; // intval($this->wordslb->clearData($this->input->post('oplata')));

           $this->load->helper('email');
           if (!valid_email($email)) {
               $this->sdjson->error_message = 'Введіть правильно E-Mail!';
               return $this->sdjson->send_form();
           }
           
           if(empty($count_pay)) {$count_pay=1;}
           
           
           $sum =  $sum*$count_pay;
           
           $d = array();
           $d['name'] = $name;
           $d['novapost_name'] = $novapost_name;  
           $d['phone'] = $phone;
           $d['email'] = $email;
           $d['oplata_carttka'] = $oplata;
           $d['count_pay'] =  $count_pay;
           
           $d['summ'] = $sum ;
           $d['adressa'] = $adresa;
           $d['drukovana'] = 1;
           $d['sses_id'] = session_id();
           $d['id_comics'] = $id_comics;
           $d['name_comics'] = $name_comics;
           $d['datein'] = date('Y-m-d H:i:s');

            $id_return = $this->pay_model->insert_new_($d);
           $this->sendmessage_chack_pay($d, $id_return);
           
          
           $this->session->set_userdata('id_user', $id_return);
           $this->sdjson->data['id'] = $id_return;

           $urlPay = $_SERVER['DOCUMENT_ROOT'] . '/site/application/libraries/LiqPay.php';
           require($urlPay);

           $liqpay = new LiqPay($this->public_key, $this->private_key);
           $form = $liqpay->cnb_form(array(
               'version' => '3',
               'action' => 'pay',
               'amount' => $sum, //сума
               'currency' => 'UAH',
               'description' => $id_return.', Pay comics ' . $name_comics . ', by ' . $name . ', email:' . $email . ',phone: ' . $phone,
               'order_id' => $id_return,
               'language' => 'uk',
               //'paytypes'          => 'card',
               'result_url' => 'https://comics.in.ua/',
               'verifycode' => 'Y',
               'server_url' => 'https://comics.in.ua/'
           ));

           $this->session->set_userdata('dd', $form['data']);
           $this->session->set_userdata('ss', $form['signature']);

           $this->sdjson->success_message = 'Acsept!';
           return $this->sdjson->send_form();
       }

       //https://comics.in.ua/resultpay/callback/






       public function resultpay_callback() {

           $this->load->model('pay_model');
           $id = $this->session->userdata('id_user');
           //$id=2;
           $this->load->helper('url');
           if (empty($id)) {
               redirect(base_url(), 'location');
           }
           
           
                   $urlPay = $_SERVER['DOCUMENT_ROOT'] . '/admin/application/libraries/addons/LiqPay.php';
           require($urlPay);

           $liqpay = new LiqPay($this->public_key, $this->private_key);
           
           
           $res = $liqpay->api("request", array(
'action'        => 'status',
'version'       => '3',
'order_id'      => $id
));
           
           
            if($res->status !=='success'){
            redirect(base_url(), 'location');
           }
           

           $dd['active'] = 1;
           $this->pay_model->payment_update($id, $dd);

           
           
           
           
           
           $row = $this->pay_model->get_one_payment_active($id);

           if (empty($row)) {
               redirect(base_url(), 'location');
           }

           $pp = $this->buttons_model->select_in_buttons(31, $this->nowLanguge);

           $email_text = '<b>Шановний(а): </b>' . $row->name . ', дякуємо за ваше замовлення на comics.in.ua !<br>';
          if(!empty($row->novapost_name)){ 
          $email_text .= '<b>Прізвище: </b>' . $row->novapost_name . '<br>';}
           $email_text .= '<b>Дата: </b>' . date('d.m.Y H:i:s') . '<br>';
           $email_text .= '<b>Ваш телефон: </b>' . $row->phone . '<br>';
           $email_text .= '<b>Ваш Email: </b>' . $row->email . '<br>';
           $email_text .= '<b>Спосіб оплати:</b> LiqPay <br>';
           $email_text .= '<b>Сума замовлення: </b>' . $row->summ . '<br>';
           if (intval($row->id_comics) == 1) {
               $email_text .= '<b>Кількість: </b>' .  $row->count_pay . '<br>';
               $email_text .= '<b>Адреса доставки: </b>' . $row->adressa . '<br>';
           }
           $email_text .= '<b>Вами було замовлено:</b>  ' . $row->name_comics . '<br><br>';

           $get_down = '';

           $get_down .= '<b>Надсилаємо Вам посилання на скачування файлів:</b><br><br><br>';

           $this->load->helper('url');
           $urlLoad = base_url() . 'download/';
           $first = '';
           if (!empty($pp['32_title'])) {
               $first = '<b>Ваше замовлення:</b>'
                       . '<a href="' . $urlLoad . 'one/' . $row->sses_id . '/" target="_blank">' . $pp['32_name'] . '</a><br>';
           }

           $two = '';
           if (!empty($pp['33_title'])) {
               $two = '<b>Ваше замовлення:</b>'
                       . '<a href="' . $urlLoad . 'two/' . $row->sses_id . '/" target="_blank">' . $pp['33_name'] . '</a><br>';
           }

           $tree = '';
           if (!empty($pp['48_name'])) {
               $tree = '<b>Ваше замовлення:</b>'
                       . '<a href="' . $urlLoad . 'tree/' . $row->sses_id . '/" target="_blank">' . $pp['48_name'] . '</a><br>';
           }

           switch ($row->id_comics) {
               case 1: $get_down = '';
                   break;
               case 103: $get_down .= $tree;
                   break;
               case 10123: $get_down .= $first;
                   $get_down .= $two;
                  // $get_down .= $tree;
                   break;
               default: break;
           }





           if (!empty($get_down)) {
               $get_down .= '<br><br> <b style="color:red;">Важливо! При натисканні на посилання, заванатаження файлів(а) відбувається автоматично, тому просимо Вас перевірити вкладку «Список завантаження» у вашому браузері. 
     Для стаціонарних компʼютерів комбінація клавіш на клавіатурі: Ctrl + j.  </b>  <br> <br>';
           }

           $email_text .= $get_down;

           $email_text .= '        
Дякуємо!<br>
Слава Україні!<br>
<br>
';

           $this->load->library('email');

           $email_table =$this->array_email;
           $email_table[] = $row->email;

           
           $baseUrl = str_replace('https://', '', base_url());
           $baseUrl = str_replace('/', '', $baseUrl);

           if (!empty($email_table))
               foreach ($email_table as $ke => $ve) {
                   $this->email->from($this->email_from1, $baseUrl)
                           ->to($ve)//($this->email_sente)
                           ->subject($row->id .' - Informatsiya shchodo zamovlennya')
                           ->message($email_text)
                           ->set_mailtype('html');
                   $this->email->send();
                   $this->email->clear();
               }

           $this->email->from($this->email_from2, $baseUrl)
                   ->to($this->email_from1)//($this->email_sente)
                   ->subject($row->id .' - Informatsiya shchodo zamovlennya')
                   ->message($email_text)
                   ->set_mailtype('html');
           $this->email->send();
           $this->email->clear();

           redirect($urlLoad, 'location', 301);

           return 1;

           $this->load->model("first_model");

           $nowLanguge = $this->session->userdata('main_lang');
           if (!empty($nowLanguge)) {
               $this->nowLanguge = $nowLanguge;
           }

           $d = $dd = array();
           $dd['page'] = $this->buttons_model->select_one_page(38, $this->nowLanguge);
           $dd['pay_comics'] = $row;
           $dd['bc'] = $pp;
           $dd['buttons'] = $this->buttons_model->select_in_buttons(0, $this->nowLanguge);
           $dd['email_text'] = str_replace('<br>', '</p><p>', $email_text);
           $d['main_content'] = $this->load->view($this->mainView . 'payment/payment_success_view', $dd, true);

           $d['langrow'] = $this->first_model->get_one_language($nowLanguge);
           $d['buttons'] = $this->buttons_model->select_in_buttons(0, $this->nowLanguge);
           $d['page'] = $this->buttons_model->select_one_page(38, $this->nowLanguge);
           $this->load->view($this->mainView . 'main_small_view', $d);
       }
       
       
       
             public function resultpay_callback22() {
echo 'error!'.'error!'.'error!'.'error!';   
                return null;
           $this->load->model('pay_model');
           $id = $this->session->userdata('id_user');
           //$id=2;
           $this->load->helper('url');
           if (empty($id)) {
               redirect(base_url(), 'location');
           }
           
           
           
           $urlPay = $_SERVER['DOCUMENT_ROOT'] . '/admin/application/libraries/addons/LiqPay.php';
           require($urlPay);

           $liqpay = new LiqPay($this->public_key, $this->private_key);
           
           
           $res = $liqpay->api("request", array(
'action'        => 'status',
'version'       => '3',
'order_id'      =>  $id
));
           
           
           if($res->status !=='success'){
            echo 'error!'.'error!'.'error!'.'error!';   
           }
           echo'<pre>';
           
           print_r($res);
           echo '</pre>';
           
           
           
       }
       
       
       

       public function sendmess_pay() {

           $this->load->model('pay_model');
           $id = intval($this->input->get('id'));
           //$id=2;
           $this->load->helper('url');
           if (empty($id)) {
               $this->sdjson->error_message = 'Повідомлення не надіслано!';
               return $this->sdjson->send_form();
           }

           $row = $this->pay_model->get_one_payment($id);

           if (empty($row)) {
               $this->sdjson->error_message = 'Повідомлення не надіслано!';
               return $this->sdjson->send_form();
           }

           $dd = array();
           $dd['message_download_count'] = $row->message_download_count + 1;
           $this->pay_model->payment_update($id, $dd);

           $pp = $this->buttons_model->select_in_buttons(31, $this->nowLanguge);

           $email_text = '<b>Шановний(а): </b>' . $row->name . ', дякуємо за ваше замовлення на comics.in.ua !<br>';
               if(!empty($row->novapost_name)){ 
          $email_text .= '<b>Прізвище: </b>' . $row->novapost_name . '<br>';}
           $email_text .= '<b>Дата: </b>' . date('d.m.Y H:i:s') . '<br>';
           $email_text .= '<b>Ваш телефон: </b>' . $row->phone . '<br>';
           $email_text .= '<b>Ваш Email: </b>' . $row->email . '<br>';

           $email_text .= '<b>Спосіб оплати:</b> LiqPay <br>';
           $email_text .= '<b>Сума замовлення: </b>' . $row->summ . '<br>';
           if (intval($row->id_comics) == 1) {
               $email_text .= '<b>Кількість: </b>' .  $row->count_pay . '<br>';
               $email_text .= '<b>Адреса доставки: </b>' . $row->adressa . '<br>';
           }
           $email_text .= '<b>Вами було замовлено:</b>  ' . $row->name_comics . '<br>';

           $get_down = '';

           $get_down .= '<b>Надсилаємо Вам посилання на скачування файлів:</b><br><br><br>';

           $this->load->helper('url');
           $urlLoad = base_url() . 'download/';
           $first = '';
           if (!empty($pp['32_title'])) {
               $first = '<b>Ваше замовлення:</b>'
                       . '<a href="' . $urlLoad . 'one/' . $row->sses_id . '/" target="_blank">' . $pp['32_name'] . '</a><br>';
           }

           $two = '';
           if (!empty($pp['33_title'])) {
               $two = '<b>Ваше замовлення:</b>'
                       . '<a href="' . $urlLoad . 'two/' . $row->sses_id . '/" target="_blank">' . $pp['33_name'] . '</a><br>';
           }

           $tree = '';
           if (!empty($pp['48_name'])) {
               $tree = '<b>Ваше замовлення:</b>'
                       . '<a href="' . $urlLoad . 'tree/' . $row->sses_id . '/" target="_blank">' . $pp['48_name'] . '</a><br>';
           }

           switch ($row->id_comics) {
               case 1: $get_down = '';
                   break;
               case 103: $get_down .= $tree;
                   break;
               case 10123: $get_down .= $first;
                   $get_down .= $two;
                 //  $get_down .= $tree;
                   break;
               default: break;
           }





           if (!empty($get_down)) {
               $get_down .= '<br><br> <b style="color:red;">Важливо! При натисканні на посилання, заванатаження файлів(а) відбувається автоматично, тому просимо Вас перевірити вкладку «Список завантаження» у вашому браузері. 
     Для стаціонарних компʼютерів комбінація клавіш на клавіатурі: Ctrl + j.  </b>  <br> <br>';
           }

           $email_text .= $get_down;

           $email_text .= '        
Дякуємо!<br>
Слава Україні!<br>
<br>
';

           $this->load->library('email');

           $email_table =$this->array_email;
           $email_table[] = $row->email;


           $baseUrl = str_replace('https://', '', base_url());
           $baseUrl = str_replace('/', '', $baseUrl);

           if (!empty($email_table))
               foreach ($email_table as $ke => $ve) {
                   $this->email->from($this->email_from1, $baseUrl) //support@dovidkove.com
                           ->to($ve)//($this->email_sente)
                           ->subject($row->id .' - Informatsiya shchodo zamovlennya')
                           ->message($email_text)
                           ->set_mailtype('html');
                   $this->email->send();
                   $this->email->clear();
               }

           $this->email->from($this->email_from2, $baseUrl)
                   ->to($this->email_from1)//($this->email_sente)
                   ->subject($row->id .' - Informatsiya shchodo zamovlennya')
                   ->message($email_text)
                   ->set_mailtype('html');
           $this->email->send();
           $this->email->clear();

           $this->load->model("first_model");

           $nowLanguge = $this->session->userdata('main_lang');
           if (!empty($nowLanguge)) {
               $this->nowLanguge = $nowLanguge;
           }


           $this->sdjson->success_message = 'Повідомлення надіслано!';
           return $this->sdjson->send_form();
       }

       public function sendmess_rekvizity() {

           $this->load->model('pay_model');
           $id = intval($this->input->get('id'));
           //$id=2;
           $this->load->helper('url');
           if (empty($id)) {
               $this->sdjson->error_message = 'Помилка ідентифікатора!';
               return $this->sdjson->send_form();
           }


           $row = $this->pay_model->get_one_payment($id);

           if (empty($row)) {
               $this->sdjson->error_message = 'Помилка ідентифікатора!';
               return $this->sdjson->send_form();
           }


           $tt = array();
           $tt['recvizutu_count'] = $row->recvizutu_count + 1;

           $this->pay_model->payment_update($id, $tt);

           $email_text = "Добрий день!<br>
 <b>Шановний(а): </b> $row->name <br>
<b>Вами було замовлено:</b> <br>
<b>Номер замовлення:</b> $row->id<br>
<b>Комікс</b> « $row->name_comics »<br>
<b>Сума до оплати:</b> $row->summ грн.<br>
<b>Номер картки ФОП:</b> 4246 0010 0287 0859<br>
<b>ФОП Костенко Юрій</b><br>

Будь ласка, зворотнім листом вкажіть час та день оплати, після чого на ваш e-mail буде надіслано посилання на скачування PDF-файлу, або деталі доставки коміксу при замовленні в друкованому вигляді! <br>

Дякуємо за увагу!<br>
Все буде Україна!<br>";

           $this->load->library('email');

           
         $email_table =$this->array_email;
           $email_table[] = $row->email;
           


           $baseUrl = str_replace('https://', '', base_url());
           $baseUrl = str_replace('/', '', $baseUrl);

           if (!empty($email_table))
               foreach ($email_table as $ke => $ve) {
                   $this->email->from($this->email_from1, $baseUrl) // 'support@dovidkove.com'
                           ->to($ve)//($this->email_sente)
                           ->subject($row->id .'-Rekvizyty zamovlennya')
                           ->message($email_text)
                           ->set_mailtype('html');
                   $this->email->send();
                   $this->email->clear();
               }


           $this->email->from($this->email_from2, $baseUrl)
                   ->to($this->email_from1)
                   ->subject($row->id .'-Rekvizyty zamovlennya')
                   ->message($email_text)
                   ->set_mailtype('html');
           $this->email->send();
           $this->email->clear();

           $this->sdjson->success_message = 'Реквізити надіслано!';
           return $this->sdjson->send_form();
       }
       
       
       
       
       
       
        


       
       
   }
   
   
   
   
   
   