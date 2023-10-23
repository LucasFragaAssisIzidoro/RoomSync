<header>
    <link rel="stylesheet" href="/RoomSync/public/css/topo.css" type="text/css">

    <?php if (isset($_SESSION['usuario_id'])): ?>
        <div class="container">
            <nav class="navbar navbar-light">

                <a class="collapse navbar-collapse justify-content-center" href="
            <?php if ($_SESSION['usuario_tipo'] == 'admin'):
                echo URL ?>/usuarios/homeadm
                <?php endif; ?>

                <?php if ($_SESSION['usuario_tipo'] == 'usuario'):
                    echo URL ?>/home
                <?php endif; ?>">

                    <?php if ($_SESSION['usuario_tipo'] == 'usuario'): ?>
                        <div class="navbar-nav">
                            <ul>
                                <!-- Aplicando a classe mx-auto para centralizar -->
                                

                                <!-- Aplicando a classe mx-auto para centralizar -->
                                <li class="nav-item">
                                    <a href="<?php echo URL ?>/calendarios/calendarioAdm" class="nav-link" data-toggle="tooltip"
                                        title="Calendario">Calendario</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo URL ?>/home">
                                        <img src="/AgroInv/public/img/logoAgroInv.png" alt="logo"
                                            style="width:80px; height:60%;">
                                    </a>
                                </li>

                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if ($_SESSION['usuario_tipo'] == 'admin'): ?>
                        <a class="logo" href="<?php echo URL ?>/usuarios/homeadm">
                            RoomSync
                        </a>
                    <?php endif; ?>
                    <ul class="navbar-nav">

                        <li class="nav-item">

                            <a class="nav-item active" href="<?php echo URL ?>/usuarios/sair">
                                <img src="/AgroInv/public/img/leave.png" alt="logo" style="width:40px; height:60%;">
                            </a>
                            <!-- <a class="nav-item active" href="<?php echo URL ?>/usuarios/editarusuario">
                <img src="/AgroInv/public/img/configuracoes.png" alt="logo"
                    style="width:40px; height:60%; margin-left:5px;">
            </a> -->
                        </li>
                    </ul>
                    <!-- Pra poder dar espaço p  carroussel, é gambiarra mas tento ver um jeito melhor dps-->
                    <style type="text/css">
                        header {
                            margin-bottom: 20px;
                        }
                    </style>
            </nav>
        </div>




    <?php else: ?>
        <div class="container">
            <nav class="navbar navbar-expand-sm navbar-light">
                <a href="<?php echo URL ?>" class="navbar-brand">
                    <img src="/AgroInv/public/img/if_logo.png" width="130" height="50%" style="margin-top:5px;" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>
                    <span class="navbar-text">
                        <?php if (isset($_SESSION['tipo_usuario']) == "admin"): ?>
                            <a href="<?php echo URL ?>/usuarios/cadastrar" class="btn btn-info" data-tooltip="tooltip"
                                tittle="Cadastre-se"> Cadastrar </a>
                        <?php endif; ?>
                        <a href="<?php echo URL ?>/usuarios/login" class="btn btn-info" data-tooltip="tooltip"
                            tittle="Login"> Login</a>

                    </span>
                    <!-- Pra poder dar espaço p  carroussel, é gambiarra mas tento ver um jeito melhor dps-->
                    <style type="text/css">
                        header {
                            margin-bottom: 20px;
                        }
                    </style>
                </div>
            <?php endif; ?>
        </nav>
    </div>
</header>