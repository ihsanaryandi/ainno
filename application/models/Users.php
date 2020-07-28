
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {

	public function getUser($username) {
		return $this->db->get_where('users', ['username' => $username])->row_array();
	}

	public function getUsers() {
		return $this->db->get('users')->result_array();
	}
	
	public function getRandomUsers() {
		return $this->db->order_by('user_id', 'RANDOM')
				 		->get('users')
				 		->result_array();
	}

	public function updateUser($username) {
		$inputs = filterInputs($this->input->post());

		$data = [
			'name' => $inputs['name'],
			'profile_picture' => user('profile_picture'),
			'city' => $inputs['city'],
			'bio' => $inputs['bio']
		];

		if($_FILES['profile-picture']['name'] !== '') 
		{
			if($filename = uploadProfilePicture()) 
			{
				if(user('profile_picture') !== 'default-user-picture.jpg') unlink('./public/img/' . user('profile_picture'));

				$data['profile_picture'] = $filename;
			}
		}

		$this->db->update('users', $data, ['username' => $username]);
		
		redirect('/profile?username=' . user('username'));
	}
}