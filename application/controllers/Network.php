<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Network extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Jaringan';

		view('network', $data);
	}
}
