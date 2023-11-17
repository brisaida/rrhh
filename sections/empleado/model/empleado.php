<?php

class mdlEmpleado
{

    // Variables globales
    public $conn;
    public $usuario = 1;
    // Constructores
    public function __construct()
    {
        $this->conn = new Connection();
        $this->conn = $this->conn->dbConnect();

        if (!isset($_SESSION)) {
            session_start();
        }
    }



    // *Listar
    public function listarTodo()
    {

        $sql = "    SELECT	ROW_NUMBER() OVER (ORDER BY e.idEmpleado DESC) AS correlativo,
                            e.idEmpleado,codigoEmpleado, 
                            pro.nombre AS proyecto,
                            CONCAT(primerNombre,' ',segundoNombre,' ',primerApellido,' ',segundoApellido)as nombreCompleto,
                            nombrePuesto,
                            telefonoAsignado
                    FROM rrhh.empleados e
                    INNER JOIN rrhh.historial h ON h.idEmpleado=e.idEmpleado
                    INNER JOIN rrhh.historialDetalle hd ON hd.idHistorial=h.idHistorial
                    INNER JOIN rrhh.puestos p on p.idPuesto=hd.idTDR
                    INNER JOIN bosque.proyecto pro on p.idProyecto=pro.id
                    WHERE e.estado=1
                    ORDER BY e.idEmpleado DESC";

        $stmt = $this->conn->prepare($sql);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();


        return $resultado;
    }

    public function listarTodoReporte()
    {

        $sql = "SELECT DNI,CONCAT(primerNombre,' ',segundoNombre,' ',primerApellido,' ',segundoApellido) as nombreCompleto
                FROM rrhh.empleados
                WHERE estado=1
                ORDER BY nombreCompleto
                ";

        $stmt = $this->conn->prepare($sql);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();


        return $resultado;
    }

    public function pendientes()
    {

        $sql = "SELECT dni,et.nombre,p.nombre as proyecto,et.viverista
                FROM rrhh.empleadosTemp et
                INNER JOIN bosque.proyecto p on p.id=et.proyecto
                WHERE dni NOT IN (SELECT dni FROM rrhh.empleados)
                ORDER BY p.nombre;
        
                
                ";

        $stmt = $this->conn->prepare($sql);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();


        return $resultado;
    }

    // *Buscar datos generalesde un empleado
    public function buscarDatosGenerales($id)
    {

        $sql = "SELECT	e.idEmpleado,
                        DNI, 
                        primerNombre,
                        segundoNombre,
                        primerApellido,
                        segundoApellido,
                        CONCAT( primerNombre,' ',
                        segundoNombre,' ',
                        primerApellido,' ',
                        segundoApellido) as nombreCompleto,
                        telefono,
                        fechaNacimiento,
                        lugarNacimiento,
                        nacionalidad,
                        estadoCivil,
                        ec.descripcion as descEstadoCivil,
                        genero,
                        email,
                        cuentaBancaria,
                        vencimientoLicencia,
                        vencimientoLicenciaMoto,
                        vencimientoPasaporte,
                        d.direccion,
                        d.zona,
                        d.latitud,
                        d.longitud,
                        a.foto,
                        a.dniFront,
                        a.dniBack,
                        a.cv,
                        a.pasaporte,
                        a.licenciaCarroFront,
                        a.licenciaCarroBack,
                        a.licenciaMotoFront,
                        a.licenciaMotoBack,
						a.penales,
						a.policiales,
                        e.fechaCreado
                FROM rrhh.empleados e
                INNER JOIN rrhh.direcciones d ON e.idEmpleado=d.idEmpleado
                LEFT JOIN rrhh.adjuntos a ON e.idEmpleado=a.idEmpleado
                INNER JOIN rrhh.estadoCivil ec ON ec.idEstadoCivil=e.estadoCivil 
                WHERE e.idEmpleado=:id AND e.estado=1 AND d.estado=1
                ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
    // *Buscar datos generales de un empleado
    public function buscarInfoEmpleado($id)
    {

        $sql = "SELECT	idEmpleado,
                        DNI, 
                        CONCAT(primerNombre,' ',segundoNombre,' ',primerApellido,' ',segundoApellido) nombreCompleto                    
                FROM rrhh.empleados 
                WHERE idEmpleado=:id
                ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
    public function buscarHistorial($id)
    {

        $sql = "SELECT  idHistorial,
                        codigoEmpleado,
                        codigoSAP,
                        ingreso,
                        vacaciones,
                        telefonoAsignado,
                        idUsuario,
                        empleados.estado,
						Retiro,
                        emailAsignado,
                        superUsuario
                FROM rrhh.historial

                INNER JOIN rrhh.empleados ON empleados.idEmpleado=historial.idEmpleado
                WHERE historial.idEmpleado=:id
                ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
    public function buscarHistorialDetalle($id)
    {

        $sql = "SELECT	idHistorialDetalle,
                        idHistorial,
                        fechaInicio,
                        fechaRetiro,
                        hd.idProyecto,
                        p.nombre,
                        hd.idDepartamento,
                        d.Descripcion zona,
                        sitio,
                        idTDR,
                        tdr.nombrePuesto,
                        salario,
                        idJefe,
                        CONCAT(primerNombre,' ', segundoNombre,' ',primerApellido) as nombreJefe
                FROM rrhh.historialDetalle hd
                INNER JOIN bosque.proyecto p ON hd.idProyecto=p.id
                INNER JOIN configuracion.tblDepartamentosEstados d ON d.idDepartamento=hd.idDepartamento
                INNER JOIN rrhh.puestos tdr ON tdr.idPuesto=hd.idTDR
                INNER JOIN rrhh.empleados e ON e.idEmpleado=hd.idJefe
                WHERE hd.idHistorial=:id
                ORDER BY idHistorialDetalle DESC 
                ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

    // *Buscar datos generalesde un empleado
    public function buscarHistoriaFamiliar($id)
    {

        $sql = "SELECT  idHistorial,idEmpleado,
                        nombre,parentesco,
                        fechaNacimiento,
                        direccion,
                        telefono 
                FROM rrhh.historiaFamiliar
                WHERE idEmpleado=:id and estado=1
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

    // *Buscar datos generalesde un empleado
    public function buscarInfoSalud($id)
    {

        $sql = "SELECT	idSalud,
                        contactoEmergencia1,
                        tel1,
                        contactoEmergencia2,
                        tel2,
                        tipoSangre,
                        enfermedades,
                        medico,
                        telMedico,
                        centroMedico
                FROM rrhh.salud 
                WHERE idEmpleado=:id
         ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

    // *Buscar datos generalesde un empleado
    public function buscarConocidos($id)
    {

        $sql = "   SELECT idConocido,
                            nombre,
                            parentesco,
                            tiempoConocerlo,
                            empresaLabora
                    FROM rrhh.conocidos
                    WHERE idEmpleado=:id
         ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
    // *Buscar datos generalesde un empleado
    public function buscarIdiomas($id)
    {

        $sql = "   SELECT	idIdioma,
                            idioma,
                            porcentaje,
                            idEmpleado
                    FROM rrhh.idiomas
                    WHERE idEmpleado=:id and estado=1
         ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
    // *Buscar datos generalesde un empleado
    public function buscarEducación($id)
    {

        $sql = "   SELECT idEducacion,
                            nivel,
                            centroEducativo,
                            estudio,
                            desde,
                            hasta,
                            lugar
                    FROM rrhh.educacion
                    WHERE idEmpleado=:id
                    order by desde
         ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
    // *Buscar datos generalesde un empleado
    public function buscarAntecedentes($id)
    {

        $sql = "   SELECT	idAntecedentes,
                            empresa,
                            tipoEmpresa,
                            direccion,
                            telefono,
                            ultimoPuesto,
                            jefeInmediato,
                            telJefe,
                            ingreso,
                            retiro,
                            sueldoInicial,
                            sueldoFinal,
                            causaRetiro,
                            obligaciones
                    FROM rrhh.antecedentesLaborales
                    WHERE idEmpleado=:id
         ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
    public function buscarEstudios($id)
    {

        $sql = "   SELECT	idEstudiante,
                            carrera,
                            horaEntrada,
                            horaSalida,
                            finalizacion
                    FROM rrhh.estudiosActuales
                    WHERE idEmpleado=:id AND estado=1
         ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
    public function buscarReferencias($id)
    {

        $sql = "   SELECT  idReferencia,
                            nombre,
                            profesion,
                            direccion,
                            telefono
                    FROM rrhh.referencias
                    WHERE idEmpleado=:id
         ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }


    // *Buscar nombre en censo
    public function buscarEnCenso($dni)
    {

        $sql = "SELECT  nombre,
                            segundoNombre,
                            apellido,
                            segundoApellido,
                            sexo,
                            fechaNacimiento 
                    FROM perfilcliente.tblCensoGeneral  
                    WHERE numeroDNI	=:dni";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":dni", $dni);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

    // *Buscar si existe
    public function existe($id)
    {

        $sql = "SELECT  idEmpleado 
                    FROM rrhh.empleados 
                    WHERE dni=:id AND estado=1";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }






    // *Agregar registro
    public function agregarRegistro($datosGenerales, $datosParentesco, $datosParentescoConocidos, $datosSalud, $datosEducacion, $datosEstudiosActuales, $datosHistorialLaboral, $datosReferencias, $datosIdiomas, $conocidos, $actual)
    {




        $sql = "INSERT INTO rrhh.empleados(	DNI,primerNombre,segundoNombre,primerApellido,segundoApellido,telefono,fechaNacimiento,lugarNacimiento,nacionalidad,estadoCivil,genero,email,estado,usuarioCreado,cuentaBancaria,vencimientoPasaporte,vencimientoLicencia,vencimientoLicenciaMoto) 
            VALUES(	:dni,:primerNombre,:segundoNombre,:primerApellido,:segundoApellido,:tel,:fechaNacimiento,:lugarNacimiento,:nacionalidad,:estadoCivil,:genero,:correo,1,:usuario,:cuentaBancaria,:pasaporte,:licenciaCarro,:licenciaMoto);";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":dni", $datosGenerales->id);
        $stmt->bindParam(":primerNombre", $datosGenerales->primerNombre);
        $stmt->bindParam(":segundoNombre", $datosGenerales->segundoNombre);
        $stmt->bindParam(":primerApellido", $datosGenerales->primerApellido);
        $stmt->bindParam(":segundoApellido", $datosGenerales->segundoApellido);
        $stmt->bindParam(":fechaNacimiento", $datosGenerales->fechaNacimiento);
        $stmt->bindParam(":lugarNacimiento", $datosGenerales->lugarNacimiento);
        $stmt->bindParam(":tel", $datosGenerales->telefono);
        $stmt->bindParam(":nacionalidad", $datosGenerales->nacionalidad);
        $stmt->bindParam(":estadoCivil", $datosGenerales->estadoCivil);
        $stmt->bindParam(":genero", $datosGenerales->genero);
        $stmt->bindParam(":correo", $datosGenerales->email);
        $stmt->bindParam(":usuario", $_SESSION['usuario']);
        $stmt->bindParam(":cuentaBancaria", $datosGenerales->cuentaBancaria);
        $stmt->bindParam(":pasaporte", $datosGenerales->pasaporte);
        $stmt->bindParam(":licenciaCarro", $datosGenerales->licenciaCarro);
        $stmt->bindParam(":licenciaMoto", $datosGenerales->licenciaMoto);

        try {
            # Iniciamos una transacción.
            $this->conn->beginTransaction();
            $stmt->execute();
            $this->conn->commit();

            # Captura del ultimo id insertado
            $idEmpleado = $this->conn->lastInsertId();

            # Agregamos la dirección
            $sqlDireccion = "INSERT INTO rrhh.direcciones(idEmpleado,direccion,latitud,longitud,zona,usuarioCreado) 
                    VALUES(:id,:direccion,:latitud,:longitud,:zona,:usuario);";

            $stmt = $this->conn->prepare($sqlDireccion);
            $stmt->bindParam(":id", $idEmpleado);
            $stmt->bindParam(":direccion", $datosGenerales->direccion);
            $stmt->bindParam(":latitud", $datosGenerales->lat);
            $stmt->bindParam(":longitud", $datosGenerales->long);
            $stmt->bindParam(":zona", $datosGenerales->zona);
            $stmt->bindParam(":usuario", $_SESSION['usuario']);

            try {
                $stmt->execute();
            } catch (PDOException $e) {

                $this->conn->rollBack();
                $res = $stmt->errorInfo();
                $resultado = json_encode($res);
            }

            # Agregar información de parentesco
            foreach ($datosParentesco as $parentesco) {
                $sqlParentesco = "INSERT INTO rrhh.historiaFamiliar(idEmpleado, nombre,parentesco,fechaNacimiento,direccion,telefono,usuarioCreado)
                                VALUES (:id,:nombre,:parentesco,:fechaNacimiento,:direccion,:telefono,:usuario)";
                $stmt = $this->conn->prepare($sqlParentesco);
                $stmt->bindParam(":id", $idEmpleado);
                $stmt->bindParam(":nombre", $parentesco['nombreCompleto']);
                $stmt->bindParam(":parentesco", $parentesco['parentesco']);
                $stmt->bindParam(":fechaNacimiento", $parentesco['fechaNacimiento']);
                $stmt->bindParam(":direccion", $parentesco['direccion']);
                $stmt->bindParam(":telefono", $parentesco['telefono']);
                $stmt->bindParam(":usuario", $datosGenerales->usuario);

                try {
                    $stmt->execute();
                } catch (PDOException $e) {

                    $this->conn->rollBack();
                    $res = $stmt->errorInfo();
                    $resultado = json_encode($res);
                }
            }

            #Agregar información de las personas conocidas dentro de la empresa
            if ($conocidos == 1) {
                foreach ($datosParentescoConocidos as $conocidos) {
                    $sqlParentesco = "  INSERT INTO rrhh.conocidos(idEmpleado,nombre,parentesco,tiempoConocerlo,empresaLabora,usuarioCreado)
                                        VALUES(:id,:nombre,:parentesco,:tiempoConocerlo,:empresa,:usuario)";
                    $stmt = $this->conn->prepare($sqlParentesco);
                    $stmt->bindParam(":id", $idEmpleado);
                    $stmt->bindParam(":nombre", $conocidos['nombre']);
                    $stmt->bindParam(":parentesco", $conocidos['parentesco']);
                    $stmt->bindParam(":tiempoConocerlo", $conocidos['tiempoConocerle']);
                    $stmt->bindParam(":empresa", $conocidos['empresa']);
                    $stmt->bindParam(":usuario",$_SESSION['usuario']);

                    try {
                        $stmt->execute();
                    } catch (PDOException $e) {

                        $this->conn->rollBack();
                        $res = $stmt->errorInfo();
                        $resultado = json_encode($res);
                    }
                }
            }


            #Agregar información de salud y enfermedades
            $sqlSalud = "   INSERT INTO rrhh.salud(idEmpleado,contactoEmergencia1,tel1,contactoEmergencia2,tel2,tipoSangre,enfermedades,medico,telMedico,centroMedico,usuarioCreado)
                                VALUES(:id,:emergencia1,:tel1,:emergencia2,:tel2,:sangre,:enfermedades,:medico,:telMedico,:centroMedico,:usuario)
                ";
            $stmt = $this->conn->prepare($sqlSalud);
            $stmt->bindParam(":id", $idEmpleado);
            $stmt->bindParam(":emergencia1", $datosSalud->emergencia1);
            $stmt->bindParam(":tel1", $datosSalud->tel1);
            $stmt->bindParam(":emergencia2", $datosSalud->emergencia2);
            $stmt->bindParam(":tel2", $datosSalud->tel2);
            $stmt->bindParam(":sangre", $datosSalud->tiposangre);
            $stmt->bindParam(":enfermedades", $datosSalud->enfermedades);
            $stmt->bindParam(":medico", $datosSalud->medico);
            $stmt->bindParam(":telMedico", $datosSalud->telMedico);
            $stmt->bindParam(":centroMedico", $datosSalud->centroMedico);
            $stmt->bindParam(":usuario",$_SESSION['usuario']);

            try {
                $stmt->execute();
            } catch (PDOException $e) {

                $this->conn->rollBack();
                $res = $stmt->errorInfo();
                $resultado = json_encode($res);
            }


            # Agregar información de la educación
            foreach ($datosEducacion as $educacion) {
                $sqlParentesco = "  INSERT INTO rrhh.educacion(idEmpleado,nivel,centroEducativo,estudio,desde,hasta,lugar,usuarioCreado)
                                    VALUES (:id,:nivel,:centroEducativo,:estudio,:desde,:hasta,:lugar,:usuario)";
                $stmt = $this->conn->prepare($sqlParentesco);
                $stmt->bindParam(":id", $idEmpleado);
                $stmt->bindParam(":nivel", $educacion['nivel']);
                $stmt->bindParam(":centroEducativo", $educacion['centroEducativo']);
                $stmt->bindParam(":estudio", $educacion['estudios']);
                $stmt->bindParam(":desde", $educacion['desde']);
                $stmt->bindParam(":hasta", $educacion['hasta']);
                $stmt->bindParam(":lugar", $educacion['lugar']);
                $stmt->bindParam(":usuario", $_SESSION['usuario']);

                try {
                    $stmt->execute();
                } catch (PDOException $e) {

                    $this->conn->rollBack();
                    $res = $stmt->errorInfo();
                    $resultado = json_encode($res);
                }
            }




            # Agregar información de idiomas
            foreach ($datosIdiomas as $idiomas) {
                $sqlIdiomas = "  INSERT INTO rrhh.idiomas(idEmpleado,idioma,porcentaje,usuarioCreado)
                                VALUES(:id,:idioma,:porcentaje,:usuario)";
                $stmt = $this->conn->prepare($sqlIdiomas);
                $stmt->bindParam(":id", $idEmpleado);
                $stmt->bindParam(":idioma", $idiomas['idioma']);
                $stmt->bindParam(":porcentaje", $idiomas['porcentaje']);
                $stmt->bindParam(":usuario", $_SESSION['usuario']);

                try {
                    $stmt->execute();
                } catch (PDOException $e) {

                    $this->conn->rollBack();
                    $res = $stmt->errorInfo();
                    $resultado = json_encode($res);
                }
            }
            if ($actual == 1) {
                #Agregar información de los estudios actuales
                $sqlEstudios = "INSERT INTO rrhh.estudiosActuales(idEmpleado,carrera,horaEntrada,horaSalida,finalizacion,usuarioCreado)
                            VALUES(:id,:carrera,:horaEntrada,:horaSalida,:finalizacion,:usuario)
                ";
                $stmt = $this->conn->prepare($sqlEstudios);
                $stmt->bindParam(":id", $idEmpleado);
                $stmt->bindParam(":carrera", $datosEstudiosActuales->carrera);
                $stmt->bindParam(":horaEntrada", $datosEstudiosActuales->desde);
                $stmt->bindParam(":horaSalida", $datosEstudiosActuales->hasta);
                $stmt->bindParam(":finalizacion", $datosEstudiosActuales->fechaFinalizacion);
                $stmt->bindParam(":usuario", $_SESSION['usuario']);

                try {
                    $stmt->execute();
                } catch (PDOException $e) {

                    $this->conn->rollBack();
                    $res = $stmt->errorInfo();
                    $resultado = json_encode($res);
                }
            }
            # Agregar información laboral
            foreach ($datosHistorialLaboral as $historial) {
                $sqlHistorial = "   INSERT INTO rrhh.antecedentesLaborales(idEmpleado,empresa,tipoEmpresa,direccion,telefono,ultimoPuesto,jefeInmediato,telJefe,ingreso,retiro,sueldoInicial,sueldoFinal,causaRetiro,obligaciones,usuarioCreado)
                                    VALUES(:id,:empresa,:tipoEmpesa,:direccion,:telefono,:ultimoPuesto,:jefeInmediato,:telJefe,:ingreso,:retiro,:sueldoInicial,:sueldoFinal,:causaRetiro,:obligaciones,:usuario)";
                $stmt = $this->conn->prepare($sqlHistorial);
                $stmt->bindParam(":id", $idEmpleado);
                $stmt->bindParam(":empresa", $historial['empresa']);
                $stmt->bindParam(":tipoEmpesa", $historial['tipoEmpresa']);
                $stmt->bindParam(":direccion", $historial['direccionEmpresa']);
                $stmt->bindParam(":telefono", $historial['telEmpresa']);
                $stmt->bindParam(":ultimoPuesto", $historial['ultimoPuesto']);
                $stmt->bindParam(":jefeInmediato", $historial['nombreJefe']);
                $stmt->bindParam(":telJefe", $historial['telJefe']);
                $stmt->bindParam(":ingreso", $historial['fechaIngreso']);
                $stmt->bindParam(":retiro", $historial['fechaDeRetiro']);
                $stmt->bindParam(":sueldoInicial", $historial['sueldoInicial']);
                $stmt->bindParam(":sueldoFinal", $historial['sueldoFinal']);
                $stmt->bindParam(":causaRetiro", $historial['causaRetiro']);
                $stmt->bindParam(":obligaciones", $historial['descripcionPuesto']);
                $stmt->bindParam(":usuario", $_SESSION['usuario']);

                try {
                    $stmt->execute();
                } catch (PDOException $e) {

                    $this->conn->rollBack();
                    $res = $stmt->errorInfo();
                    $resultado = json_encode($res);
                }
            }

            #Agregar referencias
            foreach ($datosReferencias as $referencias) {
                $sqlHistorial = "   INSERT INTO rrhh.referencias(idEmpleado,nombre,profesion,direccion,telefono,usuarioCreado )
                                    VALUES(:id,:nombre,:profesion,:direccion,:telefono,:usuario)";
                $stmt = $this->conn->prepare($sqlHistorial);
                $stmt->bindParam(":id", $idEmpleado);
                $stmt->bindParam(":nombre", $referencias['nombre']);
                $stmt->bindParam(":profesion", $referencias['profesion']);
                $stmt->bindParam(":direccion", $referencias['direccion']);
                $stmt->bindParam(":telefono", $referencias['telefono']);
                $stmt->bindParam(":usuario", $_SESSION['usuario']);

                try {
                    $stmt->execute();
                } catch (PDOException $e) {

                    $this->conn->rollBack();
                    $res = $stmt->errorInfo();
                    $resultado = json_encode($res);
                }
            }

            #Agregar información de los estudios actuales
            $sql = "INSERT INTO rrhh.adjuntos(idEmpleado,usuarioCreado)
                    VALUES (:id,:usuario)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $idEmpleado);
            $stmt->bindParam(":usuario", $_SESSION['usuario']);

            try {
                $stmt->execute();

                # Captura del ultimo id insertado
                $idAdjuntos = $this->conn->lastInsertId();
            } catch (PDOException $e) {

                $this->conn->rollBack();
                $res = $stmt->errorInfo();
                $resultado = json_encode($res);
            }


            $response[0] = array(
                'mensaje' => 'Empleado registrado correctamente.',
                'idEmpleado' => $idEmpleado,
                'idAdjuntos' => $idAdjuntos,
            );

            $resultado = json_encode($response);
        } catch (PDOException $e) {
            //$this->conn->rollBack();
            $res = $stmt->errorInfo();
            $resultado = json_encode($res);
        }
        $stmt->closeCursor();

        echo $resultado;

        return $resultado;
    }

    // *Agregar fotos
    // *-------- foto------------
    public function actualizarFoto($foto, $id)
    {

        $sql = "UPDATE rrhh.adjuntos
                SET foto=:foto
                WHERE idEmpleado=:id; ";

        echo $sql;

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

    // *-------- CV-------------
    public function actualizarCV($foto, $id)
    {

        $sql = "UPDATE rrhh.adjuntos
                SET cv=:foto
                WHERE idEmpleado=:id; ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

    // *-------- Penales-------------
    public function actualizarPenales($foto, $id)
    {

        $sql = "UPDATE rrhh.adjuntos
                SET penales=:foto
                WHERE idEmpleado=:id; ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

    // *-------- policiales-------------------
    public function actualizarPoliciales($foto, $id)
    {

        $sql = "UPDATE rrhh.adjuntos
                SET policiales=:foto
                WHERE idEmpleado=:id; ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

    // *-------- Pasaporte------------
    public function actualizarPasaporte($foto, $id)
    {

        $sql = "UPDATE rrhh.adjuntos
                SET pasaporte=:foto
                WHERE idEmpleado=:id; ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }


    // *-------- DNI---------------
    //** FRONT */
    public function DNIFront($foto, $id)
    {

        $sql = "UPDATE rrhh.adjuntos
                SET dniFront=:foto
                WHERE idEmpleado=:id; ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
    // * BACK *//
    public function DNIBack($foto, $id)
    {

        $sql = "UPDATE rrhh.adjuntos
                SET dniBack=:foto
                WHERE idEmpleado=:id; ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }


    // *-------- Licencia Carro -----------
    //* FRONT */
    public function licenciaFront($foto, $id)
    {

        $sql = "UPDATE rrhh.adjuntos
                SET licenciaCarroFront=:foto
                WHERE idEmpleado=:id; ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

    // *BACK */
    public function licenciaBack($foto, $id)
    {

        $sql = "UPDATE rrhh.adjuntos
                SET licenciaCarroBack=:foto
                WHERE idEmpleado=:id; ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }


    // *-------- Licencia Moto -----------
    //* FRONT */
    public function motoFront($foto, $id)
    {

        $sql = "UPDATE rrhh.adjuntos
                SET licenciaMotoFront=:foto
                WHERE idEmpleado=:id; ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

    // *BACK */
    public function motoBack($foto, $id)
    {

        $sql = "UPDATE rrhh.adjuntos
                SET licenciaMotoBack=:foto
                WHERE idEmpleado=:id; ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }





    //* -----------------------------ACTIALIZAR
    public function actualizarEmpleado($campo, $valor, $id, $usuario, $tabla)
    {

        $sql = "UPDATE rrhh." . $tabla . "
                SET     " . $campo . " = :valor,          
                        fechaModificado = getdate(),
                        usuarioModificado = :usuario
                WHERE idEmpleado=:id; ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":valor", $valor);
        $stmt->bindParam(":usuario", $_SESSION['usuario']);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
    public function actualizarRegistro($campo, $valor, $id, $usuario, $tabla, $condicion)
    {

        $sql = "UPDATE rrhh." . $tabla . "
                SET     " . $campo . " = :valor,          
                        fechaModificado = getdate(),
                        usuarioModificado = :usuario
                WHERE " . $condicion . "=:id; ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":valor", $valor);
        $stmt->bindParam(":usuario", $_SESSION['usuario']);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

    public function actualizarEmpleado2($campo, $valor, $campo2, $valor2, $id, $usuario, $tabla)
    {

        $sql = "UPDATE rrhh." . $tabla . "
                SET     " . $campo . " = :valor,
                        " . $campo2 . " = :valor2,            
                        fechaModificado = getdate(),
                        usuarioModificado = :usuario
                WHERE idEmpleado=:id; ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":valor", $valor);
        $stmt->bindParam(":valor2", $valor2);
        $stmt->bindParam(":usuario", $_SESSION['usuario']);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }

    // *Agregar registro
    public function agregarFamiliar($dato)
    {
        $sql = "INSERT INTO rrhh.historiaFamiliar(idEmpleado, nombre,parentesco,fechaNacimiento,direccion,telefono,usuarioCreado)
        VALUES (:id,:nombre,:parentesco,:fechaNacimiento,:direccion,:telefono,:usuario)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $dato->idEmpleado);
        $stmt->bindParam(":nombre", $dato->nombre);
        $stmt->bindParam(":parentesco", $dato->parentesco);
        $stmt->bindParam(":fechaNacimiento", $dato->fecha);
        $stmt->bindParam(":direccion", $dato->dir);
        $stmt->bindParam(":telefono", $dato->tel);
        $stmt->bindParam(":usuario", $_SESSION['usuario']);


        try {
            $this->conn->beginTransaction();
            $stmt->execute();
            $this->conn->commit();
            $resultado = true;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            $res = $stmt->errorInfo();
            error_log($e->getMessage());  // Esto imprimirá el error en el error log de PHP
            $resultado = json_encode($res);
        }
        $stmt->closeCursor();
        return $resultado;
    }
    public function agregarEstudios($dato)
    {
        $sqlEstudios = "INSERT INTO rrhh.estudiosActuales(idEmpleado,carrera,horaEntrada,horaSalida,finalizacion,usuarioCreado)
            VALUES(:id,:carrera,:horaEntrada,:horaSalida,:finalizacion,:usuario)
                        ";
        $stmt = $this->conn->prepare($sqlEstudios);
        $stmt->bindParam(":id", $dato->idEmpleado);
        $stmt->bindParam(":carrera", $dato->titulo);
        $stmt->bindParam(":horaEntrada", $dato->horario1);
        $stmt->bindParam(":horaSalida", $dato->horario2);
        $stmt->bindParam(":finalizacion", $dato->finalizacion);
        $stmt->bindParam(":usuario", $_SESSION['usuario']);


        try {
            $this->conn->beginTransaction();
            $stmt->execute();
            $this->conn->commit();
            $resultado = true;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            $res = $stmt->errorInfo();
            error_log($e->getMessage());
            $resultado = json_encode($res);
        }
        $stmt->closeCursor();
        return $resultado;
    }
    public function agregarIdioma($dato)
    {
        $sqlIdiomas = "  INSERT INTO rrhh.idiomas(idEmpleado,idioma,porcentaje,usuarioCreado)
        VALUES(:id,:idioma,:porcentaje,:usuario)";
        $stmt = $this->conn->prepare($sqlIdiomas);
        $stmt->bindParam(":id", $dato->idEmpleado);
        $stmt->bindParam(":idioma",  $dato->idioma);
        $stmt->bindParam(":porcentaje",  $dato->porcentaje);
        $stmt->bindParam(":usuario", $_SESSION['usuario']);


        try {
            $this->conn->beginTransaction();
            $stmt->execute();
            $this->conn->commit();
            $resultado = true;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            $res = $stmt->errorInfo();
            error_log($e->getMessage());
            $resultado = json_encode($res);
        }
        $stmt->closeCursor();
        return $resultado;
    }
    public function agregarEducacion($dato)
    {
        $sql = "  INSERT INTO rrhh.educacion(idEmpleado,nivel,centroEducativo,estudio,desde,hasta,lugar,usuarioCreado)
                                      VALUES (:id,:nivel,:centroEducativo,:estudio,:desde,:hasta,:lugar,:usuario)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $dato->idEmpleado);
        $stmt->bindParam(":nivel", $dato->nivel);
        $stmt->bindParam(":centroEducativo", $dato->centro);
        $stmt->bindParam(":estudio", $dato->titulo);
        $stmt->bindParam(":desde", $dato->desde);
        $stmt->bindParam(":hasta", $dato->hasta);
        $stmt->bindParam(":lugar", $dato->lugar);
        $stmt->bindParam(":usuario",$_SESSION['usuario']);


        try {
            $this->conn->beginTransaction();
            $stmt->execute();
            $this->conn->commit();
            $resultado = true;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            $res = $stmt->errorInfo();
            error_log($e->getMessage());  // Esto imprimirá el error en el error log de PHP
            $resultado = json_encode($res);
        }
        $stmt->closeCursor();
        return $resultado;
    }


    // *Agregar dirección
    public function agregarDireccion($dato)
    {
        $sql = "UPDATE rrhh.direcciones
                SET estado=0
                WHERE idEmpleado=:id
                INSERT INTO rrhh.direcciones(idEmpleado,direccion,latitud,longitud,zona,usuarioCreado) 
                    VALUES(:id2,:direccion,:latitud,:longitud,:zona,:usuario);";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $dato->idEmpleado);
        $stmt->bindParam(":id2", $dato->idEmpleado);
        $stmt->bindParam(":direccion", $dato->direccion);
        $stmt->bindParam(":latitud", $dato->lat);
        $stmt->bindParam(":longitud", $dato->long);
        $stmt->bindParam(":zona", $dato->zona);
        $stmt->bindParam(":usuario", $_SESSION['usuario']);


        try {
            $this->conn->beginTransaction();
            $stmt->execute();
            $this->conn->commit();
            $resultado = true;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            $res = $stmt->errorInfo();
            error_log($e->getMessage());  // Esto imprimirá el error en el error log de PHP
            $resultado = json_encode($res);
        }
        $stmt->closeCursor();
        return $resultado;
    }




    //* ELIMINAR
    public function eliminarRegistro($tabla, $id, $campo)
    {
        $sql = "UPDATE rrhh." . $tabla . "
                SET     estado=0,          
                        fechaModificado = getdate(),
                        usuarioModificado = :usuario
                WHERE " . $campo . "=:id ";
        echo $sql;
        echo $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":usuario", $_SESSION['usuario']);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }



    // *Agregar información en el historial de empleados
    public function agregarHistorial($datos)
    {

        $sql = "INSERT INTO rrhh.historial(idEmpleado,codigoEmpleado,codigoSAP,ingreso,vacaciones,telefonoAsignado,idUsuario,usuarioCreado,emailAsignado)
          VALUES(:idEmpleado,:codigoEmpleado,:codigoSAP,:ingreso,:vacaciones,:telefonoAsignado,:idUsuario,:usuario,:email)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":idEmpleado", $datos->idEmpleado);
        $stmt->bindParam(":codigoEmpleado", $datos->codigoEmpleado);
        $stmt->bindParam(":codigoSAP", $datos->codigoSAP);
        $stmt->bindParam(":ingreso", $datos->inicio);
        $stmt->bindParam(":vacaciones", $datos->vacaciones);
        $stmt->bindParam(":telefonoAsignado", $datos->telefonoAsignado);
        $stmt->bindParam(":idUsuario", $datos->usuarioAsignado);
        $stmt->bindParam(":usuario", $_SESSION['usuario']);
        $stmt->bindParam(":email", $datos->emailAsignado);

        try {
            # Iniciamos una transacción.
            $this->conn->beginTransaction();
            $stmt->execute();
            $this->conn->commit();

            # Captura del ultimo id insertado
            $idHistorial = $this->conn->lastInsertId();

            # Agregamos la dirección
            $sqlDireccion = "INSERT INTO rrhh.historialDetalle(idHistorial,fechaInicio,idProyecto,idDepartamento,sitio,idTDR,salario,usuarioCreado,idJefe,superUsuario) 
                                VALUES(:id,:fechaInicio,:idProyecto,:idDepartamento,:sitio,:idDTR,:salario,:usuario,:jefe,:superUsuario);";

            $stmt = $this->conn->prepare($sqlDireccion);
            $stmt->bindParam(":id", $idHistorial);
            $stmt->bindParam(":fechaInicio", $datos->inicioPuesto);
            $stmt->bindParam(":idProyecto", $datos->proyectos);
            $stmt->bindParam(":idDepartamento", $datos->zona);
            $stmt->bindParam(":sitio", $datos->sitio);
            $stmt->bindParam(":idDTR", $datos->idPuesto);
            $stmt->bindParam(":salario", $datos->salario);
            $stmt->bindParam(":usuario", $_SESSION['usuario']);
            $stmt->bindParam(":jefe", $datos->jefeInmediato);
            $stmt->bindParam(":superUsuario", $datos->superUsario);

            try {
                $stmt->execute();
                $resultado = json_encode(true);
            } catch (PDOException $e) {
                $this->conn->rollBack();
                $res = $stmt->errorInfo();
                $resultado = json_encode($res);
            }
        } catch (PDOException $e) {
            //$this->conn->rollBack();
            $res = $stmt->errorInfo();
            $resultado = json_encode($res);
        }
        $stmt->closeCursor();

        echo $resultado;

        return $resultado;
    }
    public function agregarDetalle($datos)
    {

        $sql = "INSERT INTO rrhh.historialDetalle(idHistorial,fechaInicio,idProyecto,idDepartamento,sitio,idTDR,salario,idJefe,usuarioCreado)
                VALUES(:idHistorial,:fechaInicio,:idProyecto,:idDepartamento,:sitio,:idTDR,:salario,:idJefe,:usuario)
                ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":idHistorial", $datos->idHistorial);
        $stmt->bindParam(":fechaInicio", $datos->fechaInicio);
        $stmt->bindParam(":idProyecto", $datos->idProyecto);
        $stmt->bindParam(":idDepartamento", $datos->idDepartamento);
        $stmt->bindParam(":sitio", $datos->sitio);
        $stmt->bindParam(":idTDR", $datos->idTDR);
        $stmt->bindParam(":salario", $datos->salario);
        $stmt->bindParam(":idJefe", $datos->idJefe);
        $stmt->bindParam(":usuario", $_SESSION['usuario']);

        try {
            # Iniciamos una transacción.
            $this->conn->beginTransaction();
            $stmt->execute();
            $this->conn->commit();
            $resultado=true;
           
        } catch (PDOException $e) {
            //$this->conn->rollBack();
            $res = $stmt->errorInfo();
            $resultado = json_encode($res);
        }
        $stmt->closeCursor();

        echo $resultado;

        return $resultado;
    }

    public function actualizarRetiroHistortial($fecha, $id, $usuario)
    {

        $sql = "UPDATE rrhh.historial
                SET Retiro=:fecha,
                    usuarioModificado=:usuario
                WHERE idHistorial=:id; ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":fecha", $fecha);
        $stmt->bindParam(":usuario",$_SESSION['usuario']);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
    public function actualizarRetiro($fecha, $id, $usuario)
    {

        $sql = "UPDATE rrhh.historialDetalle
                SET fechaRetiro=:fecha,
                    usuarioModificado=:usuario
                WHERE idHistorialDetalle=:id; ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":fecha", $fecha);
        $stmt->bindParam(":usuario", $_SESSION['usuario']);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $resultado = true;
        } catch (PDOException $e) {
            $resultado = $e->getMessage();
        }
        $stmt->closeCursor();
        return $resultado;
    }
}
