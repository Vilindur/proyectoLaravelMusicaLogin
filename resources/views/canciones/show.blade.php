@extends('layouts.plantilla')

@section('title', 'Canción: ' . $cancion->nombre)

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card text-white bg-dark border-light shadow-lg" style="max-width: 400px;">
        <img src="{{ asset($cancion->imagen) }}" class="card-img-top" alt="Imagen">
        <div class="card-body">
            <h5 class="card-title text-center">{{ $cancion->nombre }}</h5>
            <p class="card-text">
                <p><strong>Artista: </strong> {{ $cancion->artista }}</p>
                <p><strong>Álbum: </strong> {{ $cancion->album }}</p>
                <p><strong>Género: </strong> {{ $cancion->genero }}</p>
                <p><strong>Lanzamiento: </strong> {{ $cancion->fecha_lanzamiento }}</p>
                <p><strong>Precio: </strong> ${{ number_format($cancion->precio, 2) }}</p>
                <p><strong>Puntuación: </strong> {{ $cancion->puntuacion }}</p>
            </p>
            <a href="{{ route('canciones.index') }}" class="btn btn-primary mt-3 mb-4">Volver</a>
        </div>
    </div>
</div>
@endsection