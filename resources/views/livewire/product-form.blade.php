<div>
    <div class="row align-items-start p-2">
        <div class="col-6 p-2">
            <label for="inputNombre" class="form-label">Nombre del producto<span class="text-danger"> *</span></label>
            <input wire:model="name" type="text" class="form-control" placeholder="Ej: Fresa" id="inputNombre">
            @if ($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>
        <div class="col-6 p-2">
            <label for="inputReferencia" class="form-label">Referencia <span class="text-danger"> *</span></label>
            <input wire:model="reference" type="text" class="form-control" placeholder="Ej: tipo 1" id="inputReferencia">
            @if ($errors->has('reference'))
                <div class="invalid-feedback">
                    {{ $errors->first('reference') }}
                </div>
            @endif
        </div>
        <div class="col-6 p-2">
            <label for="inputPresentation" class="form-label">Presentación  <span class="text-danger"> *</span></label>
            <input wire:model="presentation" type="text" class="form-control" placeholder="Ej: gramos" id="inputPresentation">
            @if ($errors->has('presentation'))
                <div class="invalid-feedback">
                    {{ $errors->first('presentation') }}
                </div>
            @endif
        </div>
        <div class="col-6 p-2">
            <label for="inputPrecio" class="form-label">Precio <span class="text-danger"> *</span></label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input wire:model="price" type="text" class="form-control" placeholder="Ej: 100000" id="inputPrecio">
              </div>
            @if ($errors->has('price'))
                <div class="invalid-feedback">
                    {{ $errors->first('price') }}
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-end py-4">
            <button wire:click="save" class="btn btn-secondary">Guardar</button>
            <button type="button" class="btn btn-link text-gray-600 " data-bs-dismiss="modal">Cancelar</button>
    </div>
</div>
