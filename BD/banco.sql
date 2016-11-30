-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Nov-2016 às 12:13
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fornecedor_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `referencia` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fornecedor_id` (`fornecedor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Extraindo dados da tabela `email`
--

INSERT INTO `email` (`id`, `fornecedor_id`, `email`, `referencia`) VALUES
(56, 63, 'maua@maua.com', 'Email Oficial'),
(57, 63, 'fulado@dominio.com', 'email pessoal do gerente'),
(58, 64, 'madereira@dominio.com', 'Email Oficial'),
(59, 65, 'tigre@produtos.com', 'Email Oficial'),
(60, 65, 'tigre2@produtos.com', 'Email Reserva'),
(61, 66, 'email@email.com', 'Email Oficial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `descricao`, `cidade`, `endereco`, `bairro`, `numero`) VALUES
(63, 'Mauá', 'Fabrica de Cimento', 'Cordeiro', 'RJ 116', 'Centro', 0),
(64, 'Madeireira Da Montanha', 'Madereira ', 'Bom Jardim', 'Estrada Amparo São José', 'Fazenda Velha', 0),
(65, 'Tigre', 'Fornecedor de produtos plasticos', 'Volta Redonda', 'Rua A', 'Centro', 99),
(66, 'Mill', 'Fabrica de Tijolo', 'Nova Friburgo', 'Estrada Cascatinha São Pedro', 'Cascatinha', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produto_id` (`produto_id`,`pedido_id`),
  KEY `pedido_id` (`pedido_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`id`, `produto_id`, `pedido_id`, `quantidade`, `valor`) VALUES
(33, 20, 22, 5, 50),
(34, 27, 23, 600, 1),
(35, 20, 23, 10, 200);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transportadora_id` int(11) NOT NULL,
  `data_hora` int(11) NOT NULL,
  `nota_fiscal` varchar(50) NOT NULL,
  `valor_frete` double NOT NULL,
  `desconto` double NOT NULL,
  `valor_total` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trasportadora_id` (`transportadora_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `transportadora_id`, `data_hora`, `nota_fiscal`, `valor_frete`, `desconto`, `valor_total`) VALUES
(22, 16, 1480457275, '', 0, 0, 250),
(23, 20, 1480503947, 'Nota Fiscal', 30, 30, 2600);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fornecedor_id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fornecedor_id` (`fornecedor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `fornecedor_id`, `nome`, `descricao`) VALUES
(20, 63, 'Cimento A', 'Cimento "Normal"'),
(21, 63, 'Cimento B', 'Cimento para uso especial '),
(22, 63, 'Cimento Ultra', 'Cimento Ultra Resistente'),
(23, 64, 'Pinho 600x20', 'Tábua de Pinho'),
(24, 64, 'Eucalipto 600x20', 'Tábua de Eucalipto'),
(25, 65, 'T de100''', 'Peça ''T'''),
(26, 65, 'Joelho 100''', 'Joelho de 100'''),
(27, 66, 'Tijolo de Barro', '8 furos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE IF NOT EXISTS `telefone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fornecedor_id` int(11) NOT NULL,
  `ddd` varchar(4) NOT NULL,
  `numero` varchar(12) NOT NULL,
  `referencia` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fornecedor_id` (`fornecedor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`id`, `fornecedor_id`, `ddd`, `numero`, `referencia`) VALUES
(61, 63, '22', '22222222', 'Telefone Primário'),
(62, 64, '22', '22334455', 'Telefone 1'),
(63, 65, '22', '22225555', 'Referencia1'),
(64, 66, '22', '22558899', 'Telefone Primário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `transportadora`
--

CREATE TABLE IF NOT EXISTS `transportadora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `transportadora`
--

INSERT INTO `transportadora` (`id`, `nome`) VALUES
(16, 'Sedex'),
(17, 'PAC'),
(18, 'Faol'),
(19, 'Motoboy'),
(20, 'Transporte Próprio');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`transportadora_id`) REFERENCES `transportadora` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `telefone_ibfk_1` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
