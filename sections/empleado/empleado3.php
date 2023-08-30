<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<h1 class="app-page-title">Empleado</h1>
			<div class="row gy-4">
				<!--DATOS GENERALES-->
				<div class="app-card app-card-settings shadow-sm p-4">

					<div class="app-card-header p-3 border-bottom-0">
						<div class="row align-items-center gx-3">
							<div class="col-auto">
								<div class="app-icon-holder">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
										<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
									</svg>
								</div>

							</div>
							<div class="col-auto">
								<h4 class="app-card-title">Datos Generales</h4>
							</div>
						</div>
					</div>
					<div class="app-card-body">

						<!--NO DE IDENTIDAD-->
						<div class="row g-2">
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="floatingInput" placeholder="">
										<label for="floatingInput">No. de Identidad</label>
									</div>
								</div>
							</div>

						</div>

						<!--NOMBRE-->
						<div class="row g-2">
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="floatingInput" placeholder="">
										<label for="floatingInput">Primer Nombre</label>
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating mb-3">
									<input type="input" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Segundo Nombre</label>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating mb-3">
									<input type="input" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Primer Apellido</label>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating mb-3">
									<input type="input" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Segundo Apellido</label>
								</div>
							</div>
						</div>

						<!--NACIMIENTO-->
						<div class="row g-2">
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="date" class="form-control" id="floatingInput" placeholder="">
										<label for="floatingInput">Fecha de Nacimiento</label>
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating mb-3">
									<input type="input" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Lugar de Nacimiento</label>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating mb-3">
									<input type="input" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Nacionalidad</label>
								</div>
							</div>
						</div>

						<!--GENERO-->
						<div class="row g-2">
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="tel" class="form-control" id="floatingInput" placeholder="">
										<label for="floatingInput">No de Teléfono</label>
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating">
									<select class="form-select" id="floatingSelect" aria-label="Floating label select example">
										<option selected>Seleccione una opción</option>
										<option value="1">Soltero</option>
										<option value="2">Casado</option>
										<option value="3">Viudo</option>
									</select>
									<label for="floatingSelect">Estado Civil</label>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating mb-3">
									<input type="input" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Género</label>
								</div>
							</div>
						</div>

						<!--DIRECCIÓN-->
						<div class="row g-2">
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="floatingInput" placeholder="">
										<label for="floatingInput">Dirección</label>
									</div>
								</div>
							</div>

						</div>
						<div class="row g-2">
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="floatingInput" placeholder="">
										<label for="floatingInput">Dirección</label>
									</div>
								</div>
							</div>

						</div>


						<!--VEHICULO-->

						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
							<button class="btn btn-outline-secondary" type="button" id="button-addon2">Cargar</button>
						</div>

						<div class="row g-2">
							<div class="col-md g-2">
								<div class="form-check form-switch mb-3">
									<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
									<label class="form-check-label" for="flexSwitchCheckDefault">¿Posee Vehiculo Propio?</label>

								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
									<label class="form-check-label" for="inlineCheckbox1">Motocicleta</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
									<label class="form-check-label" for="inlineCheckbox2">Vehiculo</label>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!--EDUCACIÓN-->

				<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
				

				</div>

				<!--PARENTESCO-->

				<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
					<div class="app-card-header p-3 border-bottom-0">
						<div class="row align-items-center gx-3">
							<div class="col-auto">
								<div class="app-icon-holder">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-hearts" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M11.5 1.246c.832-.855 2.913.642 0 2.566-2.913-1.924-.832-3.421 0-2.566ZM9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276ZM15 2.165c.555-.57 1.942.428 0 1.711-1.942-1.283-.555-2.281 0-1.71Z" />
									</svg>
								</div>

							</div>
							<div class="col-auto">
								<h4 class="app-card-title">Historia Familiar Directa</h4>
							</div>
						</div>
					</div>
					<div class="app-card-body px-4 w-100">


						<div class="row g-2">
							<div class="col-md-4">
								<div class="form-floating">
									<select class="form-select" id="floatingSelect" aria-label="Floating label select example">
										<option selected>Seleccione una opción</option>
										<option value="1">Padre</option>
										<option value="2">Madre</option>
										<option value="3">Cónyuge</option>
										<option value="4">Hijo</option>
									</select>
									<label for="floatingSelect">Parentesco</label>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="floatingInput" placeholder="">
										<label for="floatingInput">Nombre</label>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="date" class="form-control" id="floatingInput" placeholder="">
										<label for="floatingInput">Fecha de Nacimiento</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row g-2">

							<div class="col-md">
								<div class="form-floating mb-3">
									<input type="input" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Dirección</label>
								</div>
							</div>
							<div class="col-auto ">
								<a class="btn app-btn-secondary" href="empleado.php">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
										<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
									</svg>
								</a>
							</div>
						</div>

						<!--TABLA-->
						<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
							<div class="app-card app-card-orders-table shadow-sm mb-5">
								<div class="app-card-body">
									<div class="table-responsive">
										<table class="table app-table-hover mb-0 text-left">
											<thead>
												<tr>
													<th class="cell">Parentesco</th>
													<th class="cell">Nombre</th>
													<th class="cell">Edad</th>
													<th class="cell">Dirección</th>
												</tr>
											</thead>
											<tbody>


											</tbody>
										</table>
									</div>

								</div>
							</div>


						</div>


						<div class="col-md">
							<div class="form-check form-switch mb-3">
								<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
								<label class="form-check-label" for="flexSwitchCheckDefault">¿Tiene parientes o conocidos laborando en esta empresa?</label>
							</div>
						</div>

						<div class="row g-2">

							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="floatingInput" placeholder="">
										<label for="floatingInput">Nombre</label>
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="floatingInput" placeholder="">
										<label for="floatingInput">Parentesco</label>
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="floatingInput" placeholder="">
										<label for="floatingInput">Tiempo de conocerle</label>
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="floatingInput" placeholder="">
										<label for="floatingInput">Empresa en la que labora</label>
									</div>
								</div>
							</div>
							<div class="col-auto ">
								<a class="btn app-btn-secondary" href="empleado.php">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
										<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
									</svg>
								</a>
							</div>
						</div>

						<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
							<div class="app-card app-card-orders-table shadow-sm mb-5">
								<div class="app-card-body">
									<div class="table-responsive">
										<table class="table app-table-hover mb-0 text-left">
											<thead>
												<tr>
													<th class="cell">Nombre</th>
													<th class="cell">Profesión</th>
													<th class="cell">Tiempo de conocerle</th>
													<th class="cell">Empresa en que labora</th>
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


				</div>

				<!--REFERENCIAS-->

				<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
					<div class="app-card-header p-3 border-bottom-0">
						<div class="row align-items-center gx-3">
							<div class="col-auto">
								<div class="app-icon-holder">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
										<path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
										<path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
									</svg>
								</div>

							</div>
							<div class="col-auto">
								<h4 class="app-card-title">Referencias</h4>
							</div>
						</div>
					</div>
					<div class="app-card-body px-4 w-100">


						<div class="row g-2">

							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="floatingInput" placeholder="">
										<label for="floatingInput">Nombre</label>
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="floatingInput" placeholder="">
										<label for="floatingInput">Profesión</label>
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="floatingInput" placeholder="">
										<label for="floatingInput">Teléfono</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row g-2">

							<div class="col-md">
								<div class="form-floating mb-3">
									<input type="input" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Dirección</label>
								</div>
							</div>
							<div class="col-auto ">
								<a class="btn app-btn-secondary" href="empleado.php">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
										<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
									</svg>
								</a>
							</div>
						</div>

						<!--TABLA-->
						<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
							<div class="app-card app-card-orders-table shadow-sm mb-5">
								<div class="app-card-body">
									<div class="table-responsive">
										<table class="table app-table-hover mb-0 text-left">
											<thead>
												<tr>
													<th class="cell">Nombre</th>
													<th class="cell">Profesión</th>
													<th class="cell">Teléfono</th>
													<th class="cell">Dirección</th>
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


				</div>

				<!--Antecedentes Laborales-->
				<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
					<div class="app-card-header p-3 border-bottom-0">
						<div class="row align-items-center gx-3">
							<div class="col-auto">
								<div class="app-icon-holder">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
										<path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
										<path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
									</svg>
								</div>

							</div>
							<div class="col-auto">
								<h4 class="app-card-title">Antecedentes Laborales</h4>
							</div>
						</div>
					</div>
					<div class="app-card-body px-4 w-100">


						<div class="row g-2">

							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="floatingInput" placeholder="">
										<label for="floatingInput">Nombre de la empresa</label>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="floatingInput" placeholder="">
										<label for="floatingInput">Tipo de Empresa</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row g-2">

							<div class="col-md">
								<div class="form-floating mb-3">
									<input type="input" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Dirección</label>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-floating mb-3">
									<input type="input" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Teléfono</label>
								</div>
							</div>

						</div>
						<div class="row g-2">

							<div class="col-md">
								<div class="form-floating mb-3">
									<input type="input" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Último puesto desempeñado</label>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-floating mb-3">
									<input type="input" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Nombre Jefe Inmediato</label>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-floating mb-3">
									<input type="input" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Número Jefe Inmediato</label>
								</div>
							</div>

						</div>
						<div class="row g-2">

							<div class="col-md">
								<div class="form-floating mb-3">
									<input type="date" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Fecha de Ingreso</label>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating mb-3">
									<input type="date" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Fecha de Retiro</label>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating mb-3">
									<input type="input" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Sueldo Inicial</label>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating mb-3">
									<input type="input" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Sueldo Final</label>
								</div>
							</div>

						</div>
						<div class="row g-2">

							<div class="col-md">
								<div class="form-floating mb-3">
									<input type="input" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Causas de retiro</label>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating mb-3">
									<input type="input" class="form-control" id="floatingInput" placeholder="">
									<label for="floatingInput">Descripción de Puesto</label>
								</div>
							</div>

						</div>

						<!--TABLA-->
						<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
							<div class="app-card app-card-orders-table shadow-sm mb-5">
								<div class="app-card-body">
									<div class="table-responsive">
										<table class="table app-table-hover mb-0 text-left">
											<thead>
												<tr>
													<th class="cell">Empresa</th>
													<th class="cell">Tipo</th>
													<th class="cell">Puesto</th>
													<th class="cell">Jefe Inmediato</th>
													<th class="cell">Ingreso</th>
													<th class="cell">Retiro</th>
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
				</div>

			</div>

		</div>
	</div>

</div>


<!-- Javascript -->
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Page Specific JS -->
<script src="assets/js/app.js"></script>

</body>

</html>