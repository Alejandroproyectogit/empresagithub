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
        <form id="actualizarProducto<?php echo $productos["prod_id"]; ?>" action="index.php?accion=actualizarProductos" method="post">
            <div>
                <label for="acprodid<?php echo $productos["prod_id"]; ?>">ID:</label>
                <input type="number" class="form-control" name="prod_id" value="<?php echo $productos["prod_id"]; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="Upnombreprod<?php echo $productos["prod_id"]; ?>">Nombre:</label>
                <input type="text" class="form-control" id="Upnombreprod<?php echo $productos["prod_id"]; ?>" name="Upnombreprod" value="<?php echo $productos["prod_nombre"]; ?>" required>
            </div>
            <div class="mb-3">
                <label for="Upunidad<?php echo $productos["prod_id"]; ?>">Unidad de Medida:</label>
                <select class="form-select form-select-lg mb-3" aria-label="Large select example" id="Upunidad<?php echo $productos["prod_id"]; ?>" name="Upunidad">
                    <option value="kilogramos" <?php echo $productos['prod_unidad_medida'] == 'Kilogramos' ? 'selected' : ''; ?>>Kilogramos</option>
                    <option value="Gramos" <?php echo $productos['prod_unidad_medida'] == 'Gramos' ? 'selected' : ''; ?>>Gramos</option>
                    <option value="Unidades" <?php echo $productos['prod_unidad_medida'] == 'Unidades' ? 'selected' : ''; ?>>Unidades</option>
                </select>
            </div>
            <input type="submit" value="Guardar cambios" class="btn btn-primary">
        </form>
    </div>
</body>
</html>

