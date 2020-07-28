<?php  
	
$config = 
[
	'signUp' => [
		[
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required|min_length[7]|max_length[20]|is_unique[users.username]|regex_match[/^[A-Za-z0-9]+(?:[._-][A-Za-z0-9]+)*$/]',
			'errors' => ['regex_match' => 'Username is invalid']
		],
		[
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email|max_length[100]|is_unique[users.email]',
		],
		[
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|min_length[7]',
		],
		[
			'field' => 'password-confirm',
			'label' => 'Password Confirm',
			'rules' => 'required|matches[password]',
		],
	],

	'extraInformations' => [
		[
			'field' => 'skills-selected',
			'label' => 'Skills',
			'rules' => 'required'
		],
		[
			'field' => 'city',
			'label' => 'City',
			'rules' => 'required',
		]
	],

	'coFounderInformations' => [
		[
			'field' => 'skills-selected',
			'label' => 'Skills',
			'rules' => 'required'
		]
	],

	'createGroup' => [
		[
			'field' => 'group-name',
			'label' => 'Group Name',
			'rules' => 'required'
		],
	],
];

?>