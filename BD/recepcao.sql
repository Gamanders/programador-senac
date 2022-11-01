-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Out-2022 às 14:02
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `recepcao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `modalidade` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `modalidade`) VALUES
(1, 'Saude', 'presencial'),
(2, 'Saude', 'ead'),
(4, 'Beleza', 'presencial'),
(5, 'Beleza', 'ead'),
(7, 'Informatica', 'presencial'),
(8, 'Informatica', 'ead'),
(9, 'Informatica', 'semi-presencial'),
(12, 'Administrativo', 'hibrido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `dtIni` date DEFAULT NULL,
  `dtFim` date DEFAULT NULL,
  `cargaHoraria` int(11) DEFAULT NULL,
  `capacidade` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `dtIni`, `dtFim`, `cargaHoraria`, `capacidade`, `categoria_id`) VALUES
(1, 'Cuidador de Idosos', '2022-10-15', '2022-11-15', 40, 15, 1),
(2, 'Cuidador de Idosos', '2022-10-15', '2022-11-15', 40, 15, 2),
(3, 'Informatica Basica', '2022-09-30', '2022-10-15', 30, 15, 7),
(4, 'Informatica Basica', '2022-09-20', '2022-10-10', 15, 15, 9),
(5, 'Excel', '2022-10-10', '2022-10-30', 20, 60, 8),
(8, 'Cuidador de CrianÃ§as', '2022-10-10', '2022-10-20', 10, 20, 1),
(9, 'Programador de Sistemas', '2022-10-15', '2022-10-30', 200, 15, 7),
(13, 'Maquiagem', '2022-10-20', '2022-11-10', 10, 15, 4),
(15, 'Excel AvanÃ§ado', '2022-10-15', '2022-11-05', 20, 15, 8),
(17, 'PrÃ¡tica CirurgÃ­ca de Catarata', '2022-10-10', '2022-11-10', 5, 100, 2),
(21, 'SeguranÃ§a da Info', '2020-01-30', '2021-01-10', 50, 50, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursosinteressados`
--

CREATE TABLE `cursosinteressados` (
  `cursos_id` int(11) NOT NULL,
  `interessados_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cursosinteressados`
--

INSERT INTO `cursosinteressados` (`cursos_id`, `interessados_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(3, 2),
(5, 1),
(5, 2),
(13, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `interessados`
--

CREATE TABLE `interessados` (
  `id` int(11) NOT NULL,
  `contato` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `escolaridade` varchar(100) DEFAULT NULL,
  `dtNasc` date DEFAULT NULL,
  `tpcontato` varchar(20) DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `interessados`
--

INSERT INTO `interessados` (`id`, `contato`, `email`, `escolaridade`, `dtNasc`, `tpcontato`, `nome`) VALUES
(1, '87999999999', 'walter@gmail.com', 'técnico', '2001-10-10', 'whatsapp', 'Walter'),
(2, '8799998888', 'laura@gmail.com', 'técnico', '2000-01-01', 'whatsapp', 'Laura');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `nome`, `tipo`, `senha`) VALUES
(1, 'jean', 'Jean Elder Santana Araujo', 'admin', '123456');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Índices para tabela `cursosinteressados`
--
ALTER TABLE `cursosinteressados`
  ADD PRIMARY KEY (`cursos_id`,`interessados_id`),
  ADD KEY `interessados_id` (`interessados_id`);

--
-- Índices para tabela `interessados`
--
ALTER TABLE `interessados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `interessados`
--
ALTER TABLE `interessados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);

--
-- Limitadores para a tabela `cursosinteressados`
--
ALTER TABLE `cursosinteressados`
  ADD CONSTRAINT `cursosinteressados_ibfk_1` FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `cursosinteressados_ibfk_2` FOREIGN KEY (`interessados_id`) REFERENCES `interessados` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
