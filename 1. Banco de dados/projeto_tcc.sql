-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jun-2021 às 20:28
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
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `cpf` varchar(11) NOT NULL,
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
('30325097852', 'aaa', 'is@g', '1982-03-12', '06900000', '', 0, '', '', '', '', '', '6512bd43d9caa6e02c990b0a82652dca', 1),
('43465541804', 'Isabella de Oliveira Lopes', 'isabellaoliveira518@gmail.com', '2003-07-20', '13825-000', 'Rua Pennings', 160, 'Casa 02', 'Residencial Imigrantes', 'Holambra', 'SP', 'Perto do campo', 'e10adc3949ba59abbe56e057f20f883e', 2);

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

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `nome`, `email`, `telefone`, `mensagem`) VALUES
(3, 'Isabella de Oliveira Lopes', 'isabellaoliveira518@gmail.com', '11964725556', 'sddddddddddddd'),
(4, 's', 's@gmail.com', 's22', 's'),
(5, 'Isabella de Oliveira Lopes', 'isabellaoliveira518@gmail.com', '11964725556', 'dx');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ofertas`
--

CREATE TABLE `ofertas` (
  `email` varchar(245) NOT NULL,
  `nomeCompleto` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedidos` int(11) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
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
(50, '43465541804', 20, '2021-06-06', 1, 'Pedido entregue', 0),
(51, '43465541804', 21, '2021-06-06', 1, 'Cancelado', 0),
(52, '43465541804', 20, '2021-06-06', 1, 'Em transporte', 0),
(53, '43465541804', 21, '2021-06-06', 1, 'Pedido recebido', 0),
(54, '43465541804', 22, '2021-06-06', 1, 'Pedido recebido', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `descricao` varchar(1500) DEFAULT NULL,
  `ficha_tecnica` varchar(1200) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `situacao` varchar(13) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `preco`, `descricao`, `ficha_tecnica`, `quantidade`, `situacao`, `criado`, `imagem`) VALUES
(20, 'Carvão vegetal para churrasco pacote de 5kg - Zezinho', 17, 'Carvão Zezinho vegetal 100% eucalipto, pacotes de 5Kg Carvão especial para churrasco, limpo e granulado. Nosso carvão é selecionado e tratado para que nossos clientes tenham o melhor churrasco com seus amigos e familiares. Produto com facilidade para ascender e durabilidade no seu desempenho. Zezinho do Carvão trabalha de acordo com as normas legais e com foco em qualidade e satisfação.', '', 15, 'Disponível', '2021-06-05 11:25:50', '2021.06.05-16.25.50.jpg'),
(21, 'Tábua Para Churrasco - Zezinho ', 41.6, 'Á tábua Zezinho praticamente é uma peça de decoração para sua mesa, seu estilo traz o detalhe diferencial no seu espaço gourmet, na cozinha ou área de churrasqueira. Com ela, você pode servir seus lanches e variações para os seus convidados, para que eles tenham uma experiencia diferenciada. Ela também e uma excelente opção para presentear aquele seu amigo ou familiar que gosta de inventar coisas na cozinha.', '', 25, 'Disponível', '2021-06-05 11:32:02', '2021.06.05-16.32.02.jpg'),
(22, 'Churrasqueira a Carvão Portátil a Bafo Metávila', 450, 'Churrasqueira a Carvão Portátil a Bafo Metávila - Acompanha 1 grelha e é ideal para ser colocada em áreas abertas, pois não exige instalação. Já vem pronta para uso, ocupando assim, menos espaço na sua varanda ou área de lazer.', '', 10, 'Disponível', '2021-06-05 16:55:54', '2021.06.05-21.55.54.jpg'),
(23, 'Kit Para Churrasco Aço Inox 18 Peças  ', 180, 'O famoso churrasquinho de fim de semana é tradição em todo Brasil. Famílias e amigos se reúnem e celebram juntos, com muita música, alegria e comida boa. E claro, um bom churrasqueiro merece ter bons equipamentos. Este maravilhoso Kit Churrasco traz elegância e facilidade para um corte perfeito. O Kit Churrasco 18 Peças possui: 1 garfo, 1 espátula, 1 pegador, 1 faca, 1 escova, 1 pincel, 4 espetos e 8 pegadores de petisco, TODOS em aço inox!', '', 30, 'Disponível', '2021-06-05 17:00:59', '2021.06.05-22.00.59.jpg'),
(24, 'Molho de pimenta Premium - Zezinho ', 20, 'Pimenta Premium Zezinho, vem originalmente da cidade de Mogi Mirim, do estado São Paulo, localizado no interior. Ela é o resultado do cruzamento das seguintes espécies de pimentas: Habanero, Naga Bhut Jolokia, Orégano e Boldo-do-chile.', '', 75, 'Disponível', '2021-06-05 17:07:38', '2021.06.05-22.07.38.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocao`
--

CREATE TABLE `promocao` (
  `codpromo` varchar(11) NOT NULL,
  `valordesconto` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `promocao`
--

INSERT INTO `promocao` (`codpromo`, `valordesconto`) VALUES
('ISA', 10.5);

--
-- Índices para tabelas despejadas
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
