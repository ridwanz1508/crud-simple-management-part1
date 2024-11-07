<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_m extends CI_Model {

    public function __construct() {
        parent::__construct(); 
        $this->load->database();
    }

    public function getDataUser() {
        $this->db->select('fid, fname, femail, fage');
        $this->db->from('tb_user');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUserById($id) {
        $this->db->where('fid', $id);
        $query = $this->db->get('tb_user');
        return $query->row_array();
    }
    
    public function editDataUser($id, $data) {
        $this->db->where('fid', $id);
        $this->db->update('tb_user', $data);
    }

    public function deleteDataUser($id) {
        $this->db->where('fid', $id);
        $this->db->delete('tb_user');
    }
}