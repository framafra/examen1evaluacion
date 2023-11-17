<?php
if(isset($_SESSION["user_id"])){
if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
if(count($_POST)>0){
	$user = new OperationData();
	$user->description = $_POST["description"];
	$user->amount = $_POST["amount"];
	$user->person_id = $_POST["person_id"];
	$user->kind = 1;//$_POST["kind"];
	$user->add();
	Core::alert("Deposito agregado!");
	Core::redir("./?view=operations&opt=all");
}
}

else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
	$user = OperationData::getById($_GET["id"]);
	$user->del();
	Core::alert("Operacion eliminada!");
	Core::redir("./?view=operations&opt=all");
}
}


?>