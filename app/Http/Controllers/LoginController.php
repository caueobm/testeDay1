<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{




    public function login()
    {
        return view('users.form');
    }
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('filmes');
        } else {
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function signup()
    {
        return view('users.signup');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/filmes');
    }

    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            // 'email' => 'required|email|unique:users',
            'email' => [
                'required',
                Rule::unique('users')->ignore($request->id),
            ],
            // 'email' => ['required', 'string', 'email,'.auth()->user()->email],
            // 'password' => 'required|password',
            // 'password_confirmation' => 'required_with:password|same:password',
            'birth_age' => 'required|',
            'tel' => 'required',

        ],
        $messages = [
            'email.required' => 'Você precisa escolher um email',
            'email.unique' => 'Esse email já esta em uso',
            'birth_age.required' => 'Você precisa escolher uma data de nascimento',
            'tel.required' => 'Você precisa escolher um telefone',

        ]);


        if ($validator->fails()) {
            // dd($validator->messages());
            return back()->withErrors($validator->errors())
                ->withInput();
        }


        $newPassword = Hash::make($request->password);
        $user = User::findOrNew($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $newPassword;
        $user->is_admin = $request->is_admin;
        $user->save();

        $customer = Customer::findOrNew($request->id);
        $customer->birth_age = $request->birth_age;
        $customer->tel = $request->tel;
        $customer->inadimplencia = isset($request->inadimplencia) ? 1 : 0;
        $customer->user_id = $user->id;
        $customer->save();
        $this->authenticate($request);
        return redirect()->route('movie.index')->withSuccess(Auth::check() ? "Cliente autenticado com sucesso" : "Falha ao autenticar cliente");
    }

    public function signupOrEdit($id = null)
    {


        $customer = Customer::findOrNew($id);
        $user = User::Where('id', $customer->user_id)->first();
        // $user = User::findOrNew($);
        return $this->form($customer, $user);
    }

    private function form(Customer $customer, $user)
    {

        return view('users.signup', [
            'customer' => $customer,
            'user' => $user
        ]);
    }
}
