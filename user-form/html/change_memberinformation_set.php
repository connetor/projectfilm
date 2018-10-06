<?php
	session_start();
	
	require'../../class.php';
	$obj = new Dataphp();
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$addr = $_POST['addr'];
	$id = $_SESSION['id_show'];
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
	


	$obj->change_memberinformation($fname,$lname,$email,$phone,$addr,$id,$image);

	
?>