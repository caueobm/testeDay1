<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

/**
 * Controle de Filmes
 */
class MovieController extends Controller
{

    /**
     * Visualizar tabela de dados
     *
     * @return void
     */
    public function index() {

        $movies = Movie::orderBy('id', 'desc')->get();

        return view('movies/index', [
            'movies' => $movies
        ]);
    }

    /**
     * Redirecionar para a tela do formulario
     *
     * @return void
     */
    public function form() {
        return view('movies/form');
    }

    /**
     * Salvar registro no banco de dados
     *
     * @return void
     */
    public function save(Request $request) {

        $data = $request->all();

        $movie = new Movie;
        $movie->name = $data['name'];
        $movie->description = $data['description'];
        $movie->category = $data['category'];
        $movie->age_indication = $data['age_indication'];
        $movie->duration = $data['duration'];
        $movie->release_date = $data['release_date'];

        $movie->save();

        return redirect('filmes/');


    }

}
