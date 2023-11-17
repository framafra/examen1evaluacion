<?php 
// si el usuario no esta logeado
if(!isset($_SESSION["client_id"])){ Core::redir("./");}
$user= PersonData::getById($_SESSION["client_id"]);
// si el id  del usuario no existe.
if($user==null){ Core::redir("./");}
?>

<?php if(isset($_GET["opt"]) && $_GET['opt']=="step1"):?>
<div class="container">
<div class="row">
<div class="col-md-6">

<h1>Enviar Puntos</h1>
<p>Escribe el email de la persona a la que enviaras puntos.</p>


<form method="post" action="./?view=ope&opt=step2">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" required name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>


  <button type="submit" class="btn btn-primary">Siguiente</button>
</form>

</div>
</div>
</div>
<?php elseif(isset($_GET["opt"]) && $_GET['opt']=="step2"):
$other= PersonData::getBy("email", $_POST["email"]);
if($other==null){ Core::alert("Usuario no encontrado"); Core::redir("./?view=ope&opt=step1");}
if($other->id==$_SESSION['client_id']){ Core::alert("No te puedes enviar a ti mismo!"); Core::redir("./?view=ope&opt=step1");}

?>
<div class="container">
<div class="row">
<div class="col-md-6">

<h1>Enviar Puntos a <?php echo $other->name." ".$other->lastname; ?></h1>
<p>Escribe el email de la persona a la que enviaras puntos.</p>


<form method="post" action="./?action=ope">
	<input type="hidden" name="other_id" value="<?php echo $other->id; ?>">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Descripcion</label>
    <input type="text" class="form-control"  name="description" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Monto a enviar</label>
    <input type="text" class="form-control" required name="amount" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>


  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

</div>
</div>
</div>
<?php elseif(isset($_GET["opt"]) && $_GET['opt']=="step3"):
?>
<div class="container">
<div class="row">
<div class="col-md-6">

<h1>ENVIADO</h1>
<p>Escribe el email de la persona a la que enviaras puntos.</p>

<a href="./" class="btn btn-success">IR AL INICIO</a>

</div>
</div>
</div>
<?php endif; ?>