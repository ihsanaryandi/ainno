<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Network extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('Users', 'User');
		$this->load->model('Networks', 'Network');
		$this->load->model('NetworkRequests', 'NetworkRequest');

		checkMethod();
	}

	public function index()
	{
		$data['title'] = 'Jaringan';
		$data['users'] = $this->User->getRandomUsers();

		view('network', $data);
	}

	public function connect() 
	{
		if(!isPost()) return show_404();

		if($this->NetworkRequest->hasRequested($this->input->post('user-id'))) return redirect('/network');

		if($this->NetworkRequest->create()) return redirect('/network');
		
		echo "Gagal menghubungkan";
	}

	public function disconnect()
	{
		if(!isDelete()) return show_404();

		if($this->Network->disconnect($this->input->post('user-id'))) return redirect('/network_request');

		echo "Gagal memutuskan";
	}

}
