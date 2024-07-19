$(document).ready(function() {
    $('#agregarPersonal').on('submit', function(e) {
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
    if (urlParams.has('success')) {
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Trabajador grabado con éxito',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=trabajadores'; // Redirigir para limpiar la URL
        });
    } else if (urlParams.has('error')) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error al grabar el Trabajador',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=trabajadores'; // Redirigir para limpiar la URL
        });
    } else if (urlParams.has('yacorreo')) {
        Swal.fire({
            icon: 'warning',
            title: 'Error',
            text: 'Correo Ya Existente',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=trabajadores'; // Redirigir para limpiar la URL
        });
    } else if (urlParams.has('yatelefono')) {
        Swal.fire({
            icon: 'warning',
            title: 'Error',
            text: 'Telefono Ya Existente',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=trabajadores'; // Redirigir para limpiar la URL
        });
    } else if (urlParams.has('yausuario')) {
        Swal.fire({
            icon: 'warning',
            title: 'Error',
            text: 'Usuario Ya Existente',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=trabajadores'; // Redirigir para limpiar la URL
        });
    } else if (urlParams.has('cominfo')) {
        Swal.fire({
            icon: 'warning',
            title: 'Error',
            text: 'Información Ya Existente',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=trabajadores'; // Redirigir para limpiar la URL
        });
    } 
    //alertas actualizar//
    else if (urlParams.has('Upsuccess')) {
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Trabajador Actualizado con éxito',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=trabajadores'; // Redirigir para limpiar la URL
        });
    } else if (urlParams.has('Uperror')) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error al Actualizar el Trabajador',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=trabajadores'; // Redirigir para limpiar la URL
        });
    }
});
