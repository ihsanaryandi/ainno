<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discussion extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Diskusi';

		view('discussion', $data);
	}

	public function ask() 
	{
		$data['title'] = 'Ask';

		view('ask', $data);
	}
}
