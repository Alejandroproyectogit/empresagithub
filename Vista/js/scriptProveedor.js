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