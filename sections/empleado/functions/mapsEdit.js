
$(document).ready(function () {
    editar = false;
    const location = window.location.search;
    const elementos = location.split("&");
    if (elementos.length > 1) {
        editar = true;
    }
});


var myMap = L.map('map').setView([15.496363256587342, -88.00374984741212], 13);
var marker = null; // Variable para rastrear el marcador

googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});

var customIcon = L.icon({
    iconUrl: './assets/images/direccion-de-casa.png', // URL de la imagen del icono personalizado
    iconSize: [50, 50], // Tamaño del icono
    iconAnchor: [16, 32], // Punto de anclaje del icono (la parte inferior del icono en este caso)
    popupAnchor: [0, -32] // Punto de anclaje del popup (encima del icono en este caso)
});

googleStreets.addTo(myMap);

// Agregar un evento de clic al mapa
myMap.on('click', function (event) {

    if (editar == false) {
        var latlng = event.latlng; // Obtiene las coordenadas donde se hizo clic
        if (marker) {
            myMap.removeLayer(marker); // Elimina el marcador existente si hay uno
        }
        // Crea un nuevo marcador en la ubicación del clic
        marker = L.marker(latlng, { icon: customIcon }).addTo(myMap);
        $("#latInput").val(event.latlng.lat);
        $("#longInput").val(event.latlng.lng);

        showAddress(event.latlng.lat, event.latlng.lng);
    }




});

function showAddress(lat, lng) {
    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
        .then(response => response.json())
        .then(data => {
            var addressTextarea = document.getElementById('direccionInput');
            addressTextarea.value = data.display_name; // Mostrar la dirección en el cuadro de texto
        });
}
