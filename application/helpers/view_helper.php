<?php 

function css($file) {
	return base_url("/public/css/$file.css");
}

function js($file) {
	return "/public/js/$file.js";
}

function img($file) {
	return base_url("/public/img/$file");
}

function view($file, $data = []) {
	$ci = get_instance();

	$phpExt = explode('.', $file);
	
	switch (end($phpExt)) {
		case 'php':
			$data['FILE'] = $file;
			break;
		case 'html':
			$data['FILE'] = $file;
			break;
		default:
			$data['FILE'] = "$file.php";
	}

	$ci->load->view('layout', $data);
}