<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row gy-4">
				<!--DATOS GENERALES-->
				<div class="app-card app-card-settings shadow-sm p-4">

					<div class="app-card-header p-3 border-bottom-0">
						<div class="row align-items-center gx-3">
						
							<div class="col-12 ">
									<h4 class="app-card-title text-center" >PERFIL DE PUESTO</h4>
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
									<textarea class="form-control" id="objetivoInput" style="height: 100px"></textarea>
									<label for="objetivoInput">Objetivos</label>
								</div>
							</div>
						</div>

						<!--Responsabilidades-->
						<div class="row g-2 mt-2 align-items-center">
							<div class="col-md">
								<div class="form-floating">
									<textarea class="form-control" id="responsabilidadInput" style="height: 100px"></textarea>
									<label for="responsabilidadInput">Responsabilidades</label>
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
										<table class="table app-table-hover mb-0 text-left table-striped " id="responsabilidadTabla">
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
							<div class="col-md-3">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="number" class="form-control" id="ponderacion1Number" max="10" min="1">
										<label for="ponderacion1Number">Ponderación (1 al 10)</label>
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