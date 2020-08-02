<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class GroupMembers extends CI_Model {

	public function getMember($groupId, $userId) 
	{
		return $this->db->get_where('group_members', [
			'group_id' => $groupId,
			'user_id' => $userId
		])->row_array();
	}

	public function getGroups()
	{
		return $this->db->select('business_groups.group_id, name, description')
						->from('business_groups')
						->join('group_members', 'business_groups.group_id = group_members.group_id')
						->where([
							'group_members.user_id' => user('user_id'),
							'creator !=' => user('user_id')
						])
						->get()
						->result_array();
	}

}