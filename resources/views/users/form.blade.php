<x-blank>

    <div class="container">

        <div class="card">

            <div class="card-header">

                <h2 class="text-center">Login</h2>



            </div>

            <div class="card-body">

                <form class="form" action="{{ route('login.authenticate') }}" method="get" >
                    @csrf

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="text" id="email" name="email"
                        value="{{ old('email') }}" >
                        <div class="invalid-feedback">
                            Por favor digite seu seu Email.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for ="password" class="form-label">Senha</label>
                        <input class="form-control" type="password" id="password" name="password"
                            value="{{ old('password') }}" >
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>

                </form>


            </div>

        </div>

    </div>
</x-blank>
