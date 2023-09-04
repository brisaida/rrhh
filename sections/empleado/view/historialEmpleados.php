<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row gy-4">
				<!--DATOS GENERALES-->
				<div class="app-card app-card-settings shadow-sm p-4">

					<div class="app-card-header p-3 border-bottom-0">
						<div class="row align-items-center gx-3">

							<div class="col-12 ">
								<h4 class="app-card-title text-center">Historial del Empleado</h4>
							</div>
						</div>
					</div>
					<div class="app-card-body">

						<!--Nombre del perfil-->
						<div class="row g-2">
							<div class="col-md-3">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="noIdentidad">
										<label for="noIdentidad">No. de Identidad</label>
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="nombreInput">
										<label for="nombreInput">Nombre</label>
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control " id="nombreInput">
										<label for="nombreInput">Código de empleado</label>
									</div>
								</div>
							</div>

						</div>

						<div class="row g-2">
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="nombreInput">
										<label for="nombreInput">Código de SAP</label>
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="date" class="form-control text-end" id="iniciodate">
										<label for="inicioInput">Fecha de Inicio</label>
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="date" class="form-control text-end" id="retiroInput">
										<label for="retiroInput">Fecha de Retiro</label>
									</div>
								</div>
							</div>


						</div>
						<div class="row g-2">
							<div class="col-md align-items-center mb-5">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<select class="form-select  " id="tipoSangreSelect" aria-label="Floating label select example">
											<option selected class="text-end"></option>
											<option value="1" class="text-end">Especialista IT &nbsp</option>
											<option value="2" class="text-end">Director de Proyecto &nbsp</option>
											<option value="2" class="text-end">Encargado de compras &nbsp</option>
											<option value="3" class="text-end">Gerente de Comunicaciones &nbsp</option>
											<option value="4" class="text-end">Asistente de Contabilidad &nbsp</option>
										</select>
										<label for="tipoSangreSelect">TDR</label>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="number" class="form-control text-end" id="salarioInput">
										<label for="salarioInput">Salario</label>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-2">
								<a class="btn app-btn-primary" id="guardarBtn">
									Guardar
								</a>
							</div>
						</div>

						<!-- Guardar -->
						<div class="row g-2 justify-content-end">
							
						</div>

						<!--TABLE 1-->
						<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
							<div class="app-card app-card-orders-table shadow-sm mb-5">
								<div class="app-card-body">
									<div class="table-responsive">
										<table class="table app-table-hover mb-0 text-left">
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