<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Network_Request extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Networks', 'Network');
		$this->load->model('networkRequests', 'NetworkRequest');

		checkMethod();
	}

	public function index()
	{
		isAuthenticated(function(){
			$data['title'] = 'Network Requests';
			$data['networkRequests'] = $this->NetworkRequest->getNetworkRequests();
			$data['connectedNetworks'] = $this->Network->getConnectedNetworks();

			view('network-requests', $data);
		});
	}

	public function accept()
	{
		if(!isPut()) return show_404();

		if($this->NetworkRequest->createNetworks($this->input->post('user-id')))
		{
			return redirect('/network_request');
		}

		echo "Gagal menerima";
	}

	public function decline()
	{
		if(!isDelete()) return show_404();

		if($this->NetworkRequest->deleteRequest($this->input->post('user-id'))) 
		{
			return redirect('/network_request');
		}

		echo "Gagal menolak";
	}
}