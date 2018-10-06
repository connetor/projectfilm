
<?php

require'../../class.php';
$obj = new Dataphp();

$obj->Is_request($_POST['id_r']);
   $id_quo = $obj->insert_quotation($_POST['id_w'],$_POST['id_m'],$_POST['id_r'],$_POST['jobname']);


$i=0;
for ($i=0; $i < $_POST['num'] ; $i++) { 
	$obj->insert_quotation_detail($id_quo,$_POST['head_set-'.$i],$_POST['price_set-'.$i]);
}
?>