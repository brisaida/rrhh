$(document).ready(function () {
  listarRegistros()
});
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
        Swal.fire({
          title: "Tipo de Acción de Personal",
          icon: "error",
          text: `${error.responseText}`,
          confirmButtonColor: "#3085d6",
        });
      },
      // Petición exitosa
      success: function (respuesta) {
        let datos = (respuesta);
        console.log(datos); 
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Guardado correctamente',
          showConfirmButton: false,
          timer: 1500
        })
      },
    });
  }

  function listarRegistros() {
    $.ajax({
      type: "GET",
      url: "./sections/mantenimientos/controller/listarTipoAccion.php",
      dataType: "json",
      error: function (error) {
        console.log(error);
        Swal.fire({
          title: "Listado de Tipo de Acciones de Personal",
          icon: "warning",
          text: `${error}`,
          confirmButtonColor: "#3085d6",
        });
      },
      success: function (respuesta) {
        /* var columns = [
          {
            className: "text-center",
            render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            },
            orderable: false,
            width: 30,
          },
          {
            mDataProp: "codigoVivero",
          },
          {
            mDataProp: "nombre",
          },
          {
            mDataProp: "capacidadTotal",
          },
          {
            mDataProp: "municipio",
          },
  
          {
            className: "text-left",
            width: 50,
            render: function (data, types, full, meta) {
              let btnActualizar = `<button data-id = ${full.id}  name="vivero-editar" class="btn btn-outline-primary" type="button" data-toggle="tooltip" data-placement="top" title="Editar vivero">
                                        <i class="fas fa-pencil-alt"></i>
                                      </button>`;
  
              let btnEliminar = `<button data-id = ${full.id}  name="vivero-eliminar" class="btn btn-outline-danger" type="button" data-toggle="tooltip" data-placement="top" title="Eliminar vivero">
                                        <i class="fas fa-trash"></i>
                                      </button>`;
  
              return `${btnActualizar} ${btnEliminar}`;
            },
          },
        ]; */
  
        // Llamado a la función para crear la tabla con los datos
        //cargarTabla("#tabla_registros", respuesta, columns);

        console.log(respuesta);
      },
    });
  }