-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Nov-2024 às 16:41
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_autily`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `crianca`
--

CREATE TABLE `crianca` (
  `id_crianca` int(11) NOT NULL,
  `nome` text NOT NULL,
  `idade` int(11) NOT NULL,
  `nivel_de_suporte` int(2) DEFAULT NULL,
  `responsavel_id` int(11) NOT NULL,
  `info` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `crianca`
--

INSERT INTO `crianca` (`id_crianca`, `nome`, `idade`, `nivel_de_suporte`, `responsavel_id`, `info`, `email`, `senha`) VALUES
(1, 'Ariany Andrade', 17, 3, 27, 'Morena bonita, olhos castanhos, cabelo liso etc', 'ariany1@gmail.com', '$2y$10$1rEAIvX/GvnWlUVkgq2wqeOWBGnQUuErpon6a8BkHgR2bzWWCMaWm'),
(8, 'daniel', 7, 1, 32, 'nenhuma', 'rose@silva', '$2y$10$aCBeYuYNg6SZ/31EAeU5AuJgG5oQmn/e81I/NfSKeFLDgU.E75yFC'),
(9, 'gabriely', 5, 1, 32, '', 'bibi@gmail', '$2y$10$BVgo.ee87aFaXK.VQxQ5Ue3YkeXf16caqwExJON5UrFh7S5jW/eyq'),
(12, 'igor', 12, 3, 35, 'teste', 'teste@gmail', '$2y$10$Goat.R/bmRRJ.MVvXmMqn.17FjMP0.I0IGlTlvh.gFBb2.L.8Ax3K');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cri_resp`
--

CREATE TABLE `cri_resp` (
  `fk_responsavel_id_resp` int(11) NOT NULL,
  `fk_crianca_id_crianca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogam`
--

CREATE TABLE `jogam` (
  `fk_crianca_id_crianca` int(11) NOT NULL,
  `fk_jogos_id_jogo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `id_jogo` int(11) NOT NULL,
  `nome_jogo` varchar(100) DEFAULT NULL,
  `objetivo_jogo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`id_jogo`, `nome_jogo`, `objetivo_jogo`) VALUES
(0, 'memoria', 'achar as peças'),
(1, 'memoria', 'achar as peças');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `idade` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nivel_de_suporte` varchar(50) DEFAULT NULL,
  `info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontuacoes`
--

CREATE TABLE `pontuacoes` (
  `id_jogo` int(11) NOT NULL,
  `id_crianca` int(11) NOT NULL,
  `pontuacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pontuacoes`
--

INSERT INTO `pontuacoes` (`id_jogo`, `id_crianca`, `pontuacao`) VALUES
(1, 12, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel`
--

CREATE TABLE `responsavel` (
  `id_resp` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `fk_tipo_cod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rotina`
--

CREATE TABLE `rotina` (
  `horario_inicio` time NOT NULL,
  `horario_final` time DEFAULT NULL,
  `tarefa` varchar(255) DEFAULT NULL,
  `fk_responsavel_id_resp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rotinacrianca`
--

CREATE TABLE `rotinacrianca` (
  `fk_crianca_id_crianca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `cod` int(11) NOT NULL,
  `descr` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `fk_id_crianca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `fk_id_crianca`) VALUES
(28, 'bibi', 'arika@ari', '$2y$10$SpjHy0ID7ZyXqn3Ii1ABl.eNd1L3.m3v2xyV.dxUU8yIYfhpuKoku', 0),
(32, 'rosecleide', 'rose@silva', '$2y$10$lIb0731uyGIxBjGv//zZz.V0QXkEDN9QqlOS9ho.QNDljN1S.JwXW', 0),
(35, 'teste', 'teste@gmail', '$2y$10$/GL9yXbPFIM4e38Iatsyq.rzwNUaQ4nlNsbjiSa0KYNL3sqEuvRSy', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `crianca`
--
ALTER TABLE `crianca`
  ADD PRIMARY KEY (`id_crianca`);

--
-- Índices para tabela `cri_resp`
--
ALTER TABLE `cri_resp`
  ADD PRIMARY KEY (`fk_responsavel_id_resp`,`fk_crianca_id_crianca`),
  ADD KEY `FK_cri_resp_2` (`fk_crianca_id_crianca`);

--
-- Índices para tabela `jogam`
--
ALTER TABLE `jogam`
  ADD PRIMARY KEY (`fk_crianca_id_crianca`,`fk_jogos_id_jogo`),
  ADD KEY `FK_jogam_2` (`fk_jogos_id_jogo`);

--
-- Índices para tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id_jogo`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices para tabela `pontuacoes`
--
ALTER TABLE `pontuacoes`
  ADD PRIMARY KEY (`id_jogo`,`id_crianca`),
  ADD KEY `id_crianca` (`id_crianca`);

--
-- Índices para tabela `responsavel`
--
ALTER TABLE `responsavel`
  ADD PRIMARY KEY (`id_resp`),
  ADD KEY `FK_responsavel_2` (`fk_tipo_cod`);

--
-- Índices para tabela `rotina`
--
ALTER TABLE `rotina`
  ADD PRIMARY KEY (`horario_inicio`,`fk_responsavel_id_resp`),
  ADD KEY `FK_rotina_1` (`fk_responsavel_id_resp`);

--
-- Índices para tabela `rotinacrianca`
--
ALTER TABLE `rotinacrianca`
  ADD PRIMARY KEY (`fk_crianca_id_crianca`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `crianca`
--
ALTER TABLE `crianca`
  MODIFY `id_crianca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cri_resp`
--
ALTER TABLE `cri_resp`
  ADD CONSTRAINT `FK_cri_resp_1` FOREIGN KEY (`fk_responsavel_id_resp`) REFERENCES `responsavel` (`id_resp`),
  ADD CONSTRAINT `FK_cri_resp_2` FOREIGN KEY (`fk_crianca_id_crianca`) REFERENCES `crianca` (`id_crianca`);

--
-- Limitadores para a tabela `jogam`
--
ALTER TABLE `jogam`
  ADD CONSTRAINT `FK_jogam_1` FOREIGN KEY (`fk_crianca_id_crianca`) REFERENCES `crianca` (`id_crianca`),
  ADD CONSTRAINT `FK_jogam_2` FOREIGN KEY (`fk_jogos_id_jogo`) REFERENCES `jogos` (`id_jogo`);

--
-- Limitadores para a tabela `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `pontuacoes`
--
ALTER TABLE `pontuacoes`
  ADD CONSTRAINT `pontuacoes_ibfk_1` FOREIGN KEY (`id_jogo`) REFERENCES `jogos` (`id_jogo`),
  ADD CONSTRAINT `pontuacoes_ibfk_2` FOREIGN KEY (`id_crianca`) REFERENCES `crianca` (`id_crianca`);

--
-- Limitadores para a tabela `responsavel`
--
ALTER TABLE `responsavel`
  ADD CONSTRAINT `FK_responsavel_2` FOREIGN KEY (`fk_tipo_cod`) REFERENCES `tipo` (`cod`);

--
-- Limitadores para a tabela `rotina`
--
ALTER TABLE `rotina`
  ADD CONSTRAINT `FK_rotina_1` FOREIGN KEY (`fk_responsavel_id_resp`) REFERENCES `responsavel` (`id_resp`);

--
-- Limitadores para a tabela `rotinacrianca`
--
ALTER TABLE `rotinacrianca`
  ADD CONSTRAINT `FK_rotinacrianca_1` FOREIGN KEY (`fk_crianca_id_crianca`) REFERENCES `crianca` (`id_crianca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
