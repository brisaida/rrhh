$(document).ready(function(){
    // Evento de clic en el botón de agregar
    $("#agregrar").on('click', function(e){

        var inputFactura = document.getElementById('imagen');
        var imagen = document.createElement("img");
        imagen.src = URL.createObjectURL(inputFactura.files[0]);
        imagen.alt = "Factura";
        imagen.contenido = inputFactura.files[0];

        e.preventDefault();

        // Crea un nuevo elemento de entrada de archivo con un evento onchange asociado
        var fileInput = $('<input type="file" class="form-control" />').on('change', function(){
            previewFile(this); // Llama a la función de vista previa cuando se selecciona un archivo
        });

        // Crea una nueva fila con una celda para la imagen y una para el input
        var newRow = $('<tr>').append(
            $('<td class="cell">').append(`<img style="width: 100px; height: 100px;" src='${imagen.src} '/>`),
            $('<td class="cell">').append(fileInput)
        );

        // Añade la nueva fila al cuerpo de la tabla
        $("#agregarRegistro").append(newRow);
    });
});

function previewFile(input) {
    var file = input.files[0]; // Obtiene el archivo del input

    if (file) {
        var reader = new FileReader();

        reader.onload = function(e) {
            // Encuentra el elemento img en la misma fila que el input y establece su src
            $(input).closest('tr').find('img').attr('src', e.target.result);
        };

        reader.readAsDataURL(file); // Lee el archivo como DataURL
    }
}
