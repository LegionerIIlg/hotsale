<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paynow extends CI_Controller {

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

    public function get_pay_now() {



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
        $oplata = intval($this->wordslb->clearData($this->input->post('oplata')));

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
        $this->session->set_userdata('id_user', $id_return);
        $this->sdjson->data['id'] = $id_return;
        /*
          if ($id_comics == 1) {
          $dd['url'] = "https://www.liqpay.ua/api/3/checkout?data=eyJ2ZXJzaW9uIjozLCJhY3Rpb24iOiJwYXkiLCJhbW91bnQiOiI5OSIsImN1cnJlbmN5IjoiVUFIIiwiZGVzY3JpcHRpb24iOiLQn9GA0LjQs9C+0LTQuCDQnNC40LrQuNGC0LrQuCDQhiIsInB1YmxpY19rZXkiOiJpNzgxNjA4ODEzNDUiLCJsYW5ndWFnZSI6InVrIiwic2VydmVyX3VybCI6Imh0dHBzOi8vY29taWNzLmluLnVhL3Jlc3VsdHBheS9jYWxsYmFjay8iLCJyZXN1bHRfdXJsIjoiaHR0cHM6Ly9jb21pY3MuaW4udWEvcmVzdWx0cGF5L2NhbGxiYWNrLyJ9&signature=gde8i/b2gsaDvYO/iGOtE5A+4cw=";
          $this->sdjson->data = $dd;
          }

          if ($id_comics == 3) {
          $dd['url'] = "https://www.liqpay.ua/api/3/checkout?data=eyJ2ZXJzaW9uIjozLCJhY3Rpb24iOiJwYXkiLCJhbW91bnQiOiIxNDkiLCJjdXJyZW5jeSI6IlVBSCIsImRlc2NyaXB0aW9uIjoi0J/RgNC40LPQvtC00Lgg0JzQuNC60LjRgtC60LggSUkiLCJwdWJsaWNfa2V5IjoiaTc4MTYwODgxMzQ1IiwibGFuZ3VhZ2UiOiJ1ayIsInNlcnZlcl91cmwiOiJodHRwczovL2NvbWljcy5pbi51YS9yZXN1bHRwYXkvY2FsbGJhY2svIiwicmVzdWx0X3VybCI6Imh0dHBzOi8vY29taWNzLmluLnVhL3Jlc3VsdHBheS9jYWxsYmFjay8ifQ==&signature=R1RrvNM6jXTljM3bEiPWbU04bYw=";
          $this->sdjson->data = $dd;
          }

          if ($id_comics == 2) {
          $dd['url'] = "https://www.liqpay.ua/api/3/checkout?data=eyJ2ZXJzaW9uIjozLCJhY3Rpb24iOiJwYXkiLCJhbW91bnQiOiIyNDkiLCJjdXJyZW5jeSI6IlVBSCIsImRlc2NyaXB0aW9uIjoi0J/RgNC40LPQvtC00Lgg0JzQuNC60LjRgtC60Lgg0IYg0YLQsCBJSSIsInB1YmxpY19rZXkiOiJpNzgxNjA4ODEzNDUiLCJsYW5ndWFnZSI6InVrIiwic2VydmVyX3VybCI6Imh0dHBzOi8vY29taWNzLmluLnVhL3Jlc3VsdHBheS9jYWxsYmFjay8iLCJyZXN1bHRfdXJsIjoiaHR0cHM6Ly9jb21pY3MuaW4udWEvcmVzdWx0cGF5L2NhbGxiYWNrLyJ9&signature=uXqSnxZexnE9zm5j7YPR2esYvuU=";

          $this->sdjson->data = $dd;
          }

         */

        if ($oplata == 1) {
            $this->sdjson->data = $dd = array();

            $dd['text'] = "Добрий день!<br>
Дякуюємо за Ваше замовлення  $name_comics. <br> Номер замовлення: $id_return<br>
Повідомлення з реквізитами для сплати надіслано на вказаний Вами e-mail.<br>
Дякуємо за увагу!<br>
Все буде Україна!<br>
";

            $email_text = "Добрий день!<br>
<b>Вами було замовлено:</b> <br>
<b>Номер замовлення:</b> $id_return<br>
<b>Комікс</b> « $name_comics »<br>
<b>Сума до оплати:</b> $sum грн.<br>
<b>Номер картки ФОП:</b> 4246 0010 0287 0859<br>
<b>ФОП Костенко Юрій</b><br>

Після оплати на ваш e-mail буде надіслано посилання на скачування PDF-файлу.<br>

Дякуємо за увагу!<br>
Все буде Україна!<br>";
            $dd['oplata'] = 1;
            $this->sdjson->data = $dd;

            $this->load->helper('url');
            $this->load->library('email');

            $email_table[] = 'inuabeststart@gmail.com';
            $email_table[] = 'ivko_piter@ukr.net';
            $email_table[] = $email;

            $baseUrl = str_replace('https://', '', base_url());
            $baseUrl = str_replace('/', '', $baseUrl);

            if (!empty($email_table))
                foreach ($email_table as $ke => $ve) {
                    $this->email->from('support@dovidkove.com', $baseUrl) //info@comics.in.ua
                            ->to($ve)//($this->email_sente)
                            ->subject('Замовлення на сайті!')
                            ->message($email_text)
                            ->set_mailtype('html');
                    $this->email->send();
                    $this->email->clear();
                }


            $tt = array();
            $tt['recvizutu_count'] = 1;

            $this->pay_model->payment_update($id_return, $tt);
        }





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

        $dd['active'] = 1;
        $this->pay_model->payment_update($id, $dd);

        $row = $this->pay_model->get_one_payment_active($id);

        if (empty($row)) {
            redirect(base_url(), 'location');
        }

        $pp = $this->buttons_model->select_in_buttons(31, $this->nowLanguge);

        $email_text = '<b>Шановний(а): </b>' . $row->name . '<br>';
        $email_text .= '<b>Ваш телефон: </b>' . $row->phone . '<br>';
        $email_text .= '<b>Ваш Email: </b>' . $row->email . '<br>';
        $email_text .= '<b>Вами було замовлено:</b>  ' . $row->name_comics . '<br>';
        $email_text .= '<b>Надсилаємо Вам посилання на скачування</b><br>';

        /*
         * 1. Ваше замовлення: 
          Комікс «Пригоди Микитки І»
          Вартість: 99 грн.
          2. Ваше замовлення:
          комікс «Пригоди Микитки І та II»
          Вартість: 249 грн.
          3. Ваше замовлення:
          комікс «Пригоди Микитки II»
          Вартість: 149 грн.
         * 
         */
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

        switch ($row->id_comics) {
            case 1: $email_text .= $first;
                break;
            case 3: $email_text .= $two;
                break;
            case 2: $email_text .= $first;
                $email_text .= $two;
                break;
            default: break;
        }





        $this->load->library('email');

        $email_table[] = 'inuabeststart@gmail.com';
        $email_table[] = 'ivko_piter@ukr.net';
        $email_table[] = $row->email;

        $baseUrl = str_replace('https://', '', base_url());
        $baseUrl = str_replace('/', '', $baseUrl);

        if (!empty($email_table))
            foreach ($email_table as $ke => $ve) {
                $this->email->from('support@dovidkove.com', $baseUrl)
                        ->to($ve)//($this->email_sente)
                        ->subject('Замовлення на сайті!')
                        ->message($email_text)
                        ->set_mailtype('html');
                $this->email->send();
                $this->email->clear();
            }



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

        $email_text = '<b>Шановний(а): </b>' . $row->name . '<br>';
        $email_text .= '<b>Ваш телефон: </b>' . $row->phone . '<br>';
        $email_text .= '<b>Ваш Email: </b>' . $row->email . '<br>';
        $email_text .= '<b>Вами було замовлено:</b>  ' . $row->name_comics . '<br>';
        $email_text .= '<b>Надсилаємо Вам посилання на скачування</b><br>';

        /*
         * 1. Ваше замовлення: 
          Комікс «Пригоди Микитки І»
          Вартість: 99 грн.
          2. Ваше замовлення:
          комікс «Пригоди Микитки І та II»
          Вартість: 249 грн.
          3. Ваше замовлення:
          комікс «Пригоди Микитки II»
          Вартість: 149 грн.
         * 
         */
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

        switch ($row->id_comics) {
            case 1: $email_text .= $first;
                break;
            case 3: $email_text .= $two;
                break;
            case 2: $email_text .= $first;
                $email_text .= $two;
                break;
            default: break;
        }





        $this->load->library('email');

        $email_table[] = 'inuabeststart@gmail.com';
        $email_table[] = 'ivko_piter@ukr.net';
        $email_table[] = $row->email;

        $baseUrl = str_replace('https://', '', base_url());
        $baseUrl = str_replace('/', '', $baseUrl);

        if (!empty($email_table))
            foreach ($email_table as $ke => $ve) {
                $this->email->from('info@comics.in.ua', $baseUrl) //support@dovidkove.com
                        ->to($ve)//($this->email_sente)
                        ->subject('Posulannya na comics')
                        ->message($email_text)
                        ->set_mailtype('html');
                $this->email->send();
                $this->email->clear();
            }



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

Після оплати на ваш e-mail буде надіслано посилання на скачування PDF-файлу.<br>

Дякуємо за увагу!<br>
Все буде Україна!<br>";

        $this->load->library('email');

        $email_table[] = 'inuabeststart@gmail.com';
        $email_table[] = 'ivko_piter@ukr.net';
        $email_table[] = $row->email;

        $baseUrl = str_replace('https://', '', base_url());
        $baseUrl = str_replace('/', '', $baseUrl);

        if (!empty($email_table))
            foreach ($email_table as $ke => $ve) {
                $this->email->from('info@comics.in.ua', $baseUrl) // 'support@dovidkove.com'
                        ->to($ve)//($this->email_sente)
                        ->subject('Rekvizutu')
                        ->message($email_text)
                        ->set_mailtype('html');
                $this->email->send();
                $this->email->clear();
            }





        $this->sdjson->success_message = 'Реквізити надіслано!';
        return $this->sdjson->send_form();
    }

}
