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
										<input type="input" class="form-control " id="nombreInput" disabled>
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
						<div class="col-md">
								<div class="form-floating">
									<div class="form-floating mb-3">
										<select class="form-select " id="tipoSangreSelect" aria-label="Floating label select example">
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