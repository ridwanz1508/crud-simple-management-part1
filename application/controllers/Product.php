<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller { 

    public function __construct() {
        parent::__construct();
        $this->load->model('product_m'); 
        $this->load->helper('url');
    }

	public function index() {
		$this->load->view('main/product');
	}

    public function mainTable() {
        $data = $this->product_m->getDataProduct();
        echo json_encode($data);
    }

    public function getProductTable() {
        $id = $this->input->get('fid');
        $data = $this->product_m->getProductById($id);
        echo json_encode($data);
    }

    public function addProductTable() {
        $data = [
            'fmobile' => $this->input->post('fmobile'),
            'fprice' => $this->input->post('fprice'),
            'fcategory' => $this->input->post('fcategory'),
            'fstock' => $this->input->post('fstock'),
            'fnote' => $this->input->post('fnote'),
            'ftype' => $this->input->post('ftype'),
            'create_date' => date('Y-m-d H:i:s')
        ];
    
        // check wether image be upload
        if (isset($_FILES['fpict']) && !empty($_FILES['fpict']['name'])) {
            $fileName = md5(uniqid(rand(), true)) . '.' . pathinfo($_FILES['fpict']['name'], PATHINFO_EXTENSION);
            $filePath = 'assets/images/' . $fileName;
    
            // move file to folder
            if (move_uploaded_file($_FILES['fpict']['tmp_name'], $filePath)) {
                // save image URL into database
                $data['fpict'] = base_url($filePath); 
            } else {
                echo json_encode(['status' => 'error', 'message' => 'File upload failed']);
                return;
            }
        }
    
        $this->product_m->addDataProduct($data);
        echo json_encode(['status' => 'success']); 
    }

    
    public function editProductTable() {
        $id = $this->input->post('fid');
        $data = [
            'fmobile' => $this->input->post('fmobile'),
            'fprice' => $this->input->post('fprice'),
            'fcategory' => $this->input->post('fcategory'),
            'fstock' => $this->input->post('fstock'),
            'fnote' => $this->input->post('fnote'),
            'ftype' => $this->input->post('ftype'),
            'update_date' => date('Y-m-d H:i:s')
        ];
    
        if (!empty($_FILES['fpict']['name'])) {
            // create filename random with hash
            $fileName = md5(uniqid(rand(), true)) . '.' . pathinfo($_FILES['fpict']['name'], PATHINFO_EXTENSION);
            $filePath = 'assets/images/' . $fileName;
    
            if (move_uploaded_file($_FILES['fpict']['tmp_name'], $filePath)) {
                // save image URL into database (not physic path)
                $data['fpict'] = base_url($filePath);
            }
        }
    
        $this->product_m->editDataProduct($id, $data);
        echo json_encode(['status' => 'success']); 
    }
    
    public function deleteProductTable() {
        $id = $this->input->post('fid');
        // select file data by id
        $product = $this->product_m->getProductById($id);
    
        if ($product && !empty($product['fpict'])) {
            // select file path image
            $imagePath = str_replace(base_url(), '', $product['fpict']);
            // check image file exist in server and delete
            if (file_exists($imagePath)) {
                unlink($imagePath); 
            }
        }
        // delete product from database
        $this->product_m->deleteDataProduct($id);
    
        echo json_encode(['status' => 'success']); 
    }
    
    
}