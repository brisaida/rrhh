<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">Orders</h1>
				</div>

			</div><!--//row-->


			<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				<a class="flex-sm-fill text-sm-center nav-link active" id="orders-pendientes-tab" data-bs-toggle="tab" href="#orders-pendientes" role="tab" aria-controls="orders-pendientes" aria-selected="true">Pendientes</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="orders-aprobadoN1-tab" data-bs-toggle="tab" href="#orders-aprobadoN1" role="tab" aria-controls="orders-aprobadoN1" aria-selected="false">En proceso</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="orders-aprobadoN2-tab" data-bs-toggle="tab" href="#orders-aprobadoN2" role="tab" aria-controls="orders-aprobadoN2" aria-selected="false">Aprobado</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="orders-canceladas-tab" data-bs-toggle="tab" href="#orders-canceladas" role="tab" aria-controls="orders-canceladas" aria-selected="false">Canceladas</a>
			</nav>


			<div class="tab-content" id="orders-table-tab-content">
				<div class="tab-pane fade show active" id="orders-pendientes" role="tabpanel" aria-labelledby="orders-pendientes-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="table-responsive p-2">
								<table class="table mb-3 text-left " id="solicitudes">
									<thead>
										<tr>
											<th class="cell">No. de Solicitud</th>
											<th class="cell">Empleado</th>
											<th class="cell">Tipo de Solicitud</th>
											<th class="cell">Desde</th>
											<th class="cell">Reanuda</th>
											<th class="cell">Cantidad Días</th>
											<th class="cell">Estado</th>
											<th class="cell text-center">Acciones</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>

						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="orders-aprobadoN1" role="tabpanel" aria-labelledby="orders-aprobadoN1-tab">
					<div class="app-card app-card-orders-table mb-5">
						<div class="app-card-body">
						<div class="table-responsive p-2">
								<table class="table mb-3 text-left " id="solicitudesN1">
									<thead>
										<tr>
											<th class="cell">No. de Solicitud</th>
											<th class="cell">Tipo de Solicitud</th>
											<th class="cell">Fecha de retiro</th>
											<th class="cell">Fecha de reintegro</th>
											<th class="cell">Estado</th>
											<th class="cell text-center">Acciones</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="orders-aprobadoN2" role="tabpanel" aria-labelledby="orders-aprobadoN2-tab">
					<div class="app-card app-card-orders-table mb-5">
						<div class="app-card-body">
						<div class="table-responsive p-2">
								<table class="table mb-3 text-left " id="solicitudesN2">
									<thead>
										<tr>
											<th class="cell">No. de Solicitud</th>
											<th class="cell">Tipo de Solicitud</th>
											<th class="cell">Fecha de retiro</th>
											<th class="cell">Fecha de reintegro</th>
											<th class="cell">Estado</th>
											<th class="cell text-center">Acciones</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="orders-canceladas" role="tabpanel" aria-labelledby="orders-canceladas-tab">
					<div class="app-card app-card-orders-table mb-5">
						<div class="app-card-body">
						<div class="table-responsive p-2">
								<table class="table mb-3 text-left " id="solicitudesCanceladas">
									<thead>
										<tr>
											<th class="cell">No. de Solicitud</th>
											<th class="cell">Tipo de Solicitud</th>
											<th class="cell">Fecha de retiro</th>
											<th class="cell">Fecha de reintegro</th>
											<th class="cell">Estado</th>
											<th class="cell text-center">Acciones</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>