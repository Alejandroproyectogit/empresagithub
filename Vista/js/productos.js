$(document).ready(function() {
    $('#agregarProductos').on('submit', function(e) {
        e.preventDefault(); // Evitar el envío inmediato del formulario

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: '¿Estás seguro?',
            text: '¡Vas a agregar un nuevo usuario al sistema!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, confirmar!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar el formulario después de la confirmación
                e.target.submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'La operación ha sido cancelada.',
                    'error'
                );
            }
        });
    });

    // Comprobar si hay un éxito o un error en la URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('prodsuccess')) {
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Producto Guardado con éxito',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=productos'; // Redirigir para limpiar la URL
        });
    } else if (urlParams.has('proderror')) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se Pudo Guardar el Producto',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=productos'; // Redirigir para limpiar la URL
        });
    }
    //alertas actualizar//
    else if (urlParams.has('Upprodsuccess')) {
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Producto Actualizado',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=productos'; // Redirigir para limpiar la URL
        });
    } else if (urlParams.has('Upproderror')) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se Pudo Actualizar el Producto',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=productos'; // Redirigir para limpiar la URL
        });
    }
});
