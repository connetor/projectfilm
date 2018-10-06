<?php
	require'../../class.php';
	$id = $_POST['data'];
	$table = 'workerinformation';
	$where = 'Worker_ID';
	$obj = new Dataphp();
	$obj->delete_data($id,$table,$where)
?>