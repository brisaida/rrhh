<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<!-- ---------------------------------- -->
			<div class="row gy-4">
				<div class="app-card app-card-settings shadow-sm p-4">

					<div class="h5 pb-2 mb-4 text-success border-bottom border-success">
						Ingresar información
					</div>
					<div class="app-card-body">

						<!-- ---------------------------------- -->
						<div class="row g-2">
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
										<input type="input" class="form-control " id="codigoEmpleadoInput">
									</div>
								</div>
							</div>
							<!-- Codigo SAP -->
							<div class="col-md">
								<div>
									<div class=" mb-3">
										<label for="codigoSAPInput">Código de SAP</label>
										<input type="input" class="form-control" id="codigoSAPInput">
									</div>
								</div>
							</div>
						</div>
						<!-- ---------------------------------- -->
						<div class="row g-2">

							<!-- Fecha de Inicio -->
							<div class="col-md">
								<div>
									<div class=" mb-3">
										<label for="inicioDate">Fecha de Inicio</label>
										<input type="date" class="form-control text-end" id="inicioDate">
									</div>
								</div>
							</div>
							<!-- Fecha de Retiro -->
							<div class="col-md">
								<div>
									<div class=" mb-3">
										<label for="retiroInput">Fecha de Retiro</label>
										<input type="date" class="form-control text-end" id="retiroInput">
									</div>
								</div>
							</div>
							<div class="col-md align-items-center ">
								<div>
									<div>
										<label for="zonaSelect">Zona Asignada</label>
										<select class="form-select  " id="zonaSelect" aria-label="Floating label select example">
											
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
							
						</div>
						<!-- ---------------------------------- -->
						<div class="row g-2">

							<!-- Salario -->
							<div class="col-md">
								<div>
									<div class=" mb-3">
										<label for="salarioInput">Salario</label>
										<input type="number" class="form-control text-end" id="salarioInput">
									</div>
								</div>
							</div>
							
							<!-- Jefé Inmediato -->
							<div class="col-md">
								<div>
									<label for="vacaciones">Vacaciones Disponibles</label>
									<input type="number" min="0" class="form-control text-end" id="vacaciones">
								</div>
							</div>
							<!-- Jefé Inmediato -->
							<div class="col-md">
								<div>
									<label for="TelefonoEmpresa">No. de teléfono asignado</label>
									<input type="input" class="form-control text-end" id="TelefonoEmpresa">
								</div>
							</div>
						</div>
						<!-- ---------------------------------- -->
						<div class="row g-2">

							
							<div class="col-md align-items-center">
								<div>
									<div class="">
										<label for="proyectos">Proyecto</label>
										<select class="form-select proyecto " id="proyectos" aria-label="Floating label select example">
											
										</select>
									</div>
								</div>
							</div>
							<!-- TDR -->
							<div class="col-md align-items-center ">
								<div>
									<div class=" mb-3">
										<label for="TDRSelect">Puesto</label>
										<select class="form-control" id="TDRSelect" aria-label="Floating label select example">

										</select>
									</div>
								</div>
							</div>
							<!-- Jefé Inmediato -->
							<div class="col-md">
								<div>
									<label for="jefeInmediato">Jefe Inmediato</label>
									<div class=" mb-3">
										<select class="form-select  " id="jefeInmediato" aria-label="Floating label select example">

										</select>
									</div>
								</div>
							</div>


						</div>
						<!-- ---------------------------------- -->
						<div class="row g-2 ">
							<!-- Zona -->

							
							
						</div>
						<div class="row d-flex justify-content-center">
							<div class="col-12 col-lg-2 ">
								<a class="btn app-btn-primary" id="guardarBtn">
									Guardar
								</a>
							</div>
						</div>
						<!-- Guardar -->

					</div>
					<!-- ---------------------------------- -->
					<div class="h5 pb-2 mt-4 mb-4 text-success border-bottom border-success">
						Historial
					</div>
					<div class="app-card-body">
						<!--Tabla historial-->
						<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
							<div class="app-card app-card-orders-table shadow-sm mb-5">
								<div class="app-card-body">
									<div class="table-responsive">
										<table class="table app-table-hover mb-0 text-left" id="historialEmpleadoTabla">
											<thead>
												<tr class="text-center">
													<th class="cell" style="width: 25%;">Proyecto</th>
													<th class="cell" style="width: 25%;">Puesto</th>
													<th class="cell" style="width: 20%;">Jefe Inmediato</th>
													<th class="cell" style="width: 10%;">Fecha de Inicio</th>
													<th class="cell" style="width: 10%;">Fecha de retiro</th>
													<th class="cell" style="width: 10%;">Salario</th>
												</tr>

											</thead>
											<tbody>

												



											</tbody>
										</table>
									</div>

								</div>
							</div>
							<nav class="app-pagination">
								<ul class="pagination justify-content-center">
									<li class="page-item disabled">
										<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
									</li>
									<li class="page-item active"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item">
										<a class="page-link" href="#">Siguiente</a>
									</li>
								</ul>
							</nav>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>