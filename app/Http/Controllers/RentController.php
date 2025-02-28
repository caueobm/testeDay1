<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Controle de Filmes
 */
class RentController extends Controller
{

    public function index($id)
    {
        $user = User::find($id);
        // aqui retornamos para o index com um array, esse array possui os filmes que pertencem ao usúario referente ao $id, e passo o customer tambem pois nessecito dele para fazer o delete na route delete
        return view(
            'rents/index',
            [
                'movies' => $user->movies,
                'user' => $user
            ],

        );
    }

    public function create($id) //função para um botao redirecionar para alugar um filme, o $id é apenas para levar o id do filme e conseguir printar o nome do filme para o usuário na página seguinte
    {
        $movie = Movie::find($id);

        return view('rents/form', [
            'movie' => $movie
        ]);
    }

    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            // dd($validator->messages());
            return back()->withErrors($validator->errors())
                ->withInput();
        }
        $data = $request->all();
        // verifica se existe um filme com esse nome e um cliente com esse email
        $movie = Movie::where('name', $data['name'])->first();
        $user = User::where('email', $data['email'])->first();
        if (!$movie) {
            return back()->withErrors("Erro ao encontrar o filme");
        }
        if (!$user) {
            return back()->withErrors("Erro ao encontrar o email");
        }
        // aqui adiciona um filme na lista de filmes do User
        $user->movies()->attach($movie->id);

        return redirect()->route('movie.index')->withSuccess("filme alugado com sucesso");
    }

    public function delete($movieId, $userId)
    {
        try {
            $user = User::find($userId);
            if ($user == null)
                return redirect()->route('customer.index')->withErrors("Erro ao deletar filme");
            else {
                //função de deletar um aluguel de um cliente
                //para esse função funcionar necessita passar na url o $movieId e o $customerId
                $user->movies()->detach($movieId);
                return redirect()->route('movie.index')->withSuccess("Aluguel deletado com sucesso!");
            }
        } catch (\Throwable $th) {
        }
    }
}
