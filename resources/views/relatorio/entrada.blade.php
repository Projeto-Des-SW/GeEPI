<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório: Entrada de EPIs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/relatorios/style.css">
</head>
<body>
<div class="container">
    <img align="right" src="{{ "images" . DIRECTORY_SEPARATOR . "relatorios" . DIRECTORY_SEPARATOR . "logo_geepi_dourado.png" }}" width="200px" height="140px">
    <h3 class="mt-4 mb-4 bold-text">Relatório: Entrada de EPIs</h3>
    <h5 class="mt-4 mb-4 bold-text">Período: {{ $request->data_inicio }} a {{ $request->data_fim }}</h5>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col" style="text-align: center">EPI</th>
            <th scope="col" style="text-align: center">CA</th>
            <th scope="col" style="text-align: center">Quantidade</th>
            <th scope="col" style="text-align: center">Data de Entrada</th>
        </tr>
        </thead>
        <tbody>
        @foreach($movimento_epis as $movimento)
            <tr>
                <td style="text-align: center">{{ $movimento->epi->nome }}</td>
                <td style="text-align: center">{{ $movimento->epi->certificado_aprovacao }}</td>
                <td style="text-align: center">{{ $movimento->quantidade }}</td>
                <td style="text-align: center">{{ $movimento->data_movimento }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
