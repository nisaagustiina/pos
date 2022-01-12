<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_m extends CI_Model {
    public function invoice_no(){
        $sql = "SELECT MAX(MID(invoice,9,4)) AS invoice_no FROM t_sale WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            $row = $query->row();
            $n = ((int)$row->invoice_no)+1;
            $no = sprintf("%'.04d",$n);
        }else{
            $no = "0001";
        }
        $invoice = "MP".date('ymd').$no;
        return $invoice;
    }

    public function get_sale(){
        $this->db->select('*,customer.nama as nama_customer, user.nama as nama_user, t_sale.created as sale_created');
        $this->db->from('t_sale');
        $this->db->join('customer','t_sale.id_customer=customer.id_customer','left');
        $this->db->join('user','t_sale.id_user=user.id_user');
        $query = $this->db->get();
        return $query;
    }

    public function get_stock(){
        $this->db->select('t_stock.*, p_item.nama as nama_item, supplier.nama as nama_supplier, user.nama as nama_user');
        $this->db->from('t_stock');
        $this->db->join('p_item','t_stock.id_item=p_item.id_item');
        $this->db->join('supplier','t_stock.id_supplier=supplier.id_supplier','left');
        $this->db->join('user','t_stock.id_user=user.id_user');
        $query = $this->db->get();
        return $query;
    }

    // public function get_sale_pagination($limit=null,$start=null){
    //     $this->db->select('*,customer.nama as nama_customer, user.nama as nama_user, t_sale.created as sale_created');
    //     $this->db->from('t_sale');
    //     $this->db->join('customer','t_sale.id_customer=customer.id_customer','left');
    //     $this->db->join('user','t_sale.id_user=user.id_user');
    //     $this->db->limit($limit,$start);
    //     $query = $this->db->get();
    //     return $query;
    // }
}  