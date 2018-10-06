<?php
	session_start();
	require'../../class.php';
    $obj = new Dataphp();
    $sql ='SELECT `Request_ID`,`Worker_ID`, `JobName`, `RequestDetail`, `IsConfirmRequest` FROM `request` WHERE `Member_ID` = '.$_SESSION['id_show'];
   $res = mysqli_query($obj->re_login(),$sql);
   $sum = 0;
   while ($data_ta = mysqli_fetch_assoc($res)) {
   		$sum++;
   	 	echo '<tr>
			    <td>'.$sum.'</td>
			    <td>
			    <a href="customer_quotation.php?id_request='.$data_ta['Request_ID'].'" class="waves-effect">'.$data_ta['JobName'].'</a>
			    </td>
			    <td>'.$obj->return_nameworker($data_ta['Worker_ID']).'</td>
			    <td>'.$data_ta['RequestDetail'].'</td>
			    <td>';

			    if ($data_ta['IsConfirmRequest']==NULL) {
			    	echo "รอการยืนยัน";
			    }
			    else if ($data_ta['IsConfirmRequest']==1) {
			    	echo "ยืนยันแล้ว";
			    }
			     else if ($data_ta['IsConfirmRequest']==0) {
			    	echo "ถูกยกเลิก";
			    }

			    echo'</td> 
			</tr>';
   }
?>
