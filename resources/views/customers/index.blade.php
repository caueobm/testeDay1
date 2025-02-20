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

                        <option value="10" {{ 10 == request()->pagination ? 'selected' : ''}}>10 itens</option>
                        <option value="20" {{ 20 == request()->pagination ? 'selected' : ''}}>20 itens</option>
                        <option value="30" {{ 30 == request()->pagination ? 'selected' : ''}}>30 itens</option>
                        <option value="40" {{ 40 == request()->pagination ? 'selected' : ''}}>40 itens</option>
                    </select>

                        <button type="submit" class="btn btn-outline-success">Confirmar</button>

                    </form>
                </div>

            </div>



            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
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
                                <td>{{ $customer->birth_age }}</td>
                                <td>{{ $customer->tel }}</td>
                                <td>{{ $customer->inadimplencia }}</td>
                                <td>{{ $customer->created_at }}</td>
                                <td>{{ $customer->updated_at }}</td>
                                <td>

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
                                </td>
                            </tr>
                        @endforeach

                    </table>

                </div>


            </div>

            <div class="card-footer text-end">
                {{ $customers }}
                <a href="{{ route('customer.create') }}" class="btn btn-primary">Criar Cliente</a>
            </div>



        </div>

    </div>
</x-blank>
