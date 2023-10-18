<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="row gy-4">
				<div class="app-card app-card-settings shadow-sm p-4">
					<div class="app-card-header p-3 border-bottom-0">
						<!-- ---------------------------------- -->
						<div class="row align-items-center gx-3">
							<div class="col-12 ">
								<h4 class="app-card-title text-center">Puesto de trabajo</h4>
							</div>
						</div>
					</div>

					<div class="accordion" id="accordionExample">
						<!-- Directores -->
						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
									Directores
								</button>
							</h2>
							<div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<div class="row d-flex align-items-end">
										<div class="col-md">
											<label for="nombrePuesto">Nombre del puesto</label>
											<input type="input" class="form-control text-end" id="nombrePuesto">
										</div>
										<div class="col-md">
											<label for="proyectoSelect">Proyecto</label>
											<select class="form-select  proyecto" id="directorSelect" aria-label="Floating label select example">
												<option selected class="text-end"></option>
											</select>
										</div>
										<div class="col-md-1 d-flex justify-content-center">
											<button type="button" class="btn btn-light" id="directoresBTN">Guardar</button>
										</div>

									</div>
								</div>
							</div>
						</div>
						<!-- Administrativos -->
						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
									Administrativos
								</button>
							</h2>
							<div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<div class="row d-flex align-items-end">
										<div class="col-md">
											<label for="nombrePuestoAdmin">Nombre del puesto</label>
											<input type="input" class="form-control text-end" id="nombrePuestoAdmin">
										</div>
										<div class="col-md">
											<label for="proyectoSelectAdmin">Proyecto</label>
											<select class="form-select proyecto " id="adminSelect" aria-label="Floating label select example">
												<option selected class="text-end"></option>
											</select>
										</div>
										<div class="col-md">
											<label for="adminLevel">Depende de</label>
											<select class="form-select  " id="adminLevel" aria-label="Floating label select example">
												<option selected class="text-end"></option>
											</select>
										</div>
										<div class="col-md-1 d-flex justify-content-center">
											<button type="button" class="btn btn-light" id="adminBTN">Guardar</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Gerentes -->
						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									Gerencias
								</button>
							</h2>
							<div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<div class="row d-flex align-items-end">
										<div class="col-md">
											<label for="nombrePuestoN3">Nombre del puesto</label>
											<input type="input" class="form-control text-end" id="nombrePuestoN3">
										</div>

										<div class="col-md">
											<label for="proyectoSelectN3">Proyecto</label>
											<select class="form-select proyecto " id="gerenciaSelect" aria-label="Floating label select example">
												<option selected class="text-end"></option>
											</select>
										</div>
										<div class="col-md">
											<label for="nivel3">Depende de</label>
											<select class="form-select  " id="nivel3" aria-label="Floating label select example">
												<option selected class="text-end"></option>
											</select>
										</div>
										<div class="col-md-1 d-flex justify-content-center">
											<button type="button" class="btn btn-light" id="gerentesBTN">Guardar</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Especialistas -->
						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
									Especialistas
								</button>
							</h2>
							<div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<div class="row d-flex align-items-end">
										<div class="col-md">
											<label for="nombrePuestoN4">Nombre del puesto</label>
											<input type="input" class="form-control text-end" id="nombrePuestoN4">
										</div>
										<div class="col-md">
											<label for="proyectoSelectN4">Proyecto</label>
											<select class="form-select  proyecto" id="especialistaSelect" aria-label="Floating label select example">
												<option selected class="text-end"></option>
											</select>
										</div>
										<div class="col-md">
											<label for="nivel4">Depende de</label>
											<select class="form-select  " id="nivel4" aria-label="Floating label select example">
												<option selected class="text-end"></option>
											</select>
										</div>
										<div class="col-md-1 d-flex justify-content-center">
											<button type="button" class="btn btn-light" id="especialistasBTN">Guardar</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Técnicos -->
						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									Técnicos y Oficiales
								</button>
							</h2>
							<div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<div class="row d-flex align-items-end">
										<div class="col-md">
											<label for="nombrePuestoN5">Nombre del puesto</label>
											<input type="input" class="form-control text-end" id="nombrePuestoN5">
										</div>
										<div class="col-md">
											<label for="proyectoSelect5">Proyecto</label>
											<select class="form-select proyecto" id="tecnicoSelect" aria-label="Floating label select example">
												<option selected class="text-end"></option>
											</select>

										</div>
										<div class="col-md">
											<label for="nivel5">Depende de</label>
											<select class="form-select  " id="nivel5" aria-label="Floating label select example">
												<option selected class="text-end"></option>
											</select>
										</div>
										<div class="col-md-1 d-flex justify-content-center">
											<button type="button" class="btn btn-light" id="tecnicosBTN">Guardar</button>
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
</div>
