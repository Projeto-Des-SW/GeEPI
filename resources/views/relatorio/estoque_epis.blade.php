<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório: EPIs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/relatorios/style.css">
</head>
<body>
<div class="container">
    <img align="right" src="{{ "images" . DIRECTORY_SEPARATOR . "relatorios" . DIRECTORY_SEPARATOR . "logo_geepi_dourado.png" }}" width="200px" height="140px">
    <h3 class="mt-4 mb-4 bold-text">Relatório: EPIs</h3>
    <br>
    <br>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col" style="text-align: center">EPI</th>
            <th scope="col" style="text-align: center">CA</th>
            <th scope="col" style="text-align: center">Quantidade Atual</th>
            <th scope="col" style="text-align: center">Quantidade Mínima</th>
        </tr>
        </thead>
        <tbody>
        @foreach($epis as $epi)
            <tr>
                <td style="text-align: center">{{ $epi->nome }}</td>
                <td style="text-align: center">{{ $epi->certificado_aprovacao  }}</td>
                <td style="text-align: center">{{ $epi->estoque->quantidade }}</td>
                <td style="text-align: center">{{ $epi->quantidade_minima }}</td>
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
