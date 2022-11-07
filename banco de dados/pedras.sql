-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Out-2022 às 11:15
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pedras`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `imagem` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id`, `id_produto`, `imagem`) VALUES
(1, 1, 'https://lh3.googleusercontent.com/p/AF1QipNtqOCTTAjXzZF15KIzirS8G2g_qUZisWI9W879=s1280-p-no-v1'),
(2, 3, 'https://lh3.googleusercontent.com/p/AF1QipNtqOCTTAjXzZF15KIzirS8G2g_qUZisWI9W879=s1280-p-no-v1'),
(3, 4, 'https://lh3.googleusercontent.com/p/AF1QipNtqOCTTAjXzZF15KIzirS8G2g_qUZisWI9W879=s1280-p-no-v1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `id_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `preco` decimal(14,2) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `estoque` int(11) NOT NULL,
  `imagem` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `estoque`, `imagem`) VALUES
(1, 'Pedra Ferro Ferrugem 10x10', '50.00', 'Pedra ferro ferrugem 10x10 peças soltas', 100, 'https://lh3.googleusercontent.com/p/AF1QipNtqOCTTAjXzZF15KIzirS8G2g_qUZisWI9W879=s1280-p-no-v1'),
(3, 'Placa 20x80 filete ripado', '50.00', 'pedra ferro ferrugem', 100, 'https://lh3.googleusercontent.com/p/AF1QipNtqOCTTAjXzZF15KIzirS8G2g_qUZisWI9W879=s1280-p-no-v1'),
(4, 'Mosaico', '50.00', 'pedra ferro preta e ferrugem para revestiment', 100, 'https://lh3.googleusercontent.com/p/AF1QipNtqOCTTAjXzZF15KIzirS8G2g_qUZisWI9W879=s1280-p-no-v1'),
(5, 'teste', '50.00', 'teste', 50, 'www'),
(6, 'giovana', '0.00', 'conta 1', 1, 'insira o link');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_has_vendas`
--

CREATE TABLE `produtos_has_vendas` (
  `Produtos_idProdutos` int(11) NOT NULL,
  `Pedidos_idPedidos` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `subtotal` decimal(14,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `email` text NOT NULL,
  `nivel` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `email`, `nivel`) VALUES
(2, 'gabriel', '1234', '', 1),
(3, 'admin', '1234', '', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Imagens_Produtos` (`id_produto`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Vendas_Adm1` (`id_usuarios`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos_has_vendas`
--
ALTER TABLE `produtos_has_vendas`
  ADD PRIMARY KEY (`Produtos_idProdutos`,`Pedidos_idPedidos`),
  ADD KEY `fk_Produtos_has_Vendas_Vendas1` (`Pedidos_idPedidos`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `fk_Imagens_Produtos` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_Vendas_Adm1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos_has_vendas`
--
ALTER TABLE `produtos_has_vendas`
  ADD CONSTRAINT `fk_Produtos_has_Vendas_Produtos1` FOREIGN KEY (`Produtos_idProdutos`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Produtos_has_Vendas_Vendas1` FOREIGN KEY (`Pedidos_idPedidos`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
