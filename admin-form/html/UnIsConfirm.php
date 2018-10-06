<?php
	require'../../class.php';
	$id = $_POST['data'];
	$obj = new Dataphp();
	$obj->UnIsConfirm($id);
?>