<div>

    @if (session()->has('message'))
    <div class="alert alert-success">
    {{ session('message') }}
    </div>
    @endif
    
    <div class="container mt-5 bg-white shadow p-6 rounded-lg">

        <form wire:submit.prevent="guardarDatos">
            <div class="row">
                <!-- Input CONSECUTIVO -->
                <div class="col-12">
                    <div class="form-group">
                        <x-adminlte-input type="text" name="consecutivo" label="CONSECUTIVO" placeholder="CMFI320" label-class="text-lightblue" wire:model="consecutivo">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>

                <!-- Column 1 -->
                <div class="col-md-4">
                    <div class="form-group">
                        <x-adminlte-input type="text" name="sede" label="SEDE" placeholder="Macdonals 2" label-class="text-lightblue" wire:model="sede">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-building text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="col-md-4">
                    <div class="form-group">
                        <x-adminlte-input type="text" name="responsable" label="RESPONSABLE" placeholder="Ingrese aquí el Responsable" label-class="text-lightblue" wire:model="responsable">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user-tie text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>

                <!-- Column 3 -->
                <div class="col-md-4">
                    <div class="form-group">
                        <x-adminlte-input type="text" name="cargo" label="CARGO" placeholder="Ingrese aquí el Cargo" label-class="text-lightblue" wire:model="cargo">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-briefcase text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>

                <!-- Segunda Fila de Inputs -->
                <div class="col-md-4">
                    <div class="form-group">
                        <x-adminlte-input type="text" name="cedula" label="CEDULA" placeholder="Ingrese aquí la Cédula" label-class="text-lightblue" wire:model="cedula">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-id-card text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <x-adminlte-input type="text" name="telefono" label="TELEFONO" placeholder="Ingrese aquí el Teléfono" label-class="text-lightblue" wire:model="telefono">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-phone text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <x-adminlte-input type="email" name="correo" label="CORREO" placeholder="Ingrese aquí el Correo" label-class="text-lightblue" wire:model="correo">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>

                <!-- Botón de Guardar -->
                <div class="col-12 text-right">
                    <x-adminlte-button type="submit" theme="primary" label="Guardar" class="mt-2"/>
                </div>
            </div>
        </form>



            <!-- Fila inferior con dos columnas -->
            <div class="row">
                <!-- Columna de checkboxes -->
                <div class="col-md-3">
                    <h5></h5>
                   @livewire('listar-checks-parametros-m')
                </div>
                <div class="col-md-3">
                    <h5></h5>
                   @livewire('listar-checks-parametros-m')
                </div>

                <!-- Columna de otros inputs -->
                <div class="col-md-6">
                    <h5>Otros Datos</h5>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" placeholder="Teléfono">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" placeholder="Dirección">
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" placeholder="Ciudad">
                    </div>
                </div>
            </div>

        </div>
    </div>
