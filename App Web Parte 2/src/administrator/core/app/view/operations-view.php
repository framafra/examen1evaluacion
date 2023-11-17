<?php 

if(!isset($_SESSION["user_id"])){ Core::redir("./");}
$user= UserData::getById($_SESSION["user_id"]);
// si el id  del Cliente no existe.
if($user==null){ Core::redir("./");}

if(isset($_GET["opt"]) && $_GET["opt"]=="all"):?>
  <main>
                    <div class="container-fluid px-4">
<div class="row">
	<div class="">
		<h1>Lista de Operaciones</h1>
	<a href="index.php?view=operations&opt=new" class="btn btn-secondary"><i class='glyphicon glyphicon-user'></i> Nuevo</a>
<br><br>
		<?php
		$users = OperationData::getAll();
		if(count($users)>0){
			?>
			<div class="box box-primary">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>Nombre completo</th>
      <th>Descripcion</th>
			<th>Amount</th>
      <th>Tipo</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
        $per = PersonData::getById($user->person_id);
				?>
				<tr>
				<td><?php echo $per->name." ".$per->lastname; ?></td>
        <td><?php echo $user->description; ?></td>
				<td><?php echo $user->amount; ?></td>
        <td><?php if($user->kind==1){ echo "Deposito";} else if($user->kind==2){ echo "Gasto"; } ?></td>
				<td style="width:150px;">
				<a href="index.php?action=operations&opt=del&id=<?php echo $user->id;?>" class="btn btn-danger btn-sm">Eliminar</a>
				</td>
				</tr>
				<?php

			}
 echo "</table></div>";

		}else{
			?>
			<p class="alert alert-warning">No hay Operaciones.</p>
			<?php
		}

		?>

	</div>
</div>
</div>
</main>
<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="newdeposit"):?>
<section class="container-fluid px-4">
<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Deposito</h1>
	<br>
<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=operations&opt=add" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cliente*</label>
    <div class="col-md-6">
      <select name="person_id" class="form-control" required>
        <option value="">-- SELECCIONE --</option>
        <?php foreach(PersonData::getAll() as $per):?>
        <option value="<?php echo $per->id?>"><?php echo $per->name." ".$per->lastname; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion*</label>
    <div class="col-md-6">
      <input type="text" name="description" class="form-control" id="description" placeholder="Descripcion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Monto*</label>
    <div class="col-md-6">
      <input type="text" name="amount" required class="form-control" id="amount" placeholder="Monto">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Deposito</button>
    </div>
  </div>
</form>
	</div>
</div>
</section>

<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="edit"):?>
<div class="container-fluid px-4">
<?php $user = PersonData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Cliente</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=operations&opt=upd" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono*</label>
    <div class="col-md-6">
      <input type="text" name="phone" class="form-control" value="<?php echo $user->phone;?>" required id="phone" placeholder="Telefono">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
    <div class="col-md-6">
      <input type="text" name="address" class="form-control" value="<?php echo $user->address;?>" required id="address" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
    <div class="col-md-6">
      <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
<p class="help-block">La contrase&ntilde;a solo se modificara si escribes algo, en caso contrario no se modifica.</p>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
    </div>
  </div>
</form>
	</div>
</div>
</div>
<?php endif; ?>