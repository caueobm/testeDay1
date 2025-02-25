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
    public function index(Request $request)// O uso do request é apenas para o pagination funcionar?
    {
        $movies = Movie::orderBy('id', 'desc')->paginate($request->pagination ?? 10);

        return view('movies/index', [ // Este return redereciona para a mesma página mas com um array dos filmes capturados com o orderBy
            'movies' => $movies
        ]);
    }

    /**
     * Salvar registro no banco de dados,
     *  Utiliza-se request aqui pois como é um metodo POST e é enviado todos os dados que precisamos
     *  para fazer o save fazemos uma captura desses dados e utilizamos
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

        // Este findOrNew sera oque vai decidir se o Botão ira atulizar ou criar um novo filme
        $movie = Movie::findOrNew($request->id); // Esse $request->id é uma ação Hidden que faz no HTML para armazenar o ID caso tenha, se tiver em vez de criar um novo filme é apenas recuperado as informações para fazer a att
        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->category = $request->category;
        $movie->age_indication = $request->age_indication;
        $movie->duration = $request->duration;
        $movie->release_date = $request->release_date;
        $movie->fan = $request->fan;

        $movie->save();

        return redirect()->route('movie.index')->withSuccess($request->id ? "Filme atualizado com sucesso" : "Filme cadastrado com sucesso");;
    }

    public function delete($id)// em cada filme listado no index há um botão delete por ter um botao delete por filme, logo o botão delete é vinculado ao ID desse filme
    //como o botao delete sabe o ID do filme?
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
        //há dois findOrNew nesses códigos um para saber se o botão ira criar/atualizar, este segundo findOrNew se há um ID irá preencher os campos vázios do form para fazer a att
        $movie = Movie::findOrNew($id);


        return $this->form($movie); //aqui encaminha a pessoa para o Form com os dados para serem atualizados
    }

    /**
     * Redirecionar para a tela do formulario
     *
     * @return void
     */
    private function form(Movie $movie) //Aqui não deveria ter um ($movie = null)?
    {
        return view('movies/form', [
            'movie' => $movie
        ]);
    }
}
