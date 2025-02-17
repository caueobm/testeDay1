<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;


class CustomerController extends Controller
{

        /**
     * Visualizar tabela de dados
     *
     * @return void
     */

    public function index(){

        $customers = Customer::orderBy('id', 'desc')->get();

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

    public function form() {
       return view('customers/form');
   }

        /**
     * Salvar Costumer no banco de dados
     *
     * @return void
     */
    public function save(Request $request) {





        $data = $request->all();

        $customer = new Customer;
        $customer->name = $data['name'];
        $customer->email = $data['email'];
        $customer->birth_age = $data['birth_age'];
        $customer->tel = $data['tel'];
        $customer->inadimplencia = isset($data['inadimplencia']) ? 1 : 0;

        $customer->save();

        return redirect('clientes/');

    }
}
