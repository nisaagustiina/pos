<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_m extends CI_Model {
     // start datatables
    var $column_order = array(null, 'barcode', 'p_item.nama', 'category_name', 'unit_name', 'harga', 'stock'); //set column field database for datatable orderable
    var $column_search = array('barcode', 'p_item.nama', 'harga'); //set column field database for datatable searchable
    var $order = array('id_item' => 'asc'); // default order 
 
    private function _get_datatables_query() {
        $this->db->select('p_item.*, p_category.nama as category_name, p_unit.nama as unit_name');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_item.id_category = p_category.id_category');
        $this->db->join('p_unit', 'p_item.id_unit = p_unit.id_unit');
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('p_item');
        return $this->db->count_all_results();
    }
    // end datatables
    public function get($id=null){
        $this->db->select('p_item.*, p_category.nama as nama_category, p_unit.nama as nama_unit');
        $this->db->from('p_item');
        $this->db->join('p_category','p_category.id_category=p_item.id_category');
        $this->db->join('p_unit','p_unit.id_unit=p_item.id_unit');
        if($id != null){
            $this->db->where('id_item',$id);
        }
        $this->db->order_by('barcode','asc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params = [
            'barcode' => $post['barcode'],
            'nama' => $post['nama'],
            'id_category' => $post['category'],
            'id_unit' => $post['unit'],
            'harga' => $post['harga'],
            'image' => $post['image']
        ];
        $this->db->insert('p_item',$params);
    }

    public function edit($post){
        $params = [
            'barcode' => $post['barcode'],
            'nama' => $post['nama'],
            'id_category' => $post['category'],
            'id_unit' => $post['unit'],
            'harga' => $post['harga'],
            'updated' => date('Y-m-d H:i:s')
        ];
        if($post['image'] != null){
            $params['image'] = $post['image'];
        }
        $this->db->where('id_item',$post['id']);
        $this->db->update('p_item',$params);
    }

    function check_barcode($code, $id=null){
        $this->db->from('p_item');
        $this->db->where('barcode',$code);
        if($id != null){
            $this->db->where('id_item !=' ,$id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id){
        $this->db->where('id_item',$id);
        $this->db->delete('p_item');
    }

    public function update_stock_in($data){
        $qty = $data['qty'];
        $id_item = $data['id_item'];
        $sql = "UPDATE p_item SET stok = stok+'$qty' WHERE id_item = '$id_item'";
        $this->db->query($sql);
    }

    public function update_stock_out($data){
        $qty = $data['qty'];
        $id_item = $data['id_item'];
        $sql = "UPDATE p_item SET stok = stok-'$qty' WHERE id_item = '$id_item'";
        $this->db->query($sql);
    }

}