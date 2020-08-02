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
		$user = user('username');

		return $this->db->query("SELECT `username`, `name`, `profile_picture` 
								 FROM `users`
								 INNER JOIN `networks`
								 ON `networks`.`founder_username` = `users`.`username`
								 WHERE `founder_username` != '$user'
								 AND `co_founder_username` = '$user'
								 AND `is_connected` = 1
								 UNION
								 SELECT `username`, `name`, `profile_picture`
								 FROM `users`
								 INNER JOIN `networks`
								 ON `networks`.`co_founder_username` = `users`.`username`
								 WHERE `co_founder_username` != '$user'
								 AND `founder_username` = '$user'
								 AND `is_connected` = 1
								")->result_array();
	}

	public function disconnect($username)
	{
		$user = user('username');

		$this->db->query("DELETE FROM `networks`
						  WHERE 
						  (`founder_username` = '$user'
							  AND `co_founder_username` = '$username')
							  OR (`co_founder_username` = '$user'
							  AND `founder_username` = '$username'
						  )
						");

		return $this->db->affected_rows();

	}

	public function isConnected($username)
	{
		$result = $this->db->get_where('networks', [
			'founder_username' => user('username'),
			'co_founder_username' => $username,
			'is_connected' => 1
		])->num_rows();

		return $result;
	}

}