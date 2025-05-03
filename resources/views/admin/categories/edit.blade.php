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
        'name' => 'Editar'
    ]
]">

    <div class="card">
        <x-validation-errors class="mb-4"></x-validation-errors>
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <x-label class="mb-2">
                Nombre
            </x-label>
            <x-input class="w-full" name="name" value="{{old('name', $category->name)}}">
            </x-input>
            <x-label class="mt-4 mb-2">
                Familia
            </x-label>
            <x-select name="family_id" class="w-full">
                @foreach($families as $family)
                    <option value="{{$family->id}}" {{ old('family_id', $category->family_id) == $family->id ? 'selected' : '' }} >{{$family->name}}</option>
                @endforeach
            </x-select>

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

    <form action="{{route('admin.categories.destroy',$category)}}"
          method="post"
          id="delete-form"
    >
        @csrf
        @method('DELETE')


    </form>

    @push('js')
        <script>

            function confirmDelete(e) {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Esta acción no se puede deshacer",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("delete-form").submit();
                    }
                });

            }
        </script>
    @endpush


</x-admin-layout>
