<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listar Customers</title>
</head>
<body>
    <div class="container">

        <div class="card">

            <div class="card-header">



                <div class="card-footer text-end">
                    <a href="{{ route('customer.create') }}" class="btn btn-primary">Cadastre-se</a>
                </div>
                <h2 class="text-center">Clientes</h2>
            </div>

            <div class="card-body">

                <table class="table table-responsive table-striped">
                    <tr>
                      <th>Id</th>
                      <th>Nome</th>
                      <th>Data de Nascimento</th>
                      <th>Telefone</th>
                      <th>inadimplencia</th>
                      <th>Data de Criação</th>
                      <th>Data de Edição</th>
                    </tr>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->birth_age }}</td>
                            <td>{{ $customer->tel }}</td>
                            <td>{{ $customer->inadimplencia}}</td>
                            <td>{{ $customer->created_at }}</td>
                            <td>{{ $customer->updated_at }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="card-footer text-end">
                <a href="{{ route('customer.create') }}" class="btn btn-primary">Criar Novo</a>
            </div>



        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</body>
</html>
</body>
</html>
