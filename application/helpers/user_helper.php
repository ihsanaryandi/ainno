<?php  

$currentUser = [];

function user($index = null) {
	global $currentUser;

	$ci = get_instance();

	if(isset($currentUser[$ci->session->userdata('username')])) 
	{
		if($index) 
		{	
			return $currentUser[$ci->session->userdata('username')][$index];
		}
				
		return $currentUser[$ci->session->userdata('username')];
	}

	$user = $ci->db->get_where('users', ['username' => $ci->session->userdata('username')])->row_array();

	if($user) 
	{
		$currentUser[$ci->session->userdata('username')] = $user;

		if($index) 
		{	
			return $currentUser[$ci->session->userdata('username')][$index];
		}

		return $currentUser[$ci->session->userdata('username')];
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

