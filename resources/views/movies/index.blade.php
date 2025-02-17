<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Locadora</title>
</head>
<body>

    <div class="container">

        <div class="card">

            <div class="card-header">



                <div class="card-footer text-end">
                    <a href="{{ route('movie.create') }}" class="btn btn-primary">Cadastre-se</a>
                </div>
                <h2 class="text-center">Filmes</h2>
            </div>

            <div class="card-body">

                <table class="table table-responsive table-striped">
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
                            <td>{{ $movie->fan ? 'Sim' : 'Não'}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="card-footer text-end">
                <a href="{{ route('movie.create') }}" class="btn btn-primary">Criar Novo</a>
            </div>



        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</body>
</html>
