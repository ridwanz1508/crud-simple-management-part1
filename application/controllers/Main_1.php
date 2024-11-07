<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_1 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('main_m_1'); 
    }

	public function index() {
		$this->load->view('main/dashboard_1');
	}

    public function mainTable() {
        $data = $this->main_m_1->getDataUser();
        echo json_encode($data);
    }

    public function getUserTable() {
        $id = $this->input->get('fid');
        $data = $this->main_m_1->getUserById($id);
        echo json_encode($data);
    }

    public function editUserTable() {
        $id = $this->input->post('fid');
        $data = [
            'fname' => $this->input->post('fname'),
            'femail' => $this->input->post('femail'),
            'fage' => $this->input->post('fage')
        ];
        $data['update_date'] = date('Y-m-d H:i:s');
        $this->main_m_1->editDataUser($id, $data);
        echo json_encode(['status' => 'success']); 
    }

    public function addUserTable() {
        $data = [
            'fname' => $this->input->post('fname'),
            'femail' => $this->input->post('femail'),
            'fage' => $this->input->post('fage')
        ];
        $data['create_date'] = date('Y-m-d H:i:s');
        $this->main_m_1->addDataUser($data);
        echo json_encode(['status' => 'success']); 
    }
    
    public function deleteUserTable() {
        $id = $this->input->post('fid');
        $this->main_m_1->deleteDataUser($id);
        echo json_encode(['status' => 'success']); 
    }
    
}