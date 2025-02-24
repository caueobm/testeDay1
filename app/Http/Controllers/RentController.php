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

        return view('rents/index', [
            'movies' => $customer->movies
        ]);
    }

    public function create($id)
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

        $movie = Movie::where('name', $data['name'])->first();
        $customer = Customer::where('email', $data['email'])->first();
        if (!$movie) {
            return back()->withErrors("Erro ao encontrar o filme");
        }

        if (!$customer) {
            return back()->withErrors("Erro ao encontrar o email");
        }
        $customer->movies()->attach($movie->id);

        return redirect()->route('movie.index')->withSuccess("filme alugado com sucesso");
    }
}
