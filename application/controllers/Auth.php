<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Users', 'User');
		$this->load->model('AuthModel', 'Auth');
		
		checkMethod();
	}

	public function sign_in()
	{
		isNotAuthenticated(function() {
			$data['title'] = 'Sign In';
			$data['hideNavbar'] = true;

			if(!isPost()) return view('login', $data);

			if($user = $this->Auth->sign_in())
			{
				$this->session->set_userdata('username', $user['username']);

				return redirect('/network');
			}

			$this->session->set_flashdata('errorLogin', 
		    '<div class="alert alert-danger" role="alert">
			   Akun tidak terdaftar
			 </div>
		    ');

			return redirect('/auth/sign_in');
		});
	}

	public function sign_up()
	{
		isNotAuthenticated(function() {
			if(!$this->_checkRegisterType()) return redirect('/');

			$data['title'] = 'Sign Up';
			$data['hideNavbar'] = true;

			if(!isPost()) return view('register', $data);

			$this->_registration($data);
		});
	}

	public function sign_out() 
	{
		isAuthenticated(function() {
			$this->session->unset_userdata('username');
			return redirect('/');
		});
	}



	private function _registration($data) 
	{
		if(!$this->form_validation->run('signUp')) return view('register', $data);

		if($this->Auth->register()) return redirect('/extras/profile');
	
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
