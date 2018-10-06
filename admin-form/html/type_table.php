<?php
	require'../../class.php';
	$obj = new Dataphp();
    $link = $obj->re_login();

    $sql = 'SELECT * FROM `type`';

    $res = mysqli_query($link,$sql);
    $num=1;
    while ($data = mysqli_fetch_assoc($res)) {
    	echo '<tr>
                                            <td>'.$num.'</td>
                                            <td>
                                                '.$data['TypeName'].'
                                            </td>
                                            <td>'.$data['Type_ID'].'</td>
                                            <td>
                                                <a class="btn btn-danger">ลบ</a>
                                                <a class="btn btn-warning">แก้ไข</a>
                                            </td>

                                        </tr>';
        $num++;
    }
?>