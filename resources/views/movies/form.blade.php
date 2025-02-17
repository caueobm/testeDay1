<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Locadora</title>

    <style>

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            font-weight: 500;
        }

    </style>
</head>
<body>

    <div class="container">

        <div class="card">

            <div class="card-header">

                <h2 class="text-center">Crie um novo filme</h2>

            </div>

            <div class="card-body">

                {{-- // name
                // descripition
                // category
                // age_indication
                // duration
                // release_date --}}

                <form class="form" action="{{ route('movie.save') }}" method="post">

                    @csrf

                    <div class="form-group">
                        <label class="form-label">Nome do Filme</label>
                        <input class="form-control" type="text" name="name">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Categoria</label>
                        <select class="form-control" name="category">
                            <option value="">Selecione uma opção</option>
                            <option value="action">Ação</option>
                            <option value="adventure">Aventura</option>
                            <option value="horror">Terror</option>
                            <option value="romance">Romance</option>
                            <option value="mistery">Misterio</option>
                            <option value="comedy">Comedia</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Faixa Etária</label>
                        <input class="form-control" type="integer" name="age_indication">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Duração</label>
                        <input class="form-control" type="number" name="duration">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Data de Lançamento</label>
                        <input class="form-control" type="date" name="release_date">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Descrição</label>
                        <textarea class="form-control" type="text" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="vehicle1">Você é fã</label>
                        <input type="checkbox" id="fan" name="fan">
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>

                </form>


            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</body>
</html>
