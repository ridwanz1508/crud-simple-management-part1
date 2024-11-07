<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('main_m');
    }

	public function index() {
		$this->load->view('main/dashboard');
	}

    public function mainTable() {
        $data = $this->main_m->getDataUser();
        echo json_encode($data);
    }

    public function getUserTable() {
        $id = $this->input->get('fid');
        $data = $this->main_m->getUserById($id);
        echo json_encode($data);
    }    
    
    public function editUserTable() {
        $id = $this->input->post('fid');
        $data = [
            'fname' => $this->input->post('fname'),
            'femail' => $this->input->post('femail'),
            'fage' => $this->input->post('fage')
        ];
        $this->main_m->editDataUser($id, $data);
        echo json_encode(['status' => 'success']); 
    }
    
    public function deleteUserTable() {
        $id = $this->input->post('fid');
        $this->main_m->deleteDataUser($id);
        echo json_encode(['status' => 'success']); 
    }
    
}