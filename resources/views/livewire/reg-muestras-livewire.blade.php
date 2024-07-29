<div>

    @if (session()->has('messageCliente'))
        <div class="alert alert-success">
            {{ session('messageCliente') }}
        </div>
    @endif

    <div class="container mt-5 bg-white shadow p-6 rounded-lg">
        <form wire:submit.prevent="guardarDatosCliente">
            <div class="row border border-primary">
                <!-- Input CONSECUTIVO -->



                <div class="col-12">
                    <div class="form-group">
                        <x-adminlte-input type="text" name="consecutivo" label="CONSECUTIVO" label-class="text-lightblue" wire:model="consecutivo" disabled>
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
            </div>

                <!-- Column 1 -->
                <div class="col-6">
                    {{-- With prepend slot, lg size, and label --}}
                <x-adminlte-select name="cliente" label="CLIENTE" label-class="text-lightblue" igroup-size="lg" wire:model="cliente">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    <option value="">Seleccionar Cliente </option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->razon_social }}</option>
                    @endforeach
                </x-adminlte-select>
        </div>

                <div class="col-6">
                        {{-- With prepend slot, lg size, and label --}}
                    <x-adminlte-select name="sede" label="SEDE" label-class="text-lightblue" igroup-size="lg" wire:model="sede">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-car-side"></i>
                            </div>
                        </x-slot>
                        <option value="">Seleccionar Tipo Sedes </option>
                        @foreach ($sedes as $sede)
                            <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                        @endforeach
                    </x-adminlte-select>
                </div>


                <!-- Column 2 -->
                <div class="col-md-6">
                    {{-- With prepend slot --}}
                    <x-adminlte-input type="text" name="responsable" label="RESPONSABLE" placeholder="Ej: Raul Gonzalez" label-class="text-lightblue" value="{{ old('responsable') }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-phone text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>

                <!-- Column 3 -->
                <div class="col-md-6">
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
                <div class="col-12 text-left">
                    <x-adminlte-button type="submit" theme="primary" label="Guardar" class="mt-2"/>
                </div>
            </div><br>
        </form>

        <!-- Fila inferior con dos columnas -->
        <div class="row border border-primary">
            <!-- Columna de otros inputs -->
            <div class="col-md-6 ">
                <h5>Datos de la Muestra</h5>
        <form action="" wire:submit="guardarDatosMuestras({{ $idNuevoRegistro }})">
                {{-- With prepend slot, lg size, and label --}}
                <x-adminlte-select name="tipoMuestra" label="TIPO DE MUESTRA" label-class="text-lightblue" igroup-size="lg" wire:model="tipoMuestra">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    <option value="">Seleccionar Tipo de Muestra </option>
                    @foreach ($tipoMuestras as $tipoMuestra)
                        <option value="{{ $tipoMuestra->tipo }}">{{ $tipoMuestra->tipo }}</option>
                    @endforeach
                </x-adminlte-select>

                {{-- With prepend slot, sm size, and label --}}
                <x-adminlte-textarea name="descripcion" label="DESCRIPCION" rows=5 label-class="text-lightblue" igroup-size="sm" placeholder="Insertar Descripcion..." wire:model="descripcion">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-textarea>

                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="temperatura" label="TEMPERATURA" placeholder="Ej:15.0" label-class="text-lightblue" wire:model="temperatura">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="lote" label="LOTE" placeholder="Ej:15.0" label-class="text-lightblue" wire:model="lote">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="registroinvima" label="REGISTRO INVIMA" placeholder="Ej:15.0" label-class="text-lightblue" wire:model="registroinvima">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot --}}
                <x-adminlte-input type="date" name="fechaVencimiento" label="FECHA VENCIMIENTO" placeholder="Ej:15.0" label-class="text-lightblue" wire:model="fechaVencimiento">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot, sm size, and label --}}
                <x-adminlte-textarea name="observacion" label="OBSERVACION" rows=5 label-class="text-lightblue" igroup-size="sm" placeholder="Insertar Observacion..." wire:model="observacion">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-textarea>
                    <!-- Botón de Guardar -->
                    <div class="col-12 text-left">
                        <x-adminlte-button type="submit" theme="primary" label="Guardar" class="mt-2"/>
                    </div>
        </form>
            </div>

            @if($mostrarDiv)
                <!-- Columna de checkboxes PARAMETROS -->
                <div class="col-md-3">
                    {{-- @livewire('listar-checks-parametros-m') --}}
                    @if (session()->has('messageMicro'))
                        <div class="alert alert-success">
                            {{ session('messageMicro') }}
                        </div>
                    @endif
                    <h5>Parametros Microbiologico</h5>

                    <form action="" wire:submit="guardarParametrosMicro({{ $idNuevoRegistro }})">
                        <ul style="list-style-type: none; padding: 0;">
                            @foreach ($parametrosMicro as $parametro )
                                <li>
                                    <label for="">
                                        <x-checkbox name="parametro[]" value="{{ $parametro->parametro }}" wire:model="parametrosMicroSeleccionados"/>
                                        {{ $parametro->parametro }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                        <!-- Botón de Guardar -->
                        <div class="col-12 text-left">
                            <x-adminlte-button type="submit" theme="primary" label="Guardar" class="mt-2"/>
                        </div>
                    </form>
                </div>

                <div class="col-md-3">
                    @if (session()->has('messageFisico'))
                        <div class="alert alert-success">
                        {{ session('messageFisico') }}
                        </div>
                    @endif
                    <h5>Parametros Fisicoquimico</h5>
                    <form action="" wire:submit="guardarParametrosFisico({{ $idNuevoRegistro }})">
                        <ul style="list-style-type: none; padding: 0;">
                            @foreach ($parametrosFisico as $parametro )
                                <li>
                                    <label for="">
                                        <x-checkbox name="parametroF[]" value="{{ $parametro->parametroF }}" wire:model="parametrosFisicoSeleccionados"/>
                                        {{ $parametro->parametroF }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                        <!-- Botón de Guardar -->
                        <div class="col-12 text-left">
                            <x-adminlte-button type="submit" theme="primary" label="Guardar" class="mt-2"/>
                        </div>
                    </form>
                </div>
                <!-- Columna de checkboxes PARAMETROS -->
            @endif

        </div>
    </div>
</div>
