<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function index(Request $request)
    {
        $movies = Movie::orderBy('id', 'desc')->paginate($request->pagination ?? 10);

        return view('movies/index', [
            'movies' => $movies
        ]);
    }

    /**
     * Salvar registro no banco de dados
     *
     * @return void
     */
    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'category' => 'required|',
            'age_indication' => 'required',
            'duration' => 'required|integer',
            'release_date' => 'required',
            'fan' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())
                ->withInput();
        }

        $data = $request->all();

        $movie = Movie::findOrNew($request->id);
        $movie->name = $data['name'];
        $movie->description = $data['description'];
        $movie->category = $data['category'];
        $movie->age_indication = $data['age_indication'];
        $movie->duration = $data['duration'];
        $movie->release_date = $data['release_date'];
        $movie->fan = $data['fan'];

        $movie->save();

        return redirect()->route('movie.index')->withSuccess($request->id ? "Filme atualizado com sucesso" : "Filme cadastrado com sucesso");;
    }

    public function delete($id)
    {
        try {
            $movie = Movie::find($id);
            if ($movie == null) {
                return redirect()->route('movie.index')->withErrors("Erro ao deletar o Filme");
            } else {
                $movie->delete();
                return redirect()->route('movie.index')->withSuccess("Filme deletado com sucesso!");
            }
        } catch (\Throwable $th) {
        }
    }

    public function createOrEdit($id = null)
    {
        $movie = Movie::findOrNew($id);

        return $this->form($movie);
    }

    /**
     * Redirecionar para a tela do formulario
     *
     * @return void
     */
    private function form(Movie $movie)
    {
        return view('movies/form', [
            'movie' => $movie
        ]);
    }


    // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string|min:1x0',
    //         'category' => 'required|',
    //         'age_indication' => 'required',
    //         'duration' => 'required|integer',
    //         'release_date' => 'required',
    //         'fan' => 'required'
    //     ]);
    //     try {
    //         $movie = Movie::findOrFail($id);

    //         if ($movie == null) {
    //             return redirect()->route('movie.index')->withErrors("Erro ao encontrar Filme");
    //         } else {
    //             $movie->update($validatedData);
    //             return response()->json(['message' => 'User profile updated successfully'], 200);
    //         }
    //     } catch (\Throwable $th) {
    //     }
    // }
}
