<?php
	require'../../class.php';
    $obj = new Dataphp();
    $obj->con_quo($_POST['data']);

    $obj->insert_history($_POST['id_w'],$_POST['id_m'],$_POST['data']);

?>