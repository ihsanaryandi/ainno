<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extras extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('ExtraInformations', 'Extras');
	}

	public function profile() {
		isAuthenticated(function() {		
			$data['title'] = 'Extra Informations';
			$data['hideNavbar'] = true;

			if(!isPost()) return view('extra-informations', $data);

			if(!$this->form_validation->run('extraInformations')) return view('extra-informations', $data);

			if($this->Extras->addProfileData()) return redirect('/extras/co_founder');
			
			echo "Insert data failed";
		});
	}

	public function co_founder() {
		isAuthenticated(function() {
			$data['title'] = 'Co-Founder Informations';
			$data['hideNavbar'] = true;
			
			if(!isPost()) return view('co-founder-informations', $data);
			
			if(!$this->form_validation->run('coFounderInformations')) return view('co-founder-informations', $data);		
			
			if(!$this->Extras->addCofounderInformations()) echo "Insert data Failed";
		});
	}
}