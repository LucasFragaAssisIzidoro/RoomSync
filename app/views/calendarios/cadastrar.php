<?php 

    $data = new \DateTime($dados['data'], new \DateTimeZone('America/Sao_Paulo')); 

?>
<header>
  
</header>

<body>
    
    <section class="card">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URL?>/calendarios/calendarioAdm">Calendario</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a>Cadastrar</a></li>
        </ol>
    </nav>
        <form name="formAdd" id="formAdd" method="post" action="<?= URL ?>/calendarios/solicitar/<?=$data->format('Y-m-d\TH:i:sP')?>" method="post">

            <h2 class="form-title">Formulário de Cadastro de Aula</h2>

            <div class="form-group <?php if (isset($dados['data_erro'])) {
                echo 'is-invalid';
            } ?>">
                <label for="date">Data:</label>
                <input type="date" name="date" id="date" value="<?=$data->format('Y-m-d');?>" class="form-control" required>
                <div class="invalid-feedback">
                        <?= $dados['data_erro'] ?>
                </div>
            </div>

            <div class="form-group <?php if (isset($dados['start_erro'])) {
                    echo 'is-invalid';
                } ?>">
                <label for="start">Hora Início:</label>
                <input type="time" class="form-control " name="start" id="start" value="<?= $data->format('H:i'); ?>" required>
            </div>

            <div class="form-group <?php if (isset($dados['end_erro'])) {
                echo 'id-invalid';
            } ?>">
                <label for="end">Hora Fim:</label>
                <input type="time" class="form-control <?php if (isset($dados['end_erro'])) {
                    echo 'is-invalid';
                } ?>" name="end" id="end" value=" " >
            </div>

            <div class="form-group <?php if (isset($dados['title_erro'])) {
                echo 'is-invalid';
            } ?>">
                <label for="title">Título Aula:</label>
                <input type="text" name="title" id="title" value="" class="form-control " required>
            </div>

            <div class="form-group">
                <label for="sala">Sala: <sup class="text-danger">*</sup></label>
                <select name="sala" id="sala" class="form-control <?php if (isset($dados['nome_usuario'])) {
                    echo $dados['sala_erro'] ? 'is-invalid' : '';
                }
                ; ?>" required>
                    <option value="">Selecione um sala</option>
                    <option value="sala 1">sala 1</option>
                    <option value="sala 2">sala 2</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Obs:</label>
                <input type="text" class="form-control" name="description" id="description" required>
            </div>
            <button type="submit" class="btn btn-primary">Solicitar Aula</button>
        </form>
    </section>

    
</body>