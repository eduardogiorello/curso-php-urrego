<?php
if (isset($_GET['id'])) {
    $item = 'id';
    $valor = $_GET['id'];

    $usuario = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
}



?>

<div class="d-flex justify-content-center text-center">

    <form class="p-5 bg-light" method="post">

        <div class="form-group">
            <label for="nombre">Nombre:</label>

            <div class="input-group">

                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                </div>

                <input type="text" class="form-control" id="nombre" value="<?= $usuario['nombre']; ?>" name="actualizarNombre">

            </div>

        </div>

        <div class="form-group">

            <label for="email">Correo electrónico:</label>

            <div class="input-group">

                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>

                <input type="email" class="form-control" id="email" value="<?= $usuario['email']; ?>" name="actualizarEmail">

            </div>

        </div>

        <div class="form-group">
            <label for="pwd">Contraseña:</label>

            <div class="input-group">

                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>

                <input type="password" class="form-control" id="pwd" name="actualizarPassword">
                <input type="hidden" name="passwordActual" value="<?= $usuario['password']; ?>">
                <input type="hidden" name="idUsuario" value="<?= $usuario['id']; ?>">
            </div>

        </div>

        <?php


        $actualizar = new ControladorFormularios();
        $actualizar->ctrActualizarRegistro();

        ?>

        <button type="submit" class="btn btn-primary">Actualizar</button>

    </form>

</div>