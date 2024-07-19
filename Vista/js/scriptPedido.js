$(document).ready(function() {
    // Inicializa DataTables y almacena la referencia en tablaPedidos
    var tablaPedidos = $('#Tabla_Pedidos').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "Todos"]
        ]
    });

    
    var fechaActual = '';

    // Función para recargar la tabla con los filtros aplicados
    function recargarTabla() {
        tablaPedidos.column(6).search(estadoActual).draw();
        tablaPedidos.column(4).search(fechaActual).draw();
    }

    // Event listener para el botón de "Por Entregar"
    $('#botonPorEntregar').on('click', function() {
        estadoActual = 'Por Entregar';
        recargarTabla();
    });

    // Event listener para el botón de "Canceladas"
    $('#botonCanceladas').on('click', function() {
        estadoActual = 'Cancelado';
        recargarTabla();
    });

    // Event listener para el botón de "Entregado"
    $('#botonEntregado').on('click', function() {
        estadoActual = 'Entregado';
        recargarTabla();
    });

    // Event listener para la búsqueda por fecha
    $('#buscarFecha').on('change', function() {
        fechaActual = $(this).val();
        recargarTabla();
    });

    // Inicializar la tabla con filtro por estado "Por Entregar"
    recargarTabla();
});

document.getElementById('PedPaquetes').addEventListener('input', function() {
    var cantidad = parseInt(this.value);
    var precio = cantidad * 32000;
    document.getElementById('PedValor').value = isNaN(precio) ? '' : precio;
});

var modalEditarPedido = document.getElementById('modalEditarPedido');
modalEditarPedido.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget;
    var id = button.getAttribute('data-id');
    var paquetes = button.getAttribute('data-paquetes');
    var valor = button.getAttribute('data-valor');
    var estado = button.getAttribute('data-estado');

    var modalBodyInputId = modalEditarPedido.querySelector('#idPedido');
    var modalBodyInputPaquetes = modalEditarPedido.querySelector('#PedPaquetes');
    var modalBodyInputValor = modalEditarPedido.querySelector('#PedValor');
    var modalBodyInputEstado = modalEditarPedido.querySelector('#PedEstado');

    modalBodyInputPaquetes.addEventListener('input', function() {
        var cantidad = parseInt(this.value);
        var precio = cantidad * 32000;
        modalBodyInputValor.value = isNaN(precio) ? '' : precio;
    });

    modalBodyInputId.value = id;
    modalBodyInputPaquetes.value = paquetes;
    modalBodyInputValor.value = valor;
    modalBodyInputEstado.value = estado;
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

var waypoints = []; // Array para almacenar los puntos de ruta
var routingControl; // Variable para mantener el control de ruteo

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.btn-buscar').forEach(boton => {
        boton.addEventListener('click', function(event) {
            var direccion = this.getAttribute('data-direccion');

            // Definir los límites de la vista para Ibagué
            var viewbox = '-75.302222,4.401111,-75.162222,4.476667'; // (longitud oeste, latitud sur, longitud este, latitud norte)
            var bounded = 1; // Para asegurar que la búsqueda esté restringida dentro del viewbox

            // Realiza la búsqueda de geocodificación utilizando la dirección obtenida
            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(direccion)}&viewbox=${viewbox}&bounded=${bounded}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        var latitud = parseFloat(data[0].lat);
                        var longitud = parseFloat(data[0].lon);

                        // Añade el punto de ruta al array de waypoints
                        waypoints.push(L.latLng(latitud, longitud));

                        // Agrega un nuevo marcador en la ubicación encontrada
                        L.marker([latitud, longitud]).addTo(mapa);

                        // Actualiza el mapa con la ubicación encontrada
                        mapa.setView([latitud, longitud], 13); // Centra el mapa en la ubicación encontrada

                        // Si hay más de un punto de ruta, dibuja la ruta más corta
                        if (waypoints.length > 1) {
                            if (routingControl) {
                                mapa.removeControl(routingControl);
                            }

                            routingControl = L.Routing.control({
                                waypoints: waypoints,
                                router: L.Routing.osrmv1({
                                    serviceUrl: 'https://router.project-osrm.org/route/v1'
                                }),
                                createMarker: function(i, wp) {
                                    return L.marker(wp.latLng, {
                                        draggable: false
                                    });
                                },
                                routeWhileDragging: false,
                                show: true,
                                fitSelectedRoutes: true,
                                addWaypoints: false
                            }).addTo(mapa);

                            routingControl.on('routesfound', function(e) {
                                var routes = e.routes;
                                var summary = routes[0].summary;
                                console.log('Total distance is ' + summary.totalDistance / 1000 + ' km');
                                console.log('Total time is ' + summary.totalTime / 60 + ' minutes');
                            });

                            routingControl.on('routingerror', function(e) {
                                alert('Error al calcular la ruta optimizada');
                                console.error('Error al realizar la optimización de la ruta:', e);
                            });
                        }
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
    $('#agregarPedido').on('submit', function(e) {
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
    if (urlParams.has('success')) {
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Pedido guardado con éxito',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=pedidos'; // Redirigir para limpiar la URL
        });
    } else if (urlParams.has('error')) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error al guardar el Pedido',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=pedidos'; // Redirigir para limpiar la URL
        });
    } 
    //alertas actualizar//
    else if (urlParams.has('Uppedsuccess')) {
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Pedido Actualizado',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=pedidos'; // Redirigir para limpiar la URL
        });
    } else if (urlParams.has('Uppederror')) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error al Actualizar el Pedido',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'index.php?accion=pedidos'; // Redirigir para limpiar la URL
        });
    }
});