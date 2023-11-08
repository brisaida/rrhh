<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<ul class="nav nav-underline">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page">MI PERFIL</a>
				</li>
				<li class="nav-item">
					<a class="nav-link cursor-pointer" id="adjuntosPage">Adjuntos</a>
				</li>
			</ul>
			<div class="row gy-4">

				<!-- Datos generales -->
				<div class="col-12 col-lg-6">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						<div class="app-card-header p-3 border-bottom-0">
							<div class="row align-items-center gx-3">
								<div class="col-auto">
									<div class="app-icon-holder">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
										</svg>
									</div><!--//icon-holder-->

								</div>
								<div class="col-auto">
									<h4 class="app-card-title">Datos Generales</h4>
								</div>
							</div>
						</div><!--//app-card-header-->
						<div class="app-card-body px-4 w-100">

							<!-- No. de identidad y nombre -->
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>No. de Identidad</strong></div>
										<div class="item-data" id="noIdentidad"></div>
									</div>
									<div class="col-md">
										<div class="item-label"><strong>Nombre Completo</strong></div>
										<div class="item-data text-start" id="nombreCompleto"></div>
									</div>
								</div>
							</div>
							<!-- Fecha y lugar de nacimiento -->
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Fecha de Nacimiento</strong></div>
										<div class="item-data" id="fechaNacimiento"></div>
									</div>
									<div class="col-md">
										<div class="item-label"><strong>Lugar de Nacimiento</strong></div>
										<div class="item-data text-start" id="lugarNacimiento"></div>
									</div>

								</div>
							</div>
							<!-- Nacionalidad y Género -->
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Nacionalidad</strong></div>
										<div class="item-data" id="nacionalidad"></div>
									</div>
									<div class="col-md">
										<div class="item-label"><strong>Género</strong></div>
										<div class="item-data" id="genero"></div>
									</div>

								</div>
							</div>
							<!-- Estado Civil -->
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Estado Civil</strong></div>
										<div class="item-data" id="estadoCivil"></div>
									</div>
									<div class="col text-center">
										<a class="btn-sm app-btn-secondary" id="estadoCivilEdit">Modificar</a>
									</div>
								</div>
							</div>
							<!-- Telefono -->
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Teléfono</strong></div>
										<div class="item-data" id="telefono"></div>
									</div>
									<div class="col text-center">
										<a class="btn-sm app-btn-secondary" id="telefonoEdit">Modificar</a>
									</div>
								</div>
							</div>
							<!-- Correo electronico -->
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Correo Electronico</strong></div>
										<div class="item-data" id="email"></div>
									</div>
									<div class="col text-center">
										<a class="btn-sm app-btn-secondary" id="emailEdit">Modificar</a>
									</div>
								</div>
							</div>
						</div>

					</div><!--//app-card-->
				</div>
				<!-- Dirección -->
				<div class="col-12 col-lg-6">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						<div class="app-card-header p-3 border-bottom-0">
							<div class="row align-items-center gx-3">
								<div class="col-auto">
									<div class="app-icon-holder">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
										</svg>
									</div><!--//icon-holder-->

								</div>
								<div class="col-auto">
									<h4 class="app-card-title">Dirección</h4>
								</div>
							</div>
						</div><!--//app-card-header-->
						<div class="app-card-body px-4 w-100">

							<div class="col-md">
								<div class="item-data" style="font-size: 12px;">Para modificar la dirección arrastra el marcador a la ubicación nueva</div>
								<div id="map" style="  height: 300px!important"></div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<div class="item-label"><strong>Dirección</strong></div>
										<div class="item-label"><input type="text" class="form-control" id="nuevaDireccion"></div>
										<div class="item-data" id="direccion1"></div>
										<div class="item-data" id="direccion"></div>
										<div class="item-data" id="lat"></div>
										<div class="item-data" id="long"></div>
									</div>
									<div class="col text-end">
										<a class="btn-sm app-btn-secondary" id="direccionEdit">Guardar</a>
									</div>
								</div>
							</div>

						</div>

					</div><!--//app-card-->
				</div>
				<!-- Información Médica -->
				<div class="col-12 col-lg-5">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						<div class="app-card-header p-3 border-bottom-0">
							<div class="row align-items-center gx-3">
								<div class="col-auto">
									<div class="app-icon-holder">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse" viewBox="0 0 16 16">
											<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Z" />
											<path d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z" />
										</svg>
									</div><!--//icon-holder-->

								</div>
								<div class="col-auto">
									<h4 class="app-card-title">Información Médica</h4>
								</div>
							</div>
						</div><!--//app-card-header-->
						<div class="app-card-body px-4 w-100">

							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-start">
									<div class="col-md">
										<div class=" item-label"><strong>Contacto de Emergencia</strong></div>
										<div class=" item-data" id="emergencia1"></div>
										<div class=" item-data" id="tel1"></div>
										<a class="btn-sm app-btn-secondary" id="emergenciasEdit">Modificar</a>


									</div>
									<div class="col-md text-center">
										<div class=" item-label"><strong>.</strong></div>
										<div class=" item-data text-center" id="emergencia2"></div>
										<div class=" item-data text-center" id="tel2"></div>
										<a class="btn-sm app-btn-secondary" id="emergencias2Edit">Modificar</a>


									</div>


								</div>

							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label "><strong>Enfermedades de base</strong></div>
										<div class="item-data" id="enfermedades"></div>
										<a class="btn-sm app-btn-secondary" id="enfermedadesEdit">Modificar</a>
									</div>
									<div class="col-md">
										<div class="item-label text-center"><strong>Tipo de Sangre</strong></div>
										<div class="item-data text-center" id="tipoSangre"></div>
									</div>

								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Médico de Cabecera</strong></div>
										<div class="item-data" id="medico"></div>
										<div class="item-data" id="telMedico"></div>
									</div>
									<div class="col text-center">
										<a class="btn-sm app-btn-secondary" id="medicoEdit">Modificar</a>
									</div>
								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Centro Médico de Preferencia</strong></div>
										<div class="item-data" id="centroMedico"></div>
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
										</div>
									</div>
									<div class="col text-center">
										<a class="btn-sm app-btn-secondary" id="centroMedicoEdit">Modificar</a>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				<!-- Hisotrial Familiar -->
				<div class="col-12 col-lg-7">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						<div class="app-card-header p-3 border-bottom-0">
							<div class="row align-items-center gx-3">
								<div class="col-auto">
									<div class="app-icon-holder">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
											<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
										</svg>
									</div><!--//icon-holder-->

								</div>
								<div class="col-auto">
									<h4 class="app-card-title">Historial Familiar</h4>
								</div>
							</div>
						</div><!--//app-card-header-->
						<div class="app-card-body px-4 w-100">
							<div class="item border-bottom py-3">
								<table class="table app-table-hover mb-0 text-left" id="parentescoTabla">
									<thead>
										<tr>
											<th class="cell">Parentesco</th>
											<th class="cell">Nombre</th>
											<th class="cell">Edad</th>
											<th class="cell">Teléfono</th>
											<th class="cell">Dirección</th>
											<th class="cell">Acciones</th>
										</tr>
									</thead>
									<tbody>


									</tbody>
								</table>
								<div class="col text-end mt-3">
									<a class="btn-sm app-btn-secondary" id="agregarFamiliar">Agregar nuevo</a>
								</div>
							</div>
						</div>
						<div class="app-card-body px-4 w-100">
							<div class="item  py-3">
								<div class="row">
									<div class="col-md">
										<select class="form-select form-select-sm esconder" id="parentesco" aria-label="Small select example">
											<option selected>Parentesco</option>
											<option value="Padre">Padre</option>
											<option value="Madre">Madre</option>
											<option value="Conyugue">Conyugué</option>
											<option value="Hijo">Hijo(a)</option>
										</select>
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-md">
										<input class="form-control form-control-sm esconder" type="text" id="nombre" placeholder="Nombre">

									</div>
									<div class="col-md">
										<input class="form-control form-control-sm esconder" type="date" id="fecha">
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-md">
										<input class="form-control form-control-sm esconder" type="text" id="tel" placeholder="Teléfono">

									</div>
									<div class="col-md">
										<input class="form-control form-control-sm esconder" type="text" id="dir" placeholder="Dirección">
									</div>
								</div>
								<div class="col text-end mt-3">
									<a class="btn-sm esconder app-btn-secondary" id="guardarFamiliar">Guardar</a>
								</div>
							</div>
						</div>




					</div><!--//app-card-->
				</div>
				<!-- Educación -->
				<div class="col-12 col-lg-12">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						<div class="app-card-header p-3 border-bottom-0">
							<div class="row align-items-center gx-3">
								<div class="col-auto">
									<div class="app-icon-holder">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
											<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
										</svg>
									</div><!--//icon-holder-->

								</div>
								<div class="col-auto">
									<h4 class="app-card-title">Educación</h4>
								</div>
							</div>
						</div><!--//app-card-header-->
						<div class="app-card-body px-4 w-100">
							<div class="item border-bottom py-3">
								<table class="table app-table-hover mb-0 text-left" id="educacionTabla">
									<thead>
										<tr>
											<th class="cell">Nivel</th>
											<th class="cell">Centro Educativo</th>
											<th class="cell">Titulación</th>
											<th class="cell">desde</th>
											<th class="cell">hasta</th>
											<th class="cell">Lugar</th>
										</tr>
									</thead>
									<tbody>


									</tbody>
								</table>
								<div class="col text-end mt-3">
									<a class="btn-sm app-btn-secondary" id="educacionEdit">Agregar nuevo</a>
								</div>

							</div>

						</div>




					</div><!--//app-card-->
				</div>

				<!-- Idiomas -->
				<div class="col-12 col-lg-6">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						<div class="app-card-header p-3 border-bottom-0">
							<div class="row align-items-center gx-3">
								<div class="col-auto">
									<div class="app-icon-holder">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
											<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
										</svg>
									</div><!--//icon-holder-->

								</div>
								<div class="col-auto">
									<h4 class="app-card-title">Idiomas</h4>
								</div>
							</div>
						</div><!--//app-card-header-->
						<div class="app-card-body px-4 w-100">

							<div class="item border-bottom py-3" id="idiomas">
								<table class="table app-table-hover mb-0 text-left" id="idiomasTabla">
									<thead>
										<tr>
											<th class="cell text-center">Idioma</th>
											<th class="cell text-center">Nivel</th>
											<th class="cell text-center">Acciones</th>
										</tr>
									</thead>
									<tbody>


									</tbody>
								</table>
								<div class="col text-end mt-3">
									<a class="btn-sm app-btn-secondary" id="agregarIdioma">Agregar</a>
								</div>
							</div>

						</div>

					</div>
				</div>
				<!-- Estudios Actuales -->
				<div class="col-12 col-lg-6">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						<div class="app-card-header p-3 border-bottom-0">
							<div class="row align-items-center gx-3">
								<div class="col-auto">
									<div class="app-icon-holder">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
											<path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
											<path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
										</svg>
									</div><!--//icon-holder-->

								</div>
								<div class="col-auto">
									<h4 class="app-card-title">Estudiando</h4>
								</div>
							</div>
						</div><!--//app-card-header-->
						<div class="app-card-body px-4 w-100">
							<div class="item pb-2 " id="actual">
								<!-- No. de identidad y nombre -->
								<div class="item border-bottom ">
									<div class="row justify-content-between align-items-center">
										<div class="col-md mb-2">
											<div class="item-label"><strong>Carrera/Curso</strong></div>
											<div class="item-data" id="curso"></div>
										</div>
										<div class="col-md mb-2">
											<div class="item-label"><strong>Horario</strong></div>
											<div class="item-data" id="horarios"></div>
										</div>
									</div>
									<div class="row justify-content-between align-items-center">
										<div class="col-md mb-2">
											<div class="item-label"><strong>Fecha Finalización</strong></div>
											<div class="item-data" id="final"></div>
										</div>
									</div>
									<div class="col text-end mt-3">
										<a class="btn-sm app-btn-secondary" id="marcarFinalizado">Marcar como Finalizado</a>
									</div>
								</div>
							</div>
							<div class="item py-3" id="noHayEstudios">
								<p class="app-card-title text-center" style="font-size: 13px;">No hay estudios actuales</p>
								<div class="col text-center mt-3">
									<a class="btn-sm app-btn-secondary" id="agregarEstudios">Agregar</a>
								</div>
							</div>

							<div class="app-card-body px-4 w-100">
								<div class="item  py-3">

									<div class="row mt-2 ocultar">
										<div class="col-md">
											<input class="form-control form-control-sm " type="text" id="titulo" placeholder="Curso/Diplomado">

										</div>
									</div>
									<div class="row mt-2 ocultar">
										<div class="col-md">
											<label class="peque">Horario inicio</label>
											<input class="form-control form-control-sm " type="time" id="hora1" placeholder="horario1">
										</div>
										<div class="col-md">
											<label class="peque">Horario final</label>
											<input class="form-control form-control-sm " type="time" id="hora2" placeholder="horario2">
										</div>
									</div>
									<div class="row mt-2 ocultar">
										<div class="col-md">
											<label class="peque">Fecha de finalización</label>
											<input class="form-control form-control-sm " type="date" id="finalizacion">

										</div>
									</div>
									<div class="col text-end mt-3 ocultar">
										<a class="btn-sm  app-btn-secondary" id="guardarEstudios">Guardar</a>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

				<!-- Antecedentes Laborales -->
				<div class="col-12 col-lg-6">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						<div class="app-card-header p-3 border-bottom-0">
							<div class="row align-items-center gx-3">
								<div class="col-auto">
									<div class="app-icon-holder">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suitcase-lg" viewBox="0 0 16 16">
											<path d="M5 2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2h3.5A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5H14a.5.5 0 0 1-1 0H3a.5.5 0 0 1-1 0h-.5A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2H5Zm1 0h4a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1ZM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5H3V3H1.5ZM15 12.5v-9a.5.5 0 0 0-.5-.5H13v10h1.5a.5.5 0 0 0 .5-.5Zm-3 .5V3H4v10h8Z" />
										</svg>
									</div><!--//icon-holder-->

								</div>
								<div class="col-auto">
									<h4 class="app-card-title">Último Trabajo</h4>
								</div>
							</div>
						</div><!--//app-card-header-->
						<div class="app-card-body px-4 w-100">

							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Ultimo Trabajo</strong></div>
									</div>
								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Nombre de la Empresa</strong></div>
										<div class="item-data" id="empresa1"></div>
									</div>
									<div class="col-md">
										<div class="item-label"><strong>Tipo de Empresa</strong></div>
										<div class="item-data text-start" id="tipoEmpresa"></div>
									</div>

								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Dirección</strong></div>
										<div class="item-data" id="direccionEmpresa"></div>
									</div>
									<div class="col-md">
										<div class="item-label"><strong>No. de Telefono</strong></div>
										<div class="item-data" id="telEmpresa"></div>
									</div>

								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Último puesto desempeñado</strong></div>
										<div class="item-data" id="ultimoPuesto"></div>
									</div>

								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Jefe Inmediato</strong></div>
										<div class="item-data" id="jefeInmediato"></div>
									</div>
									<div class="col-md">
										<div class="item-label"><strong>Teléfono Jefe Inmediato</strong></div>
										<div class="item-data" id="teljefe"></div>
									</div>
								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Fecha de Ingreso</strong></div>
										<div class="item-data" id="ingreso"></div>
									</div>
									<div class="col-md">
										<div class="item-label"><strong>Fecha de Retiro</strong></div>
										<div class="item-data" id="retiro"></div>
									</div>
								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Sueldo Inicial</strong></div>
										<div class="item-data" id="sueldoInicio"></div>
									</div>
									<div class="col-md">
										<div class="item-label"><strong>Sueldo Final</strong></div>
										<div class="item-data" id="sueldoFinal"></div>
									</div>
								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Causa de Retiro</strong></div>
										<div class="item-data" id="causaRetiro"></div>
									</div>
								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Descripción del puesto</strong></div>
										<div class="item-data" id="descripcion"></div>
									</div>
								</div>
							</div>
						</div>

					</div><!--//app-card-->
				</div>
				<div class="col-12 col-lg-6">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						<div class="app-card-header p-3 border-bottom-0">
							<div class="row align-items-center gx-3">
								<div class="col-auto">
									<div class="app-icon-holder">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suitcase-lg" viewBox="0 0 16 16">
											<path d="M5 2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2h3.5A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5H14a.5.5 0 0 1-1 0H3a.5.5 0 0 1-1 0h-.5A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2H5Zm1 0h4a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1ZM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5H3V3H1.5ZM15 12.5v-9a.5.5 0 0 0-.5-.5H13v10h1.5a.5.5 0 0 0 .5-.5Zm-3 .5V3H4v10h8Z" />
										</svg>
									</div><!--//icon-holder-->

								</div>
								<div class="col-auto">
									<h4 class="app-card-title">Penúltimo Trabajo</h4>
								</div>
							</div>
						</div><!--//app-card-header-->
						<div class="app-card-body px-4 w-100">

							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Ultimo Trabajo</strong></div>
									</div>
								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Nombre de la Empresa</strong></div>
										<div class="item-data" id="empresa2"></div>
									</div>
									<div class="col-md">
										<div class="item-label"><strong>Tipo de Empresa</strong></div>
										<div class="item-data text-start" id="tipoEmpresa2"></div>
									</div>

								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Dirección</strong></div>
										<div class="item-data" id="direccionEmpresa2"></div>
									</div>
									<div class="col-md">
										<div class="item-label"><strong>No. de Telefono</strong></div>
										<div class="item-data" id="telEmpresa2"></div>
									</div>

								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Último puesto desempeñado</strong></div>
										<div class="item-data" id="ultimoPuesto2"></div>
									</div>

								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Jefe Inmediato</strong></div>
										<div class="item-data" id="jefeInmediato2"></div>
									</div>
									<div class="col-md">
										<div class="item-label"><strong>Teléfono Jefe Inmediato</strong></div>
										<div class="item-data" id="telJefe2"></div>
									</div>
								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Fecha de Ingreso</strong></div>
										<div class="item-data" id="ingreso2"></div>
									</div>
									<div class="col-md">
										<div class="item-label"><strong>Fecha de Retiro</strong></div>
										<div class="item-data" id="retiro2"></div>
									</div>
								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Sueldo Inicial</strong></div>
										<div class="item-data" id="sueldoInicio2"></div>
									</div>
									<div class="col-md">
										<div class="item-label"><strong>Sueldo Final</strong></div>
										<div class="item-data" id="sueldoFinal2"></div>
									</div>
								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Causa de Retiro</strong></div>
										<div class="item-data" id="causaRetiro2"></div>
									</div>
								</div>
							</div>
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Descripción del puesto</strong></div>
										<div class="item-data" id="descripcion2"></div>
									</div>
								</div>
							</div>
						</div>

					</div><!--//app-card-->
				</div>
			</div>

		</div>
	</div>



</div>