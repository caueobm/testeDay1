<x-blank>
    {{-- @dd($movie) --}}
    <body>
        <div class="container">

            <div class="card">

                <div class="card-header">

                    <h2 class="text-center">Alugue seu filme</h2>
                </div>

                <div class="card-body">


                    <form class="form" action="{{route('rent.save')}}" method="post" required>
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="name">Nome do Filme</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $movie->name) }}" required>
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="hidden" id="email" name="email"
                            value="{{ Auth::user()->email }}" required>
                        <div class="invalid-feedback">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>

                    </form>


                </div>

            </div>

        </div>
</x-blank>
