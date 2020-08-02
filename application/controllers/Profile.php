<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Users', 'User');
		$this->load->model('UserSkills');
		$this->load->model('WantedSkills');
	
		checkMethod();
	}

	public function index() {
		$user = $this->_checkUsername();

		$data['userSkills'] = $this->UserSkills->getSkills($user['user_id']);
		$data['wantedSkills'] = $this->WantedSkills->getSkills($user['user_id']);
		$data['user'] = $user;
		$data['title'] = "Profile {$this->input->get('username')}";

		view('profile', $data);
	}

	public function edit() {
		isAuthenticated(function() {
			$data['title'] = 'Profile Edit';
			$data['hideNavbar'] = true;

			if(!isPut()) return view('edit-profile', $data);
			
			$this->User->updateUser(user('user_id'));
		});
	}

	private function _checkUsername() {
		if($this->input->get('username')) 
		{
			return $this->User->getUserByUsername($this->input->get('username'));
		}

		return redirect('/');
	}

}