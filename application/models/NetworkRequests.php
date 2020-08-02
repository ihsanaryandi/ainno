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
		return $this->db->select('username, profile_picture')
						->from('users')
						->join('networks', 'founder_username = username')
						->where([
							'co_founder_username' => user('username'),
							'is_connected' => 0
						])
						->get()
						->result_array();
	}

	public function create()
	{
		$data = [
			'founder_username' => user('username'),
			'co_founder_username' => $this->input->post('username'),
			'is_connected' => 0
		];

		$this->db->insert('networks', $data);

		return $this->db->affected_rows();
	}

	public function createNetworks($username)
	{
		$this->db->update('networks', ['is_connected' => 1], [
			'founder_username' => $username,
			'co_founder_username' => user('username')
		]);

		return $this->db->affected_rows();
	}

	public function deleteRequest($username)
	{
		$this->db->delete('networks', [
			'founder_username' => $username,
			'co_founder_username' => user('username')
		]);

		return $this->db->affected_rows();
	}

	public function hasRequested($username)
	{
		$result = $this->db->get_where('networks', [
			'founder_username' => user('username'),
			'co_founder_username' => $username,
			'is_connected' => 0
		])->num_rows();

		return $result;
	}

}