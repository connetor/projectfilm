<?php
	session_start();
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$addr = $_POST['addr'];
	$status = $_POST['status'];
	

	$id = $_SESSION['id_show'];

	require'../../class.php';
	
	if(empty($_FILES['image']['name'])){
		$image=NULL ;
			}else{
				$image="img/";
				$time=("dmYhis");
				$char="abcdefghijklmnopqrstuvwxyz";
				$new_name=str_shuffle("$char$time");
				$image=$image.$new_name.$_FILES['image']['name'];
				$temp=$_FILES['image']['tmp_name'];
				 
				copy($temp,$image);
			}

	$obj = new Dataphp();
	$obj->change_workerinformation($fname,$lname,$email,$phone,$addr,$id,$image,$status);
?>