<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserSkills extends CI_Model {

	public function getSkills($username) {
		return $this->db->get_where('user_skills', ['username' => $username])->result_array();
	} 

}