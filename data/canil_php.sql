-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Nov-2022 às 17:18
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
-- Banco de dados: `canil_php`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

CREATE TABLE `anuncio` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pet` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `id_pet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`id`, `nome`, `caminho`, `id_pet`) VALUES
(1, '../views/images/', '2022.11.18-17.10.26.jpg', 3),
(2, '../views/images/', '2022.11.18-17.15.19.jpg', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pet`
--

CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `raca` varchar(255) NOT NULL,
  `cor` varchar(255) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pet`
--

INSERT INTO `pet` (`id`, `raca`, `cor`, `sexo`, `categoria`) VALUES
(3, 'Pasto alemão', 'amarelo e preto', 'on', 'cachorro'),
(4, 'Pasto alemão', 'amarelo e preto', 'on', 'cachorro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pet` (`id_pet`);

--
-- Índices para tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pet` (`id_pet`);

--
-- Índices para tabela `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
