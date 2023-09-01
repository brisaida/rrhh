
$("#addResponsabilidad").on("click",function(){
   agregarLinea("responsabilidad");
});



$("#addCondiciones").on("click",function(){
   agregarLinea("condiciones");
});

$("#addBeneficios").on("click",function(){
   agregarLinea("remuneracion");
});

$("#addHabilidades").on("click",function(){
    let habilidades = $.trim($("#habilidadesInput").val());
    let ponderacion = $.trim($("#ponderacionNumber").val());

    if (habilidades.length > 0 &&
        ponderacion.length > 0
    ) {
        var htmlTags = '<tr>' +
            '<td>' + habilidades + '</td>' +
            '<td class="text-center">' + ponderacion + '</td>' +
            '</tr>';

        $("#habilidadesInput").val("");
        $("#ponderacionNumber").val("");

        $("#habilidadesTabla tbody").append(htmlTags);
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡Parece que nos falta información!'
        })
    }
});

$("#addExperiencia").on("click",function(){
    let formacion = $.trim($("#formacionInput").val());
    let ponderacion = $.trim($("#ponderacion1Number").val());

    console.log(formacion);
    console.log(ponderacion);


    if (formacion.length > 0 &&
        ponderacion.length > 0
    ) {
        var htmlTags = '<tr>' +
            '<td>' + formacion + '</td>' +
            '<td class="text-center">' + ponderacion + '</td>' +
            '</tr>';

        $("#formacionInput").val("");
        $("#ponderacion1Number").val("");

        $("#formacionTabla tbody").append(htmlTags);
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡Parece que nos falta información!'
        })
    }
});

/* Agregar información en la tabla de parientes */
function agregarLinea (elemento) {
    let fila = $.trim($("#"+elemento+"Input").val());
    
    console.log("#"+elemento+"Input");

    if (fila.length > 0 
    ) {
        var htmlTags = '<tr>' +
            '<td>' + fila + '</td>' +
            '</tr>';

        $("#"+elemento+"Input").val("");

        $("#"+elemento+"Tabla tbody").append(htmlTags);
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡Parece que nos falta información!'
        })
    }

}