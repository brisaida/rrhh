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
							<div class="col-md-2">
								<div>
									<div class=" mb-3">
										<label for="inicioDate">Fecha de Inicio</label>
										<input type="date" class="form-control text-end" id="inicioDate">
									</div>
								</div>
							</div>
							<!-- Fecha de Retiro -->
							<div class="col-md-2">
								<div>
									<div class=" mb-3">
										<label for="retiroInput">Fecha de Retiro</label>
										<input type="date" class="form-control text-end" id="retiroInput">
									</div>
								</div>
							</div>
							<div class="col-md-2 align-items-center ">
								<div>
									<div>
										<label for="zonaSelect">Zona Asignada</label>
										<select class="form-select  " id="zonaSelect" aria-label="Floating label select example">
											<option selected class="text-end"></option>
											<option value="1" class="text-end">Cortés &nbsp</option>
											<option value="2" class="text-end">Copán &nbsp</option>
											<option value="2" class="text-end">Siguatepeque &nbsp</option>
											<option value="3" class="text-end">Santa Barbara &nbsp</option>
											<option value="4" class="text-end">Intibuca &nbsp</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md align-items-center">
								<div>
									<div class="">
										<label for="zonaSelect">Proyecto</label>
										<select class="form-select  " id="zonaSelect" aria-label="Floating label select example">
											<option selected class="text-end"></option>
											<option value="1" class="text-end">Cortés &nbsp</option>
											<option value="2" class="text-end">Copán &nbsp</option>
											<option value="2" class="text-end">Siguatepeque &nbsp</option>
											<option value="3" class="text-end">Santa Barbara &nbsp</option>
											<option value="4" class="text-end">Intibuca &nbsp</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<!-- ---------------------------------- -->
						<div class="row g-2 ">
							<!-- Zona -->

							<!-- TDR -->
							<div class="col-md align-items-center ">
								<div>
									<div class=" mb-3">
										<label for="TDRSelect">Puesto</label>
										<select class="form-select  " id="TDRSelect" aria-label="Floating label select example">

										</select>
									</div>
								</div>
							</div>
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
									<label for="salarioInput">Jefe Inmediato</label>
									<div class=" mb-3">
										<select class="form-select  " id="zonaSelect" aria-label="Floating label select example">

										</select>
									</div>
								</div>
							</div>
							<!-- Jefé Inmediato -->
							<div class="col-md-2">
								<div>
									<label for="salarioInput">Vacaciones Disponibles</label>
									<input type="number" class="form-control text-end" id="salarioInput">


								</div>
							</div>
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
													<th class="cell">TDR</th>
													<th class="cell">Fecha de Inicio</th>
													<th class="cell">Fecha de retiro</th>
													<th class="cell">Salario</th>
													<th class="cell">Acciones</th>
												</tr>

											</thead>
											<tbody>

												<tr class="text-center">
													<td class="cell">Gerente de Comunicaciones</td>
													<td class="cell">20/Agosto/2023</td>
													<td class="cell"> -- </td>
													<td class="cell"> L35000 </td>
													<td class="cell">

														<a href="?section=empleado" type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Editar" data-bs-html="true">
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
																<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
															</svg>
														</a>

													</td>
													</td>
												</tr>



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