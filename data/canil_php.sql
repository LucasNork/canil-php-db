-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Dez-2022 às 05:18
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
  `data` date NOT NULL,
  `anuncio_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anuncio`
--

INSERT INTO `anuncio` (`id`, `id_user`, `id_pet`, `data`, `anuncio_status`) VALUES
(1, 8, 1, '2022-11-18', 1),
(2, 1, 9, '2022-11-27', 1),
(3, 1, 14, '2022-11-27', 1),
(4, 1, 15, '2022-11-27', 1),
(5, 1, 16, '2022-11-29', 1),
(6, 6, 17, '2022-12-05', 0),
(7, 6, 18, '2022-12-11', 1),
(8, 6, 19, '2022-12-11', 1),
(9, 6, 20, '2022-12-11', 1);

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
(9, '2022.11.18-17.42.57.jpg', '../views/images/', 6),
(10, '2022.11.18-17.44.40.jpg', '../views/images/', 7),
(11, '2022.11.18-17.49.18.jpg', '../views/images/', 8),
(12, '2022.11.28-02.19.53.jpg', '../views/images/', 9),
(13, '2022.11.28-02.42.31.jpg', '../views/images/', 10),
(14, '2022.11.28-02.42.31.jpg', '../views/images/', 10),
(15, '2022.11.28-02.42.31.jpg', '../views/images/', 10),
(16, '2022.11.28-02.42.31.jpg', '../views/images/', 10),
(17, '2022.11.28-02.49.59.jpg', '../views/images/', 14),
(18, '2022.11.28-02.49.59.jpg', '../views/images/', 14),
(19, '2022.11.28-02.49.59.jpg', '../views/images/', 14),
(20, '2022.11.28-02.49.59.jpg', '../views/images/', 14),
(21, '3467522621778.6.jpg', '../views/images/', 15),
(22, '361810943455.19.jpg', '../views/images/', 15),
(23, '2248681676641.3.jpg', '../views/images/', 15),
(24, '860122711755.32.jpg', '../views/images/', 15),
(25, '3138925884548.5.jpg', '../views/images/', 15),
(26, '2940777024487.3.jpg', '../views/images/', 15),
(27, '2022.11.29-20.37.091010850414.jpg', '../views/images/', 16),
(28, '2022.12.05-21.57.551471535066.jpg', '../views/images/', 17),
(29, '2022.12.11-04.35.191787707877.jpg', '../views/images/', 18),
(30, '2022.12.11-04.36.372090831222.jpg', '../views/images/', 19),
(31, '2022.12.11-05.04.561047284565.jpg', '../views/images/', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pet`
--

CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `raca` varchar(255) NOT NULL,
  `cor` varchar(255) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `birth_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pet`
--

INSERT INTO `pet` (`id`, `raca`, `cor`, `sexo`, `categoria`, `birth_date`) VALUES
(9, 'bulldog', 'branco e laranja', 'on', 'cachorro', '2022-11-21'),
(14, 'pastor alemão', 'branco e laranja', 'on', 'cachorro', '2022-11-01'),
(15, 'teste', 'aaaaaaaaaaaaaaaaaaaaaaaaaa', 'on', 'cachorro', '2022-12-09'),
(16, 'Husky', 'Preto e Branco', 'Fêmea', 'cachorro', '2022-11-16'),
(17, 'Golden Retriever', 'Amarelo', 'Fêmea', 'cachorro', '2015-07-07'),
(18, 'Korat', 'Cinza', 'Macho', 'gato', '2017-07-12'),
(19, 'Siamês', 'Marrom', 'Fêmea', 'gato', '2019-04-21'),
(20, 'Sphynx', 'Branco', 'Macho', 'gato', '2008-05-20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacao`
--

CREATE TABLE `transacao` (
  `id` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `id_comprador` int(11) NOT NULL,
  `data_inicio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_finalizacao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `transacao`
--

INSERT INTO `transacao` (`id`, `id_anuncio`, `id_comprador`, `data_inicio`, `data_finalizacao`) VALUES
(1, 2, 6, '2022-12-05 15:53:25', NULL),
(2, 2, 6, '2022-12-05 17:00:15', NULL),
(3, 2, 1, '2022-12-05 18:03:33', NULL),
(4, 6, 1, '2022-12-05 21:16:28', NULL),
(5, 6, 1, '2022-12-05 21:18:59', NULL),
(6, 3, 6, '2022-12-11 03:24:23', '2022-12-11 03:24:23'),
(7, 9, 1, '2022-12-11 04:13:08', NULL);

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
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `senha`) VALUES
(1, '123456789', '6892846552', 'a@a.a', '$2y$10$pJF76qjZbM8qmSMnY8XVSOLw/CO0YxYIzSi0sTG4B4Xyh2yT12aQG'),
(2, '0987654321', '98214235635', 'teste@teste.com', '$2y$10$strShpsmFHzi8mi6FR9QXu8sp3A/I5bBDDxqj9/SqnCtpibToaAOO'),
(3, 'teste3', '78921754664', 'teste3@teste3.teste3', '$2y$10$V.QcVTmJXEReivIUJemUHezrwKIShRin4c04SUjffRbZo5GU/i.qu'),
(5, 'teste4', '82347456237', 'teste4@teste4.com', '$2y$10$88AuxJqUZ7zdYzemQBzIzeyZ3S4vBU4aUAE.YcNbH57T8WGaRuG7m'),
(6, 'abc', '123456', 'abc', '$2y$10$pQHWVA.FdXJaz3wUgvzte.Aujbx9PWb.0myzPnX7LTG7BZtFF6dCe');

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
-- Índices para tabela `transacao`
--
ALTER TABLE `transacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anuncio` (`id_anuncio`),
  ADD KEY `id_comprador` (`id_comprador`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `transacao`
--
ALTER TABLE `transacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
