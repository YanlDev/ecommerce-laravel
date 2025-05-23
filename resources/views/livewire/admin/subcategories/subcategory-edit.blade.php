<div class="card">
    <form wire:submit="save">

        <x-label class="mb-2">
            Nombre
        </x-label>
        <x-input placeholder="Ingresa el nombre de la subcategoría" class="w-full mb-4"
                 wire:model="subcategoriesEdit.name">
        </x-input>

        <div class="my-4">
            <x-label>
                Familia
            </x-label>
            <x-select class="w-full" wire:model.live="subcategoriesEdit.family_id">
                <option value="" disabled>Seleccione una familia</option>
                @foreach($families as $family)
                    <option value="{{$family->id}}">{{$family->name}}</option>
                @endforeach
            </x-select>


        </div>


        <x-label class="mb-2">
            Categoría
        </x-label>

        <x-select name="category_id" class="w-full" wire:model.live="subcategoriesEdit.category_id">
            <option value="" disabled>Seleccione una categoría</option>
            @foreach($this->categories  as $category)
                <option value="{{$category->id}}" @selected(old('$subcategory_id')== $category->id) >
                    {{$category->name}}
                </option>
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

        <x-validation-errors class="mb-4"></x-validation-errors>
    </form>

    <form action="{{route('admin.subcategories.destroy',$subcategory)}}"
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

</div>

