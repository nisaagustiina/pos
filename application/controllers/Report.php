<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model('sale_m');
    }

    public function sale(){
        // $this->load->library('pagination');
        // $config['base_url'] = site_url('report/sale');
        // $config['total_rows'] = $this->sale_m->get_sale_pagination()->num_rows();
        // $config['per_page'] = 1;
        // $config['uri_segment'] = 3;
        // $config['first_link'] = "Fisrt";
        // $config['last_link'] = "Last";
        // $config['next_link'] = "Next";
        // $config['prev_link'] = "Prev";
        // $config['num_tag_open'] = '<li>';
        // $config['num_tag_close'] = '</li>';
        // $config['cur_tag_open'] = '<li class="active"><a>';
        // $config['cur_tag_close'] = '</a></li>';
        // $config['next_tag_open'] = '<li>';
        // $config['next_tag_close'] = '</li>';
        // $config['prev_tag_open'] = '<li>';
        // $config['prev_tag_close'] = '</li>';
        // $config['first_tag_open'] = '<li>';
        // $config['first_tag_close'] = '</li>';
        // $config['last_tag_open'] = '<li>';
        // $config['last_tag_close'] = '</li>';

        // $this->pagination->initialize($config);

        // $data['pagination'] = $this->pagination->create_links();
        // $data['row'] = $this->sale_m->get_sale_pagination('per_page',$this->uri->segment(3));
        $data['row'] = $this->sale_m->get_sale();
        $this->template->load('template','report/sale_report',$data);
    }

    public function stock(){
        $data['row'] = $this->sale_m->get_stock();
        $this->template->load('template','report/stock_report',$data);
    }

    // public function sale_product($id_sale = null){
    //     $detail = $this->sale_m->get_sale_detail($id_sale)->result();
    //     echo json_encode($detail);
    // }
}