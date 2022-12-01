-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Dez-2022 às 16:29
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

--
-- Extraindo dados da tabela `anuncio`
--

INSERT IGNORE INTO `anuncio` (`id`, `id_user`, `id_pet`, `data`) VALUES
(1, 8, 1, '2022-11-18'),
(2, 1, 9, '2022-11-27'),
(3, 1, 14, '2022-11-27'),
(4, 1, 15, '2022-11-27'),
(5, 1, 16, '2022-11-29');

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

INSERT IGNORE INTO `imagem` (`id`, `nome`, `caminho`, `id_pet`) VALUES
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
(27, '2022.11.29-20.37.091010850414.jpg', '../views/images/', 16);

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

INSERT IGNORE INTO `pet` (`id`, `raca`, `cor`, `sexo`, `categoria`, `birth_date`) VALUES
(9, 'bulldog', 'branco e laranja', 'on', 'cachorro', '2022-11-21'),
(14, 'pastor alemão', 'branco e laranja', 'on', 'cachorro', '2022-11-01'),
(15, 'teste', 'aaaaaaaaaaaaaaaaaaaaaaaaaa', 'on', 'gato', '2022-12-09'),
(16, 'Husky', 'Preto e Branco', 'Fêmea', 'cachorro', '2022-11-16');

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

INSERT IGNORE INTO `usuario` (`id`, `nome`, `telefone`, `email`, `senha`) VALUES
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
