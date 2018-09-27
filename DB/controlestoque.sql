-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 27-Set-2018 às 08:26
-- Versão do servidor: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `controlestoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricante`
--

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
-- Extraindo dados da tabela `fabricante`
--

INSERT INTO `fabricante` (`idFabricante`, `NomeFabricante`, `CNPJFabricante`, `EmailFabricante`, `EnderecoFabricante`, `TelefoneFabricante`, `Public`, `Ativo`, `Usuario_idUser`) VALUES
(1, 'Compaq', '212221211212211', 'ibm@ibm.com', 'Rua Central do Brasil - nÂº 200', '11 34343-4334', 1, 1, 1),
(2, 'Intel', '11111111111111', 'intel@intel.com', 'Rua 3', '121212212', 1, 1, 1),
(3, 'DELL', '2222222222222', 'dell@dell.com', 'Rua Central do Brasil - nÂº 203', '+5531988848700', 0, 0, 1),
(4, 'CaderbrÃ¡s Bico Internacional Ltda', '05.117571/002-05', 'nadir@distribuidoradistrioeste.com.br', 'Av Germano Dix - 4800 Pirassununga - SP', '(19)3561-3092', 1, 1, 1),
(6, 'Lenovo', '11111111111112', 'lenovo@lenovo.com', 'Rua 4', '333333333333', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `idItens` int(11) NOT NULL,
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
  `Usuario_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`idItens`, `QuantItens`, `QuantItensVend`, `ValCompItens`, `ValVendItens`, `DataCompraItens`, `DataVenci_Itens`, `ItensAtivo`, `ItensPublic`, `Produto_CodRefProduto`, `Fabricante_idFabricante`, `Usuario_idUser`) VALUES
(1, '400', '25', '10.00', '15.00', '2017-04-24', '2022-04-24', 1, 1, 2, 1, 1),
(2, '2000', '160', '200.00', '400.00', '2017-04-24', '2022-04-24', 1, 1, 1, 1, 1),
(3, '50', '0', '10.00', '20.00', '2017-04-24', '2022-04-24', 1, 1, 1, 4, 1),
(4, '100', '0', '10.00', '20.00', '2017-04-24', '2022-04-24', 1, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `CodRefProduto` int(11) NOT NULL,
  `NomeProduto` varchar(75) NOT NULL,
  `Ativo` int(1) NOT NULL,
  `PublicProduto` int(1) NOT NULL,
  `Usuario_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`CodRefProduto`, `NomeProduto`, `Ativo`, `PublicProduto`, `Usuario_idUser`) VALUES
(1, 'Caderno 80 folhas 3', 1, 0, 1),
(2, 'Caderno 200 folhas', 1, 0, 1),
(3, 'Caderno 500 folhas', 1, 1, 1),
(4, 'Notebook 2', 1, 1, 1),
(5, 'Computador Lenovo', 1, 1, 1),
(6, 'Caneta esferogrÃ¡fica Preta', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `representante`
--

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
-- Extraindo dados da tabela `representante`
--

INSERT INTO `representante` (`idRepresentante`, `NomeRepresentante`, `TelefoneRepresentante`, `EmailRepresentante`, `repAtivo`, `repPublic`, `Fabricante_idFabricante`, `Usuario_idUser`) VALUES
(1, 'Francisco Algusto', '11 9999-9999', 'franciscoalgusto@ibm.com', 1, 1, 1, 1),
(2, 'FabrÃ­cio PaixÃ£o ', '31 98888-8888', 'fabriciotp@ibm.com', 1, 1, 1, 1),
(3, 'Marcos Rafael', '43434343', 'marcosrafael@intel.com', 1, 1, 2, 1),
(4, 'Antonio Carlos ', '31988848780', 'antoniocarlos@dell.com', 0, 0, 3, 1),
(5, 'Distrioeste - Distribuidora e atacadista', '49 3331-3122', 'nadir@distribuidoradistrioeste.com.br', 1, 1, 4, 1),
(6, 'Thiago Rui', '55555555555', 'thiagorui@lenovo.com', 1, 1, 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

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
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUser`, `Username`, `Email`, `Password`, `imagem`, `Dataregistro`, `Permissao`) VALUES
(1, 'admin', 'admin@estoque.com', '21232f297a57a5a743894a0e4a801fc3', 'dist/img/fabriciopaixao.jpg', '2017-04-03', 1),
(2, 'vendedor', 'vendedor@estoque.com', '21232f297a57a5a743894a0e4a801fc3', 'dist/img/fabriciopaixao.jpg', '2017-04-03', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `idvendas` int(11) NOT NULL,
  `quantitens` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `iditem` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `datareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`idvendas`, `quantitens`, `valor`, `iditem`, `idusuario`, `datareg`) VALUES
(1, 5, '75.00', 1, 2, '2018-09-26 12:34:53'),
(2, 10, '150.00', 1, 2, '2018-09-26 12:35:33'),
(3, 150, '60000.00', 2, 2, '2018-09-26 12:38:23'),
(4, 10, '4000.00', 2, 2, '2018-09-27 11:18:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`idFabricante`),
  ADD KEY `fk_Fabricante_Usuario1_idx` (`Usuario_idUser`);

--
-- Indexes for table `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`idItens`),
  ADD KEY `fk_Itens_Produto1_idx` (`Produto_CodRefProduto`),
  ADD KEY `fk_Itens_Fabricante1_idx` (`Fabricante_idFabricante`),
  ADD KEY `fk_Itens_Usuario1_idx` (`Usuario_idUser`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`CodRefProduto`),
  ADD KEY `fk_Produto_Usuario_idx` (`Usuario_idUser`);

--
-- Indexes for table `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`idRepresentante`),
  ADD KEY `fk_Representante_Fabricante1_idx` (`Fabricante_idFabricante`),
  ADD KEY `fk_Representante_Usuario1_idx` (`Usuario_idUser`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`idvendas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `idFabricante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `itens`
--
ALTER TABLE `itens`
  MODIFY `idItens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `CodRefProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `representante`
--
ALTER TABLE `representante`
  MODIFY `idRepresentante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `idvendas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `fabricante`
--
ALTER TABLE `fabricante`
  ADD CONSTRAINT `fk_Fabricante_Usuario1` FOREIGN KEY (`Usuario_idUser`) REFERENCES `usuario` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `fk_Itens_Fabricante1` FOREIGN KEY (`Fabricante_idFabricante`) REFERENCES `fabricante` (`idFabricante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Itens_Produto1` FOREIGN KEY (`Produto_CodRefProduto`) REFERENCES `produtos` (`CodRefProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Itens_Usuario1` FOREIGN KEY (`Usuario_idUser`) REFERENCES `usuario` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_Produto_Usuario` FOREIGN KEY (`Usuario_idUser`) REFERENCES `usuario` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `representante`
--
ALTER TABLE `representante`
  ADD CONSTRAINT `fk_Representante_Fabricante1` FOREIGN KEY (`Fabricante_idFabricante`) REFERENCES `fabricante` (`idFabricante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Representante_Usuario1` FOREIGN KEY (`Usuario_idUser`) REFERENCES `usuario` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
