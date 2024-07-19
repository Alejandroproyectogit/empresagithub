<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="Vista/js/trabajadores.js"></script>
</head>
<body>
    <div class="modal-body">
        <form id="actualizarUsuario<?php echo $usuario["usu_id"]; ?>" action="index.php?accion=actualizarUsuario" method="post">
            <input type="hidden" name="usu_id" value="<?php echo $usuario["usu_id"]; ?>">
            <div class="mb-3">
                <label for="Upnombre<?php echo $usuario["usu_id"]; ?>">Nombre:</label>
                <input type="text" class="form-control" id="Upnombre<?php echo $usuario["usu_id"]; ?>" name="Upnombre" value="<?php echo $usuario["usu_nombres"]; ?>" required>
            </div>
            <div class="mb-3">
                <label for="Upcorreo<?php echo $usuario["usu_id"]; ?>">Correo:</label>
                <input type="email" class="form-control" id="Upcorreo<?php echo $usuario["usu_id"]; ?>" name="Upcorreo" value="<?php echo $usuario["usu_correo"]; ?>" required>
            </div>
            <div class="mb-3">
                <label for="Uptelefono<?php echo $usuario["usu_id"]; ?>">Teléfono:</label>
                <input type="number" class="form-control" id="Uptelefono<?php echo $usuario["usu_id"]; ?>" name="Uptelefono" value="<?php echo $usuario["usu_telefono"]; ?>" required>
            </div>
            <div class="mb-3">
                <label for="Upusuario<?php echo $usuario["usu_id"]; ?>">Usuario:</label>
                <input type="text" class="form-control" id="Upusuario<?php echo $usuario["usu_id"]; ?>" name="Upusuario" value="<?php echo $usuario["usu_usuario"]; ?>" required>
            </div>
            <div class="mb-3">
                <label for="Upcargo<?php echo $usuario["usu_id"]; ?>">Cargo:</label>
                <select class="form-select form-select-lg mb-3" aria-label="Large select example" id="Upcargo<?php echo $usuario["usu_id"]; ?>" name="Upcargo">
                    <option value="1" <?php echo $usuario['usu_id_cargo'] == 1 ? 'selected' : ''; ?>>Administrador</option>
                    <option value="2" <?php echo $usuario['usu_id_cargo'] == 2 ? 'selected' : ''; ?>>Empleado</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="Upestado<?php echo $usuario["usu_id"]; ?>">Estado:</label>
                <select class="form-select form-select-lg mb-3" aria-label="Large select example" id="Upestado<?php echo $usuario["usu_id"]; ?>" name="Upestado">
                    <option value="1" <?php echo $usuario['usu_estado'] == 1 ? 'selected' : ''; ?>>Activo</option>
                    <option value="2" <?php echo $usuario['usu_estado'] == 2 ? 'selected' : ''; ?>>Retirado</option>
                    <option value="3" <?php echo $usuario['usu_estado'] == 3 ? 'selected' : ''; ?>>Suspendido</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>

    

</body>
</html>
