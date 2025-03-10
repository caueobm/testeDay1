<x-blank>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Filmes</h2>
                <div class="card-text">

                    <form class="filter" method="get">
                        <select name= "pagination">
                            <option value="10" {{ 10 == request()->pagination ? 'selected' : '' }}>10 itens</option>
                            <option value="20" {{ 20 == request()->pagination ? 'selected' : '' }}>20 itens</option>
                            <option value="30" {{ 30 == request()->pagination ? 'selected' : '' }}>30 itens</option>
                            <option value="40" {{ 40 == request()->pagination ? 'selected' : '' }}>40 itens</option>
                        </select>
                        <button type="submit" class="btn btn-outline-success btn-sm">Confirmar</button>
                    </form>

                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Classificação Indicativa</th>
                            <th>Duração</th>
                            <th>Data de Lançamento</th>
                            <th>Data de Criação</th>
                            <th>Data de Edição</th>
                            <th>Fã
                            <th class=>ações</th>
                        </tr>
                        @foreach ($movies as $movie)
                            <tr>
                                <td>{{ $movie->id }}</td>
                                <td>{{ $movie->name }}</td>
                                <td>{{ $movie->category }}</td>
                                <td>{{ $movie->age_indication }}</td>
                                <td>{{ $movie->duration }}</td>
                                <td>{{ $movie->release_date }}</td>
                                <td>{{ $movie->created_at }}</td>
                                <td>{{ $movie->updated_at }}</td>
                                <td>{{ $movie->fan ? 'Sim' : 'Não' }}</td>
                                <td>
                                    @if (isset(Auth::user()->is_admin) && Auth::user()->is_admin)
                                    <div class= "table-buttons">
                                        <form action="{{ route('movie.delete', $movie->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg>
                                            </button>
                                        </form>
                                            <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                    <path
                                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                                </svg>
                                            </a>

                                            @endif
                                            <a href="{{ route('rent.create', $movie->id) }}" class="btn btn-warning">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                                                </svg>
                                            </a>
                                    </div>



                        </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>


            <div class="card-footer text-end">
                {{ $movies }}
                <a href="{{ route('movie.create') }}" class="btn btn-primary">Criar Filme</a>
            </div>

        </div>

    </div>

</x-blank>
