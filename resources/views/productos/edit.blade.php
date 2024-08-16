<!-- resources/views/productos/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('productos.update', $producto->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Nombre -->
                    <div class="mb-4">
                        <x-label for="name" :value="__('Nombre del Producto')" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$producto->name" required autofocus />
                    </div>

                    <!-- Descripción -->
                    <div class="mb-4">
                        <x-label for="description" :value="__('Descripción')" />
                        <x-textarea id="description" class="block mt-1 w-full" name="description" required>{{ $producto->description }}</x-textarea>
                    </div>

                    <!-- Categoría -->
                    <div class="mb-4">
                        <x-label for="category" :value="__('Categoría')" />
                        <select id="category" name="category" class="form-select block mt-1 w-full">
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ $producto->category_id == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Precio -->
                    <div class="mb-4">
                        <x-label for="price" :value="__('Precio')" />
                        <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="$producto->price" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button>
                            {{ __('Actualizar Producto') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
