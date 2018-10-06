<?php
 session_start();
 $id = $_SESSION['id_show'];    
	require'../../class.php';
    $obj = new Dataphp();
   
	$i=0;
	for ($i=0; $i < $_POST['num'] ; $i++) { 
        $obj->insert_standardjob($id,$_POST['name_set-'.$i],$_POST['detail_set-'.$i],$_POST['price_set-'.$i]);
      
    }
      
?>
