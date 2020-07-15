<?php  
	
function isPost() {
	if($_SERVER['REQUEST_METHOD'] === 'POST') return true;

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

?>