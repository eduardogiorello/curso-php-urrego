<?php

/*compruevo si esta logeado*/

if (!isset($_SESSION['login'])) {

	echo '<script> window.location = "index.php?pagina=ingreso ";</script>';
	return;
} else {

	if ($_SESSION['login'] != 'ok') {
		echo '<script> window.location = "index.php?pagina=ingreso ";</script>';
		return;
	}
}

/* Llamado al controlador */
$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null, null);



?>


<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Fecha</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($usuarios as $key => $value) : ?>
			<tr>
				<td><?= ($key + 1); ?></td>
				<td><?= $value['nombre']; ?></td>
				<td><?= $value['email']; ?></td>
				<td><?= $value['fecha']; ?></td>
				<td>

					<div class="btn-group">
						<a href="index.php?pagina=editar&id=<?= $value['id']; ?>" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
						&nbsp;
						<button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
					</div>

				</td>
			</tr>
		<?php endforeach ?>



	</tbody>
</table>