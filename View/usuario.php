<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Usuarios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include_once '../Controller/AtendController.php';
    $controller = new atendController;
    $res = $controller->listarUsuario();
    $qtd = $res->rowCount();
    if ($qtd>0){
    print'<h1>Controle dos Usuarios</h1>
    <table div class="tabela">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data do cadastro</th>
            <th>Telefone</th>
            <th>Tipo de perfil</th>
        </tr>';
    while($row = $res->fetch(PDO::FETCH_OBJ)){
        print '<tr>
                <td>'.$row->idUsuario.'</td>
                <td>'.$row->nomeUsuario.'</td>
                <td>'.$row->emailUsuario.'</td>
                <td>'.$row->dataCadastro.'</td>
                <td>'.$row->telefoneCelular.'</td>
                <td>'.$row->nomePerfil.'</td>
                <td>
                    <a href="../view/alterarUsuario.php?id=' . $row->idUsuario . '"><button>Alterar</button>
                    </a>
                </td>
                <td><button>Desativar</button></td>
            </tr>';
        }   print '</table>';}
        else {
             echo "<p>Nenhum Usuario encontrado</p>";
        }
    ?>
</body>
</html>