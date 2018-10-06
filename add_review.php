<?php

	require'class.php';
	$obj = new Dataphp();

	$star = $_POST['rating'];
	$detail = $_POST['detail'];
	$id_worker = $_POST['id_worker'];
	$id_member =$_POST['id_member'];


	if($star!=NULL&&$id_worker!=NULL&&$id_member!=NULL&&$detail!=NULL){
		
		$obj->add_start($star,$id_worker,$id_member);
		$obj->add_comment($detail,$id_worker,$id_member);
	}
?>