<?php 
// si el usuario no esta logeado
if(!isset($_SESSION["client_id"])){ Core::redir("./");}
$user= PersonData::getById($_SESSION["client_id"]);
// si el id  del usuario no existe.
if($user==null){ Core::redir("./");}
?>
<div class="container">
<div class="row">
<div class="col-md-12">
<h2>Hola, <?php echo $user->name; ?></h2>
<p>Bienvenido a Bankoint.</p>

<?php
$income = OperationData::getSumPK($user->id, 1)->sx;
$spend = OperationData::getSumPK($user->id, 2)->sx;
?>
<a href="./?view=ope&opt=step1" class="btn btn-success">Enviar</a>
<br><br>
<div class="row">
	<div class="col-md-3">
		<div class="card">
			<div class="card-body">
			<h4>SALDO</h4>
			<h1>
				<?php echo ($income-$spend); ?>
			</h1>
		</div>
		</div>
	</div>
</div>
<br>
<?php
$operations = OperationData::getAllBy("person_id", $user->id);
?>
<?php if(count($operations)>0):?>
<table class="table table-bordered">

	<thead>
		<th>#</th>	
		<th>Monto</th>	
		<th>Descripcion</th>	
		<th>Fecha</th>	
	</thead>
	<?php foreach($operations as $op):?>
	<tr>
		<td><?php echo $op->id; ?></td>
		<td><?php echo $op->amount; ?></td>
		<td><?php echo $op->description; ?></td>
		<td><?php echo $op->created_at; ?></td>
	</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>




</div>
</div>
</div>