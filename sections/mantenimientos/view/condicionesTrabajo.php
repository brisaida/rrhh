<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="row gy-4">
				<div class="app-card app-card-settings shadow-sm p-4">
					<div class="app-card-header p-3 border-bottom-0">
						<!-- ---------------------------------- -->
						<div class="row align-items-center gx-3">
							<div class="col-12 ">
								<h4 class="app-card-title text-center">Condiciones de Trabajo</h4>
							</div>
						</div>
					</div>

					<div class="app-card-body">
						<!-- ---------------------------------- -->
						<div class="row g-2 align-items-center">
							<!-- Condiciones de trabajo -->
							<div class="col-md-4">
								<div class="mb-3">
									<label for="condicionesInput">Condiciones de trabajo</label>
									<input type="input" class="form-control" id="condicionesInput"></input>
								</div>
							</div>
							<!-- Descripción -->
							<div class="col-md">
								<div class="mb-3">
									<label for="descripcionInput">Descripción</label>
									<input type="input" class="form-control" id="descripcionInput"></input>
								</div>
							</div>
						</div>
						<!-- ---------------------------------- -->
						<div class="row  mb-4 align-items-center justify-content-end">
							<!-- Guardar -->
							<div class="col-auto">
								<a class="btn app-btn-primary" id="guardarBtn">
									Guardar
								</a>
							</div>
						</div>

						<!--tabla de Condiciones de trabajo-->
						<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
							<div class="app-card app-card-orders-table shadow-sm mb-5">
								<div class="app-card-body">
									<div class="table-responsive">
										<table class="table app-table-hover mb-0 text-left" id="proyectosTabla">
											<thead>
												<tr>
													<th class="cell">Id</th>
													<th class="cell">Condiciones de trabajo</th>
													<th class="cell">Descripción</th>
													<th class="cell">Acciones</th>
												</tr>
											</thead>
											<tbody>
												
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