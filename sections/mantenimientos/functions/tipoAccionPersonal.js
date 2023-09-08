
$("#guardarBtn").on("click",function(){
  let accion = $.trim( $("#accionInput").val()); 
  let desc = $.trim($("#descripcionInput").val()); 


  if( accion.length==0 || 
      desc.length==0){

        Swal.fire({
          title: "Ups, parece que falta información.",
          icon: "error",
          confirmButtonColor: "#3085d6",
        });

  }else{
    guardarTipoAccionPersonal(desc,accion);
  }
}); 

function guardarTipoAccionPersonal(descripcion, tipoAccion) {
    const losDatos = {
      nombre: tipoAccion,
      descripcion: descripcion,
    };
  
    // Petición para cargar los datos del parentesco
    $.ajax({
      type: "POST",
      url: "./sections/mantenimientos/controller/agregarAccionPersonal.php",
      data: {
        losDatos: losDatos,
      },
      // Error en la petición
      error: function (error) {
        console.log(error);
        Swal.fire({
          title: "Tipo de Acción de Personal",
          icon: "error",
          text: `${error.responseText}`,
          confirmButtonColor: "#3085d6",
        });
      },
      // Petición exitosa
      success: function (respuesta) {
        let datos = JSON.parse(respuesta);
        console.log(datos);        // Convertimos la respuesta en JSON y tomamos la primera posición
      },
    });
  }