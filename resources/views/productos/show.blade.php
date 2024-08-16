<!-- resources/views/productos/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">{{ $producto->name }}</h3>
                    <p class="text-gray-600">{{ $producto->description }}</p>
                </div>

                <div class="mb-4">
                    <strong>Categoría:</strong> {{ $producto->category->name }}
                </div>

                <div class="mb-4">
                    <strong>Precio:</strong> ${{ number_format($producto->price, 2) }}
                </div>

                <div class="mt-4">
                    <a href="{{ route('productos.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Volver al Listado</a>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md">Editar</a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
