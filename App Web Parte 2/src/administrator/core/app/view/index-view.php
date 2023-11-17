                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Inicio</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Inicio</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                        <p>Clientes</p>
                                        <h1><?php echo count(PersonData::getAll()); ?></h1>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./?view=persons&opt=all">Ver mas</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                        <p>Operaciones</p>
                                        <h1><?php echo count(OperationData::getAll()); ?></h1>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./?view=operations&option=all">Ver mas</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Transferencias
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="20"></canvas></div>
                                </div>
                            </div>

                        </div>
                    -->

                    </div>
                </main>