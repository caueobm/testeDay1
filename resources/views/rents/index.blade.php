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
                                    <div class= "table-buttons">
                                        {{-- arrumer botao delete dos alugueis --}}
                                        <form action="{{ route('rent.delete',[$movie->id, $user->id]) }}" method="post">

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
                            </div>

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>


            <div class="card-footer text-end">

                <a href="{{ route('movie.create') }}" class="btn btn-primary">Criar Filme</a>
            </div>

        </div>

    </div>

</x-blank>
