<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends CI_Model {

	public function getWhereGroups($where) 
	{
		return $this->db->get_where('business_groups', $where)->result_array();
	}

	public function getGroup($groupId) 
	{
		return $this->db->get_where('business_groups', ['group_id' => (int) $groupId])->row_array();
	}

	public function create() 
	{
		$data = [
			'name' => htmlspecialchars($this->input->post('group-name')),
			'description' => htmlspecialchars($this->input->post('desc')),
			'creator' => user('username')
		];

		$this->db->insert('business_groups', $data);

		if($this->db->affected_rows()) 
		{
			$groupId = $this->db->insert_id();

			$this->_insertGroupMembers($groupId);

			redirect("/group?group_id=$groupId");

			return true;
		}

		return false;
	}

	private function _insertGroupMembers($groupId) 
	{
		if(empty($this->input->post('cofounder'))) 
		{
			$this->db->insert('group_members', [
				'group_id' => $groupId,
				'member_username' => user('username')
			]);

			if(!$this->db->affected_rows()) {
				echo "Gagal mendaftarkan anggota";
				die;
			}

			return true;
		}

		$data = [];

		$data[] = [
			'group_id' => $groupId,
			'member_username' => user('username')
		];

		foreach ($this->input->post('cofounder') as $coFounder) 
		{
			$data[] = [
				'group_id' => $groupId,
				'member_username' => $coFounder
			];
		}

		$this->db->insert_batch('group_members', $data);

		if(!$this->db->affected_rows())
		{
			echo "Gagal mendaftarkan anggota";
			die;
		}
	}
} 