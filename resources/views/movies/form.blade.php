<x-blank>
    {{-- @dd($movie) --}}
    <body>
        <div class="container">

            <div class="card">

                <div class="card-header">

                    <h2 class="text-center">Crie um novo filme</h2>
                </div>

                <div class="card-body">

                    <form class="form" action="{{ route($movie->id ? 'movie.update' : 'movie.save') }}" method="post" required>

                        @method($movie->id ? 'PUT' : 'POST')
                        @csrf

                        <input type="hidden" name="id" value="{{$movie->id}}">

                        <div class="form-group">
                            <label class="form-label" for="name">Nome do Filme</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $movie->name) }}" required>
                        </div>

                        @php
                            $categories = [
                                'action' => 'Ação',
                                'adventure' => 'Aventura',
                                'horror' => 'Terror',
                                'romance' => 'Romance',
                                'mistery' => 'Misterio',
                                'comedy' => 'Comedia'
                            ];
                        @endphp

                        <div class="form-group">

                            <label class="form-label" for="Category">Categoria</label>

                            <select class="form-control" name="category" id="Category" required>
                                <option value="">Selecione uma opção</option>
                                @foreach ($categories as $key => $name)
                                    <option value="{{$key}}" {{ old('category', $movie->category) == $key ? 'selected' : ''}}>{{$name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="age_indication">Faixa Etária</label>
                            <input class="form-control" type="integer" name="age_indication" id="age_indication" value="{{ old('age_indication', $movie->age_indication) }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="duration">Duração</label>
                            <input class="form-control" type="number" name="duration" id="duration" value="{{ old('duration', $movie->duration) }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="release_date">Data de Lançamento</label>
                            <input class="form-control" type="date" name="release_date" id="release_date" value="{{ old('release_date', $movie->release_date) }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="description">Descrição</label>
                            <textarea class="form-control" type="text" name="description" id="description" required>{{ old('description', $movie->description) }} </textarea>
                        </div>

                        <div class="form-group">
                            <label for="fan">Você é fã</label>
                            <input type="checkbox" id="fan" name="fan" value="on" {{ old('fan', $movie->fan) == 'on' ? 'checked' : '' }} required>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>

                    </form>


                </div>

            </div>

        </div>
</x-blank>
