<?php  

$currentUser = [];

function user($index = null) {
	global $currentUser;

	$ci = get_instance();

	if(isset($currentUser[$ci->session->userdata('user_id')])) 
	{
		if($index) 
		{	
			return $currentUser[$ci->session->userdata('user_id')][$index];
		}
				
		return $currentUser[$ci->session->userdata('user_id')];
	}

	$user = $ci->db->get_where('users', ['user_id' => $ci->session->userdata('user_id')])->row_array();

	if($user) 
	{
		$currentUser[$ci->session->userdata('user_id')] = $user;

		if($index) 
		{	
			return $currentUser[$ci->session->userdata('user_id')][$index];
		}

		return $currentUser[$ci->session->userdata('user_id')];
	}

	return null;
}

function isAuthenticated($callback, $redirect = null) {
	if(user()) return $callback();

	if($redirect) return redirect($redirect);

	return show_error('Anda belum terautentikasi gann!!!', 403, 'Forbidden');
}

function isNotAuthenticated($callback, $redirect = null) {
	if(!user()) return $callback();

	if($redirect) return redirect($redirect);
	
	return show_error('Anda sudah terautentikasi gann!!!', 403, 'Forbidden');
}

?>

