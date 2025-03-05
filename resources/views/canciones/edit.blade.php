@extends('layouts.plantilla')

@section('title', 'Editar Canción')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card bg-dark text-white border-light shadow-lg p-4 w-100" style="max-width: 500px;">
        <h4 class="card-title text-center mb-4">EDITAR CANCIÓN</h4>
        
        <form action="{{ route('canciones.update', $cancion) }}" method="post" enctype="multipart/form-data">
           
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" value="{{$cancion->nombre}}" class="form-control bg-white text-dark border-dark" id="nombre" name="nombre" maxlength="255" required>
            </div>

            <div class="mb-3">
                <label for="artista" class="form-label">Artista</label>
                <input type="text" value="{{$cancion->artista}}" class="form-control bg-white text-dark border-dark" id="artista" name="artista" maxlength="255" required>
            </div>

            <div class="mb-3">
                <label for="album" class="form-label">Álbum</label>
                <input type="text" value="{{$cancion->album}}" class="form-control bg-white text-dark border-dark" id="album" name="album" maxlength="255" required>
            </div>

            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <input type="text" value="{{$cancion->genero}}" class="form-control bg-white text-dark border-dark" id="genero" name="genero" maxlength="255" required>
            </div>

            <div class="mb-3">
                <label for="fecha_lanzamiento" class="form-label">Fecha de Lanzamiento</label>
                <input type="date" value="{{$cancion->fecha_lanzamiento}}" class="form-control bg-white text-dark border-dark" id="fecha_lanzamiento" name="fecha_lanzamiento" required>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio (€)</label>
                <input type="number" value="{{$cancion->precio}}" step="0.01" min="0.30" max="20.00" class="form-control bg-white text-dark border-dark" id="precio" name="precio" required>
            </div>

            <div class="mb-3">
                <label for="puntuacion" class="form-label">Puntuación</label>
                <input type="number" value="{{$cancion->puntuacion}}" step="0.1" min="0.0" max="5.0" class="form-control bg-white text-dark border-dark" id="puntuacion" name="puntuacion" required>
            </div>

            <!-- Campo para subir la imagen -->
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control bg-white text-dark border-dark" id="imagen" name="imagen" accept=".jpg,.jpeg,.png,.webp">
            </div>

            <button type="submit" class="btn btn-success mt-5 w-100">Actualizar Canción</button>
        </form>

        <a href="{{ route('canciones.index') }}" class="btn btn-primary mt-3 mb-4 w-100">Volver</a>
    </div>
</div>
@endsection
