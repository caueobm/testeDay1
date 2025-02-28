<x-blank>

    <div class="container">

        <div class="card">

            <div class="card-header">

                <h2 class="text-center">Registra-se</h2>

                {{-- <form class="form" action="{{ route($customer->id ? 'customer.update' : 'customer.save') }}" method="post" required>

                    <input type="hidden" name="id" value="{{$customer->id}}">
                    @method($customer->id ? 'PUT' : 'POST')
                    @csrf --}}

            </div>

            <div class="card-body">
                {{-- @dd($customer) --}}

                <form class="form" action="{{ route($customer->id ? 'login.update' : 'login.save') }}" method="post" required>
                    @method($customer->id ? 'PUT' : 'POST')
                    @csrf

                    <input type="hidden" name="id" value="{{$customer->id}}">
                    <div class="form-group">
                        <label for="name" class="form-label">Nome</label>
                        <input class="form-control" type="text" name="name" id="name"
                        value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="text" id="email" name="email"
                            value="{{ old('email', $user->email) }}" required>
                        <div class="invalid-feedback">
                            Por favor digite seu seu Email.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for ="birth_age" class="form-label">Data de Nascimento</label>
                        <input class="form-control" type="date" id="birth_age" name="birth_age"
                            value="{{ old('birth_age', $customer->birth_age) }}" required>
                    </div>

                    <div class="form-group">
                        <label for ="tel" class="form-label">Telefone</label>
                        <input class="form-control" type="tel" name="tel" id="tel"
                            value="{{ old('tel', $customer->tel) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="inadimplencia">Você é inadimplente</label>
                        <input type="checkbox" id="inadimplencia" name="inadimplencia" value="on"
                        {{ old('inadimplencia', $customer->inadimplencia) == 'on' ? 'checked' : '' }}>
                    </div>

                    <div class="form-group">
                        <label for ="password" class="form-label">Senha</label>
                        <input class="form-control" type="password" id="password" name="password"
                        value="{{ old('password')}}" required>
                    </div>

                    <div class="form-group">
                        <label for ="password_confirmation" class="form-label">Confirme sua Senha</label>
                        <input class="form-control" type="password_confirmation" id="password_confirmation" name="password_confirmation"
                        value="{{ old('password')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="is_admin">Você é admin</label>
                        <input type="hidden" name="is_admin" id="is_admin" value="false">
                        <input type="checkbox" id="is_admin" name="is_admin" value="on"
                        {{ old('is_admin', $user->id) == 'on' ? 'checked' : '' }}>
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>

                </form>


            </div>

        </div>

    </div>
</x-blank>
