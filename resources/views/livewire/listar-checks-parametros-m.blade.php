<div>
    <p>El ID del nuevo registro es: {{ $idNuevoRegistro }}</p>
            @if (session()->has('message'))
                <div class="alert alert-success">
                {{ session('message') }}
                </div>
            @endif
    <form action="" wire:submit="guardar">
        <ul style="list-style-type: none; padding: 0;">
            @foreach ($parametrosMicro as $parametro )
                <li>
                    <label for="">
                        <x-checkbox name="parametro[]" value="{{ $parametro->parametro }}" wire:model="parametrosSeleccionados"/>
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
