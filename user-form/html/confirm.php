<?php
	require'../../class.php';
    $obj = new Dataphp();
    $obj->finish_history_member($_POST['data']);
    echo $_POST['data'];
?>