<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row gy-4">
				<!--DATOS GENERALES-->
				<div class="app-card app-card-settings shadow-sm p-4">

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
								<h4 class="app-card-title">Perfil de Puesto</h4>
							</div>
						</div>
					</div>
					<div class="app-card-body">

						<!--Nombre del perfil-->
						<div class="row g-2">
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="perfilPuestoInput">
										<label for="perfilPuestoInput">Nombre del perfil de puesto</label>
									</div>
								</div>
							</div>

						</div>

						<!--Objetivo-->
						<div class="row g-2">
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="objetivoInput">
										<label for="objetivoInput">Objetivo</label>
									</div>
								</div>
							</div>
						</div>

						<!--Responsabilidades-->
						<div class="row g-2 align-items-center">
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="responsabilidadInput">
										<label for="responsabilidadInput">Responsabilidades</label>
									</div>
								</div>
							</div>
							<!-- Boton agregar -->
							<div class="col-auto align-items-center ">
								<a class="btn app-btn-secondary" id="addResponsabilidad">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
										<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
									</svg>
								</a>
							</div>
						</div>

						<!--Tabla-->
						<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
							<div class="app-card app-card-orders-table shadow-sm mb-5">
								<div class="app-card-body">
									<div class="table-responsive">
										<table class="table app-table-hover mb-0 text-left" id="responsabilidadTabla">
											<thead>
												<tr>
													<th class="cell"></th>
												</tr>
											</thead>
											<tbody>


											</tbody>
										</table>
									</div>

								</div>
							</div>


						</div>

						<!--Formación y experiencia-->
						<div class="row g-2 align-items-center">
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="formacionInput">
										<label for="formacionInput">Formación y experiencia</label>
									</div>
								</div>
							</div>
							<!-- Boton agregar -->
							<div class="col-auto align-items-center ">
								<a class="btn app-btn-secondary" id="addExperiencia">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
										<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
									</svg>
								</a>
							</div>
						</div>

						<!--Tabla-->
						<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
							<div class="app-card app-card-orders-table shadow-sm mb-5">
								<div class="app-card-body">
									<div class="table-responsive">
										<table class="table app-table-hover mb-0 text-left" id="formacionTabla">
											<thead>
												<tr>
													<th class="cell"></th>
												</tr>
											</thead>
											<tbody>


											</tbody>
										</table>
									</div>

								</div>
							</div>


						</div>

						<!--Habilidades y competencias-->
						<div class="row g-2 align-items-center">
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="habilidadesInput">
										<label for="habilidadesInput">Habilidades y competencias</label>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="number" class="form-control" id="ponderacionNumber" max="10" min="1">
										<label for="ponderacionNumber">Ponderación (1 al 10)</label>
									</div>
								</div>
							</div>
							<!-- Boton agregar -->
							<div class="col-auto align-items-center ">
								<a class="btn app-btn-secondary" id="addHabilidades">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
										<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
									</svg>
								</a>
							</div>
						</div>

						<!--Tabla-->
						<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
							<div class="app-card app-card-orders-table shadow-sm mb-5">
								<div class="app-card-body">
									<div class="table-responsive">
										<table class="table app-table-hover mb-0 text-left" id="habilidadesTabla">
											<thead>
												<tr>
													<th class="cell"></th>
													<th class="cell"></th>
												</tr>
											</thead>
											<tbody>


											</tbody>
										</table>
									</div>

								</div>
							</div>


						</div>

						<!--Condiciones de trabajo-->
						<div class="row g-2 align-items-center">
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="condicionesInput">
										<label for="condicionesInput">Condiciones de trabajo</label>
									</div>
								</div>
							</div>
							<!-- Boton agregar -->
							<div class="col-auto align-items-center ">
								<a class="btn app-btn-secondary" id="addCondiciones">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
										<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
									</svg>
								</a>
							</div>
						</div>

						<!--Tabla-->
						<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
							<div class="app-card app-card-orders-table shadow-sm mb-5">
								<div class="app-card-body">
									<div class="table-responsive">
										<table class="table app-table-hover mb-0 text-left" id="condicionesTabla">
											<thead>
												<tr>
													<th class="cell"></th>
												</tr>
											</thead>
											<tbody>


											</tbody>
										</table>
									</div>

								</div>
							</div>


						</div>

						<!--Remineración y beneficios-->
						<div class="row g-2 align-items-center">
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control" id="remuneracionInput">
										<label for="remuneracionInput">Remuneración y beneficios</label>
									</div>
								</div>
							</div>
							<!-- Boton agregar -->
							<div class="col-auto align-items-center ">
								<a class="btn app-btn-secondary" id="addBeneficios">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
										<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
									</svg>
								</a>
							</div>
						</div>

						<!--Tabla-->
						<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
							<div class="app-card app-card-orders-table shadow-sm mb-5">
								<div class="app-card-body">
									<div class="table-responsive">
										<table class="table app-table-hover mb-0 text-left" id="remuneracionTabla">
											<thead>
												<tr>
													<th class="cell"></th>
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
						<div class="row g-2 justify-content-end">
							<div class="col-12 col-lg-2">
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