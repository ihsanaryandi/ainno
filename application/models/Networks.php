<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Networks extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Users', 'User');
	}

	public function getConnectedNetworks()
	{
		$user = user('user_id');

		return $this->db->query("SELECT `user_id`, `username`, `name`, `profile_picture` 
								 FROM `users`
								 INNER JOIN `networks`
								 ON `networks`.`user1` = `users`.`user_id`
								 WHERE `user1` != '$user'
								 AND `user2` = '$user'
								 AND `is_connected` = 1
								 UNION
								 SELECT `user_id`, `username`, `name`, `profile_picture`
								 FROM `users`
								 INNER JOIN `networks`
								 ON `networks`.`user2` = `users`.`user_id`
								 WHERE `user2` != '$user'
								 AND `user1` = '$user'
								 AND `is_connected` = 1
								")->result_array();
	}

	public function disconnect($userId)
	{
		$user = user('user_id');

		$this->db->query("DELETE FROM `networks`
						  WHERE 
						  (`user1` = '$user'
							  AND `user2` = '$userId')
							  OR (`user2` = '$user'
							  AND `user1` = '$userId'
						  )
						");

		return $this->db->affected_rows();

	}

	public function isConnected($userId)
	{
		$result = $this->db->get_where('networks', [
			'user1' => user('user_id'),
			'user2' => $userId,
			'is_connected' => 1
		])->num_rows();

		return $result;
	}

}