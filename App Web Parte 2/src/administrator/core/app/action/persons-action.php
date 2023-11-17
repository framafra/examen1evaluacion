<?php
if(isset($_SESSION["user_id"])){
if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
if(count($_POST)>0){
	$user = new PersonData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->address = $_POST["address"];
	$user->phone = $_POST["phone"];
	$user->email = $_POST["email"];
	$user->password = sha1(md5($_POST["password"]));
	$user->add();
	Core::alert("Cliente agregado!");
	Core::redir("./?view=persons&opt=all");
}
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="upd"){
if(count($_POST)>0){
	$user = PersonData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->address = $_POST["address"];
	$user->phone = $_POST["phone"];
	$user->email = $_POST["email"];
	$user->update();

	if($_POST["password"]!=""){
		$user->password = sha1(md5($_POST["password"]));
		$user->update_passwd();
		Core::alert("Se ha actualizado el password!");
	}
	Core::alert("Cliente actualizado!");
	Core::redir("./?view=persons&opt=all");
}
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
	$user = PersonData::getById($_GET["id"]);
	$user->del();
	Core::alert("Cliente eliminado!");
	Core::redir("./?view=persons&opt=all");
}
}


?>