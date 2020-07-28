<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Network extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('Users', 'User');
		$this->load->model('Networks', 'Network');
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

		if($this->Network->getNetwork($this->input->post('username'))) return redirect('/network');

		if($this->Network->create()) return redirect('/network');
		
		echo "Gagal menghubungkan";
	}

}
