<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_m extends CI_Model {

    public function __construct() {
        parent::__construct(); 
        $this->load->database();
    }

    public function getDataProduct() {
        $this->db->from('tb_product');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getProductById($id) {
        $this->db->where('fid', $id);
        $query = $this->db->get('tb_product');
        return $query->row_array();
    }

    public function editDataProduct($id, $data) {
        $this->db->where('fid', $id);
        $this->db->update('tb_product', $data);
    }

    public function addDataProduct($data) {
        $this->db->insert('tb_product', $data);
    }

    public function deleteDataProduct($id) {
        $this->db->where('fid', $id);
        $this->db->delete('tb_product');
    }
}