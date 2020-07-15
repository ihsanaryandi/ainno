<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {

	public function register() 
	{
		$inputs = filterInputs($this->input->post());

		$insert = [
			'username' => $inputs['username'],
			'email' => $inputs['email'],
			'password' => password_hash($inputs['password'], CRYPT_BLOWFISH),
			'type' => 'looking_cofounder'
		];

		$this->db->insert('users', $insert);

		if($this->db->affected_rows()) {
			$this->session->set_userdata('user_id', $this->db->insert_id());
			return true;
		}

		return false;
	}

	public function addExtraInformations()
	{
		$inputs = filterInputs($this->input->post());

		$insert = [
			'name' => $inputs['name'],
			'bio' => $inputs['bio'],
			'city' => $inputs['city']
		];

		if($_FILES['profile-picture']['name'] !== '') 
		{
			if($filename = $this->_upload_profile_picture()) 
			{
				$insert['profile_picture'] = $filename;
			}
		}

		if(!$this->_insert_skills('user_skills', $inputs['skills-selected'])) 
		{
			echo "Failed inserting skills";
			return;
		}

		$this->db->update('users', $insert, ['user_id' => $this->session->userdata('user_id')]);

		return $this->db->affected_rows();
	}







	private function _insert_skills($table, $skills) 
	{
		$insert = [];

		$skillsSplit = explode(',', $skills);

		foreach ($skillsSplit as $skill) {
			$insert[] = [
				'user_id' => $this->session->userdata('user_id'),
				'skill_name' => $skill
			];
		}

		$this->db->insert_batch($table, $insert);

		return $this->db->affected_rows();
	}

	private function _upload_profile_picture() {
		$config = [
			'upload_path' => './public/img/profile_pictures/',
			'allowed_types' => 'jpg|jpeg',
			'max_size' => 2048,		
			'encrypt_name' => true
		];

		$this->load->library('upload', $config);

		if($this->upload->do_upload('profile-picture')) return $this->upload->data('file_name');

		return false;
	}
}