<?php
// access-action.php
// este archivo sirve para procesar las opciones de login y logout

if(isset($_GET["opt"]) && $_GET["opt"]=="login"){

if(!isset($_SESSION["client_id"])) {
$user = $_POST['username'];
$pass = sha1(md5($_POST['password']));
$base = new Database();
$con = $base->connect();
$sql = "select * from person where email= \"".$user."\" and password= \"".$pass."\" ";
//print $sql;
$query = $con->query($sql);
$found = false;
$userid = null;
while($r = $query->fetch_array()){
	$found = true ;
	$userid = $r['id'];
}

if($found==true) {
	$_SESSION['client_id']=$userid ;
	print "Cargando ... $user";
	Core::redir("./?view=home");
}else {
	Core::redir("./?view=login");
}
}else{
	Core::redir("./?view=home");	
}

}
if(isset($_GET["opt"]) && $_GET["opt"]=="logout"){
	unset($_SESSION);
	session_destroy();
	Core::redir("./?view=home");
}

?>