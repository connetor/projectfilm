<?php
	$id = $_POST['id_login'];
	$pw = $_POST['pw_login'];

	require'../class.php';
	
	$obj = new Dataphp();

	$obj->login($id,$pw);
	
?>