<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('clients_model');
	}

	public function index(){
		$data['clients'] = $this->clients_model->getAllClients();
		$this->load->view('client/client_list.php', $data);
	}

	public function addnew(){
		$this->load->view('client/addform.php');
	}

	public function insert(){
		$client['nom'] = $this->input->post('nom');
		$client['adresse'] = $this->input->post('adresse');
		
		$query = $this->clients_model->insertclient($client);

		if($query){
			header('location:'.base_url('index.php/cli/index'));
		}

	}

	public function edit($id){
		$data['client'] = $this->clients_model->getclient($id);
		$this->load->view('client/editform', $data);
	}

	public function update($id){
		$client['nom'] = $this->input->post('nom');
		$client['adresse'] = $this->input->post('adresse');

		$query = $this->clients_model->updateclient($client, $id);

		if($query){
			header('location:'.base_url('index.php/cli/index'));
		}
	}

	public function delete($id){
		$query = $this->clients_model->deleteclient($id);

		if($query){
			header('location:'.base_url('index.php/cli/index'));
		}
	}
}


?>