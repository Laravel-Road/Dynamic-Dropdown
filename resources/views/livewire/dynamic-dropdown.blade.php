<div>
    <div class="my-8 mx-4">
        <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
        <select wire:model="estado" id="estado" name="estado" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-200 focus>outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            <option value="" selected>{{ __('Selecione um estado...') }}</option>
            @foreach($this->estados as $estado)
                <option value="{{ $estado->sigla }}">{{ $estado->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="my-8 mx-4">
        <label for="cidade" class="block text-sm font-medium text-gray-700">Cidade</label>
        <select id="cidade" name="cidade" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-200 focus>outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            <option value="" selected>{{ __('Selecione uma cidade...') }}</option>
            @if($this->estado)
                @foreach($municipios as $municipio)
                    <option value="{{ $municipio->id }}">{{ $municipio->nome }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
