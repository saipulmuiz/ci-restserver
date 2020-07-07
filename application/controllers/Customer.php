<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Customer extends REST_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index_get()
    {
        $customer = $this->db->query("SELECT * FROM customer")->result();
        $this->response($customer, 200);
    }
    public function index_post()
    {
        $data = array(
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'alamat' => $this->post('alamat'),
        );
        $res = $this->db->insert('customer',$data);
        if ($res){
            $this->response(array('status'=>'berhasil'), 200);
        } else {
            $this->response(array('status'=>'gagal'), 500);
        }
    }

}
