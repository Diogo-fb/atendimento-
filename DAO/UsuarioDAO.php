<?php 

    class UsuarioDAO{

    protected $conn;

    public function __construct()
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $this->conn = $conex->fazConexao();
    }

    function cadastraUsuario(UsuarioModel $usuario)
    {
        
        $nomeUsuario =  $usuario->getNomeUsuario();
        $idPerfil = $usuario->getIdperfil();
        $telefoneCelular = $usuario->getTelefoneCelular();
        $emailUsuario = $usuario->getEmailUsuario();
        $senhaUsuario = $usuario->getSenhaUsuario();
 
        $sql ="INSERT INTO usuario (idPerfil, nomeUsuario, telefoneCelular, emailUsuario, senhausuario, dataCadastro) VALUES (:idPerfil, :nomeUsuario, :telefoneCelular, :emailUsuario, :senhaUsuario, :dataCadastro)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindvalue(':nomeUsuario', $nomeUsuario);
        $stmt->bindValue(':idPerfil', $idPerfil);
        $stmt->bindvalue(':telefoneCelular', $telefoneCelular);
        $stmt->bindvalue(':emailUsuario', $emailUsuario);
        $stmt->bindvalue(':senhaUsuario', $senhaUsuario);
        $stmt->bindValue(':dataCadastro', date('Y-m-d H:i:s'));

        $res = $stmt->execute();
        if ($res){
            header('location:../cadastroUsuario/sucesso.php');
        }else 
        {
            echo "<script>alert('ERRO!!!');</script>";
        }    
    }

    public function listarUsuario() {
        if ($this->conn) {
            $sql = "SELECT usuario.*, perfil.nomePerfil 
                    FROM usuario 
                    INNER JOIN perfil ON usuario.idPerfil = perfil.idperfil";
            $stmt = $this->conn->query($sql);
            return $stmt;
        } else {
            echo "<script>alert('Erro ao conectar com o banco de dados');</script>";
            return null;
        }
    }

    public function buscarPorId($idUsuario) {
        $sql = "SELECT * FROM usuario WHERE idUsuario = :idUsuario";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':idUsuario', $idUsuario);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function alterar(UsuarioModel $usuario) {
        $sql = "UPDATE usuario SET nomeUsuario = :nomeUsuario, idPerfil = :idPerfil, telefoneCelular = :telefoneCelular, emailUsuario = :emailUsuario WHERE idUsuario = :idUsuario";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':idUsuario', $usuario->getId());
        $stmt->bindValue(':nomeUsuario', $usuario->getNomeUsuario());
        $stmt->bindValue(':idPerfil', $usuario->getIdPerfil());
        $stmt->bindValue(':telefoneCelular', $usuario->getTelefoneCelular());
        $stmt->bindValue(':emailUsuario', $usuario->getEmailUsuario());
        return $stmt->execute();
    }
}
?>