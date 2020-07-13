<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		$data['title'] = 'Login';
		$data['hideNavbar'] = true;
		view('login', $data);
	}

	public function register() 
	{
		if(!$this->checkRegisterType()) return redirect('/');

		$data['title'] = 'Register';
		$data['hideNavbar'] = true;
		view('register', $data);
	}

	public function extra_informations() {
		$data['title'] = 'Extra Informations';
		$data['hideNavbar'] = true;
		view('extra-informations', $data);
	}

	public function cofounder_informations() {
		$data['title'] = 'Co-Founder Informations';
		$data['hideNavbar'] = true;
		view('co-founder-informations', $data);
	}

	private function checkRegisterType() {
		$allowedTypes = [
			'looking_cofounder',
			'looking_adviser',
			'adviser'
		];

		if(!in_array($this->input->get('r'), $allowedTypes)) return false;
		
		return true;
	}
}
