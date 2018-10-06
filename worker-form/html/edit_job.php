<?php
require'../../class.php';
$obj = new Dataphp();
$name=$_POST['name'];
$detail=$_POST['detail'];
$price=$_POST['price'];
$id=$_POST['id'];
$obj->update_job($id,$name,$detail,$price);


?>