@extends('layouts.plantilla')

@section('title', 'Index canciones')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">LISTA DE CANCIONES DE TU COLECCIÓN</h1>
    
    <!--ENLACE A CREAR CANCIÓN-->
    <a href="{{ route('canciones.create') }}" class="btn btn-primary mb-4">Nueva Canción</a>
    
    <form method="POST" action="{{ route('logout') }}" class="mb-4">
        @csrf
        <button type="submit" class="btn btn-warning text-black">Cerrar Sesión</button>
    </form>

    <div class="table-responsive">
        <table class="table table-dark table-striped text-white text-center">
            <thead>
                <tr>
                    <th scope="col">Número</th>
                    <th scope="col">Portada</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Artista</th>
                    <th scope="col">Álbum</th>
                    <th scope="col">Género</th>
                    <th scope="col">Fecha de Lanzamiento</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Puntuación</th>
                    <th scope="col">Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($canciones as $cancion)
                    <tr>
                        <td class="align-middle">{{ $cancion->id }}</td>
                        <td class="align-middle">
                            <img src="{{ asset($cancion->imagen) }}" alt="Portada" class="img-fluid" style="max-width: 50px; max-height: 50px;">
                        </td>
                        <td class="align-middle">{{ $cancion->nombre }}</td>
                        <td class="align-middle">{{ $cancion->artista }}</td>
                        <td class="align-middle">{{ $cancion->album }}</td>
                        <td class="align-middle">{{ $cancion->genero }}</td>
                        <td class="align-middle">{{ $cancion->fecha_lanzamiento }}</td>
                        <td class="align-middle">{{ $cancion->precio }}</td>
                        <td class="align-middle">{{ $cancion->puntuacion }}</td>
                        <td class="align-middle">
                            <!-- Botones de acción en línea -->
                            <div class="d-flex gap-2 flex-nowrap justify-content-center">
                                <a href="{{ route('canciones.show', $cancion->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('canciones.edit', $cancion->id) }}" class="btn btn-success btn-sm">Editar</a>
                                <form action="{{ route('canciones.destroy', $cancion) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $canciones->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection