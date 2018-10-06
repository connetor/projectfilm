<?php
	require'../../class.php';
    $obj = new Dataphp();
    if(isset($_POST['datahistory'])){
        $obj->finish_history_worker($_POST['datahistory']);
        echo $_POST['datahistory'];
    }else{
        
    $obj->UnIs_request($_POST['data']);
   
    }

?>