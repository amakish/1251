<?php
require_once('../adodb5/adodb.inc.php');
require_once('../adodb5/adodb-active-record.inc.php');

$db = null;
if($_SERVER['SERVER_PORT'] == 8080){
	$db = NewADOConnection('mysql://root:@localhost/purchases');
}else{
	$db = NewADOConnection('mysql://syndicat_jobs:Secret55Passw0rd@localhost/syndicat_jobs');
}

$db = NewADOConnection('mysql://root:@localhost/purchases');
ADOdb_Active_Record::SetDatabaseAdapter($db);
class Purchase extends ADOdb_Active_Record{}

if(array_key_exists('submit', $_POST)){
	$oPurchase = new Purchase();
	$oPurchase->date = $_POST['date'];
	$oPurchase->purchase = $_POST['purchase'];
	$oPurchase->price = $_POST['price'];
	$oPurchase->save();
	//print_r($oPurchase);
}


if(array_key_exists('add', $_POST)){
	include 'views/add.php';
}else {
	include 'views/list.php';
}
?>
