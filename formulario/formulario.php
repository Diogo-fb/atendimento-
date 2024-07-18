<?php
session_start();

include_once "../DAO/Conexao.php";
$conex = new Conexao();
$conn = $conex->fazConexao();

if (!isset($_SESSION[$usu='idUsuario'])) {
    header('Location: ../login/login.php');
    exit();
}

$idUsuario = $_SESSION['idUsuario'];
$query = "SELECT nomeUsuario FROM usuario WHERE idUsuario = :idUsuario";
$stmt = $conn->prepare($query);
$stmt->bindParam(':idUsuario', $idUsuario);
$stmt->execute();
$usu = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usu) {
    $nomeUsuario = $usu['nomeUsuario'];
    echo "Bem-Vindo, $nomeUsuario!";
} else {
    echo "Bem-Vindo, Usuário!";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Atendimento</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Formulário de Atendimento</h2>
        <form action="../Controller/processaFormulario.php" method="post">
            <fieldset>
                
                <legend>Bloco 1 - Identificação</legend>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                var identificacaoAtendenteInput = document.getElementById('identificacaoAtendente');
                var nomeUsuario = "<?php echo htmlspecialchars($nomeUsuario); ?>";
                identificacaoAtendenteInput.value = nomeUsuario;
             });
             </script>
                <label for="identificacaoAtendente">Identificação do atendente:</label>
                <input type="text" id="identificacaoAtendente" name="identificacaoAtendente" required>
            </fieldset>
            <fieldset>
                <legend>Tipo de atendimento</legend>
                <label for="tipoAtendimento">Tipo de atendimento:</label>
                <select id="tipoAtendimento" name="tipoAtendimento" required>
                    <option value="Presencial">Presencial</option>
                    <option value="Whatsapp">Whatsapp</option>
                    <option value="LigacaoTelefonica">Ligação telefônica</option>
                    <option value="Email">E-mail</option>
                    <option value="RedesSociais">Redes sociais</option>
                    <option value="Teams">Teams</option>
                    <option value="Outra">Outra</option>
                </select>
            </fieldset>
            <fieldset>
                <legend>Quem estou atendendo</legend>
                <label for="quemAtendendo">Quem estou atendendo:</label>
                <select id="quemAtendendo" name="quemAtendendo" onchange="toggleFields()" required>
                    <option value="Empregador">Empregador</option>
                    <option value="Trabalhador">Trabalhador</option>
                    <option value="OutrasAgencias">Outras agências</option>
                    <option value="ADS">ADS</option>
                    <option value="SetoresFGTAS">Setores da FGTAS</option>
                    <option value="InteressadoInformacoes">Interessado de informações sobre o Mercado de Trabalho</option>
                    <option value="Outra">Outra</option>
                </select>
            </fieldset>
            <!-- Campos específicos para Empregador -->
            <fieldset id="empregadorFields" class="hidden">
                <legend>Identificação do empregador</legend>
                <label for="nomeEmpregador">Nome do empregador:</label>
                <input type="text" id="nomeEmpregador" name="nomeEmpregador">
                
                <label for="cnpjEmpregador">CNPJ do empregador:</label>
                <input type="text" id="cnpjEmpregador" name="cnpjEmpregador">
                
                <label for="telefoneEmpregador">Telefone de contato do empregador:</label>
                <input type="text" id="telefoneEmpregador" name="telefoneEmpregador">
                
                <label for="tipoAtendimentoEmpregador">Tipo de atendimento:</label>
                <select id="tipoAtendimentoEmpregador" name="tipoAtendimentoEmpregador">
                    <option value="CarteiraTrabalho">Carteira de Trabalho, SD, Vagas</option>
                    <option value="ProgramaArtesanato">Programa Gaúcho do Artesanato</option>
                    <option value="VidaHumanistico">Vida Centro Humanístico</option>
                    <option value="OrientacoesEmpreendedorismo">Orientações sobre empreendedorismo</option>
                    <option value="OrientacoesQualificacao">Orientações sobre cursos de qualificação</option>
                    <option value="InformacoesMercadoTrabalho">Informações sobre mercado de trabalho</option>
                    <option value="Outra">Outra</option>
                </select>
            </fieldset>
            <fieldset id="trabalhadorFields" class="hidden">
                <legend>Identificação do trabalhador</legend>
                <label for="nomeTrabalhador">Nome do trabalhador:</label>
                <input type="text" id="nomeTrabalhador" name="nomeTrabalhador">
                
                <label for="cpf">CPF:</label>
                <input type="text" id="cpfTrabalhador" name="cpfTrabalhador" required>


                <label for="celularTrabalhador">Celular do trabalhador:</label>
                <input type="text" id="celularTrabalhador" name="celularTrabalhador">
                
                <label for="tipoAtendimentoTrabalhador">Tipo de atendimento:</label>
                <select id="tipoAtendimentoTrabalhador" name="tipoAtendimentoTrabalhador">
                    <option value="CarteiraTrabalho">Carteira de Trabalho, SD, Vagas</option>
                    <option value="ProgramaArtesanato">Programa Gaúcho do Artesanato</option>
                    <option value="VidaHumanistico">Vida Centro Humanístico</option>
                    <option value="OrientacoesEmpreendedorismo">Orientações sobre empreendedorismo</option>
                    <option value="OrientacoesQualificacao">Orientações sobre cursos de qualificação</option>
                    <option value="InformacoesMercadoTrabalho">Informações sobre mercado de trabalho</option>
                    <option value="Outra">Outra</option>
                </select>
            </fieldset>
            <form action="../Controller/processaFormulario.php" method="post">
            <button type="submit">Enviar</button>
            </form>
        </form>
    </div>
    <script>
        function toggleFields() {
            var role = document.getElementById('quemAtendendo').value;
            var trabalhadorFields = document.getElementById('trabalhadorFields');
            var empregadorFields = document.getElementById('empregadorFields');

            if (role === 'Trabalhador') {
                trabalhadorFields.classList.remove('hidden');
                empregadorFields.classList.add('hidden');
            } else if (role === 'Empregador') {
                trabalhadorFields.classList.add('hidden');
                empregadorFields.classList.remove('hidden');
            } else {
                trabalhadorFields.classList.add('hidden');
                empregadorFields.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
