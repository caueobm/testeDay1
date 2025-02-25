<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Movie;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Controle de Filmes
 */
class RentController extends Controller
{

    public function index($id)
    {
        $customer = Customer::find($id);
        // aqui retornamos para o index com um array, esse array possui os filmes que pertencem ao usúario referente ao $id, e passo o customer tambem pois nessecito dele para fazer o delete na route delete
        return view(
            'rents/index',
            [
                'movies' => $customer->movies,
                'customer' => $customer
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
        $customer = Customer::where('email', $data['email'])->first();
        if (!$movie) {
            return back()->withErrors("Erro ao encontrar o filme");
        }

        if (!$customer) {
            return back()->withErrors("Erro ao encontrar o email");
        }
        // aqui adiciona um filme na lista de filmes do Customer
        $customer->movies()->attach($movie->id);

        return redirect()->route('movie.index')->withSuccess("filme alugado com sucesso");
    }

    public function delete($movieId, $customerId)
    {
        try {
            $customer = Customer::find($customerId);
            if ($customer == null)
                return redirect()->route('customer.index')->withErrors("Erro ao alugar filme");
            else {
                //função de deletar um aluguel de um cliente
                //para esse função funcionar necessita passar na url o $movieId e o $customerId
                $customer->movies()->detach($movieId);
                return redirect()->route('customer.index')->withSuccess("Aluguel deletado com sucesso!");
            }
        } catch (\Throwable $th) {
        }
    }
}
