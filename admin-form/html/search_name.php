<?php
	require'../../class.php';
	$obj = new Dataphp();
    $link = $obj->re_login();

	if ($_GET['group']==1) {
             $sql = "SELECT `Member_ID`, `Fname`, `Lname` , `Phone` FROM `memberinformation` WHERE `Fname` LIKE '%".$_GET['name']."%'";
             $data_set = mysqli_query($link,$sql);
        while ($data_table = mysqli_fetch_assoc($data_set)) {
            echo '<tr>
                    <td>'.$data_table['Member_ID'].'</td>
                    <td>
                    <a href="profile.php?id='.$data_table['Member_ID'].'" class="waves-effect">'.$data_table['Fname'].'</a>
                    </td>
                    <td>'.$data_table['Lname'].'</td>
                    <td>'.$data_table['Phone'].'</td>
                    <td>สมาชิก</td>
                    <td>';
                    echo ' </td></tr>';
            }
        }  

     if ($_GET['group']==2) {
             $sql = "SELECT `Worker_ID`, `Fname`, `Lname`, `TypeID`, `Extention`, `IsConfirm`,`Phone` FROM `workerinformation` WHERE `Fname` LIKE '%".$_GET['name']."%'";

        $data_set = mysqli_query($link,$sql);

        while ($data_table = mysqli_fetch_assoc($data_set)) {
            echo '<tr>
                    <td>'.$data_table['Worker_ID'].'</td>
                    <td>
                    <a href="profile.php?id='.$data_table['Worker_ID'].'" class="waves-effect">'.$data_table['Fname'].'</a>
                    </td>
                    <td>'.$data_table['Lname'].'</td>
                    <td>'.$data_table['Phone'].'</td>
                    <td>'.$obj->return_type($data_table['TypeID']).'</td>
                    <td>
                    <button class="btn btn-danger" onclick="del('.$data_table['Worker_ID'].')">ลบ</button>';
                    if ($data_table['IsConfirm']!=NULL&&$data_table['IsConfirm']==1) {
                        echo '<button class="btn btn-info" onclick="UnIsConfirm('.$data_table['Worker_ID'].')">ยกเลิก</button>';
                    }
                    else if ($data_table['IsConfirm']==NULL||$data_table['IsConfirm']==0){
                        echo '<button class="btn btn-success" onclick="IsConfirm('.$data_table['Worker_ID'].')">ยืนยัน</button>';
                    }
                    echo ' </td></tr>';
            }
        }  
?>