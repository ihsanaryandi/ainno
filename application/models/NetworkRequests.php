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
		return $this->db->select('user_id, username, profile_picture')
						->from('users')
						->join('networks', 'user1 = user_id')
						->where([
							'user2' => user('user_id'),
							'is_connected' => 0
						])
						->get()
						->result_array();
	}

	public function create()
	{
		$data = [
			'user1' => user('user_id'),
			'user2' => $this->input->post('user-id'),
			'is_connected' => 0
		];

		$this->db->insert('networks', $data);

		return $this->db->affected_rows();
	}

	public function createNetworks($userId)
	{
		$this->db->update('networks', ['is_connected' => 1], [
			'user1' => $userId,
			'user2' => user('user_id')
		]);

		return $this->db->affected_rows();
	}

	public function deleteRequest($userId)
	{
		$this->db->delete('networks', [
			'user1' => $userId,
			'user2' => user('user_id')
		]);

		return $this->db->affected_rows();
	}

	public function hasRequested($userId)
	{
		$result = $this->db->get_where('networks', [
			'user1' => user('user_id'),
			'user2' => $userId,
			'is_connected' => 0
		])->num_rows();

		return $result;
	}

}