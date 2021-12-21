@section('title','Dashboard')

@if (auth()->user()->role == 'admin')
<div class="row mt-4">
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                            <i class="fas fa-users fa-2x" aria-hidden="true"></i> 
                        </div>
                        <div class="d-sm-none">
                            <h2 class="h5">Clientes</h2>
                            <h3 class="fw-extrabold mb-1">345,678</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Clientes</h2>
                            <h3 class="fw-extrabold mb-2">345k</h3>
                        </div>
                        <div class="d-flex mt-1" style="font-size: 0.725em;">
                            <div>Creaciones el ultimo mes <i class="fas fa-chevron-up text-success" aria-hidden="true"></i> <span class="text-success fw-bolder">22%</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                            <i class="fas fa-file-invoice fa-2x" aria-hidden="true"></i> 
                        </div>
                        <div class="d-sm-none">
                            <h2 class="h5">Pedidos</h2>
                            <h3 class="fw-extrabold mb-1">345,678</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Pedidos</h2>
                            <h3 class="fw-extrabold mb-2">345k</h3>
                        </div>
                        <div class="d-flex mt-1" style="font-size: 0.725em;">
                            <div>Creaciones el ultimo mes <i class="fas fa-chevron-up text-success" aria-hidden="true"></i> <span class="text-success fw-bolder">22%</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                            <i class="fas fa-truck-loading fa-2x" aria-hidden="true"></i> 
                        </div>
                        <div class="d-sm-none">
                            <h2 class="h5">Entregas</h2>
                            <h3 class="fw-extrabold mb-1">345,678</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h6 text-gray-400 mb-0">Entregas</h2>
                            <h3 class="fw-extrabold mb-2">345k</h3>
                        </div>
                        <div class="d-flex mt-1" style="font-size: 0.725em;">
                            <div>Creaciones el ultimo mes <i class="fas fa-chevron-up text-success" aria-hidden="true"></i> <span class="text-success fw-bolder">22%</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mb-4">
        <div class="card border-0 shadow" style="background-color: #fac0b9">
            <div class="card-header d-sm-flex flex-row align-items-center flex-0">
                <div class="d-block mb-3 mb-sm-0">
                    <div class="fs-5 fw-normal mb-2">Sales Value</div>
                    <h2 class="fs-3 fw-extrabold">$10,567</h2>
                    <div class="small mt-2"> 
                        <span class="fw-normal me-2">Yesterday</span>                              
                        <span class="fas fa-angle-up text-success"></span>                                   
                        <span class="text-success fw-bold">10.57%</span>
                    </div>
                </div>
                <div class="d-flex ms-auto">
                    <a href="#" class="btn btn-secondary btn-sm me-2">Month</a>
                    <a href="#" class="btn btn-sm me-3">Week</a>
                </div>
            </div>
            <div class="card-body p-2">
                <div class="ct-chart-sales-value ct-double-octave ct-series-g"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-6">
        <div class="card border-0 shadow">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="fs-5 fw-bold mb-0">Pedidos Pendientes</h2>
                    </div>
                    <div class="col text-end">
                        <a href="#" class="btn btn-sm btn-primary">Ver todos</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th class="border-bottom" scope="col">Cliente</th>
                        <th class="border-bottom" scope="col">Fecha de Pedido</th>
                        <th class="border-bottom" scope="col">Direccion</th>
                        <th class="border-bottom" scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bolder text-gray-900">
                                Jhon Doe
                            </td>
                            <td class="fw-bolder text-danger text-500">
                                02/12/2021
                            </td>
                            <td class="fw-bolder text-gray-900">
                                Calle 2 #26 - 36
                            </td>
                            <td class="fw-bolder text-gray-900">
                                $ 150.000 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-6">
        <div class="card border-0 shadow">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="fs-5 fw-bold mb-0">Entregas para hoy</h2>
                    </div>
                    <div class="col text-end">
                        <a href="#" class="btn btn-sm btn-primary">Ver todas</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th class="border-bottom" scope="col">Cliente</th>
                        <th class="border-bottom" scope="col">Estado</th>
                        <th class="border-bottom" scope="col">Hora de entrega</th>
                        <th class="border-bottom" scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bolder text-gray-900">
                                Jhon Doe
                            </td>
                            <td class="fw-bolder text-danger text-500">
                                No entregado
                            </td>
                            <td class="fw-bolder text-gray-900">
                                02:00 PM
                            </td>
                            <td class="fw-bolder text-gray-900">
                                $ 150.000 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@elseif(auth()->user()->role == 'client')
<div class="row mt-4">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow" style="background-color: #fac0b9">
            <div class="card-header d-sm-flex flex-row align-items-center flex-0">
                <div class="d-block mb-3 mb-sm-0">
                    <div class="fs-5 fw-normal mb-2">Productos mas pedidos</div>
                </div>
                <div class="d-flex ms-auto">
                    <a href="#" class="btn btn-secondary btn-sm me-2">Month</a>
                    <a href="#" class="btn btn-sm me-3">Week</a>
                </div>
            </div>
            <div class="card-body p-2">
                <div id="chart"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-6">
        <div class="card border-0 shadow">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="fs-5 fw-bold mb-0">Tus Pedidos este mes</h2>
                    </div>
                    <div class="col text-end">
                        <a href="#" class="btn btn-sm btn-primary">Ver todos</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th class="border-bottom" scope="col">Pedido</th>
                        <th class="border-bottom" scope="col">Entregado en</th>
                        <th class="border-bottom" scope="col">Total</th>
                        <th class="border-bottom" scope="col">Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bolder text-gray-900">
                                02/12/2021
                            </td>
                            <td class="fw-bolder text-gray-900">
                                Calle 2 #26 - 36
                            </td>
                            <td class="fw-bolder text-gray-900">
                                $ 150.000 
                            </td>
                            <td class="fw-bolder text-gray-900">
                                <span>
                                    <span class="badge text-white" style="background-color:#10B981">Entregado</span>
                                </span> 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-6">
        <div class="card border-0 shadow">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="fs-5 fw-bold mb-0">Entregas para hoy</h2>
                    </div>
                    <div class="col text-end">
                        <a href="#" class="btn btn-sm btn-primary">Ver todas</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                {{-- <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th class="border-bottom" scope="col">Cliente</th>
                        <th class="border-bottom" scope="col">Estado</th>
                        <th class="border-bottom" scope="col">Hora de entrega</th>
                        <th class="border-bottom" scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bolder text-gray-900">
                                Jhon Doe
                            </td>
                            <td class="fw-bolder">
                                <span class="badge text-white" style="background-color:#f5365c">No Entregado</span>
                            </td>
                            <td class="fw-bolder text-gray-900">
                                02:00 PM
                            </td>
                            <td class="fw-bolder text-gray-900">
                                $ 150.000 
                            </td>
                        </tr>
                    </tbody>
                </table> --}}
                <div class="d-flex justify-content-center py-5">
                    <span class="text-gray-500"><i class="fas fa-archive"></i>  No tienes entregas para el dia de hoy </span>
                </div>
            </div>
        </div>
    </div>
</div>
@else

@endif