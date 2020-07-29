<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class NetworkRequests extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Networks', 'Network');
	}

	public function getNetworkRequests()
	{
		return $this->db->select('users.user_id, users.username, users.profile_picture')
						->from('users')
						->join('network_requests', 'username = username_request')
						->where('co_founder_username', user('username'))
						->get()
						->result_array();
	}

	public function create()
	{
		$data = [
			'username_request' => user('username'),
			'co_founder_username' => $this->input->post('username')
		];

		$this->db->insert('network_requests', $data);

		return $this->db->affected_rows();
	}

	public function createNetworks($username)
	{
		$this->deleteRequest($username);

		if($this->Network->isConnected($username)) return true;

		$data = [
			[
				'founder_username' => $username,
				'co_founder_username' => user('username')
			],
			[
				'founder_username' => user('username'),
				'co_founder_username' => $username
			],
		];

		$this->db->insert_batch('networks', $data);

		return $this->db->affected_rows();
	}

	public function deleteRequest($username)
	{
		$this->db->delete('network_requests', ['username_request' => $username]);

		return $this->db->affected_rows();
	}

	public function isRequested($username)
	{
		$result = $this->db->get_where('network_requests', [
			'username_request' => user('username'),
			'co_founder_username' => $username
		])->num_rows();

		return $result;
	}

}