<?php

class Calendarios extends Controller
{
    public $calendarioModel;
    private $usuarioModel;



    public function __construct()
    {
        $this->calendarioModel = $this->model('Calendario');
        $this->usuarioModel = $this->model('Usuario');
    }
   

    public function cadastrar(){

        // Obtém o caminho da URL atual
        $URL = $_SERVER['REQUEST_URI'];
        
        // Use expressões regulares para extrair a data
        $regra = '/\/(\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}-\d{2}:\d{2})/';
        preg_match($regra, $URL, $matches);
        
       
        $data = $matches[1];
        
        
        $date = filter_input(INPUT_POST, 'date', FILTER_DEFAULT);
        $inicio = filter_input(INPUT_POST, 'start', FILTER_DEFAULT);
        $fim = filter_input(INPUT_POST, 'end', FILTER_DEFAULT);
        $title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
        $description = filter_input(INPUT_POST, 'description', FILTER_DEFAULT);
        $sala = filter_input(INPUT_POST, 'sala', FILTER_DEFAULT);
        $start = new \DateTime($date . '' . $inicio, new \DateTimeZone('America/Sao_Paulo'));
        $end = new \DateTime($date . '' . $fim, new \DateTimeZone('America/Sao_Paulo'));
        $id_user = $_SESSION['usuario_id'];
        $dados = [];
        
        
        if (empty($title) || empty($description) || empty($inicio) || empty($date)) {
            if (empty($date)) {
                $dados['data_erro'] = "Preencha o campo data";
            }
            if (empty($inicio)) {
                $dados['start_erro'] = "Preencha o campo inicio da aula";
            }
            if (empty($fim)) {
                $dados['end_erro'] = "Preencha o campo fim da aula";
            }
            if (empty($title)) {
                $dados['title_erro'] = "Preencha o campo titulo";
            }
            if (empty($description)) {
                $dados['description_erro'] = "Preencha o campo descricao";
            }
            if (empty($prof)) {
                $dados['usuario_erro'] = "Preencha o campo usuario";
            }
            if (empty($turma)) {
                $dados['turma_erro'] = "Preencha o campo turma";
            }
            if (empty($lab)) {
                $dados['laboratorio_erro'] = "Preencha o campo laboratorio";
            } 
            Sessao::mensagem('cadastro', 'Preencha todos os campos!', 'alert alert-danger');
        } else {
        
            $this->calendarioModel->criarEvento(0, $id_user, $title, $description, $start->format('Y-m-d H:i:s'), $end->format('Y-m-d H:i:s'), $sala);
            Url::redirecionar('calendarios/calendarioAdm');
            Sessao::mensagem('reuniao', 'Reuniao cadastrada com sucesso!');
        
        
        }
        $dados = [
            'usuarios' => $this->usuarioModel->lerusuarioes(),
            'data' => $data,
            'titulo'=>$title,
            'fim'=>$fim,
        
        ];
    
        $this->view('calendarios/cadastrar', $dados);
        
        }
    public function calendarioAdm(){

        $id =0;
        $dados =[
            'usuarios'=>$this->usuarioModel->lerUsuarioPorId($id),
            'eventos'=>$this->calendarioModel->lerEventos(),
        ];

        $this->view('calendarios/calendarioAdm', $dados);
    }
    public function editar(){
        if($_SESSION['usuario_tipo']=='admin'){

            $url = $_SERVER['REQUEST_URI'];
            $regra = '/\/editar\/(\d+)$/';

            if (preg_match($regra, $url, $correspondencias)) {
                $id = $correspondencias[1];
                $evento = $this->calendarioModel->trazerEventosPeloId($id);

                if ($evento) {
                    // Encontrou um evento com o ID especificado
                    $dados = [
                        'eventos' => $this->calendarioModel->trazerEventosPeloId($id),
                        'usuarios' => $this->usuarioModel->lerusuarioes(),
                    ];
                    $this->view('calendarios/editar', $dados);
                } else {
                    echo "Evento não encontrado.";
                }
            } else {
                echo "URL inválida.";
            }

        }else{
            Url::redirecionar('calendarios/calendarioAdm');
            Sessao::mensagem('aula', 'Voce nao tem permissao para atualizar essa aula!','alert alert-danger');
        }


          
    }

    public function deletar($id)
    {
        if ($this->checarAutorizacao($_SESSION['usuario_id'])) {
            $this->calendarioModel->deletarEvento($id);
            Sessao::mensagem('reuniao', 'Reuniao deletada com sucesso!');
            Url::redirecionar('calendarios/calendarioAdm');
        } else {
            Sessao::mensagem('reunia', 'Voce nao tem permissao para deletar esse reuniao!', 'alert alert-danger');
            Url::redirecionar('calendarios/calendarioAdm');
        }
        $dados = [
            'eventos' => $this->calendarioModel->lerEventos(),
            'usuarioes' => $this->usuarioModel->lerusuario,
            'turmas' => $this->calendarioModel->lerEventos()
        ];

        $this->view('calendarios/deletar', $dados);
    }
    private function checarAutorizacao($id)
    {
        $usuario = $this->usuarioModel->lerUsuarioPorId($id);

        if ($usuario->id_usuario != $_SESSION['usuario_id'] || $_SESSION['usuario_tipo'] == "admin") {
            return true;
        } else {
            return false;
        }
    }
    public function atualizar($id){
        if($_SESSION['usuario_tipo']=='admin'){

            $url = $_SERVER['REQUEST_URI'];
            $regra = '/\/atualizar\/(\d+)$/';
        
            if (preg_match($regra, $url, $correspondencias)) {
                $id = $correspondencias[1];
                $date = filter_input(INPUT_POST, 'date', FILTER_DEFAULT);
                $inicio = filter_input(INPUT_POST, 'start', FILTER_DEFAULT);
                $fim = filter_input(INPUT_POST, 'end', FILTER_DEFAULT);
                $title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
                $description = filter_input(INPUT_POST, 'description', FILTER_DEFAULT);
                $start = new \DateTime($date . ' ' . $inicio, new \DateTimeZone('America/Sao_Paulo'));
                $end = new \DateTime($date . ' ' . $fim, new \DateTimeZone('America/Sao_Paulo'));
                $sala = filter_input(INPUT_POST, 'sala', FILTER_DEFAULT);
                
        
                
                $this->calendarioModel->atualizarEvento($id, $title, $description, $start->format('Y-m-d H:i:s'), $end->format('Y-m-d H:i:s'), $sala);
                Url::redirecionar('calendarios/calendarioAdm');
                Sessao::mensagem('reuniao', 'Reuniao atualizada com sucesso!');
        
            } else {
                echo "Houve um erro!";
            }  
        }else{
            Url::redirecionar('calendarios/calendarioAdm');
            Sessao::mensagem('aula', 'Voce nao tem permissao para atualizar essa aula!','alert alert-danger');
        }
    }
    
}
