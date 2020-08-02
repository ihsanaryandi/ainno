<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	public function register() 
	{
		$inputs = filterInputs($this->input->post());

		$data = [
			'username' => $inputs['username'],
			'email' => $inputs['email'],
			'password' => password_hash($inputs['password'], CRYPT_BLOWFISH),
			'type' => 'looking_cofounder'
		];

		$this->db->insert('users', $data);

		if($this->db->affected_rows()) {
			$this->session->set_userdata('user_id', (int) $this->db->insert_id());
			return true;
		}

		return false;
	}

	public function sign_in()
 	{
 		$data = filterInputs($this->input->post());

 		$userByUsername = $this->db->get_where('users', ['username' => $data['email-username']])->row_array();
 		$userByEmail = $this->db->get_where('users', ['email' => $data['email-username']])->row_array();

 		if($userByUsername) 
 		{
 			return $this->_checkPassword($userByUsername, $data['password']);
 		}
 		elseif($userByEmail) 
 		{
 			return $this->_checkPassword($userByEmail, $data['password']);
 		}

 		return false;
 	}


 	private function _checkPassword($user, $password)
 	{
 		if(password_verify($password, $user['password'])) return $user;

 		return false;
 	}

}

?>