<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Users', 'User');
	}

	public function sign_in()
	{
		$data['title'] = 'Sign In';
		$data['hideNavbar'] = true;
		view('login', $data);
	}

	public function sign_up()
	{
		if(!$this->_checkRegisterType()) return redirect('/');

		$data['title'] = 'Sign Up';
		$data['hideNavbar'] = true;

		if(!isPost()) return view('register', $data);

		$this->_registration($data);
	}

	public function extra_informations() {
		$data['title'] = 'Extra Informations';
		$data['hideNavbar'] = true;

		if(!isPost()) return view('extra-informations', $data);

		if(!$this->form_validation->run('extraInformations')) return view('extra-informations', $data);

		if($this->User->addExtraInformations()) return redirect('/auth/cofounder_informations');
		
		echo "Insert data failed";
	}

	public function cofounder_informations() {
		$data['title'] = 'Co-Founder Informations';
		$data['hideNavbar'] = true;
		view('co-founder-informations', $data);
	}




	private function _registration($data) 
	{
		if(!$this->form_validation->run('signUp')) return view('register', $data);

		if($this->User->register()) return redirect('/auth/extra_informations');
	
		echo "Insert data failed";
	}

	private function _checkRegisterType() {
		$allowedTypes = [
			'looking_cofounder',
			'looking_adviser',
			'adviser'
		];

		if(!in_array($this->input->get('r'), $allowedTypes)) return false;
		
		return true;
	}
}
