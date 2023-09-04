<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row gy-4">
				<!--DATOS GENERALES-->
				<div class="app-card app-card-settings shadow-sm p-4">

					<div class="app-card-header p-3 border-bottom-0">
						<div class="row align-items-center gx-3">

							<div class="col-12 ">
								<h4 class="app-card-title text-center">Acción de Personal</h4>
							</div>
						</div>
					</div>
					<div class="app-card-body">
						<div class="h5 pb-2 mb-4 text-success border-bottom border-success">
							Datos Generales
						</div>
						<!--Nombre del perfil-->
						<div class="row g-2">
							<div class="col-md-3">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control " id="nombreInput">
										<label for="nombreInput">Código de empleado</label>
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


						</div>

						<div class="row g-2">

							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="date" class="form-control text-end" id="iniciodate">
										<label for="inicioInput">Fecha de Solicitud</label>
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="date" class="form-control text-end" id="retiroInput">
										<label for="retiroInput">Fecha de Ingreso</label>
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control text-end" id="salarioInput">
										<label for="salarioInput">Cargo</label>
									</div>
								</div>
							</div>

						</div>

						<div class="row g-2">

							<div class="col-md-2">
								<div class="col-md align-items-center mb-5">
									<div class="form-floating">
										<div class="form-floating mb-3">
											<select class="form-select  " id="tipoSangreSelect" aria-label="Floating label select example">
												<option selected class="text-end"></option>
												<option value="1" class="text-end">Cortés &nbsp</option>
												<option value="2" class="text-end">Copán &nbsp</option>
												<option value="2" class="text-end">Comayagua &nbsp</option>
												<option value="3" class="text-end">Santa Barbara &nbsp</option>
												<option value="4" class="text-end">Intibuca &nbsp</option>
											</select>
											<label for="tipoSangreSelect">Zona Asignada</label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<input type="input" class="form-control text-end" id="salarioInput">
										<label for="salarioInput">Jefe Inmediato</label>
									</div>
								</div>
							</div>
							<div class="h5 pb-2 mb-4 text-success border-bottom border-success">
								Tipo de Acción
							</div>

							<div class="row g-2">

								<div class="col-md-2">
									<div class="col-md align-items-center mb-3">
										<div class="form-floating">
											<div class="form-floating mb-3">
												<select class="form-select  " id="tipoSangreSelect" aria-label="Floating label select example">
													<option selected class="text-end"></option>
													<option value="1" class="text-end">Vacaciones &nbsp</option>
													<option value="2" class="text-end">Incapacidad &nbsp</option>
													<option value="2" class="text-end">Permiso sin sueldo&nbsp</option>
													<option value="4" class="text-end">Permiso por luto&nbsp</option>
												</select>
												<label for="tipoSangreSelect">Tipo de Acción</label>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-floating">
										<div class="form-floating mb-3">
											<input type="number" class="form-control " id="nombreInput">
											<label for="nombreInput">Días a tomar</label>
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-floating">
										<div class="form-floating mb-3">
											<input type="input" class="form-control" id="nombreInput">
											<label for="nombreInput">Comentarios</label>
										</div>
									</div>
								</div>


							</div>
							<div class="row g-2 align-items-end">


								<div class="col-md">
									
										<div class=" mb-3">
											<label for="nombreInput">Rige desde</label>
											<input type="date" class="form-control " id="nombreInput">
										</div>
								</div>
								<div class="col-md-2">

									<div class=" mb-3">
										<input type="time" class="form-control " id="nombreInput">
									</div>

								</div>
								<div class="col-md">

									<div class=" mb-3">
										<label for="nombreInput">Reanuda</label>
										<input type="date" class="form-control " id="nombreInput">
									</div>

								</div>
								<div class="col-md-2">

									<div class=" mb-3">
										<input type="time" class="form-control " id="nombreInput">
									</div>

								</div>


							</div>
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