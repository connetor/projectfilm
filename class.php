<?php
	/**
	* 
	*/
	class Dataphp
	{
		private $link;
		public $memberinformation,$workerinformation;
	
		function __construct()
		{	
			// $host = 'localhost';
			// $user = 'fixitint_Admin';
			// $pass = 'fixit1234';
			// $table = 'fixitint_project';
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$table = 'project';
			$this->link = mysqli_connect($host,$user,$pass,$table) or die(mysqli_error());
			mysqli_set_charset($this->link,'utf8');
		}

		function re_login(){
			return $this->link;
		}

		function insert_memberinformation($user,$pass,$fname,$lname,$bdate,$address,$phone,$email)
		{
			$sql = "INSERT INTO `memberinformation` (`Username`, `Password`, `Fname`, `Lname`, `Bdate`, `Address`, `Phone`, `Email`, `ProfilePic`) VALUES ('$user','$pass','$fname','$lname','$bdate','$address','$phone','$email','img/default.png')";
			mysqli_query($this->link,$sql);
		}

		function insert_workkerinformation($user,$pass,$fname,$lname,$bdate,$address,$phone,$email,$type,$ex,$teclo)
		{
			$sql = "INSERT INTO `workerinformation`( `Username`, `Password`, `Fname`, `Lname`, `Bdate`, `Address`, `Phone`, `Email`,`TypeID`, `TechnicLocation`, `Extention`, `ProfilePic`) VALUES ('$user','$pass','$fname','$lname','$bdate','$address','$phone','$email',$type,'$teclo','$ex','img/default.png')";
			mysqli_query($this->link,$sql);
		}

		function memberinformation($id)
		{
			$sql = "SELECT `Fname`, `Lname`,  `Address`, `ProfilePic`, `Phone`, `Email` FROM `memberinformation` WHERE `Member_ID` = ".$id;
			$this->memberinformation = mysqli_query($this->link,$sql);
		}

		function change_memberinformation($fname,$lname,$email,$phone,$addr,$id,$image)
		{
			$sql = "UPDATE `memberinformation` SET";
			if($image!=null){
				$sql.= " `ProfilePic`= '".$image."'";
				if($fname!=null||$lname!=null||$email!=null||$phone!=null||$addr!=null){
					$sql .=" , ";
				}				
			}

			if ($fname!=null) {
				$sql .= " `Fname`= '".$fname."'";
				if ($lname!=null) {
					$sql .= " ,`Lname`= '".$lname."'";
				}
				if ($email!=null) {
					$sql .= " ,`Email`= '".$email."'";
				}
				if ($phone!=null) {
					$sql .= " ,`Phone`= '".$phone."'";
				}
				if ($addr!=null) {
					$sql .= " ,`Address`= '".$addr."'";
				}	
				

			}
			else if ($lname!=null) {
				$sql .= " `Lname`= '".$lname."'";
				if ($email!=null) {
					$sql .= " ,`Email`= '".$email."'";
				}
				if ($phone!=null) {
					$sql .= " ,`Phone`= '".$phone."'";
				}
				if ($addr!=null) {
					$sql .= " ,`Address`= '".$addr."'";
				}
			}
			else if ($email!=null) {
				$sql .= " `Email`= '".$email."'";
				if ($phone!=null) {
					$sql .= " ,`Phone`= '".$phone."'";
				}
				if ($addr!=null) {
					$sql .= " ,`Address`= '".$addr."'";
				}
			}
			else if ($phone!=null) {
				$sql .= " `Phone`= '".$phone."'";
				if ($addr!=null) {
					$sql .= " ,`Address`= '".$addr."'";
				}
			}
			else if ($addr!=null) {
				$sql .= " `Address`= '".$addr."'";
			}
		
			$sql .= " WHERE `Member_ID` = " .$id;
		
		
			mysqli_query($this->link,$sql);
		}

		function workerinformation($id)
		{
			$sql = "SELECT * FROM `workerinformation` WHERE `Worker_ID` = ".$id;
			$this->workerinformation = mysqli_query($this->link,$sql);
		}

		function change_workerinformation($fname,$lname,$email,$phone,$addr,$id,$image,$status)
		{
			$sql = "UPDATE `workerinformation` SET";	
			if($image!=null){
				$sql.= " `ProfilePic`= '".$image."'";
				if($fname!=null||$lname!=null||$email!=null||$phone!=null||$addr!=null){
					$sql .=" , ";
				}				
			}
			if ($fname!=null) {
				$sql .= " `Fname`= '".$fname."'";
				if ($lname!=null) {
					$sql .= " ,`Lname`= '".$lname."'";
				}
				if ($email!=null) {
					$sql .= " ,`Email`= '".$email."'";
				}
				if ($phone!=null) {
					$sql .= " ,`Phone`= '".$phone."'";
				}
				if ($addr!=null) {
					$sql .= " ,`Address`= '".$addr."'";
				}
			}
			else if ($lname!=null) {
				$sql .= " `Lname`= '".$lname."'";
				if ($email!=null) {
					$sql .= " ,`Email`= '".$email."'";
				}
				if ($phone!=null) {
					$sql .= " ,`Phone`= '".$phone."'";
				}
				if ($addr!=null) {
					$sql .= " ,`Address`= '".$addr."'";
				}
			}
			else if ($email!=null) {
				$sql .= " `Email`= '".$email."'";
				if ($phone!=null) {
					$sql .= " ,`Phone`= '".$phone."'";
				}
				if ($addr!=null) {
					$sql .= " ,`Address`= '".$addr."'";
				}
			}
			else if ($phone!=null) {
				$sql .= " `Phone`= '".$phone."'";
				if ($addr!=null) {
					$sql .= " ,`Address`= '".$addr."'";
				}
			}
			else if ($addr!=null) {
				$sql .= " `Address`= '".$addr."'";
			}
			if($fname!=null||$lname!=null||$email!=null||$phone!=null||$addr!=null||$image!=null){
				$sql .=" , `status`= '".$status."'";
			}else{
				$sql .=" `status`= '".$status."'";
			}

			$sql .= " WHERE `Worker_ID` = " .$id;

			mysqli_query($this->link,$sql);
		}

		function delete_data($id,$table,$where){
			$sql = "DELETE FROM `".$table."` WHERE `".$where."` = ".$id;
			mysqli_query($this->link,$sql);
		}

		function login($id,$pw){
			session_start();

			$sql = "SELECT `Member_ID` FROM `memberinformation` WHERE `Username` = '".$id."' AND `Password` = '".$pw."'";
			if (mysqli_num_rows(mysqli_query($this->link,$sql)) != 0) {
				$_id =  mysqli_fetch_assoc( mysqli_query($this->link,$sql) );
				$_SESSION['member'] = true;
				$_SESSION['id_show'] = $_id['Member_ID'];
				echo "member";
		
			}
			$sql2 = "SELECT `Worker_ID` FROM `workerinformation` WHERE `Username` = '".$id."' AND `Password` = '".$pw."'";
			if (mysqli_num_rows(mysqli_query($this->link,$sql2)) != 0) {
				$_id =  mysqli_fetch_assoc( mysqli_query($this->link,$sql2) );
				$_SESSION['worker'] = true;
				$_SESSION['id_show'] = $_id['Worker_ID'];
				echo "worker";
			}

			if (mysqli_num_rows(mysqli_query($this->link,$sql2)) == 0 && mysqli_num_rows(mysqli_query($this->link,$sql)) == 0) {
				$_SESSION['member'] = false;
				$_SESSION['worker'] = false;
				session_destroy();
				echo "error";
			}

		}
		function review($id){
			$sql = 'SELECT `Worker_ID` FROM `workerinformation` WHERE `TypeID` = '.$id.' ORDER BY RAND() LIMIT 1';
			return mysqli_fetch_assoc(mysqli_query($this->link,$sql));
		}
		function avg_star($id){
			$sql = 'SELECT AVG(Star) FROM `starpoint` WHERE `Worker_ID` = '.$id;
			$resutl = mysqli_fetch_assoc(mysqli_query($this->link,$sql));
			return $resutl['AVG(Star)'];
		}
		function type_select($idtype){
			$sql = 'SELECT `TypeName` FROM `type` WHERE `Type_ID` = '.$idtype;
			$resutl = mysqli_fetch_assoc(mysqli_query($this->link,$sql));
			return $resutl['TypeName'];
		}

		function IsConfirm($id){
			$sql = 'UPDATE `workerinformation` SET `IsConfirm`= 1 WHERE `Worker_ID` = '.$id;
			mysqli_query($this->link,$sql);
		}

		function UnIsConfirm($id){
			$sql = 'UPDATE `workerinformation` SET `IsConfirm`= 0 WHERE `Worker_ID` = '.$id;
			mysqli_query($this->link,$sql);
		}
		function finish_history_member($id){
			$sql = 'UPDATE `workerhistory` SET `Isfinish_member`= 1 , `IsFinish` = 1 WHERE `Workhistory_ID` = '.$id;
			mysqli_query($this->link,$sql);
		}
		function finish_history_worker($id){
			$sql = 'UPDATE `workerhistory` SET `Isfinish_worker`= 1 WHERE `Workhistory_ID` = '.$id;
			mysqli_query($this->link,$sql);
		}
		function insert_request($id_worker,$id_member,$name,$location,$detail,$tel,$datetime){
			$sql = 'INSERT INTO `request`(`Member_ID`, `Worker_ID`, `Location`, `JobName`, `RequestDetail`, `IsConfirmRequest`,`Tel`,`StartDatetime`) VALUES ('.$id_member.','.$id_worker.',"'.$location.'","'.$name.'","'.$detail.'",NULL,"'.$tel.'","'.$datetime.'")';
			mysqli_query($this->link,$sql);
			$id=mysqli_insert_id($this->link);
			return $id;
		
		}
		function insert_request2($id_worker,$id_member,$name,$location,$detail,$pro,$tel,$datetime){
			$sql = 'INSERT INTO `request`(`Member_ID`, `Worker_ID`, `Location`, `JobName`, `RequestDetail`, `IsConfirmRequest`, `PromotionCode`, `Tel`, `StartDatetime`) VALUES ('.$id_member.','.$id_worker.',"'.$location.'","'.$name.'","'.$detail.'",NULL,"'.$pro.'","'.$tel.'","'.$datetime.'")';
			mysqli_query($this->link,$sql);
		}
		function return_nameworker($id){
			$sql = 'SELECT  `Fname`, `Lname` FROM `workerinformation` WHERE `Worker_ID` = '.$id;
			$res = mysqli_fetch_assoc(mysqli_query($this->link,$sql));
			return $res['Fname']." ".$res['Lname'];
		}
		function return_namemember($id){
			$sql = 'SELECT  `Fname`, `Lname` FROM `memberinformation` WHERE `Member_ID` = '.$id;
			$res = mysqli_fetch_assoc(mysqli_query($this->link,$sql));
			return $res['Fname']." ".$res['Lname'];
		}
		function return_member($id){
			$sql = 'SELECT  `Fname`, `Lname` FROM `memberinformation` WHERE `Member_ID` = '.$id;
			$res = mysqli_fetch_assoc(mysqli_query($this->link,$sql));
			return $res['Fname']." ".$res['Lname'];
		}
		function insert_quotation($worker,$member,$request,$jobname){
			$sql = 'INSERT INTO `quotation`(`Worker_ID`, `Member_ID`, `Request_ID`, `JobName`, `ISConfirm`) VALUES ('.$worker.','.$member.','.$request.',"'.$jobname.'",NULL)';
			mysqli_query($this->link,$sql);
			$sql2 = 'SELECT `Quotation_ID` FROM `quotation` WHERE `Request_ID` = '.$request;
			$res = mysqli_fetch_assoc(mysqli_query($this->link,$sql2));
			return $res['Quotation_ID'];
		}
		function insert_quotation_detail($quotation_id,$quotation_detail,$quotation_price){
			$sql = 'INSERT INTO `quotation_detail`( `Quotation_ID`, `QutationDetail`, `QuotationPrice`) VALUES ('.$quotation_id.',"'.$quotation_detail.'",'.$quotation_price.')';
			mysqli_query($this->link,$sql);
		}
		function insert_standardjob($id,$name,$detail,$price){
			$sql = 'INSERT INTO `standardjob`( `Worker_ID`, `JobName`, `Detail`, `Price`) VALUES ('.$id.',"'.$name.'","'.$detail.'",'.$price.')';
			mysqli_query($this->link,$sql);
		}
		function update_job($id,$name,$detail,$price){
			$sql = 'update `standardjob` set JobName="'.$name.'" , Detail="'.$detail.'" , Price = '.$price.' where Job_ID = '.$id ;	

			mysqli_query($this->link,$sql);
		}
		function Is_request($id){
			$sql = 'UPDATE `request` SET `IsConfirmRequest`= 1 WHERE `Request_ID` = '.$id;
			mysqli_query($this->link,$sql);
		}

		function UnIs_request($id){
			$sql = 'UPDATE `request` SET `IsConfirmRequest`= 0 WHERE `Request_ID` = '.$id;
			mysqli_query($this->link,$sql);
		}
		function con_quo($id){
			$sql = 'UPDATE `quotation` SET `ISConfirm`= 1 WHERE `Quotation_ID` = '.$id;
			mysqli_query($this->link,$sql);
		}
		function can_quo($id){
			$sql = 'UPDATE `quotation` SET `ISConfirm`= 0 WHERE `Quotation_ID` = '.$id;
			mysqli_query($this->link,$sql);
		}
		function insert_history($id_worker,$id_member,$quotation_id){
			$sql = 'INSERT INTO `workerhistory`( `Worker_ID`, `Member_ID`, `Quotation_ID`, `IsFinish`, `Employee_ID`) VALUES ('.$id_worker.','.$id_member.','.$quotation_id.',0,1)';
		
			mysqli_query($this->link,$sql);
		}
		function return_quotation($id){
			$sql = 'SELECT  `JobName` FROM `quotation` WHERE `Quotation_ID` = '.$id;
			$res = mysqli_fetch_assoc(mysqli_query($this->link,$sql));
			return $res['JobName'];
		}
		function re_location($id){
			$sql = 'SELECT `Request_ID` FROM `quotation` WHERE `Quotation_ID` = '.$id;
			$res = mysqli_fetch_assoc(mysqli_query($this->link,$sql));
			$sql2 = 'SELECT `Location` FROM `request` WHERE `Request_ID` = '.$res['Request_ID'];
			$res2 = mysqli_fetch_assoc(mysqli_query($this->link,$sql2));
			return $res2['Location'];
		}
		function re_detail($id){
			$sql = 'SELECT `Request_ID` FROM `quotation` WHERE `Quotation_ID` = '.$id;
			$res = mysqli_fetch_assoc(mysqli_query($this->link,$sql));
			$sql2 = 'SELECT `RequestDetail` FROM `request` WHERE `Request_ID` = '.$res['Request_ID'];
			$res2 = mysqli_fetch_assoc(mysqli_query($this->link,$sql2));
			return $res2['RequestDetail'];
		}

		function re_price($id){
			$sql = 'SELECT SUM(`QuotationPrice`) FROM `quotation_detail` WHERE `Quotation_ID` = '.$id;
			$res = mysqli_fetch_assoc(mysqli_query($this->link,$sql));
			return $res['SUM(`QuotationPrice`)'];
		}

		function checkpro($code){
			$sql = 'SELECT `PromotionCode` FROM `promotion` WHERE `PromotionCode` = "'.$code.'"';
			$res = mysqli_query($this->link,$sql);
			$rows = mysqli_num_rows($res);
			return $rows;
		}

		function add_start($star,$id_worker,$id_member){
			$sql = "INSERT INTO `starpoint`(`Worker_ID`, `Star`, `Member_ID`) VALUES (".$id_worker.",".$star.",".$id_member.")";
			mysqli_query($this->link,$sql);
			
		}

		function add_comment($detail,$id_worker,$id_member){
			$sql = 'INSERT INTO `comment`( `Worker_ID`, `Member_ID`, `Comment`) VALUES ('.$id_worker.','.$id_member.',"'.$detail.'")';
			mysqli_query($this->link,$sql);
		}

		function review_worker($id){
			$sql = "SELECT starpoint.Star,comment.Comment,starpoint.Worker_ID,starpoint.Member_ID FROM starpoint INNER JOIN comment ON starpoint.Starpoint_ID = comment.Comment_ID WHERE starpoint.Worker_ID = ".$id." ORDER BY RAND() LIMIT 6";
			return mysqli_query($this->link,$sql);
		}

		function name_member($id){
			$sql = 'SELECT   `Fname`, `Lname` FROM `memberinformation` WHERE `Member_ID` = '.$id;
			$res = mysqli_query($this->link,$sql);
			$data = mysqli_fetch_assoc($res);
			return $data['Fname']." ".$data['Lname'];
		}

		function return_type($id){
			$sql = 'SELECT `TypeName` FROM `type` WHERE `Type_ID` = '.$id;
			$res = mysqli_query($this->link,$sql);
			$data = mysqli_fetch_assoc($res);
			return $data['TypeName'];
		}

		function add_type($id,$nametype){
			$sql = 'INSERT INTO `type`(`Type_ID`, `TypeName`) VALUES ('.$id.',"'.$nametype.'")';
			mysqli_query($this->link,$sql);
		}
	}
?>