<x-blank>
    <style>
        .pagination {
            display: inline-block;
        }
    </style>

    <div class="container">

        <div class="card">

            <div class="card-header">
                <h2 class="text-center">Clientes</h2>
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
                    <table class="table table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Data de Nascimento</th>
                            <th>Telefone</th>
                            <th>inadimplencia</th>
                            <th>Data de Criação</th>
                            <th>Data de Edição</th>
                            <th class=>ações</th>
                        </tr>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->birth_age }}</td>
                                <td>{{ $customer->tel }}</td>
                                <td>{{ $customer->inadimplencia }}</td>
                                <td>{{ $customer->created_at }}</td>
                                <td>{{ $customer->updated_at }}</td>
                                <td>

                                    <div class= "table-buttons">
                                    <form action="{{ route('customer.delete', $customer->id) }}" method="POST">
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

                                        <a href="{{ route('login.edit', $customer->id) }}" class="btn btn-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                <path
                                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                            </svg>
                                        </a>

                                        </a>
                                        <a href="{{ route('rent.index', $customer->id) }}" class="btn btn-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-box-arrow-in-right"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                                <path fill-rule="evenodd"
                                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
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
                {{ $customers }}
                <a href="{{ route('login.signup') }}" class="btn btn-primary">Criar Cliente</a>
            </div>



        </div>

    </div>
</x-blank>
