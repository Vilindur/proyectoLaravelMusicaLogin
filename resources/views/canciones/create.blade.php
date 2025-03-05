@extends('layouts.plantilla')

@section('title', 'Crear Canción')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card bg-dark text-white border-light shadow-lg p-4 w-100" style="max-width: 500px;">
        <h4 class="card-title text-center mb-4">AÑADIR CANCIÓN</h4>
        
        <form action="{{ route('canciones.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control bg-white text-dark border-dark" id="nombre" name="nombre" maxlength="255" required>
            </div>

            <div class="mb-3">
                <label for="artista" class="form-label">Artista</label>
                <input type="text" class="form-control bg-white text-dark border-dark" id="artista" name="artista" maxlength="255" required>
            </div>

            <div class="mb-3">
                <label for="album" class="form-label">Álbum</label>
                <input type="text" class="form-control bg-white text-dark border-dark" id="album" name="album" maxlength="255" required>
            </div>

            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <input type="text" class="form-control bg-white text-dark border-dark" id="genero" name="genero" maxlength="255" required>
            </div>

            <div class="mb-3">
                <label for="fecha_lanzamiento" class="form-label">Fecha de Lanzamiento</label>
                <input type="date" class="form-control bg-white text-dark border-dark" id="fecha_lanzamiento" name="fecha_lanzamiento" required>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio (€)</label>
                <input type="number" step="0.01" min="0.30" max="20.00" class="form-control bg-white text-dark border-dark" id="precio" name="precio" required>
            </div>

            <div class="mb-3">
                <label for="puntuacion" class="form-label">Puntuación</label>
                <input type="number" step="0.1" min="0.0" max="5.0" class="form-control bg-white text-dark border-dark" id="puntuacion" name="puntuacion" required>
            </div>

            <!-- Campo para subir la imagen -->
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control bg-white text-dark border-dark" id="imagen" name="imagen" accept=".jpg,.jpeg,.png,.webp">
            </div>

            <button type="submit" class="btn btn-success mt-5 w-100">Guardar Canción</button>
        </form>

        <a href="{{ route('canciones.index') }}" class="btn btn-primary mt-3 mb-4 w-100">Volver</a>
    </div>
</div>
@endsection
