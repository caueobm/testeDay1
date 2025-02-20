<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;


class CustomerController extends Controller
{

    /**
     * Visualizar tabela de dados
     *
     * @return void
     */

    public function index()
    {

        $customers = Customer::orderBy('id', 'desc')->paginate($request->pagination ?? 10);;

        $data =  [
            'customers' => $customers
        ];

        return view('customers/index', $data);
    }


    /**
     * Visualizar formulario
     *
     * @return view
     */

    public function form()
    {
        return view('customers/form');
    }




    /**
     * Salvar Costumer no banco de dados
     *
     * @return void
     */
    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'birth_age' => 'required|',
            'tel' => 'required',
            'inadimplencia' => 'required'
        ]);

        if ($validator->fails()) {
            // dd($validator->messages());
            return back()->withErrors( $validator->errors())
                ->withInput();
        }
        $data = $request->all();

        $customer = new Customer;
        $customer->name = $data['name'];
        $customer->email = $data['email'];
        $customer->birth_age = $data['birth_age'];
        $customer->tel = $data['tel'];
        $customer->inadimplencia = isset($data['inadimplencia']) ? 1 : 0;

        $customer->save();

        return redirect()->route('customer.index')->withSuccess("Cliente cadastrado com sucesso");
    }

    public function delete($id)
    {

        try {

            $user = Customer::find($id);


            if ($user == null)
                return redirect()->route('customer.index')->withErrors("Erro ao deletar o Usuário");


            else {
                $user->delete();
                return redirect()->route('customer.index')->withSuccess("Usuário deletado com sucesso!");

            }
        } catch (\Throwable $th) {
        }
    }
}
