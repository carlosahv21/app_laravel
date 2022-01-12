@section('title','Agregar Pedido')

<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <span class="fas fa-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Jointrust</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Agregar Pedido</li>
                </ol>
            </nav>
        </div>
    </div>

    <div>
        <form>
            <div class="row">
                <div class="col-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img src="../../assets/img/team/profile-picture-1.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                    <div class="text-end" style="margin-top: 11%;">
                                        <a class="text-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Agregar al pedido"> 
                                            <small>
                                                <div class="icon-shape icon-xs icon-shape-secondary rounded">
                                                    <i class="fas fa-cart-plus"></i>
                                                </div>
                                            </small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img src="../../assets/img/team/profile-picture-1.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                    <div class="text-end" style="margin-top: 11%;">
                                        <a class="text-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Agregar al pedido"> 
                                            <small>
                                                <div class="icon-shape icon-xs icon-shape-secondary rounded">
                                                    <i class="fas fa-cart-plus"></i>
                                                </div>
                                            </small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img src="../../assets/img/team/profile-picture-1.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                    <div class="text-end" style="margin-top: 11%;">
                                        <a class="text-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Agregar al pedido"> 
                                            <small>
                                                <div class="icon-shape icon-xs icon-shape-secondary rounded">
                                                    <i class="fas fa-cart-plus"></i>
                                                </div>
                                            </small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow my-4">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 col-xl-8 col-xxl-6">
                        <div class="card-header border-0 text-center">
                            <h2 class="h3">Selecciona tu producto</h2>
                        </div>
                        <div class="card-body row">
                            <div wire:ignore class="col-11">
                                <!-- Choice Select -->
                                <select wire:model="select" id="products" class="w-100" name="select">
                                    @if ($products->count())
                                    <option value="" selected disabled>Elegir producto</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ strtoupper($product->name)." - ".$product->reference }} </option>
                                        @endforeach
                                    @else
                                        <option value="">No hay produtos</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-1">
                                <div class="text-end" style="margin-top: 11%;">
                                    <a wire:click="addProduct" class="text-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Agregar al pedido"> 
                                        <small>
                                            <div class="icon-shape icon-xs icon-shape-secondary rounded">
                                                <i class="fas fa-cart-plus"></i>
                                            </div>
                                        </small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 table-wrapper table-responsive">
                <div>
                    <table class="table product-table align-items-center" id='table-data'>
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th style="width: 25%;">Producto</th>
                                <th style="width: 10%">Cantidad</th>
                                <th style="width: 10%">Precio</th>
                                <th style="width: 10%">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($orders_products->count())
                                @foreach($orders_products as $key => $data_product)
                                <tr class="text-center">
                                    <td style="width: 25%;">
                                        {{ $data_product['name'] }}
                                    </td>
                                    <td>
                                        <input  wire:model="amount.{{ $key }} ( {{ $data_product['price'] }}) "  class="form-control" type="number" placeholder="No.">
                                    </td>
                                    <td class="text-end">
                                        <p>
                                            <i class="fas fa-dollar-sign"></i> {{ number_format($data_product['price'],'2','.',',') }}
                                        </p>
                                    </td>
                                    <td class="text-end">
                                        <div class="row">
                                            <div class="col-10">
                                                <p> 
                                                    <i class="fas fa-dollar-sign"></i> 
                                                    <span wire:model.defer="total{{ $key }}">
                                                        0,00
                                                    </span>
                                                </p>
                                            </div>
                                            <div wire:click="removeProduct({{$key}})" class="col-2">
                                                <a class="item-delete text-danger"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <td colspan="4">
                                    <div class="d-flex justify-content-center py-6">
                                        <span class="text-gray-500"><i class="fas fa-archive"></i>  Aca mostraremos tus productos </span>
                                    </div>
                                </td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card border-0 shadow components-section my-4">
                <div class="row">
                    <div class="col-6 my-4 mx-4">
                        <label for="textarea">Comentarios</label>
                        <textarea class="form-control textarea" placeholder="Cuéntanos si tienes alguna sugerencias o recomendación especial." id="textarea" rows="4"></textarea>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-4 d-flex justify-content-end mb-4 py-4">
                        <div class="mt-4">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong>Subtotal</strong>
                                        </td>
                                        <td class="right">$8.497,00</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Discount (20%)</strong>
                                        </td>
                                        <td class="right">$1,699,40</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>VAT (10%)</strong>
                                        </td>
                                        <td class="right">$679,76</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong>$7.477,36</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="right" colspan="2">
                                            <div class="mt-2">
                                                <p>¿Aceptarías recibir una entrega parcial de tu pedido?</p>
                                                <div class="row text-center">
                                                    <div class="col-6">
                                                        
                                                        <input class="form-check-input" type="radio" name="delivery" id="exampleRadios1" value="Obvio" > Obvio microbio                
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="form-check-input" type="radio" name="delivery" id="exampleRadios1" value="Pailas" > Pailas
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="2">
                                            <button type="button" class="btn btn-link text-gray-600">Cancelar</button>
                                            <button class="btn btn-secondary" >Hacer pedido</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<div>
@include('livewire.form_orders')