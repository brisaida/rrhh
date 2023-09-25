<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<!-- ---------------------------------- -->
			<div class="row g-3 mb-4 align-items-center justify-content-between">

				<!--TITLE-->
				<div class="col-auto">
					<h1 class="app-page-title mb-0">Listado de empleados</h1>
				</div>

				<!--SEARCH-->
				<div class="col-auto">
					<div class="page-utilities">
						<div class="row g-2 justify-content-start justify-content-md-end align-items-center">

			<!--ADD BOTON-->
							<div class="col-auto">
								<a class="btn app-btn-secondary" href="?section=empleado">
									NUEVO EMPLEADO
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
										<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
										<path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
									</svg>
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- ---------------------------------- -->
			<div class="tab-content" id="orders-table-tab-content">
				<!--Tabla Listado de empelados-->
				<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="table-responsive">
								<table class="table p3 mb-3 text-left  " id="ListadoEmpleadoTabla">
									<thead>
										<tr>
											<th class="cell">No. de Empleado</th>
											<th class="cell">Nombre</th>
											<th class="cell">No de Teléfono</th>
											<th class="cell text-center">Acciones</th>
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