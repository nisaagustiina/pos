<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model('customer_m');
    }

	public function index(){
        $data['row'] = $this->customer_m->get();
		$this->template->load('template','customer/customer_data', $data);
	}

    public function get_json(){
        $this->load->library('datatables');
        $this->datatables->add_column('no','ID=$1','id_customer');
        $this->datatables->select('id_customer','nama','jenis_kelmain','no_telp','alamat');
        $this->datatables->add_column('action',anchor('customer/edit/$1','update',array('class'=>'btn btn-primary btn-xs'))."".anchor('customer/del/$1','delete',array('class'=>'btn btn-danger btn-xs')),'id_customer');
        $this->datatables->from('customer');
        return print_r($this->datatables->generate());

    }

    public function add(){
        $customer = new stdClass();
        $customer->id_customer = null;
        $customer->nama = null;
        $customer->jenis_kelamin = null;
        $customer->no_telp = null;
        $customer->alamat = null;
        $data = array(
            'page' => 'add',
            'row' => $customer
        );
        $this->template->load('template','customer/customer_form',$data);
    }

    public function edit($id){
        $query = $this->customer_m->get($id);
        if($query->num_rows()>0){
            $customer = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $customer
            );
            $this->template->load('template','customer/customer_form',$data);
        }else{
            echo "<script>alert('Data tidak ditemukan!')</script>";
            echo "<script>window.location='".site_url('customer')."'</script>";
        }
    }

    public function process(){
        $post = $this->input->post(null,TRUE);
        if(isset($_POST['add'])){
            $this->customer_m->add($post);
        }else if(isset($_POST['edit'])){
            $this->customer_m->edit($post);
        }
        if($this->db->affected_rows() > 0){
            echo "<script>alert('Data berhasil disimpan!')</script>";
            echo "<script>window.location='".site_url('customer')."'</script>";
        }
    }

    public function del($id){
        $this->customer_m->del($id);
        if($this->db->affected_rows() > 0){
            echo "<script>alert('Data berhasil dihapus!')</script>";
            echo "<script>window.location='".site_url('customer')."'</script>";
        }
    }
}