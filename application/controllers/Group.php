<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Users', 'User');
		$this->load->model('Groups', 'Group');
		$this->load->model('GroupMembers', 'GroupMember');
		$this->load->model('Networks', 'Network');
	}

	public function index() 
	{
		isAuthenticated(function() {
			if($groupId = $this->input->get('group_id')) 
			{
				$this->_group($groupId);
			}
			else 
			{
				$this->_index();
			}
		}, '/auth/sign_in');
	}

	private function _index() 
	{
		$data['title'] = 'Grup';
		$data['myGroups'] = $this->Group->getWhereGroups(['creator' => user('user_id')]);
		$data['otherGroups'] = $this->GroupMember->getGroups();

		view('group-index', $data);
	}

	private function _group($groupId) 
	{
		$data['title'] = 'Nama Grup';
		$data['group'] = $this->_checkGroupAccess($groupId);

		view('group', $data);
	}

	private function _checkGroupAccess($groupId)
	{
		$group = $this->Group->getGroup($groupId);

		if(!$group || !$this->GroupMember->getMember($groupId, user('user_id'))) return redirect('/group');

		return $group;
	}

	public function create() 
	{
		isAuthenticated(function() {
			$data['title'] = 'Create Group';
			$data['users'] = $this->Network->getConnectedNetworks();

			if(!isPost()) return view('create-group', $data);
			
			$this->_createGroup($data);
		});
	}

	private function _createGroup($data)
	{
		if(!$this->form_validation->run('createGroup')) return view('create-group', $data); 
		
		if(!$this->Group->create()) echo "Gagal membuat grup";
	}

}