<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<!--NAV HEADER -->
			<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				<a class="flex-sm-fill text-sm-center nav-link active" id="datos-personales-tab" data-bs-toggle="tab" href="#datos-personales" role="tab" aria-controls="datos-personales" aria-selected="true">Datos Generales</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="historial-familiar-tab" data-bs-toggle="tab" href="#historial-familiar" role="tab" aria-controls="historial-familiar" aria-selected="false">Historial Familiar</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="salud-tab" data-bs-toggle="tab" href="#salud" role="tab" aria-controls="salud" aria-selected="false">Salud</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="educacion-tab" data-bs-toggle="tab" href="#educacion" role="tab" aria-controls="educacion" aria-selected="false">Educación</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="antecedentes-laborales-tab" data-bs-toggle="tab" href="#antecedentes-laborales" role="tab" aria-controls="antecedentes-laborales" aria-selected="false">Antecedentes Laborales</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="referencias-tab" data-bs-toggle="tab" href="#referencias" role="tab" aria-controls="referencias" aria-selected="false">Referencias</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="adjuntos-tab" data-bs-toggle="tab" href="#adjuntos" role="tab" aria-controls="adjuntos" aria-selected="false">Adjuntos</a>
			</nav>
			<!-- NAV BODY -->
			<div class="tab-content" id="orders-table-tab-content">

				<!--DATOS GENERALES-->
				<div class="tab-pane fade show active" id="datos-personales" role="tabpanel" aria-labelledby="datos-personales-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="app-card app-card-settings shadow-sm p-4">
								<div class="app-card-body">

									<!--FOTO DE PERFIL-->
									<div class="row g-3 align-items-end ">
										<div class="col-md-2 mb-3">
											<img src="./assets/images/naturalista.png" class="img-fluid  rounded " alt="..." id="fotoImg">
										</div>
										<div class="col-md">
											<div class="mb-3">
												<label for="archivoInput">&nbspCargar foto</label>
												<input type="file" class="form-control " id="archivoInput" accept=".jpg,.png,.jpeg">
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating">
												<div class=" mb-3">
													<label for="idInput">&nbsp No. de Identidad</label>
													<input type="input" class="form-control" id="idInput">

												</div>
											</div>
										</div>
									</div>

									<!--NOMBRE-->
									<div class="row g-2">
										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="primerNombreInput">
													<label for="primerNombreInput">Primer Nombre</label>
												</div>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="segundoNombreInput">
												<label for="segundoNombreInput">Segundo Nombre</label>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="primerApellidoInput">
												<label for="primerApellidoInput">Primer Apellido</label>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="SegundoApellidoInput">
												<label for="SegundoApellidoInput">Segundo Apellido</label>
											</div>
										</div>
									</div>

									<!--NACIMIENTO-->
									<div class="row g-2">
										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="date" class="form-control" id="fechaNacimientoDate">
													<label for="fechaNacimientoDate">Fecha de Nacimiento</label>
												</div>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="lugarNacimientoInput">
												<label for="lugarNacimientoInput">Lugar de Nacimiento</label>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="nacionalidadInput">
												<label for="nacionalidadInput">Nacionalidad</label>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating">
												<select class="form-select" id="estadoCivilSelect" aria-label="Floating label select example">
													<option selected class="text-end"></option>
													<option value="1" class="text-end">Soltero &nbsp</option>
													<option value="2" class="text-end">Casado &nbsp</option>
													<option value="2" class="text-end">Viudo &nbsp</option>
													<option value="3" class="text-end">Divorciado &nbsp</option>
													<option value="4" class="text-end">Separado &nbsp</option>
													<option value="5" class="text-end">Union Libre &nbsp</option>
												</select>
												<label for="estadoCivilSelect">Estado Civil</label>
											</div>
										</div>

									</div>

									<!--NUMERO DE TELEFONO -- GENERO -- ESTADO CIVIL-->
									<div class="row g-2">
										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="tel" class="form-control" id="telefonoInput">
													<label for="telefonoInput">No de Teléfono</label>
												</div>
											</div>
										</div>

										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="emailInput">
												<label for="emailInput">Correo Electronico</label>
											</div>
										</div>
										<div class="col-md ">
											<div class="form-floating mb-3">
												<div class="form-floating">
													<select class="form-select" id="generoSelect" aria-label="Floating label select example">
														<option selected class="text-end"></option>
														<option value="1" class="text-end">Femenino &nbsp</option>
														<option value="2" class="text-end">Masculino &nbsp</option>
													</select>
													<label for="generoSelect">Género</label>
												</div>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="cuentaBancoInput">
												<label for="cuentaBancoInput">No. de cuenta bancaria (BAC)</label>
											</div>
										</div>
									</div>

									<!--DIRECCIÓN-->
									<div class="row g-2">
										<div class="col-md-8">
											<div id="map" style="  height: 400px!important"></div>
										</div>
										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<textarea type="input" class="form-control" id="direccionInput" style="  height: 400px!important">></textarea>
													<label for="direccionInput">Dirección</label>
												</div>
											</div>
										</div>
										<input type="input" class="form-control esconder" id="latInput">
										<input type="input" class="form-control esconder" id="longInput">


									</div>

									<!-- PASAPORTE -->
									<div class="row g-2 align-items-center">
										<div class="col-md g-2">
											<div class="form-check form-switch mb-3 ">
												<input class="form-check-input" type="checkbox" role="switch" id="pasaporteCheck">
												<label class="form-check-label" for="pasaporteCheck">¿Posee Pasaporte?</label>

											</div>
											<div class="form-floating">
												<div class="form-floating mb-3 esconder pasaporteDate">
													<input type="date" class="form-control" id="fechaVencePasaporteInput">
													<label for="fechaVencePasaporteInput">Fecha de vencimiento</label>
												</div>
											</div>
										</div>
										<div class="col-md g-2">
											<div class="form-check form-switch mb-3 ">
												<input class="form-check-input" type="checkbox" role="switch" id="licenciaCheck">
												<label class="form-check-label" for="licenciaCheck">¿Posee Licencia de Vehiculo?</label>
											</div>
											<div class="form-floating">
												<div class="form-floating mb-3 esconder carroDate">
													<input type="date" class="form-control" id="fechaVenceLicenciaInput">
													<label for="fechaVenceLicenciaInput">Fecha de vencimiento</label>
												</div>
											</div>
										</div>

										<div class="col-md g-2">
											<div class="form-check form-switch mb-3 ">
												<input class="form-check-input" type="checkbox" role="switch" id="motoCheck">
												<label class="form-check-label" for="motoCheck">¿Posee Licencia de Motocicleta?</label>
											</div>
											<div class="form-floating">
												<div class="form-floating mb-3 esconder motoDate">
													<input type="date" class="form-control" id="fechaVenceMotoInput">
													<label for="fechaVenceMotoInput">Fecha de vencimiento</label>
												</div>
											</div>
										</div>

									</div>

									<!-- SIGUIENTE -->
									<div class="row g-2 justify-content-end">
										<div class="col-12 col-lg-2">
											<a class="btn app-btn-primary" id="siguienteHfBtn">
												Siguiente
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
													<path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
													<path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
												</svg>
											</a>
										</div>
									</div>

								</div>
							</div>

						</div>
					</div>
				</div>

				<!--HISTORIAL FAMILIAR-->
				<div class="tab-pane fade show " id="historial-familiar" role="tabpanel" aria-labelledby="historial-familiar-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="app-card app-card-settings shadow-sm p-4">
								<div class="app-card-body">
									<!-- PARENTESCO -- NOMBRE -- FECHA DE NACIMIENTO -->
									<div class="row g-2">
										<div class="col-md-4">
											<div class="form-floating">
												<select class="form-select" id="parentescoSelect" aria-label="Floating label select example">
													<option selected class="text-end"></option>
													<option value="Padre" class="text-end">Padre &nbsp</option>
													<option value="Madre" class="text-end">Madre &nbsp</option>
													<option value="Conyuge" class="text-end">Cónyuge &nbsp</option>
													<option value="Hijo" class="text-end">Hijo &nbsp</option>
												</select>
												<label for="parentescoSelect">Parentesco</label>
											</div>
										</div>

										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="nombreFamiliarInput">
													<label for="nombreFamiliarInput">Nombre completo</label>
												</div>
											</div>
										</div>
										<!-- Fecha nacimiento familiar -->
										<div class="col-md-3">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="date" class="form-control" id="nacimientoFamiliarDate">
													<label for="nacimientoFamiliarDate">Fecha de Nacimiento</label>
												</div>
											</div>
										</div>
									</div>

									<!-- DIRECCION -- BOTON AGREGAR -->
									<div class="row g-2 align-items-center  ">
										<!-- Dirección -->
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="direccionFamiliarInput">
												<label for="direccionFamiliarInput">Dirección</label>
											</div>
										</div>
										<!-- Boton agregar -->
										<div class="col-auto ">
											<a class="btn btn app-btn-primary" id="AgregarParentescoBtn">
												Agregar
											</a>
										</div>
									</div>

									<!--TABLA-->
									<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
										<div class="app-card app-card-orders-table shadow-sm mb-5">
											<div class="app-card-body">
												<div class="table-responsive">
													<table class="table app-table-hover mb-0 text-left" id="parentescoTabla">
														<thead>
															<tr>
																<th class="cell">Parentesco</th>
																<th class="cell">Nombre</th>
																<th class="cell">Edad</th>
																<th class="cell">Dirección</th>
																<th class="cell">Acciones</th>
															</tr>
														</thead>
														<tbody>


														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>

									<!-- PARIENTES CONOCIDOS -->
									<div class="col-md ">
										<div class="form-check form-switch mb-3">
											<input class="form-check-input" type="checkbox" role="switch" id="parientesConocidosCheck">
											<label class="form-check-label" for="parientesConocidosCheck">¿Tiene parientes o conocidos laborando en esta empresa?</label>
										</div>
									</div>


									<!-- INFORMACION DE LOS PARIENTES CONOCIDOS -->
									<div class="row g-2 esconder">
										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="nombreConocidoInput">
													<label for="nombreConocidoInput">Nombre</label>
												</div>
											</div>
										</div>
										<div class="col-md esconder">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<select class="form-select" id="parentescoInput" aria-label="Floating label select example">
														<option selected class="text-end"></option>
														<option value="Padre" class="text-end">Padre &nbsp</option>
														<option value="Madre" class="text-end">Madre &nbsp</option>
														<option value="Hermano" class="text-end">Hermano &nbsp</option>
														<option value="Conyuge" class="text-end">Cónyuge &nbsp</option>
														<option value="Hijo" class="text-end">Hijo &nbsp</option>
														<option value="Amigo" class="text-end">Amigo &nbsp</option>
														<option value="Conocido" class="text-end">Conocido &nbsp</option>
														<option value="Conocido" class="text-end">Otro &nbsp</option>
													</select>
													<label for="parentescoSelect">Parentesco</label>
												</div>
											</div>
										</div>
										<div class="col-md esconder">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="tiempoConocerleInput">
													<label for="tiempoConocerleInput">Tiempo de conocerle <span>(Años)</span></label>
												</div>
											</div>
										</div>
										<div class="col-md esconder">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="empresaLaboraInput">
													<label for="empresaLaboraInput">Empresa en la que labora</label>
												</div>
											</div>
										</div>
										<div class="col-auto esconder align-items-end">
											<a class="btn btn app-btn-primary" id="conocidosTrabajandoBtn">
												Agregar
											</a>
										</div>
									</div>

									<!-- TABLA -->
									<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
										<div class="app-card app-card-orders-table shadow-sm mb-5">
											<div class="app-card-body">
												<div class="table-responsive esconder" id="parentescoConocidosTabla">
													<table class="table app-table-hover mb-0 text-left">
														<thead>
															<tr>
																<th class="cell">Nombre</th>
																<th class="cell">Profesión</th>
																<th class="cell">Tiempo de conocerle</th>
																<th class="cell">Empresa en que labora</th>
																<th class="cell">Acciones</th>
															</tr>
														</thead>
														<tbody>


														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>

									<!-- Siguiente -->
									<div class="row g-2 ">
										<div class="col-6 d-flex justify-content-start align-items-center">
											<a class="btn app-btn-primary" id="anteriorSBtn">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
													<path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
													<path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
												</svg>
												Anterior
											</a>
										</div>
										<div class="col-6 d-flex justify-content-end align-items-center">
											<a class="btn app-btn-primary" id="siguienteSBtn">
												Siguiente
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
													<path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
													<path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
												</svg>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!--SALUD-->
				<div class="tab-pane fade show " id="salud" role="tabpanel" aria-labelledby="salud-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="app-card app-card-settings shadow-sm p-4">
								<div class="app-card-body">
									<div class="h5 pb-2 mb-4 text-success border-bottom border-success">
										Datos médicos
									</div>
									<!--Contacto de emergencia-->
									<div class="row g-2">
										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="contacto1Input">
													<label for="contacto1Input">1. Contacto de Emergencia</label>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="telEmergencia1Input">
													<label for="telEmergencia1Input">Teléfono</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row g-2">
										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="contacto2Input">
													<label for="contacto2Input">2. Contacto de Emergencia</label>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="telEmergencia2Input">
													<label for="telEmergencia2Input">Teléfono</label>
												</div>
											</div>
										</div>
									</div>

									<!--Tipo de sangre -- enfermedades de base-->
									<div class="row g-2">
										<div class="col-md-2">
											<div class="form-floating">
												<select class="form-select " id="tipoSangreSelect" aria-label="Floating label select example">
													<option selected class="text-end"></option>
													<option value="AP" class="text-end">A Positivo &nbsp</option>
													<option value="AN" class="text-end">A Negativo &nbsp</option>
													<option value="BP" class="text-end">B Positivo&nbsp</option>
													<option value="BN" class="text-end">B Negativo &nbsp</option>
													<option value="ABP" class="text-end">AB Positivo &nbsp</option>
													<option value="ABN" class="text-end">AB Negativo &nbsp</option>
													<option value="OP" class="text-end">O Positivo &nbsp</option>
													<option value="ON" class="text-end">O Negativo &nbsp</option>
												</select>
												<label for="tipoSangreSelect">Tipo de Sangre</label>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="tel" class="form-control" id="enfermedadesInput">
													<label for="enfermedadesInput">Enfermedades de base</label>
													<span class="peque">
														*En caso de padecer de lo contrario escribir N/A
													</span>
												</div>
											</div>
										</div>
									</div>

									<!--Medico de Cabecera-->
									<div class="row g-2">
										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="medicoCabeceraInput">
													<label for="medicoCabeceraInput">Médico de cabecera</label>
													<span class="peque">*En caso de tener de lo contrario escribir N/A</span>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="telMedicoInput">
													<label for="telMedicoInput">Teléfono</label>
												</div>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="centroMedicoInput">
													<label for="centroMedicoInput">Centro Médico de preferencia</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row g-2">
										<div class="col-6 d-flex justify-content-start align-items-center">
											<a class="btn app-btn-primary" id="anteriorEBtn">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
													<path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
													<path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
												</svg>
												Anterior
											</a>
										</div>
										<div class="col-6 d-flex justify-content-end align-items-center">
											<a class="btn app-btn-primary" id="siguienteEBtn">
												Siguiente
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
													<path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
													<path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
												</svg>
											</a>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>

				<!--EDUCACIÓN-->
				<div class="tab-pane fade show" id="educacion" role="tabpanel" aria-labelledby="educacion-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="app-card app-card-settings shadow-sm p-4">
								<div class="app-card-body">
									<div class="h5 pb-2 mb-4 text-success border-bottom border-success">
										Información académica
									</div>
									<!-- Nivel educativo -- Centro Educativo-->
									<div class="row g-2">
										<div class="col-md-2">
											<div class="form-floating">
												<select class="form-select" id="nivelEducativoSelect" aria-label="Floating label select example">
													<option selected class="text-end"> </option>
													<option value="Primaria" class="text-end">Primaria &nbsp</option>
													<option value="Secundaria" class="text-end">Sencundaria &nbsp</option>
													<option value="Pregrado" class="text-end">Pregrado &nbsp</option>
													<option value="Postgrado" class="text-end">Posgrado &nbsp</option>
													<option value="curso" class="text-end">Curso &nbsp</option>
													<option value="diplomado" class="text-end">Seminario &nbsp</option>
												</select>
												<label for="nivelEducativoSelect">Nivel Educativo</label>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="centroEducativoInput">
													<label for="centroEducativoInput">Centro Educativo</label>
												</div>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="carreraInput">
													<label for="carreraInput">Estudios en:</label>
												</div>
											</div>
										</div>
									</div>

									<!--Desde -- Hasta -- Lugar-->
									<div class="row g-2 align-items-center  ">
										<div class="col-md-2">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="number" min="1970" class="form-control" id="desdeNumber">
													<label for="desdeNumber">Desde</label>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="number" min="1970" class="form-control" id="hastaNumber">
													<label for="hastaNumber">Hasta</label>
												</div>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="lugarInput">
												<label for="lugarInput">Lugar</label>
											</div>
										</div>
										<!-- Boton agregar -->
										<div class="col-auto ">
											<a class="btn btn app-btn-primary" id="agregarEducacion">
												Agregar
											</a>
										</div>
									</div>

									<!--TABLA-->
									<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
										<div class="app-card app-card-orders-table shadow-sm mb-5">
											<div class="app-card-body">
												<div class="table-responsive">
													<table class="table app-table-hover mb-0 text-left" id="educacionTabla">
														<thead>
															<tr>
																<th class="cell">Nivel</th>
																<th class="cell">Centro Educativo</th>
																<th class="cell">Estudios en:</th>
																<th class="cell">De</th>
																<th class="cell">Hasta</th>
																<th class="cell">Lugar</th>
																<th style="width: 100px;">Acciones</th>
															</tr>
														</thead>
														<tbody>


														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>

									<div class="h5 pb-2 mb-4 text-success border-bottom border-success">
										Idiomas
									</div>

									<div class="row g-2 align-items-center  ">
										<div class="col-md-3">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" min="1970" class="form-control" id="idiomaInput">
													<label for="idiomaInput">Idioma</label>
												</div>
											</div>
										</div>
										<div class="col-md-1">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="number" min="0" max="100" class="form-control" id="porcentajeInput">
													<label for="porcentajeInput">%</label>
												</div>
											</div>
										</div>
										<!-- Boton agregar -->
										<div class="col-md-1 align-items-center">
											<a class="btn btn app-btn-primary" id="agregarIdioma">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
													<path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
													<path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
												</svg>
											</a>
										</div>
										<div class="col-md">
											<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
												<div class="app-card app-card-orders-table shadow-sm mb-5">
													<div class="app-card-body">
														<div class="table-responsive">
															<table class="table app-table-hover mb-0 text-left" id="idiomasTabla">
																<thead>
																	<tr>
																		<th class="cell text-center">Idioma</th>
																		<th class="cell text-center">%</th>
																		<th class="cell text-center" style="width: 50px;">Acciones</th>
																	</tr>
																</thead>
																<tbody>
													

																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!--TABLA-->

									</div>






									<div class="h5 pb-2 mb-4 text-success border-bottom border-success">
										Estudios Actuales
									</div>



									<!-- Estudios actuales -->
									<div class="col-md ">
										<div class="form-check form-switch mb-3">
											<input class="form-check-input" type="checkbox" role="switch" id="estudioActualCheck">
											<label class="form-check-label" for="estudioActualCheck">¿Estudia Actualmente? <br> <span>Carrera o Diplomado</span>
										</div></label>

									</div>


									<!-- Información de estudios actuales -->
									<div class="row g-2 esconderEstudios">
										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="carreraInput">
													<label for="carreraInput">Carrera/Diplomado</label>
												</div>
											</div>
										</div>
										<div class="col-md-2 esconderEstudios">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="time" class="form-control" id="horarioDesdeInput">
													<label for="horarioInput">Horario desde</label>
												</div>
											</div>
										</div>
										<div class="col-md-2 esconderEstudios">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="time" class="form-control" id="horarioHastaInput">
													<label for="horarioInput">Horario hasta</label>
												</div>
											</div>
										</div>

										<div class="col-md esconderEstudios">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="date" class="form-control" id="finalizaDate">
													<label for="finalizaDate">Fecha de Finalización</label>
												</div>
											</div>
										</div>
									</div>

									<div class="row g-2 justify-content-end">
										<div class="col-6 d-flex justify-content-start align-items-center">
											<a class="btn app-btn-primary" id="anteriorAlBtn">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
													<path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
													<path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
												</svg>
												Anterior
											</a>
										</div>
										<div class="col-6 d-flex justify-content-end align-items-center">
											<a class="btn app-btn-primary" id="siguienteAlBtn">
												Siguiente
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
													<path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
													<path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
												</svg>
											</a>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>

				<!--ANTECEDENTES LABORALES-->
				<div class="tab-pane fade show" id="antecedentes-laborales" role="tabpanel" aria-labelledby="antecedentes-laborales-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="app-card app-card-settings shadow-sm p-4">
								<div class="app-card-body">
									<div class="h5 pb-2 mb-4 text-success border-bottom border-success">
										Trabajo Anterior
									</div>
									<!-- Nombre y tipo de empresa -->
									<div class="row g-2">
										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="nombreEmpresaInput">
													<label for="nombreEmpresaInput">Nombre de la empresa</label>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="tipoEmpresaInput">
													<label for="tipoEmpresaInput">Tipo de Empresa</label>
												</div>
											</div>
										</div>
									</div>

									<!-- Dirección y teléfono de la empresa -->
									<div class="row g-2">
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="dirEmpresaInput">
												<label for="dirEmpresaInput">Dirección</label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="telEmpresaInput">
												<label for="telEmpresaInput">Teléfono</label>
											</div>
										</div>

									</div>

									<!-- Último puesto -- Jefe inmediato -- Numero del jefe -->
									<div class="row g-2">
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="ultimoPuestoInput">
												<label for="ultimoPuestoInput">Último puesto desempeñado</label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="jefeInmediatoInput">
												<label for="jefeInmediatoInput">Nombre Jefe Inmediato</label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="telJefeInput">
												<label for="telJefeInput">Número Jefe Inmediato</label>
											</div>
										</div>
									</div>

									<!-- Fecha de ingreso -- fecha de retiro -- sueldo iniciar -- sueldo final -->
									<div class="row g-2">
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="date" class="form-control" id="ingresoDate">
												<label for="ingresoDate">Fecha de Ingreso</label>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="date" class="form-control" id="retiroDate">
												<label for="retiroDate">Fecha de Retiro</label>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="number" class="form-control" id="sueldoInicialNumber">
												<label for="sueldoInicialNumber">Sueldo Inicial</label>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="number" class="form-control" id="sueldoFinalNumber">
												<label for="sueldoFinalNumber">Sueldo Final</label>
											</div>
										</div>

									</div>

									<!-- Causas de retiro y descripción del puesto -->
									<div class="row g-2">
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="causaRetiroInput">
												<label for="causaRetiroInput">Causas de retiro</label>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="descripcionPuestoInput">
												<label for="descripcionPuestoInput">Descripción de Puesto</label>
											</div>
										</div>
									</div>
									<div class="h5 pb-2 mb-4 text-success border-bottom border-success">
										Trabajo anterior al último
									</div>

									<!-- Nombre y tipo de empresa -->
									<div class="row g-2">
										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="nombreEmpresaInput2">
													<label for="nombreEmpresaInput2">Nombre de la empresa</label>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="tipoEmpresaInput2">
													<label for="tipoEmpresaInput2">Tipo de Empresa</label>
												</div>
											</div>
										</div>
									</div>

									<!-- Dirección y teléfono de la empresa -->
									<div class="row g-2">
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="dirEmpresaInput2">
												<label for="dirEmpresaInput2">Dirección</label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="telEmpresaInput2">
												<label for="telEmpresaInput2">Teléfono</label>
											</div>
										</div>

									</div>

									<!-- Último puesto -- Jefe inmediato -- Numero del jefe -->
									<div class="row g-2">
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="ultimoPuestoInput2">
												<label for="ultimoPuestoInput2">Último puesto desempeñado</label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="jefeInmediatoInput2">
												<label for="jefeInmediatoInput2">Nombre Jefe Inmediato</label>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="telJefeInput2">
												<label for="telJefeInput2">Número Jefe Inmediato</label>
											</div>
										</div>
									</div>

									<!-- Fecha de ingreso -- fecha de retiro -- sueldo iniciar -- sueldo final -->
									<div class="row g-2">
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="date" class="form-control" id="ingresoDate2">
												<label for="ingresoDate2">Fecha de Ingreso</label>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="date" class="form-control" id="retiroDate2">
												<label for="retiroDate2">Fecha de Retiro</label>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="number" class="form-control" id="sueldoInicialNumber2">
												<label for="sueldoInicialNumber2">Sueldo Inicial</label>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="number" class="form-control" id="sueldoFinalNumber2">
												<label for="sueldoFinalNumber2">Sueldo Final</label>
											</div>
										</div>

									</div>

									<!-- Causas de retiro y descripción del puesto -->
									<div class="row g-2">
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="causaRetiroInput2">
												<label for="causaRetiroInput2">Causas de retiro</label>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="descripcionPuestoInput2">
												<label for="descripcionPuestoInput2">Descripción de Puesto</label>
											</div>
										</div>
									</div>
									<div class="row g-2 justify-content-end">
										<div class="col-6 d-flex justify-content-start align-items-center">
											<a class="btn app-btn-primary" id="anteriorRBtn">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
													<path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
													<path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
												</svg>
												Anterior
											</a>
										</div>
										<div class="col-6 d-flex justify-content-end align-items-center">
											<a class="btn app-btn-primary" id="siguienteRBtn">
												Siguiente
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
													<path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
													<path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
												</svg>
											</a>
										</div>
									</div>



								</div>
							</div>
						</div>
					</div>
				</div>

				<!--REFERENCIAS-->
				<div class="tab-pane fade show" id="referencias" role="tabpanel" aria-labelledby="referencias-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="app-card app-card-settings shadow-sm p-4">
								<div class="app-card-body">
									<div class="h5 pb-2  text-success border-bottom border-success">
										Referencias personales
									</div>
									<div class="aling-items-start mb-4">
										<span class="peque">Agregar mínimo dos referencias</span>
									</div>
									<div class="row g-2">

										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="nombreReferenciaInput" placeholder="">
													<label for="nombreReferenciaInput">Nombre</label>
												</div>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="profesionReferenciaInput" placeholder="">
													<label for="profesionReferenciaInput">Profesión</label>
												</div>
											</div>
										</div>
										<div class="col-md">
											<div class="form-floating">
												<div class="form-floating mb-3">
													<input type="input" class="form-control" id="telReferenciaInput" placeholder="">
													<label for="telReferenciaInput">Teléfono</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row g-2">

										<div class="col-md">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="dirReferenciaInput" placeholder="">
												<label for="dirReferenciaInput">Dirección</label>
											</div>
										</div>
										<div class="col-auto ">
											<a class="btn btn app-btn-primary" id="agregarReferenciaBtn">
												Agregar
											</a>
										</div>
									</div>

									<!--TABLA-->
									<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
										<div class="app-card app-card-orders-table shadow-sm mb-5">
											<div class="app-card-body">
												<div class="table-responsive">
													<table class="table app-table-hover mb-0 text-center" id="referenciasTabla">
														<thead>
															<tr>
																<th class="cell">Nombre</th>
																<th class="cell">Profesión</th>
																<th class="cell">Teléfono</th>
																<th class="cell">Dirección</th>
																<th class="cell" style="width: 100px">Acciones</th>
															</tr>
														</thead>
														<tbody>


														</tbody>
													</table>
												</div>

											</div>
										</div>


									</div>
									<div class="row g-2 justify-content-end">
										<div class="col-6 d-flex justify-content-start align-items-center">
											<a class="btn app-btn-primary" id="anteriorABtn">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
													<path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
													<path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
												</svg>
												Anterior
											</a>
										</div>
										<div class="col-6 d-flex justify-content-end align-items-center">
											<a class="btn app-btn-primary" id="siguienteABtn">
												Siguiente
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
													<path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
													<path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
												</svg>
											</a>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>

				<!--ADJUNTOS-->
				<div class="tab-pane fade show " id="adjuntos" role="tabpanel" aria-labelledby="adjuntos-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="app-card app-card-settings shadow-sm p-4">
								<div class="app-card-body">
									<div class="h5 pb-2 mb-4 text-success border-bottom border-success">
										Curriculum Vitae </div>
									<div class="col-md">
										<div class="mb-3">
											<input type="file" class="form-control " id="cvInput" accept=".pdf,.doc,.docx">
										</div>
									</div>
									<!--FOTO DE IDENTIDAD-->
									<div class="h5 pb-2 mb-4 text-success border-bottom border-success">
										Tarjeta de Identidad
									</div>
									<div class="row g-5 align-items-center mb-5">
										<div class="col-md-2">
											<img src="./assets/images/id-card.png" class="img-fluid  rounded " alt="..." id="idfotoFrontImg">
										</div>
										<div class="col-md">
											<div class="mb-3">
												<label for="idFotoInput">&nbspFrente</label>
												<input type="file" class="form-control " id="idfotoFrontInput" accept=".jpg,.png,.jpeg">
											</div>
										</div>
										<div class="col-md-2">
											<img src="./assets/images/id-card.png" class="img-fluid  rounded " alt="..." id="idfotoBackImg">
										</div>
										<div class="col-md">
											<div class="mb-3">
												<label for="idFotoInput">&nbspReverso</label>
												<input type="file" class="form-control " id="idfotoBackInput" accept=".jpg,.png,.jpeg">
											</div>
										</div>
									</div>

									<!--FOTO DE ANTECEDENTES-->
									<div class="h5 pb-2 mb-4 text-success border-bottom border-success ">
										Antecedentes
									</div>
									<div class="row g-5 align-items-center mb-5">

										<div class="col-md">
											<div class="mb-3">
												<label for="licenciaFotoInput">&nbsp Antecedentes Penales</label>
												<input type="file" class="form-control " id="penalesFotoInput" accept=".jpg,.png,.jpeg,.pdf">
											</div>
										</div>

										<div class="col-md">
											<div class="mb-3">
												<label for="licenciaFotoInput">&nbsp Antecedentes Policiales</label>
												<input type="file" class="form-control " id="policialesFotoInput" accept=".jpg,.png,.jpeg,.pdf">
											</div>
										</div>
									</div>

									<!--FOTO DE PASAPORTE-->
									<div class="h5 pb-2 mb-4 text-success border-bottom border-success esconder pasaporteDate">
										Pasaporte
									</div>
									<div class="row g-5 align-items-center esconder pasaporteDate mb-5">
										<div class="col-md-2">
											<img src="./assets/images/pasaporte.png" class="img-fluid rounded  " alt="..." id="pasaportefotoImg">
										</div>
										<div class="col-md">
											<div class="mb-3">
												<label for="licenciaFotoInput">&nbspFrente</label>
												<input type="file" class="form-control " id="pasaporteFotoInput" accept=".jpg,.png,.jpeg">
											</div>
										</div>


									</div>

									<!--FOTO DE LICENCIA DE CARRO-->
									<div class="h5 pb-2 mb-4 text-success border-bottom border-success esconder carroDate">
										Licencia de Vehículo
									</div>
									<div class="row g-5 align-items-center esconder carroDate mb-5 ">
										<div class="col-md-2">
											<img src="./assets/images/id-card.png" class="img-fluid rounded  " alt="..." id="licenciafotoFrontImg">
										</div>
										<div class="col-md">
											<div class="mb-3">
												<label for="licenciaFotoInput">&nbspFrente</label>
												<input type="file" class="form-control " id="licenciaFotoFrontInput" accept=".jpg,.png,.jpeg">
											</div>
										</div>
										<div class="col-md-2">
											<img src="./assets/images/id-card.png" class="img-fluid rounded  " alt="..." id="licenciafotoBackImg">
										</div>
										<div class="col-md">
											<div class="mb-3">
												<label for="licenciaFotoInput">&nbspReverso</label>
												<input type="file" class="form-control " id="licenciaFotoBackInput" accept=".jpg,.png,.jpeg">
											</div>
										</div>

									</div>
									<!--FOTO DE LICENCIA DE MOTO-->
									<div class="h5 pb-2 mb-4 text-success border-bottom border-success esconder motoDate">
										Licencia de Motocicleta
									</div>
									<div class="row g-5 align-items-center esconder motoDate mb-5 ">
										<div class="col-md-2">
											<img src="./assets/images/id-card.png" class="img-fluid rounded  " alt="..." id="licenciaMotofotoFrontImg">
										</div>
										<div class="col-md">
											<div class="mb-3">
												<label for="licenciaFotoInput">&nbspFrente</label>
												<input type="file" class="form-control " id="licenciaMotoFotoFrontInput" accept=".jpg,.png,.jpeg">
											</div>
										</div>
										<div class="col-md-2">
											<img src="./assets/images/id-card.png" class="img-fluid rounded  " alt="..." id="licenciaMotoBackfotoImg">
										</div>
										<div class="col-md">
											<div class="mb-3">
												<label for="licenciaFotoInput">&nbspReverso</label>
												<input type="file" class="form-control " id="licenciaMotoFotoBackInput" accept=".jpg,.png,.jpeg">
											</div>
										</div>

									</div>


									<!-- ------------------------------------ -->
									<div class="row g-2 justify-content-end">
										<div class="col-6 d-flex justify-content-start align-items-center">
											<a class="btn app-btn-primary" id="anteriorBtn">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
													<path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
													<path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
												</svg>
												Anterior
											</a>
										</div>
										<div class="col-6 d-flex justify-content-end align-items-center">
											<a class="btn app-btn-primary" id="revisarBtn">
												Revisar todo
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
													<path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
													<path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
												</svg>
											</a>
										</div>
									</div>

								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>