<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<!-- ---------------------------------- -->
			<div class="row g-3 mb-4 align-items-center justify-content-between">

				<!--TITLE-->
				<div class="h5 pb-2 text-success border-bottom border-success">
					<div class="row">
						<div class="col-md d-flex align-items-center">
							ACCIÓN DE PERSONAL
						</div>

						<div class="col-md-3 d-flex justify-content-end ">
							<a class="btn app-btn-secondary" href="?section=solicitudAccion">
								NUEVA SOLICITUD
							</a>
						</div>
					</div>
				</div>
				<div class="row pt-2">
					<div class="col-md">
						<div class="card">
							<div class="card-body">
								<p class="card-text text-center peque">FECHA DE INGRESO</p>
								<h5 class="card-title text-center" id="ingreso"></h5>

							</div>
						</div>
					</div>
					<div class="col-md">
						<div class="card">
							<div class="card-body">
								<p class="card-text text-center peque">AÑOS TRABAJADOS</p>
								<h5 class="card-title text-center" id="aniosTrabajados"></h5>

							</div>
						</div>
					</div>
					<div class="col-md " style="display: none;">
						<div class="card">
							<div class="card-body">
								<p class="card-text text-center peque">VACACIONES ACUMULADAS</p>
								<h5 class="card-title text-center" id="vacacionesAcumuladas"></h5>

							</div>
						</div>
					</div>
					<div class="col-md">
						<div class="card">
							<div class="card-body">
								<p class="card-text text-center peque">VACACIONES DISPONIBLES</p>
								<h5 class="card-title text-center" id="vacacionesDisponibles"></h5>
								
							</div>
						</div>
					</div>
				</div>






			</div>
			<!-- ---------------------------------- -->

			<!--Tabla Listado de empelados-->
			<div class="row">

				<div class="app-card app-card-orders-table shadow-sm mb-5">
					<div class="app-card-body">
						<div class="table-responsive pt-3 ">
							<table class="table mb-3 text-left  " id="solicitudes">
								<thead>
									<tr>
										<th class="cell">No. de Solicitud</th>
										<th class="cell">Tipo de Solicitud</th>
										<th class="cell">Fecha de Solicitud</th>
										<th class="cell">Desde</th>
										<th class="cell">Reanuda</th>
										<th class="cell">Comentarios</th>
										<th class="cell">Estado</th>
										<th class="cell">Acciones</th>
									</tr>

								</thead>
								<tbody>


								</tbody>
							</table>
						</div>

					</div>
				</div>


			</div>

			<!-- Modal -->
			<div class="modal fade" id="detalleSolicitudModal" tabindex="-1" aria-labelledby="detalleSolicitudModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="noSolicitud"></h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>