<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Costumer</title>

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

                <h2 class="text-center">Cadastre-se</h2>

            </div>

            <div class="card-body">

                <form class="form" action="{{ route('customer.save') }}" method="post">


                    @csrf

                    <div class="form-group">
                        <label class="form-label">Nome</label>
                        <input class="form-control" type="text" name="name">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="text" name="email">
                    </div>


                    <div class="form-group">
                        <label class="form-label">Data de Nascimento</label>
                        <input class="form-control" type="date" name="birth_age">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Telefone</label>
                        <input class="form-control" type="text" name="tel"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="vehicle1">Você é inadimplente</label>
                        <input type="checkbox" id="inadimplencia" name="inadimplencia">
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
