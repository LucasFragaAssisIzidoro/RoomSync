<?php

$inicio = new \DateTime($dados['eventos'][0]->comeco_evento);
$fim = new \DateTime($dados['eventos'][0]->fim_evento);
?>

<header>
    
</header>

<body>
    <?php var_dump($dados['eventos'])?>
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
                <label for="sala">Sala: <sup class="text-danger">*</sup></label>
                <select name="sala" id="sala" class="form-control <?php if (isset($dados['sala_erro'])) {
        echo $dados['sala_erro'] ? 'is-invalid' : '';
    }; ?>">
                    <option value="">Selecione uma sala</option>
                    <option value="sala 1"
                        <?php if ($dados['eventos'][0]->sala_evento === "sala 1") echo 'selected'; ?>>Sala 1
                        
                    </option>
                    <option value="sala 2"
                        <?php if ($dados['eventos'][0]->sala_evento === "sala 2") echo 'selected'; ?>>Sala
                        2
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Obs:</label>
                <input type="text" class="form-control" name="description" id="description"
                    value="<?= $dados['eventos'][0]->descricao_evento; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Aula</button>
            <a href="http://localhost/RoomSync/calendarios/deletar/<?= $dados['eventos'][0]->id_evento ?>">
                <input  class="btn btn-primary btn-danger" value="Deletar Aula">
            </a>

        </form>
    </div>
    </div>
</body>