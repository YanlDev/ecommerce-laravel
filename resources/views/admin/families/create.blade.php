<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route'=> route('admin.dashboard')
    ],
    [
        'name' => 'Familias',
        'route' => route('admin.families.index')
    ],
    [
        'name' => 'Nuevo'
    ]
]">

    <div class="card">
        <form action="{{route('admin.families.store')}}" method="post">
            @csrf
            <x-validation-errors class="mb-4"></x-validation-errors>
            <x-label class="mb-2">
                Nombre
            </x-label>
            <x-input placeholder="Ingresar una nueva familia" class="w-full" name="name" value="{{old('name')}}">
            </x-input>
            <div class="mt-4 flex justify-end">
                <button class="btn-green" type="submit">
                    Enviar
                </button>
            </div>

        </form>

    </div>

</x-admin-layout>
