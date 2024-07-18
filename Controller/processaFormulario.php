<?php
include_once '../DAO/Conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se os campos foram recebidos corretamente
    $identificacaoAtendente = $_POST['identificacaoAtendente'] ?? '';
    $tipoAtendimento = $_POST['tipoAtendimento'] ?? '';
    $quemAtendendo = $_POST['quemAtendendo'] ?? '';

    // Variáveis específicas para Empregador
    $nomeEmpregador = '';
    $cnpjEmpregador = '';
    $telefoneEmpregador = '';
    $tipoAtendimentoEmpregador = '';

    // Variáveis específicas para Trabalhador
    $nomeTrabalhador = '';
    $cpfTrabalhador = '';
    $celularTrabalhador = '';
    $tipoAtendimentoTrabalhador = '';

    // Verifica quem está sendo atendido e atribui os valores corretos
    if ($quemAtendendo == 'Empregador') {
        $nomeEmpregador = $_POST['nomeEmpregador'] ?? '';
        $cnpjEmpregador = $_POST['cnpjEmpregador'] ?? '';
        $telefoneEmpregador = $_POST['telefoneEmpregador'] ?? '';
        $tipoAtendimentoEmpregador = $_POST['tipoAtendimentoEmpregador'] ?? '';
    } elseif ($quemAtendendo == 'Trabalhador') {
        $nomeTrabalhador = $_POST['nomeTrabalhador'] ?? '';
        $cpfTrabalhador = $_POST['cpfTrabalhador'] ?? '';
        $celularTrabalhador = $_POST['celularTrabalhador'] ?? '';
        $tipoAtendimentoTrabalhador = $_POST['tipoAtendimentoTrabalhador'] ?? '';
    }

    try {
        // Cria uma nova conexão
        $conexao = new Conexao();
        $conn = $conexao->fazConexao();

        // Query SQL para inserir os dados no banco de dados
        $query = "INSERT INTO tabela_atendimento (identificacaoAtendente, tipoAtendimento, quemAtendendo, 
                    nomeEmpregador, cnpjEmpregador, telefoneEmpregador, nomeTrabalhador, cpfTrabalhador, 
                    celularTrabalhador, tipoAtendimentoEmpregador)
                  VALUES (:identificacaoAtendente, :tipoAtendimento, :quemAtendendo, 
                    :nomeEmpregador, :cnpjEmpregador, :telefoneEmpregador, :nomeTrabalhador, 
                    :cpfTrabalhador, :celularTrabalhador, :tipoAtendimentoEmpregador)";

        // Preparar a query
        $stmt = $conn->prepare($query);

        // Vincular os parâmetros
        $stmt->bindParam(':identificacaoAtendente', $identificacaoAtendente);
        $stmt->bindParam(':tipoAtendimento', $tipoAtendimento);
        $stmt->bindParam(':quemAtendendo', $quemAtendendo);
        $stmt->bindParam(':nomeEmpregador', $nomeEmpregador);
        $stmt->bindParam(':cnpjEmpregador', $cnpjEmpregador);
        $stmt->bindParam(':telefoneEmpregador', $telefoneEmpregador);
        $stmt->bindParam(':nomeTrabalhador', $nomeTrabalhador);
        $stmt->bindParam(':cpfTrabalhador', $cpfTrabalhador);
        $stmt->bindParam(':celularTrabalhador', $celularTrabalhador);
        $stmt->bindParam(':tipoAtendimentoEmpregador', $tipoAtendimentoEmpregador);

        // Executar a query
        if ($stmt->execute()) {
            // Redirecionar para a página de sucesso
            header('Location: ../formulario/sucesso.php');
            exit();
        } else {
            echo "Erro ao inserir dados.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    } finally {
        // Fechar conexão
        $conn = null;
    }
} else {
    echo "Método de requisição inválido.";
}
?>
