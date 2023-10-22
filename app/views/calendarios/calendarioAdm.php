<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calendarioMVC</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="/RoomSync/public/js/fullcalendar/main.min.css">
</head>

<body>
    <?php echo Sessao::mensagem('reuniao'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <!-- Div para o calendário (2/3 da tela) -->
                <div class="calendarManager"></div>
            </div>
            <div class="col-md-4">
            
               
                <?php foreach ($dados['eventos'] as $eventos):?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Evento a ser aprovado</h5>
                            <p>Solicitante: usuario</p>
                            <p>Data Inicio: <?= $dados['eventos'][0]->comeco_evento?></p>
                            <p>Data Fim: <?= $dados['eventos'][0]->fim_evento?></p>
                            <p>Sala: <?= $dados['eventos'][0]->sala_evento?></p>
                            <p>Descricao : <?= $dados['eventos'][0]->descricao_evento?></p>
                            <button type="button" class="btn btn-success d-inline"><i class="fas fa-check"></i> Aprovar</button>
                            <button type="button" class="btn btn-success d-inline"><i class="fas fa-times"></i> Rejeitar</button>
                        </div>
                    </div>
                    <hr>
                <?php endforeach?>
            
            </div>
    </div>
    <script src="/RoomSync/public/js/fullcalendar/main.min.js"></script>
    <script>
        <?php include_once '../public/js/mainjs.php' ?>
    </script>
</body>

</html>
