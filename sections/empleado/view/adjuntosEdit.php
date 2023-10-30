<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<ul class="nav nav-underline">
				<li class="nav-item">
					<a class="nav-link cursor-pointer" id="perfilPage">Mi Perfil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" aria-current="page">ADJUNTOS</a>
				</li>
			</ul>
			<div class="row gy-4">

				<!-- Foto -->
				<div class="col-12 col-lg-4">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						<div class="app-card-header p-3 border-bottom-0">
							<div class="row align-items-center gx-3">
								<div class="col-auto">
									<div class="app-icon-holder">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
										</svg>
									</div><!--//icon-holder-->

								</div>
								<div class="col-auto">
									<h4 class="app-card-title">Foto de perfil</h4>
								</div>
							</div>
						</div><!--//app-card-header-->
						<div class="app-card-body px-4 w-100">
							<center>
								<img src="" class="img-fluid" alt="" id="foto">
								<!-- No. de identidad y nombre -->
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-md">
											<a class="item-label cursor-pointer" id="fotoCambiar"><strong>Cambiar</strong></a>
											<input type="file" id="fotoFileInput" style="display:none;">
										</div>

									</div>
								</div>
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-md">
											<a class="item-label cursor-pointer" id="fotoDescargar" target="_blank"><strong>Descargar</strong></a>

										</div>

									</div>
								</div>
							</center>

						</div>

					</div><!--//app-card-->
				</div>
				
				<!-- ID -->
				<div class="col-12 col-lg-4">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						<div class="app-card-header p-3 border-bottom-0">
							<div class="row align-items-center gx-3">
								<div class="col-auto">
									<div class="app-icon-holder">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front" viewBox="0 0 16 16">
											<path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17 1.247 0 2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276Z" />
											<path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.807.807 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155 1.806 0 4.037-.084 5.592-.155A1.479 1.479 0 0 0 15 9.611v-.413c0-.099-.01-.197-.03-.294l-.335-1.68a.807.807 0 0 0-.43-.563 1.807 1.807 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3H4.82Z" />
										</svg>
									</div><!--//icon-holder-->

								</div>
								<div class="col-auto">
									<h4 class="app-card-title">Tarjeta de Identidad</h4>
								</div>
							</div>
						</div><!--//app-card-header-->
						<div class="app-card-body px-4 w-100">
							<div class="row">
								<div class="col-md">
									<div class="row">
										<div class="item-label cursor-pointer"><strong>Frente</strong></div>
									</div>
									<div class="row d-flex align-items-center justify-content-center">
										<div class="col-md-9">
											<img src="" class="img-fluid" id="idFrente">
										</div>
										<div class="col-md">
											<div class="item border-bottom py-3">
												<div class="row justify-content-between align-items-center">
													<div class="col-md text-center">
														<a class="item-label cursor-pointer text-center" id="idFrontCambiar"><strong>Cambiar</strong></a>
														<input type="file" id="idFileInput" style="display:none;">
													</div>
													<div class="col-md text-center">
														<a class="item-label cursor-pointer text-center" id="idFrontDescargar" target="_blank"><strong>Descargar</strong></a>
													</div>

												</div>
											</div>

										</div>
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md">
									<div class="row">
										<div class="item-label cursor-pointer"><strong>Reverso</strong></div>
									</div>
									<div class="row d-flex align-items-center justify-content-center">
										<div class="col-md-9">
											<img src="" class="img-fluid" id="idReverso">
										</div>
										<div class="col-md text-center">
											<div class="item border-bottom py-3">
												<div class="row justify-content-between align-items-center">
													<div class="col-md">
														<a class="item-label cursor-pointer text-center" id="idReversoCambiar"><strong>Cambiar</strong></a>
														<input type="file" id="idBackFileInput" style="display:none;">
													</div>
													<div class="col-md text-center">
														<a class="item-label cursor-pointer text-center" id="idReversoDescargar" target="_blank"><strong>Descargar</strong></a>
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

				<!-- Carro -->
				<div class="col-12 col-lg-4">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						<div class="app-card-header p-3 border-bottom-0">
							<div class="row align-items-center gx-3">
								<div class="col-auto">
									<div class="app-icon-holder">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front" viewBox="0 0 16 16">
											<path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17 1.247 0 2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276Z" />
											<path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.807.807 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155 1.806 0 4.037-.084 5.592-.155A1.479 1.479 0 0 0 15 9.611v-.413c0-.099-.01-.197-.03-.294l-.335-1.68a.807.807 0 0 0-.43-.563 1.807 1.807 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3H4.82Z" />
										</svg>
									</div><!--//icon-holder-->

								</div>
								<div class="col-auto">
									<h4 class="app-card-title">Licencia Vehículo</h4>
									<p class="peque">Vencimiento: <span id="vencimientoLicenciaCarro"></span></p>
								</div>
							</div>
						</div><!--//app-card-header-->
						<div class="app-card-body px-4 w-100">
							<div class="row">
								<div class="col-md">
									<div class="row">
										<div class="item-label cursor-pointer"><strong>Frente</strong></div>
									</div>
									<div class="row d-flex align-items-center justify-content-center">
										<div class="col-md-9">
											<img src="" class="img-fluid" id="carroFrente">
										</div>
										<div class="col-md">
											<div class="item border-bottom py-3">
												<div class="row justify-content-between align-items-center">
													<div class="col-md text-center">
														<a class="item-label cursor-pointer text-center" id="carroFrontCambiar"><strong>Cambiar</strong></a>
														<input type="file" id="carroFrontFileInput" style="display:none;">
													</div>
													<div class="col-md text-center">
														<a class="item-label cursor-pointer text-center" id="carroFrontDescargar" target="_blank"><strong>Descargar</strong></a>
													</div>

												</div>
											</div>

										</div>
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md">
									<div class="row">
										<div class="item-label cursor-pointer"><strong>Reverso</strong></div>
									</div>
									<div class="row d-flex align-items-center justify-content-center">
										<div class="col-md-9">
											<img src="" class="img-fluid" id="carroReverso">
										</div>
										<div class="col-md">
											<div class="item border-bottom py-3">
												<div class="row justify-content-between align-items-center">
													<div class="col-md text-center">
														<a class="item-label cursor-pointer text-center" id="carroReversoCambiar"><strong>Cambiar</strong></a>
														<input type="file" id="carroBacktFileInput" style="display:none;">
													</div>
													<div class="col-md text-center">
														<a class="item-label cursor-pointer text-center" id="carroReversoDescargar" target="_blank"><strong>Descargar</strong></a>
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

				<!-- Moto -->
				<div class="col-12 col-lg-4">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						<div class="app-card-header p-3 border-bottom-0">
							<div class="row align-items-center gx-3">
								<div class="col-auto">
									<div class="app-icon-holder">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bicycle" viewBox="0 0 16 16">
											<path d="M4 4.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1v.5h4.14l.386-1.158A.5.5 0 0 1 11 4h1a.5.5 0 0 1 0 1h-.64l-.311.935.807 1.29a3 3 0 1 1-.848.53l-.508-.812-2.076 3.322A.5.5 0 0 1 8 10.5H5.959a3 3 0 1 1-1.815-3.274L5 5.856V5h-.5a.5.5 0 0 1-.5-.5zm1.5 2.443-.508.814c.5.444.85 1.054.967 1.743h1.139L5.5 6.943zM8 9.057 9.598 6.5H6.402L8 9.057zM4.937 9.5a1.997 1.997 0 0 0-.487-.877l-.548.877h1.035zM3.603 8.092A2 2 0 1 0 4.937 10.5H3a.5.5 0 0 1-.424-.765l1.027-1.643zm7.947.53a2 2 0 1 0 .848-.53l1.026 1.643a.5.5 0 1 1-.848.53L11.55 8.623z" />
										</svg>
									</div><!--//icon-holder-->

								</div>
								<div class="col-auto">
									<h4 class="app-card-title">Licencia Motocicleta</h4>
									<p class="peque">Vencimiento: <span id="vencimientoLicenciaMoto"></span></p>
								</div>
							</div>
						</div><!--//app-card-header-->
						<div class="app-card-body px-4 w-100">
							<div class="row">
								<div class="col-md">
									<div class="row">
										<div class="item-label cursor-pointer"><strong>Frente</strong></div>
									</div>
									<div class="row d-flex align-items-center justify-content-center">
										<div class="col-md-9">
											<img src="" class="img-fluid" id="motoFrente">
										</div>
										<div class="col-md">
											<div class="item border-bottom py-3">
												<div class="row justify-content-between align-items-center">
													<div class="col-md text-center">
														<a class="item-label cursor-pointer text-center" id="motoFrenteCambiar"><strong>Cambiar</strong></a>
														<input type="file" id="motoFrontFileInput" style="display:none;">
													</div>
													<div class="col-md text-center">
														<a class="item-label cursor-pointer text-center" id="motoFenteDescargar" target="_blank"><strong>Descargar</strong></a>
													</div>
												</div>
											</div>
											
										</div>
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md">
									<div class="row">
										<div class="item-label cursor-pointer"><strong>Reverso</strong></div>
									</div>
									<div class="row d-flex align-items-center justify-content-center">
										<div class="col-md-9">
											<img src="" class="img-fluid" id="motoReverso">
										</div>
										<div class="col-md">
											<div class="item border-bottom py-3">
												<div class="row justify-content-between align-items-center">
													<div class="col-md text-center">
														<a class="item-label cursor-pointer text-center" id="motoReversoCambiar"><strong>Cambiar</strong></a>
														<input type="file" id="motoBackFileInput" style="display:none;">
													</div>
													<div class="col-md text-center">
														<a class="item-label cursor-pointer text-center" id="motoReversoDescargar" target="_blank"><strong>Descargar</strong></a>
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

				<!-- Pasaporte -->
				<div class="col-12 col-lg-4">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						<div class="app-card-header p-3 border-bottom-0">
							<div class="row align-items-center gx-3">
								<div class="col-auto">
									<div class="app-icon-holder">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-airplane" viewBox="0 0 16 16">
											<path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Zm.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1c-.213 0-.458.158-.678.599Z" />
										</svg>
									</div><!--//icon-holder-->

								</div>
								<div class="col-auto">
									<h4 class="app-card-title">Pasaporte</h4>
									<p class="peque">Vencimiento: <span id="vencimientoPasaporte"></span></p>
								</div>
							</div>
						</div><!--//app-card-header-->
						<div class="app-card-body px-4 w-100">
							<div class="row">
								<div class="col-md">
									<div class="row">
										<div class="item-label cursor-pointer"><strong>Frente</strong></div>
									</div>
									<div class="row d-flex align-items-center justify-content-center">
										<div class="col-md-9">
											<img src="" class="img-fluid" id="pasaporte">
										</div>
										<div class="col-md">
											<div class="item border-bottom py-3">
												<div class="row justify-content-between align-items-center">
													<div class="col-md text-center">
														<a class="item-label cursor-pointer text-center" id="pasaporteCambiar"><strong>Cambiar</strong></a>
														<input type="file" id="pasaporteFileInput" style="display:none;">
													</div>
													<div class="col-md text-center">
														<a class="item-label cursor-pointer text-center" id="pasaporteDescargar" target="_blank"><strong>Descargar</strong></a>
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

				<!-- Documentos -->
				<div class="col-12 col-lg-4">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						<div class="app-card-header p-3 border-bottom-0">
							<div class="row align-items-center gx-3">
								<div class="col-auto">
									<div class="app-icon-holder">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
											<path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
											<path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
										</svg>
									</div>
								</div>
								<div class="col-auto">
									<h4 class="app-card-title">Documentos</h4>
								</div>
							</div>
						</div>
						<!-- CV -->
						<div class="app-card-body px-4 w-100 mt-3">
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="item-label cursor-pointer"><strong>Curriculum Vitae</strong></div>
									</div>
									<div class="row d-flex align-items-center justify-content-center">
										<div class="col-md-3">
											<img src="./assets/images/profiles/pdf.png" class="img-fluid">
										</div>
										<div class="col-md-8">
											<div class="item border-bottom py-3">
												<div class="row justify-content-between align-items-center">
													<div class="col-md">
														<a class="item-label cursor-pointer text-center" id="cvCambiar"><strong>Cambiar</strong></a>
														<input type="file" id="cvFileInput" style="display:none;"  accept=".doc,.docx,.pdf">
													</div>
												</div>
											</div>
											<div class="item border-bottom py-3" id="cvContent">
												<div class="row justify-content-between align-items-center">
													<div class="col-md">
														<a class="item-label cursor-pointer text-center" id="cvDescargar" target="_blank"><strong>Descargar</strong></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
						<!-- PENALES -->
						<div class="app-card-body px-4 w-100 mt-3">
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="item-label cursor-pointer"><strong>Antecedentes Penales</strong></div>
									</div>
									<div class="row d-flex align-items-center justify-content-center">
										<div class="col-md-3">
											<img src="./assets/images/profiles/pdf.png" class="img-fluid">
										</div>
										<div class="col-md-8" >
											<div class="item border-bottom py-3" >
												<div class="row justify-content-between align-items-center">
													<div class="col-md" >
														<a class="item-label cursor-pointer text-center" id="apCambiar"><strong>Cambiar</strong></a>
														<input type="file" id="penFileInput" style="display:none;"  accept=".doc,.docx,.pdf">
													</div>
												</div>
											</div>
											<div class="item border-bottom py-3" id="penContent">
												<div class="row justify-content-between align-items-center">
													<div class="col-md">
														<a class="item-label cursor-pointer text-center" id="apDescargar" target="_blank"><strong>Descargar</strong></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- POLICIALES -->
						<div class="app-card-body px-4 w-100 mt-3">
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="item-label cursor-pointer"><strong>Antecedentes Policiales</strong></div>
									</div>
									<div class="row d-flex align-items-center justify-content-center">
										<div class="col-md-3">
											<img src="./assets/images/profiles/pdf.png" class="img-fluid">
										</div>
										<div class="col-md-8" >
											<div class="item border-bottom py-3" >
												<div class="row justify-content-between align-items-center">
													<div class="col-md">
														<a class="item-label cursor-pointer text-center" id="apolCambiar"><strong>Cambiar</strong></a>
														<input type="file" id="polFileInput" style="display:none;"  accept=".doc,.docx,.pdf">
													</div>
												</div>
											</div>
											<div class="item border-bottom py-3" id="polContent">
												<div class="row justify-content-between align-items-center">
													<div class="col-md">
														<a class="item-label cursor-pointer text-center" id="apolDescargar" target="_blank"><strong>Descargar</strong></a>
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

		</div>
	</div>



</div>