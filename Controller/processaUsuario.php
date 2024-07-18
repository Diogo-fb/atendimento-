<?php 
    session_start();
    
    date_default_timezone_set('America/Sao_Paulo');

    include_once "../DAO/Conexao.php";
    $conex = new Conexao;
    $conex->fazConexao();

        if ($_REQUEST['op'] == "incluir") {
            
            $senha = $_REQUEST["senhaUsuario"];
            $confirmaSenha = $_REQUEST['confirmaSenha'];
    
            if ($senha !== $confirmaSenha) {
                header('Location:../cadastroUsuario/cadastro.php?erro=senhas');
                exit;
            } 
            else{
                $emailUsuario = $_REQUEST['emailUsuario'];
                $stmt = $conex->conn->prepare("SELECT * FROM usuario WHERE emailUsuario = ?");
                $stmt->execute([$emailUsuario]);
                }if ($stmt->fetch()) {
                    header('Location:../cadastroUsuario/cadastro.php?erro=email');
                    exit;
                }else{

                $nomeUsuario = $_REQUEST['nomeUsuario'];
                $idPerfil = $_REQUEST['idPerfil'];
                $telefoneCelular = $_REQUEST['telefoneCelular'];
                $emailUsuario = $_REQUEST['emailUsuario'];
                $senha = $_REQUEST['senhaUsuario'];
                $senhaUsuario = password_hash($senha, PASSWORD_BCRYPT);

                include_once 'AtendController.php';
                $Usuario = new AtendController();
                $Usuario->cadastraUsuario($nomeUsuario, $idPerfil, $telefoneCelular, $emailUsuario, $senhaUsuario);
            }
            
        }
?>