<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Fungsi{
    protected $ci;

    function __construct(){
        $this->ci =& get_instance();
    }

    function user_login(){
        $this->ci->load->model('user_m');
        $id_user = $this->ci->session->userdata('id_user');
        $user_data = $this->ci->user_m->get($id_user)->row();
        return $user_data;
    }

    function pdfGenerator($html,$filename){
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadhtml($html);
        $dompdf->setPaper('A4','potrait');
        $dompdf->render();
        $dompdf->stream($filename,array('Attachment'=>0));
    }

    function count_item(){
        $this->ci->load->model('item_m');
        return $this->ci->item_m->get()->num_rows();
    }
    
    function count_supplier(){
        $this->ci->load->model('supplier_m');
        return $this->ci->supplier_m->get()->num_rows();
    }
    
    function count_customer(){
        $this->ci->load->model('customer_m');
        return $this->ci->customer_m->get()->num_rows();
    }
    
    function count_user(){
        $this->ci->load->model('user_m');
        return $this->ci->user_m->get()->num_rows();
    }
}