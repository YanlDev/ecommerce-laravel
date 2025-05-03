<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route'=> route('admin.dashboard')
    ],
    [
        'name' => 'Categorías',
        'route' => route('admin.categories.index')
    ],
    [
        'name' => 'Nuevo'
    ]
]">

    <div class="card">
        <form action="{{route('admin.categories.store')}}" method="post">
            @csrf

            <x-validation-errors class="mb-4"></x-validation-errors>

            <x-label class="mb-2">
                Nombre
            </x-label>
            <x-input placeholder="Ingresa el nombre de la categoría" class="w-full mb-4" name="name"
                     value="{{old('name')}}">
            </x-input>

            <x-label class="mb-2">
                Familia
            </x-label>

            <x-select name="family_id" class="w-full">
                @foreach($families as $family)
                    <option value="{{$family->id}}" @selected(old('family_id')== $family->id) >{{$family->name}}</option>
                @endforeach
            </x-select>

            <div class="mt-4 flex justify-end">
                <button class="btn-green" type="submit">
                    Guardar
                </button>
            </div>

        </form>

    </div>

</x-admin-layout>
