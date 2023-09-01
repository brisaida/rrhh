<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row gy-4">
				<!--DATOS GENERALES-->
				<div class="app-card app-card-settings shadow-sm p-4">

					<div class="app-card-header p-3 border-bottom-0">
						<div class="row align-items-center gx-3">

							<div class="col-12 ">
								<h4 class="app-card-title text-center">PERFIL DE PUESTO</h4>
							</div>
						</div>
					</div>
					<div class="app-card-body">

						<!--Nombre del perfil-->
						<div class="row g-2">
							<div class="col-md-4">
								<div class="mb-3">
									<label for="perfilPuestoInput">Nombre del perfil de puesto</label>
									<textarea class="form-control" id="perfilPuestoInput" style="height: 100px"></textarea>
								</div>
							</div>
							<div class="col-md">
								<div class="mb-3">
									<label for="objetivoInput">Objetivos</label>
									<textarea class="form-control" id="objetivoInput" style="height: 100px"></textarea>
								</div>
							</div>

						</div>


						<!--Responsabilidades-->
						<div class="row g-2 mt-2 align-items-center">
							<div class="col-md-4">
								<div class="col-md">
									<div class="mb-3">
										<label for="responsabilidadInput">Agregar Responsabilidad</label>
										<textarea class="form-control" id="responsabilidadInput" style="height: 100px"></textarea>
									</div>
								</div>

							</div>

							<!-- Boton agregar -->
							<div class="col-auto align-items-center ">
								<a class="btn app-btn-secondary" id="addResponsabilidad">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
									</svg>
								</a>
							</div>
							<div class="col-md">
								<!--Tabla-->
								<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
									<div class="app-card app-card-orders-table shadow-sm mb-5">
										<div class="app-card-body">
											<div class="table-responsive">
												<table class="table app-table-hover mb-0 text-left table-striped " id="responsabilidadTabla">
													<thead>
														<tr>
															<th class="text-center">Responsabilidades</th>
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


						<!--Formación y experiencia-->
						<div class="row g-2 align-items-center">
							<div class="col-md-3">
								<div class=" mb-3">
									<label for="formacionInput">Formación y experiencia</label>
									<input type="input" class="form-control" id="formacionInput">
								</div>
							</div>
							<div class="col-md-1">
								<div class=" mb-3">
									<label for="ponderacion1Number"></label>
									<input type="number" class="form-control" id="ponderacion1Number" max="10" min="1">
								</div>
							</div>
							<!-- Boton agregar -->
							<div class="col-auto align-items-center ">
								<a class="btn app-btn-secondary" id="addExperiencia">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
									</svg>
								</a>
							</div>
							<div class="col-md-7">
								<!--Tabla-->
								<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
									<div class="app-card app-card-orders-table shadow-sm mb-5">
										<div class="app-card-body">
											<div class="table-responsive">
												<table class="table app-table-hover mb-0 text-left" id="formacionTabla">
													<thead>
														<tr>
															<th class="text-center">Formación</th>
															<th class="text-end" style="width:10%">Ponderación</th>
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



						<!--Habilidades y competencias-->
						<div class="row g-2 align-items-center">
							<div class="col-md-3">
									<label for="habilidadesInput">Habilidades y competencias</label>
									<input type="input" class="form-control" id="habilidadesInput">
							</div>
							<div class="col-md-1">
									<label for="ponderacionNumber"></label>
									<input type="number" class="form-control" id="ponderacionNumber" max="10" min="1">
							</div>
							<!-- Boton agregar -->
							<div class="col-auto align-items-end pt-3 ">
								<a class="btn app-btn-secondary" id="addHabilidades">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
									</svg>
								</a>
							</div>
							<div class="col-md-7">
								<!--Tabla-->
						<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
							<div class="app-card app-card-orders-table shadow-sm mb-5">
								<div class="app-card-body">
									<div class="table-responsive">
										<table class="table app-table-hover mb-0 text-left" id="habilidadesTabla">
											<thead>
												<tr>
													<th class="text-center">Formación</th>
													<th class="text-end" style="width:10%">Ponderación</th>
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

						

						<!--Condiciones de trabajo-->
						<div class="row g-2 align-items-center mt-3">
							<label for="remuneracionInput">Condiciones de trabajo </label>

							<select class="form-control js-example-basic-multiple" data-toggle="select" multiple="multiple">
								<option value="1">Salario según capacidad</option>
								<option value="1">Beneficios de ley</option>
								<option value="1">Excelente clima laboral</option>
								<option value="1">Oportunidad de crecimiento</option>
								<option value="1">Seguro medico privado</option>
							</select>
						</div>
						<!--Condiciones de trabajo-->
						<div class="row g-2 align-items-center mt-3 mb-3">
							<label for="remuneracionInput">Remuneración y beneficios</label>

							<select class="form-control js-example-basic-multiple" data-toggle="select" multiple="multiple">
								<option value="1">Salario según capacidad</option>
								<option value="1">Beneficios de ley</option>
								<option value="1">Excelente clima laboral</option>
								<option value="1">Oportunidad de crecimiento</option>
								<option value="1">Seguro medico privado</option>
							</select>
						</div>



						<!--Remineración y beneficios-->


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