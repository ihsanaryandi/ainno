<?php  

function isPost() {
	if($_SERVER['REQUEST_METHOD'] === 'POST') return true;

	return false;
}

function isPut() {
	if($_SERVER['REQUEST_METHOD'] === 'PUT') return true;

	return false;	
}

function isDelete() {
	if($_SERVER['REQUEST_METHOD'] === 'DELETE') return true;

	return false;	
}

function isError($field) {
	if(form_error($field)) return 'is-invalid';
	return '';
}

function filterInputs(array $inputs) {
	$results = [];

	foreach ($inputs as $key => $value) {
		$results[$key] = htmlspecialchars($value);
	}

	return $results;
}

function method($method) 
{
	return '<input type="hidden" name="_method" value="'. strtoupper($method) .'">';
}

function checkMethod() {
	$ci = get_instance();

	$allowedMethods = ['GET', 'POST', 'PUT', 'PATCH', 'DELETE'];

	$method = $ci->input->post('_method');

	if($method) 
	{
		if(in_array($method, $allowedMethods)) 
		{
			$_SERVER['REQUEST_METHOD'] = $method;
		}
	}
}

function csrf() {
	$security = get_instance()->security;

	echo '<input type="hidden" name="' . $security->get_csrf_token_name() . '" value="' . $security->get_csrf_hash() . '">';
}

function uploadProfilePicture() {
	$ci = get_instance();

	$config = [
		'upload_path' => './public/img/profile_pictures/',
		'allowed_types' => 'jpg|jpeg',
		'max_size' => 2048,		
		'encrypt_name' => true
	];

	$ci->load->library('upload', $config);

	if($ci->upload->do_upload('profile-picture')) return 'profile_pictures/' . $ci->upload->data('file_name');

	return false;
}

?>
