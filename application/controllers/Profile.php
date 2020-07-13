<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index() {
		
		$this->checkUsername();

		$data['title'] = "Profile {$this->input->get('username')}";

		view('profile', $data);

	}

	public function edit() {
		$data['title'] = 'Profile Edit';
		$data['hideNavbar'] = true;

		view('edit-profile', $data);
	}

	private function checkUsername() {
		if($this->input->get('username')) 
		{
			return $this->input->get('username');
		}

		return redirect('/');
	}

}