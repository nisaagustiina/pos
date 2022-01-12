<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {
    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model(['stock_m','item_m','supplier_m']);
    }

    public function stock_in_data(){
        $data['row'] = $this->stock_m->get_stock_in()->result();
        $this->template->load('template','transaction/stock_in/stock_in_data',$data);
    }

    public function stock_out_data(){
        $data['row'] = $this->stock_m->get_stock_out()->result();
        $this->template->load('template','transaction/stock_out/stock_out_data',$data);
    }

    public function stock_in_del(){
        $id_stock = $this->uri->segment(4);
        $id_item = $this->uri->segment(5);
        $qty = $this->stock_m->get($id_stock)->row()->qty;
        $data = ['qty' => $qty, 'id_item' => $id_item];
        $this->item_m->update_stock_out($data);
        $this->stock_m->del($id_stock);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('save','Data Stock In berhasil di update');
        }
        redirect('stock/in');
    }

    public function stock_out_del(){
        $id_stock = $this->uri->segment(4);
        $id_item = $this->uri->segment(5);
        $qty = $this->stock_m->get($id_stock)->row()->qty;
        $data = ['qty' => $qty, 'id_item' => $id_item];
        $this->item_m->update_stock_in($data);
        $this->stock_m->del($id_stock);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('save','Data Stock Out berhasil di update');
        }
        redirect('stock/out');
    }

    public function stock_in_add(){
        $item = $this->item_m->get()->result();
        $supplier = $this->supplier_m->get()->result();
        $data = ['item' => $item, 'supplier' => $supplier];
        $this->template->load('template','transaction/stock_in/stock_in_form',$data);
    }

    public function stock_out_add(){
        $item = $this->item_m->get()->result();
        $data = ['item' => $item];
        $this->template->load('template','transaction/stock_out/stock_out_form',$data);
    }

    public function process(){
        if(isset($_POST['in_add'])){
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_in($post);
            $this->item_m->update_stock_in($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('save','Data Stock In berhasil di simpan');
            }
            redirect('stock/in');
        }else if(isset($_POST['out_add'])){
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_out($post);
            $this->item_m->update_stock_out($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('save','Data Stock Out berhasil di simpan');
            }
            redirect('stock/out');
        }
    }
}