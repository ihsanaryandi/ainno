<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserSkills extends CI_Model {

	public function getSkills($userId) {
		return $this->db->get_where('user_skills', ['user_id' => $userId])->result_array();
	} 

}