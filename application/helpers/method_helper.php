<?php  
	
function isPost() {
	if($_SERVER['REQUEST_METHOD'] === 'POST') return true;

	return false;
}

?>