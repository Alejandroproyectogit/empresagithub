$(document).ready(function() {
    $('#Tabla_Clientes').DataTable({
        "pagingType": "full_numbers",
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "Todos"]
        ]
    });
});

var modalEditarCliente = document.getElementById('modalEditarCliente');
modalEditarCliente.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget; // Botón que disparó el modal
    var id = button.getAttribute('data-id');
    var nombre = button.getAttribute('data-nombre');
    var telefono = button.getAttribute('data-telefono');
    var direccion = button.getAttribute('data-direccion');

    // Actualiza los campos del formulario en el modal
    var modalBodyInputId = modalEditarCliente.querySelector('#id');
    var modalBodyInputNombre = modalEditarCliente.querySelector('#nuevoNombre');
    var modalBodyInputTelefono = modalEditarCliente.querySelector('#nuevoTelefono');
    var modalBodyInputDireccion = modalEditarCliente.querySelector('#nuevoDireccion');

    modalBodyInputId.value = id;
    modalBodyInputNombre.value = nombre;
    modalBodyInputTelefono.value = telefono;
    modalBodyInputDireccion.value = direccion;
});

document.getElementById('guardarCambios').addEventListener('click', function(event) {
    var id = document.getElementById('id').value;
    var nombre = document.getElementById('nuevoNombre').value;
    var telefono = document.getElementById('nuevoTelefono').value;
    var direccion = document.getElementById('nuevoDireccion').value;

    if (!id || !nombre || !telefono || !direccion) {
        alert('Todos Los Campos Tienen Que Estar Llenos');
        event.preventDefault(); // Previene el envío del formulario
    }
});

// Inicializa el mapa con Leaflet
var mapa = L.map('mapa').setView([4.438889, -75.232222], 13); // Centra el mapa en Ibagué, Colombia, y establece el nivel de zoom

// Añade una capa base de OpenStreetMap al mapa
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mapa);

setTimeout(function() {
    mapa.invalidateSize();
}, 100);

var marcadorActual; // Variable para mantener el marcador actual

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.btn-buscar').forEach(boton => {
        boton.addEventListener('click', function(event) {
            var direccion = this.getAttribute('data-direccion');

            // Definir los límites de la vista para Ibagué
            var viewbox = '-75.302222,4.401111,-75.162222,4.476667'; // (longitud oeste, latitud sur, longitud este, latitud norte)
            var bounded = 1; // Para asegurar que la búsqueda esté restringida dentro del viewbox

            // Realiza la búsqueda de geocodificación utilizando la dirección obtenida
            // Hacer una solicitud HTTP GET a la API de Nominatim
            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(direccion)}&viewbox=${viewbox}&bounded=${bounded}`)
                .then(response => response.json())
                .then(data => {
                    // Verifica si se encontraron resultados
                    if (data.length > 0) {
                        // Obtiene las coordenadas de la primera ubicación encontrada
                        var latitud = parseFloat(data[0].lat);
                        var longitud = parseFloat(data[0].lon);

                        // Elimina el marcador anterior si existe
                        if (marcadorActual) {
                            mapa.removeLayer(marcadorActual);
                        }

                        // Actualiza el mapa con la ubicación encontrada
                        mapa.setView([latitud, longitud], 13); // Centra el mapa en la ubicación encontrada

                        // Agrega un nuevo marcador en la ubicación encontrada y guarda la referencia
                        marcadorActual = L.marker([latitud, longitud]).addTo(mapa);
                    } else {
                        alert('No se encontraron resultados para la búsqueda.');
                    }
                })
                .catch(error => {
                    console.error('Error al realizar la búsqueda:', error);
                    alert('Se produjo un error al realizar la búsqueda.');
                });
        });
    });
});

$(document).ready(function() {
    $('#agregarCliente').on('submit', function(e) {
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
            text: '¡Vas a agregar un nuevo cliente al sistema!',
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
    if (urlParams.has('clisuccess')) {
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Cliente grabado con éxito',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=clientes'; // Redirigir para limpiar la URL
        });
    } else if (urlParams.has('clierror')) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error al grabar el Cliente',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=clientes'; // Redirigir para limpiar la URL
        });
    } 
    //alertas actualizar//
    else if (urlParams.has('Upclisuccess')) {
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Cliente Actualizado con éxito',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=clientes'; // Redirigir para limpiar la URL
        });
    } else if (urlParams.has('Upclierror')) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error al Actualizar el Cliente',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=clientes'; // Redirigir para limpiar la URL
        });
    }
});
