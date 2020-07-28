<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WantedSkills extends CI_Model {

	public function getSkills($username) {
		return $this->db->get_where('wanted_skills', ['username' => $username])->result_array();
	} 

}