-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Dez-2020 às 19:12
-- Versão do servidor: 5.7.17
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adegafamiliaduarte`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `CPF` varchar(11) NOT NULL,
  `NomeCompletoUsuario` varchar(55) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Tel` varchar(255) NOT NULL,
  `Senha` varchar(275) NOT NULL,
  `TipoUsuario` varchar(6) NOT NULL,
  `DtNascimento` varchar(255) NOT NULL,
  `CPFUsuario` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`CPF`, `NomeCompletoUsuario`, `Email`, `Tel`, `Senha`, `TipoUsuario`, `DtNascimento`, `CPFUsuario`) VALUES
('87804187327', 'EstevÃ£o da Silva Neves Tarlet', 'exemplo@exemplo.com', '21978547712', '$2y$10$RZG./D7BTNZMM7yBmiNrxO8GvGVM1AC19/h8iz.sidvHQL2gjK7em', 'admin', '2001-12-15', '87804187327'),
('32925573053', 'admin', 'admin@admin.com', '21965874524', '$2y$10$gFro.Ux3XVi24663jjutmOLbaVcC/aKOnAQFM8pkeK9pmeYY4HsLm', 'admin', '1981-10-20', '32925573053'),
('20031839061', 'Ismael Carlos Samoura da Costa de Azevedo', 'exemplo5@exemplo.com', '021974585475', '$2y$10$Lkj/Z.qhOAB9DC73KgBJcOZsgIeJHUOj5W.t0OZ/jEXBlmyDx8ujS', 'comum', '1997-12-12', '20031839061'),
('37166769009', 'Teywiali Parlet da Costa Luasuiun', 'exemplo3@exemplo.com', '021967887452', '$2y$10$bdoUC0IKFfK.M7Wd3DbLAeyt8x59C18mAGdh4gSb7qb9JSwWO7B0m', 'comum', '1962-09-15', '37166769009');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinho`
--

CREATE TABLE `vinho` (
  `IDVinho` int(10) UNSIGNED NOT NULL,
  `NomeCompletoVinho` varchar(55) NOT NULL,
  `TipoVinho` varchar(255) NOT NULL,
  `Origem` varchar(255) NOT NULL,
  `AnoComposicao` varchar(255) NOT NULL,
  `TeorAlcoolico` float UNSIGNED NOT NULL,
  `Volume` varchar(10) NOT NULL,
  `Preco` float UNSIGNED NOT NULL,
  `Imagem` varchar(255) NOT NULL,
  `Regiao` varchar(255) NOT NULL,
  `Vinicola` varchar(255) NOT NULL,
  `Uva` varchar(255) NOT NULL,
  `TempConsumo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vinho`
--

INSERT INTO `vinho` (`IDVinho`, `NomeCompletoVinho`, `TipoVinho`, `Origem`, `AnoComposicao`, `TeorAlcoolico`, `Volume`, `Preco`, `Imagem`, `Regiao`, `Vinicola`, `Uva`, `TempConsumo`) VALUES
(9, 'Tinto Aurora Merlot', 'Tinto Seco', 'Brasil', '1942', 12.5, '750', 387.25, '../assets/vinho/vinho-tinto-aurora-merlot-15499917396704_480x480+fill_ffffff.webp', 'Serra Gaúcha', 'Aurora', 'Merlot', 'entre 14ºC e 18ºC'),
(10, 'Miolo Seleção Cabernet / Merlot', 'Tinto Seco Fino', 'Brasil', '1779', 12, '750', 562.75, '../assets/vinho/vinho-miolo-selecao-cabernet-merlot-15880943651704_480x480+fill_ffffff.webp', 'Campanha Gaúcha', 'Santa Gianna', 'Cabernet Sauvignon e Merlot', 'entre 12ºC e 15ºC'),
(11, 'Tinto Pizzato Merlot Reserva', 'Tinto Seco Fino', 'Brasil', '2007', 13.5, '750', 195.22, '../assets/vinho/vinho-tinto-pizzato-merlot-reserva-15867911728987_480x480+fill_ffffff.webp', 'Serra Gaúcha', 'Pizzato', 'Merlot', 'entre 14ºC e 18ºC'),
(14, 'Casa Valduga Arte Demi Sec', 'Espumante Demi-Sec', 'Brasil', '2016', 11.5, '750', 105.75, '../assets/vinho/espumante-casa-valduga-arte-demi-sec-15989712135315_480x480+fill_ffffff.webp', 'Serra Gaúcha', 'Casa Valduga', 'Chardonnay e pinot noir', 'entre 4ºC e 7ºC'),
(15, 'Country Wine Bordô Seco', 'Seco', 'Brasil', '1992', 10.5, '750', 128.75, '../assets/vinho/vinho-country-wine-bordo-seco-15812847896922_480x480+fill_ffffff.webp', 'Serra Gaúcha', 'Aurora', 'Bordô', 'entre 8ºC e 12ºC'),
(16, 'Chardonnay Terroir Selection', 'Branco Seco', 'Brasil', '1985', 13, '750', 261.72, '../assets/vinho/vinho-don-guerino-chardonnay-terroir-selection-15717755875733_480x480+fill_ffffff.webp', 'Serra Gaúcha', 'Don Guerino', 'Chardonnay', '7ºC'),
(17, 'Gran Reserva Cabernet Sauvignon', 'Tinto Seco', 'Brasil', '1875', 13, '750', 402.97, '../assets/vinho/vinho-dom-candido-gran-reserva-cabernet-sauvignon-15816086965980_480x480+fill_ffffff.webp', 'Serra Gaúcha', 'Dom Cândido', 'Cabernet Sauvignon', 'entre 14ºC e 16ºC'),
(18, 'Nature Blanc de Blanc', 'Espumante Champenoise', 'Brasil', '1991', 12, '750', 350.75, '../assets/vinho/espumante-don-guerino-nature-blanc-de-blanc-15862653525079_480x480+fill_ffffff.webp', 'Serra Gaúcha', 'Don Guerino', 'Chardonnay', '7ºC'),
(19, 'Puklavec Estate Selection Brut', 'Espumante Charmat', 'Eslovênia', '1987', 11.5, '750', 312.15, '../assets/vinho/espumante-puklavec-estate-selection-brut-15744528883425_480x480+fill_ffffff.webp', 'Nordeste', 'Puklavec Family Wines', 'Chardonnay', 'entre 4ºC e 7ºC '),
(21, 'Amitié Nature', 'Espumante Nature', 'Argentina', '1871', 12.5, '750', 397.89, '../assets/vinho/espumante-amitie-nature-15977778178682_480x480+fill_ffffff.webp', 'Mendoza', 'Castellani', 'Chardonnay', 'entre 5ºC e 8ºC'),
(22, 'Puklavec Sauvignon Blanc', 'Espumante Seco Charmat', 'Eslovênia', '1772', 12, '750', 427.75, '../assets/vinho/espumante-puklavec-sauvignon-blanc-15765295027420_480x480+fill_ffffff.webp', 'Nordeste', 'Puklavec Family Wines', 'Sauvignon Blanc', 'entre 4ºC e 7ºC '),
(23, 'Casa Valduga 130 Brut', 'Espumante Tradicional', 'Brasil', '1972', 12.5, '750', 320, '../assets/vinho/espumante-casa-valduga-130-brut-15900022074298_480x480+fill_ffffff.webp', 'Campanha Gaúcha', 'Casa Pavaretti', 'Chardonnay e pinot noir', 'entre 4ºC e 7ºC '),
(25, 'Tinto Vaccaro Vindima 65', 'Tinto Seco Fino', 'Brasil', '1972', 13, '750', 452.92, '../assets/vinho/vinho-tinto-vaccaro-vindima-65-15745173401354_480x480+fill_ffffff.webp', 'Serra gaúcha (Garibaldi)', 'Vaccaro', '65% Cabernet Sauvignon e 35% Merlot ', 'entre 14ºC e 18ºC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CPF`);

--
-- Indexes for table `vinho`
--
ALTER TABLE `vinho`
  ADD PRIMARY KEY (`IDVinho`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vinho`
--
ALTER TABLE `vinho`
  MODIFY `IDVinho` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
