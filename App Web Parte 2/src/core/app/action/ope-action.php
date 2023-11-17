<?php
$user= PersonData::getById($_SESSION["client_id"]);

$income = OperationData::getSumPK($user->id, 1)->sx;
$spend = OperationData::getSumPK($user->id, 2)->sx;
$balance = $income-$spend;
$amount = $_POST["amount"];
if($amount<=$balance){
	$user = new OperationData();
	$user->description = $_POST["description"];
	$user->amount = $_POST["amount"];
	$user->person_id = $_SESSION["client_id"];
	$user->kind = 2;//$_POST["kind"];
	$user->add();


	$user = new OperationData();
	$user->description = $_POST["description"];
	$user->amount = $_POST["amount"];
	$user->person_id = $_POST["other_id"];
	$user->kind = 1;//$_POST["kind"];
	$user->add();
}else{
	Core::alert("Saldo insuficiente!");
}
Core::redir("./?view=home");


?>