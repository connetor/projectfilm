<?php


	$name = $_POST['name'];
	$location = $_POST['location'];
	$detail = $_POST['detail'];
	$id_w = $_POST['id_worker'];
	$id_m = $_POST['id_member'];
	$promo = $_POST['promotion'];
	$tel= $_POST['tel'];
	$datetime = $_POST['datetime'];
	if($name==NULL&&$location==NULL&&$detail==NULL&&$id_w==NULL&&$id_m==NULL&&$promo==NULL){
		echo "error1";
	}
	require'../../class.php';
    $obj = new Dataphp();
    if($obj->checkpro($promo)==1){
  
    	$obj->insert_request2($id_w,$id_m,$name,$location,$detail,$promo,$tel,$StartDatetime);
    }
   	else if($obj->checkpro($promo)==0){
		 			   
		   if($_FILES['image']['name'][0]==""){		
			$obj->insert_request($id_w,$id_m,$name,$location,$detail,$tel,$datetime);			
			}else{
				$id= $obj->insert_request($id_w,$id_m,$name,$location,$detail,$tel,$datetime);
				$count=count($_FILES['image']['name']);        
				for($i=0;$i<$count;$i++){
					$image="img/";
					$time=("dmYhis");
					$new_name=str_shuffle("$time");
					$image=$image.$new_name.$_FILES['image']['name'][$i];
					$temp=$_FILES['image']['tmp_name'][$i];
					copy($temp,$image);
					$sql="insert into request_file (Request_ID,Picture) values ('$id','$image') ";
					  mysqli_query($obj->re_login(),$sql);				
				}
				
		
			}
   	}
?>