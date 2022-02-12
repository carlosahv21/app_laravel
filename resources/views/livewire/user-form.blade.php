<div>
    <div class="row align-items-start p-2">
        <div class="col-6 p-2">
            <label for="roleTipo" class="form-label">Rol <span class="text-danger"> *</span></label>
            <select wire:ignore.model="role" class="form-select" id="roleTipo">
                <option value="" disabled selected>Elegir</option>
                <option value="admin">Admin</option>
                <option value="client">Cliente</option>
                <option value="domiciliary">Domiciliario</option>
              </select>
        </div>
        <div class="col-6 p-2">
            <label for="inputNombre" class="form-label">Nombre <span class="text-danger"> *</span></label>
            <input wire:model="first_name" type="text" class="form-control" placeholder="Ej: John" id="inputNombre">
            @if ($errors->has('first_name'))
                <div class="invalid-feedback">
                    {{ $errors->first('first_name') }}
                </div>
            @endif
        </div>
        <div class="col-6 p-2">
            <label for="inputApellido" class="form-label">Apellido <span class="text-danger"> *</span></label>
            <input wire:model="last_name" type="text" class="form-control" placeholder="Ej: Doe" id="inputApellido">
            @if ($errors->has('last_name'))
                <div class="invalid-feedback">
                    {{ $errors->first('last_name') }}
                </div>
            @endif
        </div>
        <div class="col-6 p-2">
            <label for="inputEmail" class="form-label">Email <span class="text-danger"> *</span></label>
            <input wire:model="email" type="text" class="form-control" placeholder="Ej: johndoe@test.com" id="inputEmail">
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <div class="col-12 p-2">
            <label for="inputDireccion" class="form-label">Direccion <span class="text-danger"> *</span></label>
            <input wire:model="address" type="text" class="form-control" placeholder="Direccion completa que incluya nombre edificio o conjunto" id="inputDireccion" >
            @if ($errors->has('address'))
                <div class="invalid-feedback">
                    {{ $errors->first('address') }}
                </div>
            @endif
        </div>
        <div class="col-6 p-2">
            <label for="inputCelular" class="form-label">Celular</label>
            <input wire:model="phone" type="text" class="form-control" placeholder="Ej: 311999999" id="inputCelular">
            @if ($errors->has('phone'))
                <div class="invalid-feedback">
                    {{ $errors->first('phone') }}
                </div>
            @endif
        </div>
        <div class="col-6 p-2">
            <label for="inputBarrio" class="form-label">Barrio </label>
            <input wire:model="neighborhood" type="text" class="form-control" placeholder="Ej: Castilla" id="inputBarrio">
            @if ($errors->has('neighborhood'))
                <div class="invalid-feedback">
                    {{ $errors->first('neighborhood') }}
                </div>
            @endif
        </div>
        <div class="col-6 p-2">
            <label for="inputLocalidad" class="form-label">Localidad</label>
            <input wire:model="location" type="text" class="form-control" placeholder="Ej: Kenedy" id="inputLocalidad">
            @if ($errors->has('location'))
                <div class="invalid-feedback">
                    {{ $errors->first('location') }}
                </div>
            @endif
        </div>
        <div class="col-6 p-2">
            <label for="inputIdentificacion" class="form-label">NIT / CC </label>
            <input wire:model="identificacion" type="text" class="form-control" placeholder="Ej: 123456789-0" id="inputIdentificacion">
            @if ($errors->has('identificacion'))
                <div class="invalid-feedback">
                    {{ $errors->first('identificacion') }}
                </div>
            @endif
        </div>
        <div class="col-6 p-2">
            <label for="inputPlaca" class="form-label">Matricula del Domiciliario </label>
            <input wire:model="enrollment" type="text" class="form-control" placeholder="Ej: AAA 000" id="inputPlaca">
            @if ($errors->has('enrollment'))
                <div class="invalid-feedback">
                    {{ $errors->first('enrollment') }}
                </div>
            @endif
        </div>
    </div>
    <div class="d-flex justify-content-end py-4">
        <button wire:click="save" class="btn btn-secondary">Guardar</button>
        <button type="button" class="btn btn-link text-gray-600 " data-bs-dismiss="modal">Cancelar</button>
    </div>
</div>

