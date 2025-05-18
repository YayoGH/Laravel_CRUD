@extends('layouts.app')

@section('title', 'Detalle de Producto')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Detalle del Producto</h2>
                <div>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="card-title">{{ $producto->nombre }}</h3>
                    <p class="text-muted">ID: {{ $producto->id }}</p>
                    
                    <div class="mt-4">
                        <h5>Descripción:</h5>
                        <p>{{ $producto->descripcion ?: 'Sin descripción' }}</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Información
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Precio:</span>
                                <strong>${{ number_format($producto->precio, 2) }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Stock:</span>
                                <strong>{{ $producto->stock }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Creado:</span>
                                <strong>{{ $producto->created_at->format('d/m/Y H:i') }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Actualizado:</span>
                                <strong>{{ $producto->updated_at->format('d/m/Y H:i') }}</strong>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="mt-3">
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash"></i> Eliminar Producto
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 