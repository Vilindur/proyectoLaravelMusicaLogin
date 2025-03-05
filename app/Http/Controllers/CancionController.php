<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cancion;
use Illuminate\Http\Request;

class CancionController extends Controller
{

    //MÉTODO PARA MOSTRAR EN LA VISTA INDEX LOS DATOS EN UNA TABLA
    
    public function index()
    {
        $canciones = Cancion::paginate(10);
        return view("canciones.index", compact('canciones'));
    }

    //MÉTODO PARA REDIRIGIRME A LA VISTA CREATE

    public function create()
    {
        return view("canciones.create");
    }


    //MÉTODO STORE PARA ALMACENAR EN LA BASE DE DATOS LOS CAMBIOS DE CREAR NUEVA CANCIÓN

    public function store(Request $request)
    {
        // Validación de los datos, incluyendo la imagen
        // $request->validate([
        //     'nombre' => 'required|max:255',
        //     'artista' => 'required|max:255',
        //     'album' => 'required|max:255',
        //     'genero' => 'required|max:255',
        //     'fecha_lanzamiento' => 'required|date',
        //     'precio' => 'required|numeric|min:0.30|max:20.00',
        //     'puntuacion' => 'required|numeric|min:0.0|max:5.0',
        //     'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096', // Validación de la imagen
        // ]);

        $cancion = new Cancion();

        $cancion->nombre = $request->nombre;
        $cancion->artista = $request->artista;
        $cancion->album = $request->album;
        $cancion->genero = $request->genero;
        $cancion->fecha_lanzamiento = $request->fecha_lanzamiento;
        $cancion->precio = $request->precio;
        $cancion->puntuacion = $request->puntuacion;

        //Comprobar que se ha enviado una imagen y si no pues se deja el campo imagen tal como estaba
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imagenPath = $imagen->storeAs('public/img', $imagen->getClientOriginalName());
            $cancion->imagen = 'img/' . $imagen->getClientOriginalName();
        }

        $cancion->save();

        return redirect()->route('canciones.show', $cancion);
    }

    //MÉTODO SHOW PARA MOSTRAR LA LISTA DE CANCIONES

    public function show(Cancion $cancion)
    {
        return view("canciones.show", compact("cancion"));
    }

    //MÉTODO EDIT PARA REDIRIGIRME A LA VISTA EDITAR

    public function edit(Cancion $cancion)
    {
        return view('canciones.edit', compact("cancion"));
    }

    //METODO UPDATE PARA ACTUALIZAR INFO DE UNA CANCION YA RECUPERADA DE UNA CONSULTA A LA BASE DE DATOS

    public function update(Request $request, Cancion $cancion) {
        $cancion->nombre = $request->nombre;
        $cancion->artista = $request->artista;
        $cancion->album = $request->album;
        $cancion->genero = $request->genero;
        $cancion->fecha_lanzamiento = $request->fecha_lanzamiento;
        $cancion->precio = $request->precio;
        $cancion->puntuacion = $request->puntuacion;

        //Comprobar que se ha enviado una imagen y si no pues se deja el campo imagen tal como estaba
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $cancion->imagen = 'img/' . $imagen->getClientOriginalName();
        }

        $cancion->save();

        return redirect()->route('canciones.show', $cancion);
    }


    //METODO DESTROY PARA ELMINAR UN REGISTRO DE LA BASE DE DATOS

    public function destroy(Cancion $cancion) {
        $cancion->delete();

        return redirect()->route('canciones.index');
    }
}
