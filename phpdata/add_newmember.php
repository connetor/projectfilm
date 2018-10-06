<?php
	require'../class.php';
	$user = $_POST['form_id'];
	$pass = $_POST['form_pw'];
	$fname = $_POST['form_fname'];
	$lname = $_POST['form_lname'];
	$bdate = $_POST['bday'];
	$address = $_POST['addr'];
	$phone = $_POST['form_tel'];
	$email = $_POST['form_email'];
//$repass= $_POST['repass'];

	 if ($user!=NULL&&$pass!=NULL&&$fname!=NULL&&$lname!=NULL&&$bdate!=NULL&&$address!=NULL&&$phone!=NULL&&$email!=NULL) 
	{
		$obj = new Dataphp();
		$obj->insert_memberinformation($user,$pass,$fname,$lname,$bdate,$address,$phone,$email);
	 }
?>

