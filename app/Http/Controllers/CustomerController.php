<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    /**
     * Visualizar tabela de dados
     *
     * @return void
     */

    public function index(Request $request)
    {
        //$customers = Customer::orderBy('id', 'desc')->paginate($request->pagination ?? 10);;
        // select *
        // from customers c
        // LEFT JOIN  users u
        // ON c.user_id = u.id


        $customers = Customer::select('customers.*', 'users.name', 'users.email')
        ->leftJoin('users', 'customers.user_id', 'users.id')
        ->orderBy('customers.id', 'desc')
        ->paginate($request->pagination ?? 10);
        $data =  [
            'customers' => $customers
        ];

        return view('customers/index', $data);
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
        ]);
        if ($validator->fails()) {
            // dd($validator->messages());
            return back()->withErrors( $validator->errors())
                ->withInput();
        }
        $data = $request->all();

        $customer = Customer::findOrNew($request->id);
        $customer->name = $data['name'];
        $customer->email = $data['email'];
        $customer->birth_age = $data['birth_age'];
        $customer->tel = $data['tel'];
        $customer->inadimplencia = isset($data['inadimplencia']) ? 1 : 0;

        $customer->save();
        return redirect()->route('customer.index')->withSuccess($customer->id ? "Cliente atualizado com sucesso" : "Falha ao cadastrar cliente" );
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

    public function createOrEdit($id = null)
    {
        $customer = Customer::findOrNew($id);

        return $this->form($customer);
    }

    private function form(Customer $customer)
    {
        return view('customers/form', [
            'customer' => $customer
        ]);
    }
}
