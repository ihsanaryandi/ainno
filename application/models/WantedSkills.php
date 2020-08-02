<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WantedSkills extends CI_Model {

	public function getSkills($userId) {
		return $this->db->get_where('wanted_skills', ['user_id' => $userId])->result_array();
	} 

}