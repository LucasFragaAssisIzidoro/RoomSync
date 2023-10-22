<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
   
</head>
<body>
<?php echo Sessao::mensagem('turma');?>
<?php echo Sessao::mensagem('usuario');?>
    <div class="container my-5">
        <section class="box-container">
    <?php echo Sessao::mensagem('usuario')?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo URL ?>/usuarios/gerenciarusers">usuarios</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a></a></li>
            </ol>
        </nav>
        <div class="container mt-4">
            <div class="row">
                <?php foreach ($dados['usuarios'] as $user): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $prof->nome_usuario ?></h5>
                                <p class="card-text"> Email :<?= $prof->email_usuario ?></p>
                                <a href="<?= URL . '/usuarios/verprofs/' . $prof->id_usuario ?>" class="btn btn-primary float-right">Ver Mais</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        
        </section>
        <section class="box-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo URL ?>/usuarios/gerenciarusers">Turmas</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a></a></li>
            </ol>
        </nav>
        <div class="container mt-4">
            <div class="row">
                <?php foreach ($dados['turmas'] as $turma): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $turma->nome_turma ?></h5>
                                <p class="card-text"> Ano de ingresso:<?= $turma->ano_ingresso ?></p>
                                <p class="card-text">Qtde. Alunos: <?= $turma->quantidade_alunos ?> </p>
                                <a href="<?= URL . '/turmas/verturmas/' . $turma->id ?>" class="btn btn-primary float-right">Ver Mais</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        
        </section>
    </div>

</body>
</html>

