<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Network_Request extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Networks', 'Network');

		checkMethod();
	}

	public function index()
	{
		isAuthenticated(function(){
			$data['title'] = 'Network Requests';
			$data['networkRequests'] = $this->Network->getNetworkRequests();	
			$data['connectedNetworks'] = $this->Network->getConnectedNetworks();

			view('network-requests', $data);
		});
	}

	public function accept()
	{
		if(!isPut()) return show_404();

		if($this->Network->updateStatus($this->input->post('username'), 1)) return redirect('/network_request');

		echo "Gagal menerima";
	}

	public function decline()
	{
		if(!isDelete()) return show_404();

		if($this->Network->updateStatus($this->input->post('username'), 0)) return redirect('/network_request');

		echo "Gagal menolak";
	}

	public function disconnect()
	{
		if(!isDelete()) return show_404();

		if($this->Network->delete($this->input->post('username'))) return redirect('/network_request');

		echo "Gagal memutuskan";
	}
}