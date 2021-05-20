-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Maio-2021 às 01:36
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `idcarrinho` int(11) NOT NULL,
  `cpfCliente` int(11) DEFAULT NULL,
  `idProduto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `cpf` int(11) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `ponto_ref` varchar(45) NOT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cpf`, `nome`, `email`, `nascimento`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `ponto_ref`, `senha`, `nivel`) VALUES
(12122, 'Ana Lopea', 'ana@gmail.com', '2021-05-27', '06900-000', 'Rua das Paineiras', 1263, 'Casa', 'Granjinha', 'Embu-Guaçu', 'SP', '', '9e10db1233c6e39d5adcc9c76eec9df1', 1),
(434655418, 'Isabella de Oliveira Lopes', 'isabellaoliveira518@gmail.com', '2003-07-20', '13825-000', 'Rua Pennings', 160, 'Casa 02', 'Residencial Imigrantes', 'Holambra', 'SP', 'Perto do campo', 'e10adc3949ba59abbe56e057f20f883e', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` varchar(12) DEFAULT NULL,
  `mensagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ofertas`
--

CREATE TABLE `ofertas` (
  `email` varchar(245) NOT NULL,
  `nomeCompleto` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ofertas`
--

INSERT INTO `ofertas` (`email`, `nomeCompleto`) VALUES
('ana@2002', 'Ana Luiza'),
('isabellaoliveira518@gmail.com', 'Isabella de Oliveira Lopes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedidos` int(11) NOT NULL,
  `cpf` int(11) DEFAULT NULL,
  `idproduto` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `desconto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`idpedidos`, `cpf`, `idproduto`, `data`, `qtd`, `status`, `desconto`) VALUES
(1, 434655418, 1, '2021-05-12', 2, 'Pedido entregue', 0),
(2, 12122, 1, '2021-05-19', 1, 'Pedido recebido', 0),
(45, 434655418, 13, '2021-05-19', 1, 'Pedido recebido', 3.33333),
(46, 434655418, 14, '2021-05-19', 2, 'Pagamento aprovado', 3.33333),
(47, 434655418, 15, '2021-05-19', 1, 'Pedido recebido', 3.33333);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `preco` decimal(10,0) DEFAULT NULL,
  `descricao` varchar(300) DEFAULT NULL,
  `ficha_tecnica` varchar(1200) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `situacao` varchar(13) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `imagem` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ficha_tecnica`, `quantidade`, `situacao`, `criado`, `imagem`) VALUES
(1, 'Carvão 2kg', '26', 'Preto', 'teste', 10, 'Disponível', '2021-05-02 23:10:18', '2021.05.18-21.19.46jpeg'),
(13, 'Zézinho', '42', 'Bom demais para logos', '', 170, 'Disponível', '2021-05-11 14:00:26', '2021.05.11-19.00.26.png'),
(14, 'Zézinho', '41', 'Bom demais para logos', '', 170, 'Disponível', '2021-05-11 14:11:48', '2021.05.17-15.44.53jpeg'),
(15, 'oo', '14', 'uuutgv hgvfgh jhbj', '', 9, 'Disponível', '2021-05-11 14:16:33', '2021.05.11-19.16.33.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocao`
--

CREATE TABLE `promocao` (
  `codpromo` varchar(11) NOT NULL,
  `valordesconto` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `promocao`
--

INSERT INTO `promocao` (`codpromo`, `valordesconto`) VALUES
('DESC10', 10);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`idcarrinho`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`email`(45));

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedidos`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `promocao`
--
ALTER TABLE `promocao`
  ADD PRIMARY KEY (`codpromo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
