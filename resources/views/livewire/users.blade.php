@section('title','Usuario')

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
                    <li class="breadcrumb-item active" aria-current="page">Lista de Usuarios</li>
                </ol>
            </nav>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button class="btn btn-secondary me-2 dropdown-toggle" data-bs-toggle="modal" data-bs-target="#createUser">
                <span class="fas fa-plus"></span> Crear Usuarios
            </button>
            <div class="btn-group ms-2 ms-lg-3">
                <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button>
                <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button>
            </div>
        </div>
    </div>

    <div class="table-settings mb-4">
        <div class="row justify-content-between align-items-center">
            <div class="col-9 col-lg-8 d-md-flex">
                <div class="input-group me-2 me-lg-3 fmxw-300">
                    <span class="input-group-text">
                        <span class="fas fa-search"></span>
                    </span>
                    <input type="text" class="form-control" placeholder="Search users">
                </div>
                <select class="form-select fmxw-200 d-none d-md-inline" aria-label="Message select example 2">
                    <option selected>All</option>
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                    <option value="3">Pending</option>
                    <option value="3">Cancelled</option>
                </select>
            </div>
            <div class="col-3 col-lg-4 d-flex justify-content-end">
                <div class="btn-group">
                    <div class="dropdown">
                        <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-1"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fas fa-cog"></span>
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end pb-0">
                            <span class="small ps-3 fw-bold text-dark">Ver</span>
                            <a class="dropdown-item d-flex align-items-center fw-bold" href="#">10 <span class="fas fa-check ms-auto"></span></a>
                            <a class="dropdown-item fw-bold" href="#">20</a>
                            <a class="dropdown-item fw-bold rounded-bottom" href="#">30</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-body shadow border-0 table-wrapper table-responsive">
        <div class="d-flex mb-3">
            <select class="form-select fmxw-200" aria-label="Message select example">
                <option selected>Bulk Action</option>
                <option value="1">Send Email</option>
                <option value="2">Change Group</option>
                <option value="3">Delete User</option>
            </select>
            <button class="btn btn-sm px-3 btn-secondary ms-3">Apply</button>
        </div>
        @if ($users->count())
            <table class="table user-table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th>
                            <div class="form-check dashboard-check">
                                <input class="form-check-input" type="checkbox" value="" id="userCheck55">
                                <label class="form-check-label" for="userCheck55">
                                </label>
                            </div>
                        </th>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Direccion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="form-check dashboard-check">
                                    <input class="form-check-input" type="checkbox" value="" id="userCheck1">
                                    <label class="form-check-label" for="userCheck1">
                                    </label>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="d-flex align-items-center">
                                    <img src="../assets/img/team/profile-picture-1.jpg" class="avatar rounded-circle me-3"
                                        alt="Avatar">
                                    <div class="d-block">
                                        <span class="fw-bold">{{ $user->first_name . " ". $user->last_name }}</span>
                                        <div class="small text-gray">{{ $user->email }}</div>
                                    </div>
                                </a>
                            </td>
                            <th>{{ $user->role }}</th>
                            <th>{{ $user->address }}</th>
                            <th style="width: 5%;">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item btn-outline-gray-500" href="#"><i class="fas fa-eye"></i> Ver</a></li>
                                    @if ($user->role != 'admin')
                                        <li><button wire:click="selectItem({{ $user->id }}, 'delete')" class="dropdown-item btn-outline-gray-500"><i class="fas fa-trash"></i> Eliminar</button></li>
                                    @endif
                                    </ul>
                                </li>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end py-4">
                {{ $users->links()}}
            </div>
        @endif
    </div>
    <!-- Modal Add-->
    <div wire:ignore.self class="modal fade" id="createUser" tabindex="-1" aria-labelledby="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Crear Usuario</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @livewire('user-form')
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete-->
    <div wire:ignore.self class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Eliminar Usuario</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseas eliminar este registro?
                </div>
                <div class="modal-footer">
                    <button wire:click="delete" class="btn btn-secondary">Eliminar</button>
                    <button type="button" class="btn btn-link text-gray-600 " data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>