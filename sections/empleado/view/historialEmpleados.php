<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<!-- ---------------------------------- -->
			<div class="h5 pb-2 mb-4 text-success border-bottom border-success">
				Datos Generales
			</div>

			<!-- CARD -->
			<div class="row ">
				<div class="app-card app-card-settings shadow-sm p-4">

					<div class="app-card-body" id="alerta">
						
						<!-- ---------------------------------- -->
						<div class="row mt-3">
							<!-- No. de identidad -->
							<div class="col-md-3">
								<div>
									<div class=" mb-3">
										<label for="noIdentidad">No. de Identidad</label>
										<input type="input" class="form-control" id="noIdentidad" disabled>
									</div>
								</div>
							</div>
							<!-- Nombre -->
							<div class="col-md-5">
								<div>
									<div class=" mb-3">
										<label for="nombreInput">Nombre</label>
										<input type="input" class="form-control" id="nombreInput" disabled>
									</div>
								</div>
							</div>
							<!-- Codigo de empleado -->
							<div class="col-md">
								<div>
									<div class=" mb-3">
										<label for="codigoEmpleadoInput">Código de empleado</label>
										<input type="input" class="form-control " id="codigoEmpleado">
									</div>
								</div>
							</div>
							<!-- Codigo SAP -->
							<div class="col-md">
								<div>
									<div class=" mb-3">
										<label for="codigoSAPInput">Código de SAP</label>
										<input type="input" class="form-control" id="codigoSAP">
									</div>
								</div>
							</div>
						</div>
						<!-- ---------------------------------- -->
						<div class="row mt-3">
							<!-- Fecha de Inicio -->
							<div class="col-md">
								<div>
									<div class=" mb-3">
										<label for="inicioDate">Ingreso a la empresa</label>
										<input type="date" class="form-control text-end" id="ingreso">
									</div>
								</div>
							</div>
							<!-- Vacaciones  -->
							<div class="col-md">
								<div>
									<label for="vacaciones">Vacaciones</label>
									<input type="number" min="0" class="form-control text-end" id="vacaciones">
								</div>
							</div>
							<!-- Teléfono Asignado -->
							<div class="col-md">
								<div>
									<label for="TelefonoEmpresa">No. Tel Asignado</label>
									<input type="input" class="form-control text-end" id="telefonoAsignado">
								</div>
							</div>
							<!-- Usuario Asignado -->
							<div class="col-md">
								<div>
									<label for="TelefonoEmpresa">Usuario asignado</label>
									<select class="form-select" id="usuarioAsignado"></select>
								</div>
							</div>
						</div>
						<!-- Acordeón -->
						<div class="accordion accordion-flush" id="accordionFlushExample">
							<div class="accordion-item">
								<a class="accordion-header text-success border-bottom">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-dotted text-info" viewBox="0 0 16 16">
											<path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
										</svg>&nbsp
										Agregar más información
									</button>
								</a>
								<div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
									<!-- ---------------------------------- -->
									<div class="row mt-3">
										<div class="col-md align-items-center">
											<div>
												<div class="">
													<label for="proyectos">Proyecto</label>
													<select class="form-select proyecto " id="proyectos">

													</select>
												</div>
											</div>
										</div>
										<!-- TDR -->
										<div class="col-md align-items-center ">
											<div>
												<div class=" mb-3">
													<label for="TDRSelect">Puesto</label>
													<select class="form-control" id="TDRSelect">

													</select>
												</div>
											</div>
										</div>
										<!-- Jefé Inmediato -->
										<div class="col-md">
											<div>
												<label for="jefeInmediato">Jefe Inmediato</label>
												<div class=" mb-3">
													<select class="form-select" id="jefeInmediato">

													</select>
												</div>
											</div>
										</div>


									</div>

									<!-- ---------------------------------- -->
									<div class="row mt-3">
										<div class="col-md align-items-center ">
											<div>
												<div>
													<label for="zonaSelect">Zona Asignada</label>
													<select class="form-select  " id="zonaSelect">

													</select>
												</div>
											</div>
										</div>
										<div class="col-md align-items-center ">
											<div>
												<div>
													<label for="sitio">Sitio</label>
													<input type="input" class="form-control text-end" id="sitio">
												</div>
											</div>
										</div>


										<!-- Inicio en el puesto -->
										<div class="col-md">
											<div>
												<label for="vacaciones">Inicio en el puesto</label>
												<input type="date" min="0" class="form-control text-end" id="inicioPuesto">
											</div>
										</div>
										<!-- Salario -->
										<div class="col-md">
											<div>
												<div class=" mb-3">
													<label for="salarioInput">Salario</label>
													<input type="number" class="form-control text-end" id="salario">
												</div>
											</div>
										</div>

									</div>

									<div class="row d-flex justify-content-end">
										<div class="col-12 col-lmt-3 d-flex justify-content-end">
											<a class="btn app-btn-primary" id="guardarBtn">
												Guardar
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="col-auto d-flex justify-content-end">
				<a class="btn text-primary" id="edicion">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
						<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
					</svg>
					Editar Empleado
				</a>
			</div>



			<div class="h5 pb-2 mt-4 mb-4 text-success border-bottom border-success">
				Historial
			</div>
			<div class="row" id="contenedorDetalle">

			</div>
			<!--SEARCH-->
			<div class="col-auto mt-2 mr-2">
				<div class="page-utilities">
					<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
						<div class="col-auto">
							<a class="btn text-danger" id="retirar">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
									<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
								</svg>
								Retirar Empleado
							</a>
						</div>

					</div>
				</div>
			</div>


		</div>
	</div>
</div>