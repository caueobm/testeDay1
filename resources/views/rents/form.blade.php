<x-blank>
    {{-- @dd($movie) --}}

    <body>
        <div class="container">

            <div class="card">

                <div class="card-header">

                    <h2 class="text-center">Alugue seu filme</h2>
                </div>

                <div class="card-body">


                    <form class="form" action="{{ route('rent.save') }}" method="post" required>
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="name">Nome do Filme</label>
                            <input class="form-control" type="text" name="name" id="name"
                                value="{{ old('name', $movie->name) }}" required>
                        </div>
                        @if (!Auth::user()->is_admin)
                            <div class="form-group">
                                <input class="form-control" type="hidden" id="id" name="id"
                                    value="{{ Auth::user()->id }}" required>
                            </div>
                        @else
                            <div class="form-group">

                                <label class="form-label" for="user">emails</label>

                                <select class="form-control select2" name="id" id="id" required>
                                    <option value="">Selecione uma opção</option>
                                    @foreach ($users as $key => $user)
                                        <option value="{{ $user['id'] }}">{{ $user['name'] }} | {{ $user['email'] }}
                                        </option>
                                    @endforeach
                                </select>

                        @endif

                        <button type="submit" class="btn btn-primary">Salvar</button>

                        <select class="js-example-basic-single select2" name="state">
                            <option value="AL">Alabama</option>
                            ...
                            <option value="WY">Wyoming</option>
                        </select>
                    </form>
                </div>

            </div>
</x-blank>
