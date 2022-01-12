<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
    public function login($post){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username',$post['user']);
        $this->db->where('password',sha1($post['pass']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id=null){
        $this->db->from('user');
        if($id != null){
            $this->db->where('id_user',$id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params['username'] = $post['user'];
        $params['password'] = sha1($post['pass']);
        $params['nama'] = $post['nama'];
        $params['alamat'] = $post['alamat'];
        $params['level'] = $post['level'];
        $this->db->insert('user',$params);
    }

    public function del($id){
        $this->db->where('id_user',$id);
        $this->db->delete('user');
    }

    public function edit($post){
        $params['username'] = $post['user'];
        if(!empty($post['pass'])){
            $params['password'] = sha1($post['pass']);
        }
        $params['nama'] = $post['nama'];
        $params['alamat'] = $post['alamat'];
        $params['level'] = $post['level'];
        $this->db->where('id_user',$post['id_user']);
        $this->db->update('user',$params);
    }
}