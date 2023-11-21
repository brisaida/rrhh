<div class="app-wrapper">

	<!-- Datos Generales -->
	<div class="app-content pt-3 p-md-2 p-lg-3">
		<div class="container-xl">
			
			<div class="row gy-4 ">
				<!-- Datos generales -->
				<div class="col-12 col-lg">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						
						<div class="app-card-body px-4 w-100 pt-3 pb-3 ">
							<!-- ------------------------------------ -->
							<div class="h5 pb-2 mb-4 text-success border-bottom border-success text-center">
								ACCIÓN DE PERSONAL
							</div>
							<!-- No. de identidad y nombre -->
							<div class="item border-bottom py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Código de empleado</strong></div>
										<div class="item-data" id="codigo"></div>
									</div>
									<div class="col-md">
										<div class="item-label"><strong>Nombre Completo</strong></div>
										<div class="item-data text-start" id="nombreCompleto"></div>
									</div>
									<div class="col-md">
										<div class="item-label"><strong>Fecha de Solicitud</strong></div>
										<div class="item-data text-start" id="fechaSolicitud"></div>
									</div>
								</div>
							</div>
							<!-- Fecha y lugar de nacimiento -->
							<div class="item py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-md">
										<div class="item-label"><strong>Fecha de Ingreso</strong></div>
										<div class="item-data" id="ingreso"></div>
									</div>
									<div class="col-md">
										<div class="item-label"><strong>Cargo</strong></div>
										<div class="item-data text-start">
											<span id="cargo"></span> -
											<span id="zona"></span>
										</div>
										<div class="item-data text-start" id="proyecto"></div>
									</div>
									<div class="col-md">
										<div class="item-label"><strong>Jefé Inmediato</strong></div>
										<div class="item-data text-start" id="jefe"></div>
									</div>

								</div>
							</div>
						</div>
					</div><!--//app-card-->
				</div>
			</div>
		</div>
	</div>
	<!-- Detalles de la acción -->
	<div class="app-content pt-3 p-md-2 p-lg-3">

		<div class="container-xl">
			<div class="row gy-4">
				<!-- Datos generales -->
				<div class="col-12 col-lg">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">

						<div class="app-card-body px-4 w-100">

							<div class="app-card-body pt-4 pb-4">

								<!-- ------------------------------------ -->
								<div class="h5 pb-2 mb-4 text-success border-bottom border-success">
									Tipo de Acción
								</div>
								<!-- ------------------------------------ -->
								<div class="row g-2">
									<!-- Tipo de Acción -->
									<div class="col-md">
										<div class="col-md align-items-center mb-3">
											<label for="tipoAccion">Tipo de Acción</label>
											<select class="form-select  " id="tipoAccion" aria-label="Floating label select example">
											
											</select>
										</div>
									</div>
									<!-- Rige desde -->
									<div class="col-md">
										<div class=" mb-3">
											<label for="desde">Rige desde</label>
											<input type="datetime-local" class="form-control " id="desde">
										</div>
									</div>
									<!-- Reanuda -->
									<div class="col-md">
										<div class=" mb-3">
											<label for="reanuda">Reanuda</label>
											<input type="datetime-local" class="form-control " id="reanuda">
										</div>
									</div>
									<!-- Días a tomar -->
									<div class="col-md-2">
										<label for="diasTomar">Días a tomar</label>
										<input type="number" class="form-control " id="diasTomar">
									</div>
								</div>
								<!-- ------------------------------------ -->
								<div class="row g-2 align-items-end">

									<!-- Comentarios -->
									<div class="col-md">
										<div class="form-floating">
											<div class="form-floating mb-3">
												<input type="input" class="form-control" id="comentarios">
												<label for="comentarios">Comentarios</label>
											</div>
										</div>
									</div>
								</div>
								<!-- ------------------------------------ -->
								<div class="col-12 col-lg-2">.
									<!-- Guardar -->
									<a class="btn app-btn-primary" id="guardarBtn">
										Guardar
									</a>
								</div>
							</div>
						</div>

					</div><!--//app-card-->
				</div>
			</div>
		</div>
	</div>
</div>