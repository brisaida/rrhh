<div class="row g-2">
    <div class="col-md g-2">
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">¿Posee Vehiculo Propio?</label>

        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
            <label class="form-check-label" for="inlineCheckbox1">Motocicleta</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
            <label class="form-check-label" for="inlineCheckbox2">Vehiculo</label>
        </div>
    </div>
</div>


<!--EDUCACIÓN-->
<div class="tab-pane fade show" id="referencias" role="tabpanel" aria-labelledby="referencias-tab">
    <div class="app-card app-card-orders-table shadow-sm mb-5">
        <div class="app-card-body">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <div class="row g-2">

                        <div class="col-md">
                            <div class="form-floating">
                                <div class="form-floating mb-3">
                                    <input type="input" class="form-control" id="nombreReferenciaInput" placeholder="">
                                    <label for="nombreReferenciaInput">Nombre</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <div class="form-floating mb-3">
                                    <input type="input" class="form-control" id="profesionReferenciaInput" placeholder="">
                                    <label for="profesionReferenciaInput">Profesión</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <div class="form-floating mb-3">
                                    <input type="input" class="form-control" id="telReferenciaInput" placeholder="">
                                    <label for="telReferenciaInput">Teléfono</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">

                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="input" class="form-control" id="dirReferenciaInput" placeholder="">
                                <label for="dirReferenciaInput">Dirección</label>
                            </div>
                        </div>
                        <div class="col-auto ">
                            <a class="btn app-btn-secondary" id="agregarReferenciaBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!--TABLA-->
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left" id="referenciasTabla">
                                        <thead>
                                            <tr>
                                                <th class="cell">Nombre</th>
                                                <th class="cell">Profesión</th>
                                                <th class="cell">Teléfono</th>
                                                <th class="cell">Dirección</th>
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
</div>