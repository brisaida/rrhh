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

					<div class="app-card-body " id="alerta">

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

						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Detalle del Puesto</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										
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
										


									</div>
									<div class="modal-footer">
										<div class="row g-2 justify-content-start justify-content-md-start align-items-center">
											<div class="col-auto">
												<a class="btn text-danger" id="retirar">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
														<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
													</svg>
													Retirar Empleado
												</a>
											</div>

										</div>
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
										<button type="button" class="btn app-btn-primary" id="guardarBtn">Guardar</button>
									</div>
								</div>
							</div>
						</div>

						<!-- Botón para activar el modal -->
						<div class="row">
							<div class="col-md d-flex justify-content-end">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="modal">
									Detalle del puesto
								</button>
							</div>

						</div>


					</div>

				</div>
			</div>
			<!-- <div class="col-auto d-flex justify-content-end">
				<a class="btn text-primary" id="edicion">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
						<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
					</svg>
					Editar Empleado
				</a>
			</div> -->



			<div class="h5 pb-2 mt-4 mb-4 text-success border-bottom border-success">
				Historial
			</div>
			<div class="row" id="contenedorDetalle">

			</div>
			<!--SEARCH-->
			<div class="col-auto mt-2 mr-2">
				<div class="page-utilities">

				</div>
			</div>


		</div>
	</div>
</div>