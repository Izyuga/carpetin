<!-- resources/views/productos/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Búsqueda y Filtros -->
                <div class="mb-4 flex justify-between">
                    <form method="GET" action="{{ route('productos.index') }}">
                        <div class="flex space-x-4">
                            <!-- Campo de búsqueda -->
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar producto..." class="form-input rounded-md shadow-sm">

                            <!-- Filtro por categoría -->
                            <select name="category" class="form-select rounded-md shadow-sm">
                                <option value="">Todas las categorías</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria }}" {{ request('category') == $categoria ? 'selected' : '' }}>
                                        {{ $categoria }}
                                    </option>
                                @endforeach
                            </select>

                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                                Buscar
                            </button>
                        </div>
                    </form>

                    <a href="{{ route('productos.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md">
                        Crear Producto
                    </a>
                </div>

                <!-- Tabla de productos -->
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Descripción</th>
                            <th class="px-4 py-2">Categoría</th>
                            <th class="px-4 py-2">Precio</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($productos as $producto)
                            <tr>
                                <td class="border px-4 py-2">{{ $producto->name }}</td>
                                <td class="border px-4 py-2">{{ $producto->description }}</td>
                                <td class="border px-4 py-2">{{ $producto->category }}</td>
                                <td class="border px-4 py-2">${{ number_format($producto->price, 2) }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="text-blue-500">Editar</a> |
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border px-4 py-2 text-center">No hay productos disponibles.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Paginación -->
                <div class="mt-4">
                    {{ $productos->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
