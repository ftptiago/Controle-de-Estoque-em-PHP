-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 24/03/2020 às 10:35
-- Versão do servidor: 5.7.29-0ubuntu0.18.04.1
-- Versão do PHP: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controlestoque`
--
CREATE DATABASE IF NOT EXISTS `controlestoque` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `controlestoque`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `NomeCliente` varchar(100) NOT NULL,
  `EmailCliente` varchar(100) NOT NULL,
  `cpfCliente` varchar(11) NOT NULL,
  `statusCliente` int(1) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `dataRegCliente` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `NomeCliente`, `EmailCliente`, `cpfCliente`, `statusCliente`, `Usuario_idUsuario`, `dataRegCliente`) VALUES
(1, 'FabrÃ­cio PaixÃ£o', 'fabriciopaixao@teste.com', '99999999910', 1, 2, '2019-02-21 21:27:11'),
(2, 'Thiago Ribeiro', 'thiago@teste.com', '88888888820', 1, 2, '2019-02-21 21:28:57'),
(3, 'Antonio', 'teste2@teste.com', '12345678910', 1, 2, '2019-02-28 20:23:18'),
(4, 'Francisco', 'teste2@teste.com', '88888888889', 1, 2, '2019-03-01 19:33:37'),
(5, 'Carlos', 'fabricio@gmail.com', '99999999999', 1, 1, '2019-03-01 19:42:30'),
(6, 'Matheus', 'fabricio@gmail.com', '99999999998', 1, 1, '2019-03-01 19:46:54'),
(7, 'Thiago augusto santos ', 'augustosantos@teste.com', '11119999119', 1, 2, '2019-03-20 21:45:01'),
(8, 'Wesley Silva', 'teste4@teste.com', '33344455567', 1, 2, '2019-03-25 21:00:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fabricante`
--

DROP TABLE IF EXISTS `fabricante`;
CREATE TABLE `fabricante` (
  `idFabricante` int(11) NOT NULL,
  `NomeFabricante` varchar(75) NOT NULL,
  `CNPJFabricante` varchar(75) NOT NULL,
  `EmailFabricante` varchar(75) NOT NULL,
  `EnderecoFabricante` varchar(75) NOT NULL,
  `TelefoneFabricante` varchar(75) NOT NULL,
  `Public` int(1) NOT NULL,
  `Ativo` int(1) NOT NULL,
  `Usuario_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `fabricante`
--

INSERT INTO `fabricante` (`idFabricante`, `NomeFabricante`, `CNPJFabricante`, `EmailFabricante`, `EnderecoFabricante`, `TelefoneFabricante`, `Public`, `Ativo`, `Usuario_idUser`) VALUES
(1, 'Compaq', '212221211212211', 'ibm@ibm.com', 'Rua Central do Brasil - nÂº 200', '11 34343-4334', 1, 1, 1),
(2, 'Intel', '11111111111111', 'intel@intel.com', 'Rua 3', '121212212', 1, 1, 1),
(3, 'DELL', '2222222222222', 'dell@dell.com', 'Rua Central do Brasil - nÂº 203', '+5531988848700', 0, 0, 1),
(4, 'CaderbrÃ¡s Bico Internacional Ltda', '05.117571/002-05', 'nadir@distribuidoradistrioeste.com.br', 'Av Germano Dix - 4800 Pirassununga - SP', '(19)3561-3092', 1, 1, 1),
(6, 'Lenovo', '11111111111112', 'lenovo@lenovo.com', 'Rua 4', '333333333333', 1, 1, 1),
(7, 'Microsoft', '000099998989898', 'microsoft@microsoft.com', 'Rua 1', '44444444', 1, 0, 1),
(8, 'Microsoft 2', '000099998989898', 'microsoft@microsoft.com', 'Rua 1', '44444444', 0, 1, 1),
(9, 'Chevrolet', '009999999900000', 'teste@teste.com', 'Rua 1', '334544343', 1, 1, 1),
(10, 'Spal Industria Brasileira de Bebidas', '61186888000193', 'N/S', 'Avenida Francisco Ferreira Lopes - 4303', '08000212121', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens`
--

DROP TABLE IF EXISTS `itens`;
CREATE TABLE `itens` (
  `idItens` int(11) NOT NULL,
  `Image` varchar(250) NOT NULL,
  `QuantItens` decimal(10,0) NOT NULL,
  `QuantItensVend` decimal(10,0) NOT NULL,
  `ValCompItens` decimal(10,2) NOT NULL,
  `ValVendItens` decimal(10,2) NOT NULL,
  `DataCompraItens` date NOT NULL,
  `DataVenci_Itens` date DEFAULT NULL,
  `ItensAtivo` tinyint(4) NOT NULL,
  `ItensPublic` int(1) NOT NULL,
  `Produto_CodRefProduto` int(11) NOT NULL,
  `Fabricante_idFabricante` int(11) NOT NULL,
  `Usuario_idUser` int(11) NOT NULL,
  `DataRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `itens`
--

INSERT INTO `itens` (`idItens`, `Image`, `QuantItens`, `QuantItensVend`, `ValCompItens`, `ValVendItens`, `DataCompraItens`, `DataVenci_Itens`, `ItensAtivo`, `ItensPublic`, `Produto_CodRefProduto`, `Fabricante_idFabricante`, `Usuario_idUser`, `DataRegistro`) VALUES
(11, '', '500', '373', '1700.00', '2100.00', '2018-10-27', '2018-10-31', 1, 1, 5, 1, 2, '2018-10-27 20:38:39'),
(12, '', '200', '166', '3.00', '9.00', '2018-10-27', '2018-10-31', 0, 1, 3, 1, 2, '2018-10-27 20:43:12'),
(13, '', '100', '32', '4.00', '9.50', '2019-09-17', '2019-09-17', 0, 1, 3, 1, 2, '2019-09-17 21:07:25'),
(14, '', '200', '8', '2100.00', '3900.00', '2019-09-17', '2019-09-17', 0, 1, 4, 7, 2, '2019-09-17 21:21:40'),
(15, 'dist/img/fundo youtube - 2019.png', '1000', '11', '0.30', '1.00', '2019-09-17', '2020-09-17', 1, 1, 1, 1, 1, '2019-09-17 21:29:33');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `CodRefProduto` int(11) NOT NULL,
  `NomeProduto` varchar(75) NOT NULL,
  `Ativo` int(1) NOT NULL,
  `PublicProduto` int(1) NOT NULL,
  `Usuario_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`CodRefProduto`, `NomeProduto`, `Ativo`, `PublicProduto`, `Usuario_idUser`) VALUES
(1, 'Caderno 80 folhas 3', 1, 1, 1),
(2, 'Caderno 200 folhas', 1, 1, 1),
(3, 'Caderno 500 folhas', 1, 1, 1),
(4, 'Notebook 2', 1, 1, 1),
(5, 'Computador Lenovo', 1, 1, 1),
(6, 'Caneta esferogrÃ¡fica Preta', 1, 1, 1),
(7, 'Ãgua mineral Crystal sem gÃ¡s 5 Litro', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `representante`
--

DROP TABLE IF EXISTS `representante`;
CREATE TABLE `representante` (
  `idRepresentante` int(11) NOT NULL,
  `NomeRepresentante` varchar(75) NOT NULL,
  `TelefoneRepresentante` varchar(20) NOT NULL,
  `EmailRepresentante` varchar(45) NOT NULL,
  `repAtivo` int(1) NOT NULL,
  `repPublic` int(1) NOT NULL,
  `Fabricante_idFabricante` int(11) NOT NULL,
  `Usuario_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `representante`
--

INSERT INTO `representante` (`idRepresentante`, `NomeRepresentante`, `TelefoneRepresentante`, `EmailRepresentante`, `repAtivo`, `repPublic`, `Fabricante_idFabricante`, `Usuario_idUser`) VALUES
(1, 'Francisco Algusto', '11 9999-9999', 'franciscoalgusto@ibm.com', 1, 1, 1, 1),
(2, 'FabrÃ­cio PaixÃ£o ', '31 98888-8888', 'fabriciotp@ibm.com', 1, 1, 1, 1),
(3, 'Marcos Rafael', '43434343', 'marcosrafael@intel.com', 1, 1, 2, 1),
(4, 'Antonio Carlos ', '31988848780', 'antoniocarlos@dell.com', 0, 0, 3, 1),
(5, 'Distrioeste - Distribuidora e atacadista', '49 3331-3122', 'nadir@distribuidoradistrioeste.com.br', 1, 1, 4, 1),
(6, 'Thiago Rui', '55555555555', 'thiagorui@lenovo.com', 1, 1, 6, 1),
(7, 'Thiago', '33333444', 'thiago@microsoft.com', 1, 1, 7, 1),
(8, 'Thiago 2', '33333444', 'thiago2@microsoft.com', 1, 1, 8, 1),
(9, 'Thiago 22', '1000000', 'thiago@chevrolet.com', 1, 1, 9, 1),
(10, 'Spal Industria Brasileira de Bebidas', '08000212121', 'N/S', 1, 1, 10, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUser` int(11) NOT NULL,
  `Username` varchar(75) NOT NULL,
  `Email` varchar(75) NOT NULL,
  `Password` varchar(75) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `Dataregistro` date NOT NULL,
  `Permissao` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idUser`, `Username`, `Email`, `Password`, `imagem`, `Dataregistro`, `Permissao`) VALUES
(1, 'admin', 'admin@estoque.com', '21232f297a57a5a743894a0e4a801fc3', 'dist/img/fabriciopaixao.jpg', '2017-04-03', 1),
(2, 'vendedor', 'vendedor@estoque.com', '21232f297a57a5a743894a0e4a801fc3', 'dist/img/fabriciopaixao.jpg', '2017-04-03', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE `vendas` (
  `idvendas` int(11) NOT NULL,
  `quantitens` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `iditem` int(11) NOT NULL,
  `cart` varchar(255) NOT NULL,
  `cliente_idCliente` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `datareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`idvendas`, `quantitens`, `valor`, `iditem`, `cart`, `cliente_idCliente`, `idusuario`, `datareg`) VALUES
(1, 10, '11000.00', 12, '', 1, 2, '2019-02-21 21:27:12'),
(2, 15, '16500.00', 12, '', 1, 2, '2019-02-21 21:28:09'),
(3, 20, '220.00', 11, '', 2, 2, '2019-02-21 21:28:57'),
(4, 5, '5500.00', 12, '', 3, 2, '2019-02-28 20:23:18'),
(5, 2, '2200.00', 12, '', 3, 2, '2019-02-28 20:29:20'),
(6, 5, '5500.00', 12, '', 3, 2, '2019-02-28 20:32:09'),
(7, 2, '2200.00', 12, '', 3, 2, '2019-02-28 20:35:40'),
(8, 2, '2200.00', 12, '', 4, 2, '2019-03-01 19:33:37'),
(9, 2, '2200.00', 12, '', 5, 1, '2019-03-01 19:42:30'),
(10, 2, '2200.00', 12, '', 6, 1, '2019-03-01 19:46:54'),
(11, 2, '2200.00', 12, '', 5, 1, '2019-03-01 19:48:02'),
(12, 1, '1100.00', 12, '', 1, 2, '2019-03-13 21:50:14'),
(13, 1, '11.00', 11, '', 1, 2, '2019-03-13 21:50:15'),
(14, 50, '550.00', 11, '', 1, 2, '2019-03-13 21:51:44'),
(15, 5, '55.00', 11, '', 1, 2, '2019-03-13 21:54:41'),
(16, 50, '550.00', 11, '', 1, 2, '2019-03-20 20:40:05'),
(17, 20, '220.00', 11, '', 1, 2, '2019-03-20 21:00:24'),
(18, 20, '22000.00', 12, '', 1, 2, '2019-03-20 21:00:24'),
(19, 10, '11000.00', 12, '', 7, 2, '2019-03-20 21:45:01'),
(20, 11, '121.00', 11, '', 7, 2, '2019-03-20 21:45:01'),
(21, 80, '880.00', 11, '', 1, 2, '2019-03-20 22:09:38'),
(22, 2, '22.00', 11, '', 1, 2, '2019-03-20 22:10:51'),
(23, 2, '22.00', 11, '', 1, 2, '2019-03-20 22:13:00'),
(24, 2, '22.00', 11, '', 1, 2, '2019-03-20 22:13:34'),
(25, 11, '12100.00', 12, '', 1, 2, '2019-03-25 20:52:37'),
(26, 11, '12100.00', 12, '', 1, 2, '2019-03-25 20:59:45'),
(27, 20, '220.00', 11, '', 8, 2, '2019-03-25 21:00:06'),
(28, 11, '121.00', 11, '', 8, 2, '2019-03-25 21:00:50'),
(29, 3, '33.00', 11, '', 8, 2, '2019-03-25 21:03:28'),
(30, 23, '253.00', 11, '', 8, 2, '2019-03-25 21:05:26'),
(31, 11, '121.00', 11, '', 8, 2, '2019-03-25 21:08:45'),
(32, 1, '1100.00', 12, '', 1, 2, '2019-04-10 22:08:50'),
(33, 12, '132.00', 11, '', 1, 2, '2019-04-10 22:08:50'),
(34, 10, '1980.00', 12, '', 5, 2, '2019-04-10 22:14:18'),
(35, 15, '165.00', 11, '', 5, 2, '2019-04-10 22:14:18'),
(36, 2, '22.00', 11, '', 7, 2, '2019-09-14 00:16:09'),
(37, 3, '33.00', 11, '', 2, 2, '2019-09-14 00:18:05'),
(38, 3, '594.00', 12, '', 2, 2, '2019-09-14 00:18:06'),
(39, 2, '396.00', 12, '', 3, 2, '2019-09-14 00:23:23'),
(40, 3, '33.00', 11, '', 3, 2, '2019-09-14 00:23:23'),
(41, 3, '594.00', 12, '', 3, 2, '2019-09-14 00:51:06'),
(42, 2, '396.00', 12, '', 3, 2, '2019-09-16 21:46:25'),
(43, 2, '22.00', 11, '', 3, 2, '2019-09-16 21:46:25'),
(44, 5, '990.00', 12, '', 1, 2, '2019-09-16 21:47:21'),
(45, 10, '110.00', 11, '', 1, 2, '2019-09-16 21:47:21'),
(46, 2, '22.00', 11, '', 2, 2, '2019-09-16 21:48:01'),
(47, 2, '396.00', 12, '', 2, 2, '2019-09-17 20:47:52'),
(48, 2, '396.00', 12, '', 3, 2, '2019-09-17 21:31:36'),
(49, 10, '10.00', 15, '', 3, 2, '2019-09-17 21:31:36'),
(50, 1, '3900.00', 14, '', 3, 2, '2019-09-17 21:31:36'),
(51, 2, '396.00', 12, '', 2, 2, '2019-09-20 20:39:09'),
(52, 2, '5780.00', 13, '', 2, 2, '2019-09-20 20:39:11'),
(53, 3, '594.00', 12, '', 3, 2, '2019-09-20 20:48:09'),
(54, 1, '1.00', 15, '', 2, 2, '2019-09-20 21:00:32'),
(55, 1, '3900.00', 14, '', 7, 2, '2019-09-20 21:19:35'),
(56, 1, '198.00', 12, '', 1, 2, '2019-09-20 21:32:03'),
(57, 1, '2890.00', 13, '', 3, 2, '2019-09-20 21:33:47'),
(58, 1, '3900.00', 14, '', 3, 2, '2019-09-20 21:33:47'),
(59, 1, '11.00', 11, '', 1, 2, '2019-10-08 00:10:02'),
(60, 1, '2890.00', 13, '', 1, 2, '2019-10-08 00:10:02'),
(61, 1, '3900.00', 14, '', 1, 2, '2019-10-08 00:10:02'),
(62, 1, '11.00', 11, '', 1, 2, '2019-10-09 20:58:06'),
(63, 2, '396.00', 12, '', 1, 2, '2019-10-09 20:58:06'),
(64, 1, '2890.00', 13, '', 1, 2, '2019-10-10 20:15:38'),
(65, 1, '3900.00', 14, '', 1, 2, '2019-10-10 20:15:38'),
(66, 1, '198.00', 12, '', 1, 2, '2019-10-10 20:15:38'),
(67, 5, '45.00', 12, '', 2, 2, '2019-10-10 20:50:45'),
(68, 1, '9.50', 13, '', 2, 2, '2019-10-10 20:50:45'),
(69, 1, '3900.00', 14, '', 2, 2, '2019-10-10 20:50:45'),
(70, 1, '2100.00', 11, '', 8, 2, '2019-10-10 21:07:31'),
(71, 10, '95.00', 13, '', 8, 2, '2019-10-10 21:07:32'),
(72, 1, '9.50', 13, '', 2, 2, '2019-10-11 13:08:36'),
(73, 5, '45.00', 12, '', 2, 2, '2019-10-11 13:08:36'),
(74, 1, '3900.00', 14, '', 2, 2, '2019-10-11 13:08:36'),
(75, 1, '9.00', 12, '', 3, 2, '2019-10-11 21:07:49'),
(76, 1, '2100.00', 11, '', 5, 1, '2019-10-12 00:14:20'),
(77, 5, '45.00', 12, '', 4, 2, '2019-10-12 03:06:03'),
(78, 1, '2100.00', 11, '', 7, 1, '2019-10-12 03:20:28'),
(79, 15, '142.50', 13, '', 7, 1, '2019-10-12 03:20:28'),
(80, 2, '4200.00', 11, '', 2, 2, '2019-10-12 22:42:58'),
(81, 2, '18.00', 12, '', 2, 2, '2019-10-12 22:42:58'),
(82, 1, '9.00', 12, '', 6, 2, '2019-10-19 19:59:39'),
(83, 1, '2100.00', 11, '', 6, 2, '2019-10-19 19:59:39'),
(84, 2, '18.00', 12, '', 6, 2, '2019-10-19 20:05:03'),
(85, 1, '2100.00', 11, '', 6, 2, '2019-10-19 20:05:03'),
(86, 2, '18.00', 12, '', 2, 2, '2019-10-19 20:06:17'),
(87, 1, '2100.00', 11, '', 2, 2, '2019-10-19 20:06:18'),
(88, 1, '2100.00', 11, '7fd0446034d7d2364710337f8ae77176', 5, 1, '2019-10-22 21:11:58'),
(89, 4, '36.00', 12, '7fd0446034d7d2364710337f8ae77176', 5, 1, '2019-10-22 21:11:59'),
(90, 1, '3900.00', 14, '7fd0446034d7d2364710337f8ae77176', 5, 1, '2019-10-22 21:11:59'),
(91, 1, '2100.00', 11, '055e6b42f4acd384dc304d6b87eaec6e', 1, 1, '2019-11-14 20:38:25'),
(92, 1, '2100.00', 11, '3192a0746b3ae03c7a5e78acdb47f197', 5, 1, '2020-01-15 17:01:27');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices de tabela `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`idFabricante`),
  ADD KEY `fk_Fabricante_Usuario1_idx` (`Usuario_idUser`);

--
-- Índices de tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`idItens`),
  ADD KEY `fk_Itens_Produto1_idx` (`Produto_CodRefProduto`),
  ADD KEY `fk_Itens_Fabricante1_idx` (`Fabricante_idFabricante`),
  ADD KEY `fk_Itens_Usuario1_idx` (`Usuario_idUser`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`CodRefProduto`),
  ADD KEY `fk_Produto_Usuario_idx` (`Usuario_idUser`);

--
-- Índices de tabela `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`idRepresentante`),
  ADD KEY `fk_Representante_Fabricante1_idx` (`Fabricante_idFabricante`),
  ADD KEY `fk_Representante_Usuario1_idx` (`Usuario_idUser`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUser`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`idvendas`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `idFabricante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `idItens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `CodRefProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `representante`
--
ALTER TABLE `representante`
  MODIFY `idRepresentante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `idvendas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `fabricante`
--
ALTER TABLE `fabricante`
  ADD CONSTRAINT `fk_Fabricante_Usuario1` FOREIGN KEY (`Usuario_idUser`) REFERENCES `usuario` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `fk_Itens_Fabricante1` FOREIGN KEY (`Fabricante_idFabricante`) REFERENCES `fabricante` (`idFabricante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Itens_Produto1` FOREIGN KEY (`Produto_CodRefProduto`) REFERENCES `produtos` (`CodRefProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Itens_Usuario1` FOREIGN KEY (`Usuario_idUser`) REFERENCES `usuario` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_Produto_Usuario` FOREIGN KEY (`Usuario_idUser`) REFERENCES `usuario` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `representante`
--
ALTER TABLE `representante`
  ADD CONSTRAINT `fk_Representante_Fabricante1` FOREIGN KEY (`Fabricante_idFabricante`) REFERENCES `fabricante` (`idFabricante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Representante_Usuario1` FOREIGN KEY (`Usuario_idUser`) REFERENCES `usuario` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
