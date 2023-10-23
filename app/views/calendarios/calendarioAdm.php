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

            
               
            <?php foreach ($dados['eventos'] as $evento): ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Evento a ser aprovado</h5>
            <p>Id solicitante: <?= $evento->id_solicitador; ?></p>
            <p>Data Inicio: <?= $evento->comeco_evento; ?></p>
            <p>Data Fim: <?= $evento->fim_evento; ?></p>
            <p>Sala: <?= $evento->sala_evento; ?></p>
            <p>Descricao: <?= $evento->descricao_evento; ?></p>

            <div style="display: flex; justify-content: space-evenly; align-items: center;">

            <form action="<?php echo URL ?>/calendarios/aprovar/<?= $evento->id_evento ?>" method="post">
                <input type="hidden" name="evento[id_solicitador]" value="<?= $evento->id_solicitador; ?>">
                <input type="hidden" name="evento[titulo_evento]" value="<?= $evento->titulo_evento; ?>">
                <input type="hidden" name="evento[descricao_evento]" value="<?= $evento->descricao_evento; ?>">
                <input type="hidden" name="evento[comeco_evento]" value="<?= $evento->comeco_evento; ?>">
                <input type="hidden" name="evento[fim_evento]" value="<?= $evento->fim_evento; ?>">
                <input type="hidden" name="evento[sala_evento]" value="<?= $evento->sala_evento; ?>">
                <button type="submit" class="btn btn-success d-inline"><i class="fas fa-check"></i> Aprovar</button>
            </form>

            <form action="<?php echo URL?>/calendarios/deletarPendente/<?=$evento->id_evento?>">
                <button type="submit" class="btn btn-danger d-inline"><i class="fas fa-times"></i> Rejeitar</button>
            </form>
            </div>
            
            
        </div>
    </div>
    <hr>
<?php endforeach ?>

            
            </div>
    </div>
    <script src="/RoomSync/public/js/fullcalendar/main.min.js"></script>
    <script>
        <?php include_once '../public/js/mainjs.php' ?>
    </script>
</body>

</html>
