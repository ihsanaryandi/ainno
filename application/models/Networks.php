<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Networks extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Users', 'User');
	}

	public function getNetwork($username)
	{
		return $this->db->get_where('networks', [
			'co_founder_username' => $username,
			'founder_username' => user('username')
		])->row_array();
	}

	public function getConnectedNetworks()
	{
		$networks = $this->db->select('users.user_id, users.username, users.profile_picture')
							 ->from('users')
							 ->join('networks', 'username = founder_username')
							 ->where('co_founder_username', user('username'))
							 ->get()
							 ->result_array();

		return $networks;
	}

	public function disconnect($username)
	{

		$whereRequest = [
			'username_request' => $username,
			'co_founder_username' => user('username')
		];

		$whereNetworks = [
			[
				'founder_username' => $username,
				'co_founder_username' => user('username')
			],
			[
				'founder_username' => user('username'),
				'co_founder_username' => $username
			],
		];

		$this->db->delete('network_requests', $whereRequest);
	
		foreach ($whereNetworks as $where) 
		{
			$this->db->delete('networks', $where);
		}

		return $this->db->affected_rows();

	}

	public function isConnected($username)
	{
		$result = $this->db->get_where('networks', [
			'founder_username' => user('username'),
			'co_founder_username' => $username
		])->num_rows();

		if($result) return $result;

		$result = $this->db->get_where('networks', [
			'founder_username' => $username,
			'co_founder_username' => user('username')
		])->num_rows();

		return $result;
	}

}