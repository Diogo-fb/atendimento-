 <?php 

    session_start();

    include_once "../DAO/Conexao.php";
    $conex = new Conexao;
    $conex->fazConexao();

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $senhaUsuario = $_POST['senhaUsuario'];
        $emailUsuario = $_POST['emailUsuario'];

        $stmt = $conex->conn->prepare("SELECT * FROM usuario WHERE emailUsuario = ?");
        $stmt->execute([$emailUsuario]);
        $usu = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usu && password_verify($senhaUsuario, $usu['senhaUsuario'])){
            
            $_SESSION['idUsuario'] = $usu['idUsuario'];
            $_SESSION['nomeUsuario'] = $usu['nomeUsuario'];
            header('Location:../formulario/formulario.php');
            exit();
    }else {
        header('Location:../login/login.php?erro=login');
    }
}

 
 ?>
