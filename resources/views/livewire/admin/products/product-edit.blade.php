@php use Illuminate\Support\Facades\Storage; @endphp
<div>

    <form wire:submit="store">

        <figure class="mb-4 relative">
            <div class="absolute top-8 right-8">
                <label class="flex items-center cursor-pointer px-4 py-2 rounded-lg bg-white text-gray-600">
                    <i class="fas fa-camera mr-2"></i>
                    Actualizar imagen
                    <input type="file" class="hidden" wire:model="image" accept="image/*">
                </label>
            </div>
            <img src="{{ $image ? $image->temporaryUrl() : Storage::url($productEdit['image_path']) }}"
                 class="aspect-[16/9] object-cover object-center w-full"
                 alt="Producto sin imagen">
        </figure>

        <x-validation-errors class="mb-4"></x-validation-errors>

        <div class="card">
            <div class="mb-4">
                <x-label class="mb-1">
                    Código SKU
                </x-label>
                <x-input wire:model="productEdit.sku" class="w-full"
                         placeholder="Ingrese el código SKU del producto"></x-input>
            </div>
            <div class="mb-4">
                <x-label class="mb-1">
                    Nombre
                </x-label>
                <x-input wire:model="productEdit.name" class="w-full"
                         placeholder="Ingrese el nombre del producto"></x-input>
            </div>
            <div class="mb-4">
                <x-label class="mb-1">
                    Descripción
                </x-label>
                <x-textarea class="w-full" placeholder="Ingrese la descripción del producto"
                            wire:model="productEdit.description"></x-textarea>
            </div>

            <div class="mb-4">
                <x-label class="mb-1">
                    Familias
                </x-label>
                <x-select class="w-full" wire:model.live="family_id">
                    <option value="" disabled>Seleccione una familia</option>
                    @foreach($families as $family)
                        <option value="{{$family->id}}">{{$family->name}}</option>
                    @endforeach
                </x-select>
            </div>
            <div class="mb-4">
                <x-label class="mb-1">
                    Categorías
                </x-label>
                <x-select class="w-full" wire:model.live="category_id">
                    <option value="" disabled>Seleccione una Categoría</option>
                    @foreach($this->categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </x-select>
            </div>
            <div class="mb-4">
                <x-label class="mb-1">
                    Subcategorías
                </x-label>
                <x-select class="w-full" wire:model.live="productEdit.subcategory_id">
                    <option value="" disabled>Seleccione una Subcategoría</option>
                    @foreach($this->subcategories as $subcategory)
                        <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label class="mb-1">
                    Precio
                </x-label>
                <x-input wire:model="productEdit.price" class="w-full" type="number" step="0.01">

                </x-input>
            </div>


            <div class="mt-4 flex justify-end">
                <button class="btn-red" type="button" onclick="confirmDelete()">
                    Eliminar
                </button>
                <button class="btn-green" type="submit">
                    Actualizar
                </button>
            </div>


        </div>

    </form>

    <form action="{{route('admin.products.destroy',$product)}}"
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

