DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(150) NOT NULL,
  `preco_base` decimal(10,2) NOT NULL,
  `quantidade_disponivel` int NOT NULL,
  `imagem_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `preco_base`, `quantidade_disponivel`, `imagem_url`) VALUES 
(1, 'Estrutura De Galpão 8x15 120m²', 20000.00, 3, 'galpao 120.png'),
(2, 'Estrutura De Galpão 12x20 240m²', 30000.00, 2, 'galpao 240.png'),
(3, 'Estrutura De Galpão 15x45 675m²', 50000.00, 4, 'galpao 675.png'),
(4, 'Projeto Sob Medida (Valor a definir)', 0.00, 0, NULL);

DROP TABLE IF EXISTS `orcamentos`;
CREATE TABLE `orcamentos` (
  `id_orcamento` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `data_solicitacao` date NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id_orcamento`),
  FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `orcamento_itens`;
CREATE TABLE `orcamento_itens` (
  `id_item` int NOT NULL AUTO_INCREMENT,
  `id_orcamento` int NOT NULL,
  `id_produto` int NOT NULL,
  `quantidade_solicitada` int NOT NULL,
  PRIMARY KEY (`id_item`),
  FOREIGN KEY (`id_orcamento`) REFERENCES `orcamentos` (`id_orcamento`),
  FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
