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
                        <h2 class="fs-5 fw-bold mb-0">Entregas Programadas</h2>
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
<div class="row">
    <div class="col-12 col-xl-12 mt-2">
        <section class="pt-5 pb-5">
            <div class="container">
              <div class="row">
                <div class="col-6">
                  <h3 class="mb-3">Últimos Productos </h3>
                </div>
                <div class="col-6 text-right">
                  <a class="btn btn-primary mb-3 mr-1" data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev" role="button">
                    <i class="fa fa-arrow-left"></i>
                  </a>
                  <a class="btn btn-primary mb-3 " data-bs-target="#carouselExampleIndicators2" data-bs-slide="next" role="button" >
                    <i class="fa fa-arrow-right"></i>
                  </a>
                </div>
                <div class="col-12">
                  <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="carousel">
          
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
          
                          <div class="col-md-3 mb-3">
                            <div class="card">
                              <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                              <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 mb-3">
                            <div class="card">
                              <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                              <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 mb-3">
                            <div class="card">
                              <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                              <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 mb-3">
                            <div class="card">
                              <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                              <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      
                      
                      <div class="carousel-item">
                        <div class="row">
          
                                          <div class="col-md-3 mb-3">
                            <div class="card">
                              <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                              <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 mb-3">
                            <div class="card">
                              <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                              <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 mb-3">
                            <div class="card">
                              <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                              <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 mb-3">
                            <div class="card">
                              <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                              <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          
                              </div>
                            </div>
                          </div>
          
                        </div>
                      </div>
                      
                      
                      <div class="carousel-item">
                        <div class="row">
                                     <div class="col-md-3 mb-3">
                            <div class="card">
                              <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                              <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 mb-3">
                            <div class="card">
                              <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                              <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 mb-3">
                            <div class="card">
                              <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                              <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 mb-3">
                            <div class="card">
                              <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                              <div class="card-body">
                                <h4 class="card-title">Special title treatment</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          
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
          </section>
    </div>
    <div class="col-12 col-xl-6 mt-2">
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
    <div class="col-12 col-xl-6 mt-2">
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