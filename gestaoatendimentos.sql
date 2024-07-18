-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/07/2024 às 00:09
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gestaoatendimentos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `idAtendimento` int(11) NOT NULL,
  `idFormaAtendimento` int(11) NOT NULL,
  `idPerguntaPublico` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `ativo('S','N')` enum('S','N') NOT NULL DEFAULT 'S',
  `respostaAtendimento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `formaatendimento`
--

CREATE TABLE `formaatendimento` (
  `idFormaAtendimento` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nomeAtendimento` varchar(255) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `ativo` enum('S','N') NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

CREATE TABLE `perfil` (
  `idPerfil` int(11) NOT NULL,
  `nomePerfil` varchar(255) NOT NULL,
  `dataCadastro` datetime DEFAULT NULL,
  `ativo` enum('S','N') NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `nomePerfil`, `dataCadastro`, `ativo`) VALUES
(1, 'Perfil Administrativo', '2024-07-16 18:36:15', 'S'),
(2, 'Perfil Funcionario', '2024-07-16 18:36:15', 'S');

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfilsessao`
--

CREATE TABLE `perfilsessao` (
  `idPerfil` int(11) NOT NULL,
  `idSessao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `perguntapublico`
--

CREATE TABLE `perguntapublico` (
  `idPerguntaPublico` int(11) NOT NULL,
  `idPublico` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `descricaoPergunta` text NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `ativo` enum('S','N') NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `publico`
--

CREATE TABLE `publico` (
  `idPublico` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nomePublico` varchar(255) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `ativo` enum('S','N') NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessao`
--

CREATE TABLE `sessao` (
  `idSessao` int(11) NOT NULL,
  `nomeSessao` varchar(255) NOT NULL,
  `dataCadsatro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabela_atendimento`
--

CREATE TABLE `tabela_atendimento` (
  `id` int(11) NOT NULL,
  `identificacaoAtendente` varchar(100) NOT NULL,
  `tipoAtendimento` varchar(100) NOT NULL,
  `quemAtendendo` varchar(100) NOT NULL,
  `nomeEmpregador` varchar(100) DEFAULT NULL,
  `cnpjEmpregador` varchar(20) DEFAULT NULL,
  `telefoneEmpregador` varchar(20) DEFAULT NULL,
  `tipoAtendimentoEmpregador` varchar(100) DEFAULT NULL,
  `nomeTrabalhador` varchar(100) DEFAULT NULL,
  `cpfTrabalhador` varchar(20) DEFAULT NULL,
  `celularTrabalhador` varchar(20) DEFAULT NULL,
  `dataRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipoAtendimentoTrabalhador` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tabela_atendimento`
--

INSERT INTO `tabela_atendimento` (`id`, `identificacaoAtendente`, `tipoAtendimento`, `quemAtendendo`, `nomeEmpregador`, `cnpjEmpregador`, `telefoneEmpregador`, `tipoAtendimentoEmpregador`, `nomeTrabalhador`, `cpfTrabalhador`, `celularTrabalhador`, `dataRegistro`, `tipoAtendimentoTrabalhador`) VALUES
(30, 'DIOGO PADILHA BARBOZA', 'Whatsapp', 'Trabalhador', '', '', '', 'CarteiraTrabalho', 'Rodriogo', '41234421344', '', '2024-07-16 21:40:37', NULL),
(31, 'DIOGO PADILHA BARBOZA', 'Presencial', 'Trabalhador', '', '', '', '', 'Rodriogo', '3453245432', '', '2024-07-16 21:50:47', 'CarteiraTrabalho'),
(32, 'DIOGO PADILHA BARBOZA', 'Presencial', 'Trabalhador', '', '', '', '', '', 'dfsadfsda', '', '2024-07-16 22:17:14', 'CarteiraTrabalho'),
(33, 'Diogo', 'Email', 'Trabalhador', '', '', '', 'CarteiraTrabalho', 'DIofo', 'w315314511', '', '2024-07-16 22:21:04', NULL),
(34, 'Joao', 'Presencial', 'Trabalhador', '', '', '', '', 'Rodriogo', '41234421344', '', '2024-07-16 22:29:35', 'CarteiraTrabalho'),
(35, 'jp', 'Presencial', 'Trabalhador', '', '', '', 'CarteiraTrabalho', '231321', '123312', '123321', '2024-07-16 22:37:37', NULL),
(36, 'jp', 'Whatsapp', 'Empregador', '213312', '321132', '321132', 'CarteiraTrabalho', '', '', '', '2024-07-16 22:37:47', NULL),
(37, 'jp', 'Whatsapp', 'Empregador', '213312', '321132', '321132', 'CarteiraTrabalho', '', '', '', '2024-07-16 22:37:54', NULL),
(38, 'jp', 'Whatsapp', 'Empregador', '213312', '321132', '321132', 'CarteiraTrabalho', '', '', '', '2024-07-16 22:38:15', NULL),
(39, 'jp', 'Whatsapp', 'Empregador', 'joao', '321132', '321132', 'CarteiraTrabalho', '', '', '', '2024-07-16 22:38:32', NULL),
(40, 'jp', 'Whatsapp', 'Empregador', 'joao', '321132', '321132', 'CarteiraTrabalho', '', '', '', '2024-07-16 22:38:36', NULL),
(41, 'roger', 'Presencial', 'Trabalhador', '', '', '', 'CarteiraTrabalho', '321132', '132213', '321132', '2024-07-16 22:39:11', NULL),
(42, 'roger', 'Presencial', 'Empregador', '321312', '35234', '432423324', 'CarteiraTrabalho', '', '', '', '2024-07-16 22:39:15', NULL),
(43, 'roger', 'Presencial', 'Trabalhador', '', '', '', 'CarteiraTrabalho', 'joao pedro', '132213', '1223', '2024-07-16 22:39:36', NULL),
(44, 'roger', 'Presencial', 'Empregador', 'joao', '123', '123', 'CarteiraTrabalho', '', '', '', '2024-07-16 22:40:01', NULL),
(45, 'roger', 'Presencial', 'Empregador', 'joao', '123', '123', 'CarteiraTrabalho', '', '', '', '2024-07-16 22:40:08', NULL),
(46, 'Joao', 'Whatsapp', 'Trabalhador', '', '', '', '', 'Rodriogo', '41234421344', '51992341234', '2024-07-16 22:40:31', 'VidaHumanistico'),
(47, 'Joao', 'Presencial', 'Trabalhador', '', '', '', '', 'Rodriogo', '41234421344', '51992341234', '2024-07-16 22:41:18', 'CarteiraTrabalho'),
(48, 'Joao', 'Presencial', 'Empregador', 'joao', '1234123412', '1234123412', 'OrientacoesEmpreendedorismo', '', '', '', '2024-07-16 22:41:30', ''),
(49, 'Diogo', 'Presencial', 'Trabalhador', '', '', '', '', 'Joao', '534532523', '352523523', '2024-07-16 23:00:19', 'OrientacoesEmpreendedorismo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(255) NOT NULL,
  `emailUsuario` varchar(255) NOT NULL,
  `loginUsuario` varchar(255) NOT NULL,
  `senhaUsuario` varchar(255) NOT NULL,
  `dataCadastro` datetime DEFAULT NULL,
  `telefoneCelular` varchar(45) DEFAULT NULL,
  `ativo` enum('S','N') NOT NULL DEFAULT 'S',
  `idPerfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `emailUsuario`, `loginUsuario`, `senhaUsuario`, `dataCadastro`, `telefoneCelular`, `ativo`, `idPerfil`) VALUES
(1, 'Diogo Padilha Barboza', 'diogopadilhabarboza2@gmail.com', '', '$2y$10$jcnAftNxeOfBySjUg7PCLubc6SOXCebhrvijQQ/wyuth9o.FguYAm', '2024-07-16 18:37:13', '51991106364', 'S', 2),
(2, 'DIOGO PADILHA BARBOZA', 'teste@gmail.com', '', '$2y$10$k8Kjws4tLmc1w2A.xa4WvOe4ZeeDmjtV/7Gz9Clrj26bPMt1/xZbS', '2024-07-16 18:38:12', '51998103478', 'S', 1),
(3, 'Joao', 'joao@gmail.com', '', '$2y$10$R1mqudXfp6RRBhDQThRIOu9QEVNyF1b5zE64ppoWYDJiJW9kTWhC6', '2024-07-16 19:25:30', '51991106364', 'S', 1),
(4, 'Diogo', 'diogo@gmail.com', '', '$2y$10$OXkdskr3UN66cVHMKQrIG.aEW4jxLGuvCgSgLX6q7KsJqoXBTAWU2', '2024-07-16 19:56:35', '51991106364', 'S', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`idAtendimento`,`idFormaAtendimento`,`idPerguntaPublico`,`idUsuario`),
  ADD KEY `fk_atendimento_formaatendimento1_idx` (`idFormaAtendimento`),
  ADD KEY `fk_atendimento_perguntapublico1_idx` (`idPerguntaPublico`),
  ADD KEY `fk_atendimento_usuario1_idx` (`idUsuario`);

--
-- Índices de tabela `formaatendimento`
--
ALTER TABLE `formaatendimento`
  ADD PRIMARY KEY (`idFormaAtendimento`,`idUsuario`),
  ADD KEY `fk_tipoatendimento_usuario1_idx` (`idUsuario`);

--
-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Índices de tabela `perfilsessao`
--
ALTER TABLE `perfilsessao`
  ADD PRIMARY KEY (`idPerfil`,`idSessao`),
  ADD KEY `fk_perfil_has_sessao_sessao1_idx` (`idSessao`),
  ADD KEY `fk_perfil_has_sessao_perfil1_idx` (`idPerfil`);

--
-- Índices de tabela `perguntapublico`
--
ALTER TABLE `perguntapublico`
  ADD PRIMARY KEY (`idPerguntaPublico`,`idPublico`,`idUsuario`),
  ADD KEY `fk_perguntapublico_publico1_idx` (`idPublico`),
  ADD KEY `fk_perguntapublico_usuario1_idx` (`idUsuario`);

--
-- Índices de tabela `publico`
--
ALTER TABLE `publico`
  ADD PRIMARY KEY (`idPublico`,`idUsuario`),
  ADD KEY `fk_publico_usuario1_idx` (`idUsuario`);

--
-- Índices de tabela `sessao`
--
ALTER TABLE `sessao`
  ADD PRIMARY KEY (`idSessao`);

--
-- Índices de tabela `tabela_atendimento`
--
ALTER TABLE `tabela_atendimento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`,`idPerfil`),
  ADD KEY `fk_usuario_perfil1_idx` (`idPerfil`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `idAtendimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `formaatendimento`
--
ALTER TABLE `formaatendimento`
  MODIFY `idFormaAtendimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `perguntapublico`
--
ALTER TABLE `perguntapublico`
  MODIFY `idPerguntaPublico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `publico`
--
ALTER TABLE `publico`
  MODIFY `idPublico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sessao`
--
ALTER TABLE `sessao`
  MODIFY `idSessao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tabela_atendimento`
--
ALTER TABLE `tabela_atendimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `atendimento`
--
ALTER TABLE `atendimento`
  ADD CONSTRAINT `fk_atendimento_formaatendimento1` FOREIGN KEY (`idFormaAtendimento`) REFERENCES `formaatendimento` (`idFormaAtendimento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atendimento_perguntapublico1` FOREIGN KEY (`idPerguntaPublico`) REFERENCES `perguntapublico` (`idPerguntaPublico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atendimento_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `formaatendimento`
--
ALTER TABLE `formaatendimento`
  ADD CONSTRAINT `fk_tipoatendimento_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `perfilsessao`
--
ALTER TABLE `perfilsessao`
  ADD CONSTRAINT `fk_perfil_has_sessao_perfil1` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_perfil_has_sessao_sessao1` FOREIGN KEY (`idSessao`) REFERENCES `sessao` (`idSessao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `perguntapublico`
--
ALTER TABLE `perguntapublico`
  ADD CONSTRAINT `fk_perguntapublico_publico1` FOREIGN KEY (`idPublico`) REFERENCES `publico` (`idPublico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_perguntapublico_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `publico`
--
ALTER TABLE `publico`
  ADD CONSTRAINT `fk_publico_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
