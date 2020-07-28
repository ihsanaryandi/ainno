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

	public function getNetworkRequests()
	{
		return $this->db->select('users.user_id, users.username, users.profile_picture, networks.status')
						->from('users')
						->join('networks', 'username = founder_username')
						->where([
							'co_founder_username' => user('username'),
							'status' => 0
						])
						->get()
						->result_array();
	}

	public function getConnectedNetworks()
	{
		$results = [];

		$networks = $this->db->select('*')
							 ->from('networks')
							 ->where('co_founder_username', user('username'))
							 ->or_where('founder_username', user('username'))
							 ->get()
							 ->result_array();

		foreach ($networks as $network) 
		{
			if($network['co_founder_username'] !== user('username') && (int) $network['status'] === 1) 
			{
				$results[] = $this->User->getUser($network['co_founder_username']);
			}
			elseif($network['founder_username'] !== user('username') && (int) $network['status'] === 1)
			{
				$results[] = $this->User->getUser($network['founder_username']);
			}
		}

		return $results;
	}

	public function create()
	{
		$data = [
			'founder_username' => user('username'),
			'co_founder_username' => $this->input->post()['username'],
			'status' => 'NOTACC'
		];

		$this->db->insert('networks', $data);

		return $this->db->affected_rows();
	}

	public function updateStatus($username, $status)
	{
		$this->db->update('networks', ['status' => (int) $status], [
			'co_founder_username' => user('username'),
			'founder_username' => $username,
		]);

		return $this->db->affected_rows();
	}

	public function delete($username)
	{
		$this->db->where('co_founder_username', $username)
				 ->or_where('founder_username', $username);

		$this->db->delete('networks');

		return $this->db->affected_rows();
	}

	public function status($username)
	{
		$networkStatus = $this->db->select('status')
								  ->get_where('networks', [
									  'founder_username' => user('username'),
									  'co_founder_username' => $username,
								  ])->row_array();

		if($networkStatus) 
		{
			return (int) $networkStatus['status'];
		}

		return false;
	}

}