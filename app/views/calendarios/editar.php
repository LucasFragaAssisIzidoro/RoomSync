<?php

$inicio = new \DateTime($dados['eventos'][0]->comeco_evento);
$fim = new \DateTime($dados['eventos'][0]->fim_evento);
?>

<header>
    
</header>

<body>
    <div class="card">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URL?>/calendarios/calendarioAdm">Calendario</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a>Editar</a></li>
        </ol>
    </nav>
        <form name="formEdit" id="formEdit" method="post"
            action="<?= URL ?>/calendarios/atualizar/<?= $dados['eventos'][0]->id_evento ?>" method="post">

            <h2 class="form-title">Formulário de Atualizacao de Aula</h2>

            <div class="form-group">
                <label for="date">Data:</label>
                <input type="date" class="form-control" name="date" id="date" value="<?= $inicio->format('Y-m-d') ?>">
            </div>

            <div class="form-group">
                <label for="time">Hora Inicio:</label>
                <input type="time" class="form-control" name="start" id="start"
                    value="<?= $inicio->format('H:i:s'); ?>">
            </div>

            <div class="form-group">
                <label for="time">Hora Fim:</label>
                <input type="time" class="form-control" name="end" id="end" value="<?= $fim->format("H:i:s") ?>">
            </div>
            <div class="form-group">
                <label for="title">Titulo:</label>
                <input type="text" class="form-control" name="title" id="title"
                    value="<?= $dados['eventos'][0]->titulo_evento; ?>">
            </div>
            <input type="hidden" class="form-control" name="id" id="id" value="<?= $dados['eventos'][0]->id_evento ?>">

            <div class="form-group">
                <label for="nome_turma">Turma: <sup class="text-danger">*</sup></label>
                <select name="nome_turma" placeholder="Selecione uma turma" id="nome_turma"
                    class="form-control <?php if (isset($dados['nome_turma'])) { echo $dados['nome_turma_erro'] ? 'is-invalid' : ''; }; ?>">
                    <option value="">Selecione uma turma</option>
                    <?php foreach ($dados["turmas"] as $turma) : ?>
                    <option value="<?php echo $turma->nome_turma ?>"
                        <?php if ($turma->nome_turma === $dados['eventos'][0]->turma_evento) { echo 'selected'; } ?>>
                        <?= $turma->nome_turma ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="nome_usuario">Nome Usuario <sup class="text-danger">*</sup></label>
                <select name="nome_usuario" id="nome_usuario" class="form-control <?php if (isset($dados['nome_usuario'])) {
        echo $dados['nome_usuario_erro'] ? 'is-invalid' : '';
    }; ?>">
                    <option value="">Selecione um usuario</option>
                    <?php foreach ($dados["usuarioes"] as $prof) : ?>
                    <option value="<?php echo $prof->nome_usuario ?>"
                        <?php if ($prof->nome_usuario === $dados['eventos'][0]->usuario) echo'selected'; ?>>
                        <?= $prof->nome_usuario ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="laboratorio">Laboratório: <sup class="text-danger">*</sup></label>
                <select name="laboratorio" id="laboratorio" class="form-control <?php if (isset($dados['laboratorio_erro'])) {
        echo $dados['laboratorio_erro'] ? 'is-invalid' : '';
    }; ?>">
                    <option value="">Selecione um laboratório</option>
                    <option value="Laboratorio 1"
                        <?php if ($dados['eventos'][0]->lab_evento === "Laboratorio 1") echo 'selected'; ?>>Laboratório
                        1
                    </option>
                    <option value="Laboratorio 2"
                        <?php if ($dados['eventos'][0]->lab_evento === "Laboratorio 2") echo 'selected'; ?>>Laboratório
                        2
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Materiais:</label>
                <input type="text" class="form-control" name="description" id="description"
                    value="<?= $dados['eventos'][0]->descricao_evento; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Aula</button>
            <a href="http://localhost/AgroInv/calendarios/deletar/<?= $dados['eventos'][0]->id_evento ?>">
                <input  class="btn btn-primary btn-danger" value="Deletar Aula">
            </a>

        </form>
    </div>
    </div>
</body>