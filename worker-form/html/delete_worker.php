<?php
	require'../../class.php';
	session_start();

	$id = $_SESSION['id_show'];

	$obj = new Dataphp();
	$obj->delete_data($id,"workerinformation","Worker_ID");

?>