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
        'name' => 'Editar'
    ]
]">

    <div class="card">
        <form action="{{route('admin.families.update',$family)}}" method="POST">
            @csrf
            @method('PUT')
            <x-label class="mb-2">
                Nombre
            </x-label>
            <x-input class="w-full" name="name" value="{{old('name', $family->name)}}">
            </x-input>
            <div class="mt-4 flex justify-end">
                <button class="btn-red" type="button" onclick="confirmDelete()">
                    Eliminar
                </button>
                <button class="btn-green" type="submit">
                    Actualizar
                </button>
            </div>

        </form>
    </div>

    <form action="{{route('admin.families.destroy',$family)}}"
          method="post"
          id="delete-form"
    >
        @csrf
        @method('DELETE')


    </form>

    @push('js')
        <script>
            function confirmDelete(){
               const deleteFamily = document.getElementById("delete-form");
                deleteFamily.submit();
            }
        </script>
    @endpush


</x-admin-layout>
