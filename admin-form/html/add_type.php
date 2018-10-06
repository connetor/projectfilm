<?php
	require'../../class.php';
	$obj = new Dataphp();
	$obj->add_type($_POST['id'],$_POST['type']);
?>