<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ExtraInformations extends CI_Model {

	public function addProfileData()
	{
		$inputs = filterInputs($this->input->post());

		$data = [
			'name' => $inputs['name'],
			'bio' => $inputs['bio'],
			'city' => $inputs['city'],
			'profile_picture' => 'default-user-picture.jpg'
		];

		if($_FILES['profile-picture']['name'] !== '') 
		{
			if($filename = uploadProfilePicture()) 
			{
				$data['profile_picture'] = $filename;
			}
		}

		if(!$this->_insert_skills('user_skills', $inputs['skills-selected'])) 
		{
			echo "Failed inserting skills";
			return;
		}

		$this->db->update('users', $data, ['username' => $this->session->userdata('username')]);

		return $this->db->affected_rows();
	}

	public function addCofounderInformations() {
		$data = filterInputs($this->input->post());

		$this->_insert_skills('wanted_skills', $data['skills-selected']);

		if($this->db->affected_rows()) {
			if($data['cities-selected'] !== '') {
				redirect("/network?city={$this->_filterCities($data['cities-selected'])}");
				return true;
			}

			redirect('/network');
			return true;
		}

		return false;
	}




	private function _filterCities($cities) {
		return implode('%20', explode('|', $cities));
	}

	private function _insert_skills($table, $skills) 
	{
		$this->_deleteCurrentSkills($table);

		$insert = [];

		$skillsSplit = explode('|', $skills);


		foreach ($skillsSplit as $skill) {
			$insert[] = [
				'username' => $this->session->userdata('username'),
				'skill_name' => $skill
			];
		}

		$this->db->insert_batch($table, $insert);

		return $this->db->affected_rows();
	}

	private function _deleteCurrentSkills($table) {
		$skillsCount = $this->db->get_where($table, ['username' => $this->session->userdata('username')])
						        ->num_rows();

		if($skillsCount)
		{
			for ($i=0; $i < $skillsCount; $i++) 
			{ 
				$this->db->delete($table, ['username' => $this->session->userdata('username')]);
			}
		}

		return;
	}
}