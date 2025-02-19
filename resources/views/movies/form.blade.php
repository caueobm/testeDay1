<x-blank>

    <body>

        <div class="container">

            <div class="card">

                <div class="card-header">

                    <h2 class="text-center">Crie um novo filme</h2>

                </div>

                <div class="card-body">

                    <form class="form" action="{{ route('movie.save') }}" method="post" required>

                        @csrf

                        <div class="form-group">
                            <label class="form-label" for="name">Nome do Filme</label>
                            <input class="form-control" type="text" name="name" id="name"
                                value="{{ old('name') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="Category">Categoria</label>
                            <select class="form-control" name="category" id="Category" required>
                                <option value="">Selecione uma opção</option>
                                <option value="1" {{ old('category') == 1 ? 'selected' : '' }}>Ação</option>
                                <option value="2" {{ old('category') == 2 ? 'selected' : '' }}>Aventura</option>
                                <option value="3" {{ old('category') == 3 ? 'selected' : '' }}>Terror</option>
                                <option value="4" {{ old('category') == 4 ? 'selected' : '' }}>Romance</option>
                                <option value="5" {{ old('category') == 5 ? 'selected' : '' }}>Misterio</option>
                                <option value="6" {{ old('category') == 6 ? 'selected' : '' }}>Comedia</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="age_indication">Faixa Etária</label>
                            <input class="form-control" type="integer" name="age_indication" id="age_indication"
                                value="{{ old('age_indication') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="duration">Duração</label>
                            <input class="form-control" type="number" name="duration" id="duration"
                                value="{{ old('duration') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="release_date">Data de Lançamento</label>
                            <input class="form-control" type="date" name="release_date" id="release_date"
                                value="{{ old('release_date') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="description">Descrição</label>
                            <textarea class="form-control" type="text" name="description" id="description" required>{{ old('description') }} </textarea>
                        </div>

                        <div class="form-group">
                            <label for="fan">Você é fã</label>
                            <input type="checkbox" id="fan" name="fan" value="on"
                                {{ old('fan') == 'on' ? 'checked' : '' }} required>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>

                    </form>


                </div>

            </div>

        </div>
</x-blank>
