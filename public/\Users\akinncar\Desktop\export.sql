-- Created at 17.6.2019 22:39 using David Grudl MySQL Dump Utility
-- Host: localhost:8000
-- MySQL Server: 5.7.23
-- Database: ddm

SET NAMES utf8;
SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
SET FOREIGN_KEY_CHECKS=0;
SET UNIQUE_CHECKS=0;
SET AUTOCOMMIT=0;
-- --------------------------------------------------------

DROP TABLE IF EXISTS `item_pedido`;

CREATE TABLE `item_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `qtd_item_pedido` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_pedido` (`id_pedido`),
  KEY `fk_id_produto` (`id_produto`),
  CONSTRAINT `fk_id_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`),
  CONSTRAINT `fk_id_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

ALTER TABLE `item_pedido` DISABLE KEYS;

INSERT INTO `item_pedido` (`id`, `id_pedido`, `id_produto`, `qtd_item_pedido`, `preco`) VALUES
(1,	33,	17,	10,	30.00),
(2,	34,	18,	10,	30.00),
(3,	35,	18,	50,	150.00),
(4,	35,	25,	10,	20.00);
ALTER TABLE `item_pedido` ENABLE KEYS;



-- --------------------------------------------------------

DROP TABLE IF EXISTS `migration_versions`;

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `migration_versions` DISABLE KEYS;

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190412225154',	'2019-04-12 22:52:08'),
('20190412230350',	'2019-04-12 23:03:58'),
('20190428181743',	'2019-04-28 18:18:00'),
('20190520043622',	'2019-05-20 04:36:32'),
('20190523221325',	'2019-05-23 22:13:35'),
('20190523223034',	'2019-05-23 22:30:44'),
('20190527230438',	'2019-05-27 23:23:37'),
('20190531225902',	'2019-05-31 22:59:22');
ALTER TABLE `migration_versions` ENABLE KEYS;



-- --------------------------------------------------------

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `data_criacao` date NOT NULL,
  `hora_criacao` time NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `obs` varchar(255) DEFAULT NULL,
  `status` char(1) NOT NULL,
  `data_entrega` date DEFAULT NULL,
  `hora_entrega` time DEFAULT NULL,
  `metodo_entrega` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_usuario` (`id_usuario`),
  CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

ALTER TABLE `pedido` DISABLE KEYS;

INSERT INTO `pedido` (`id`, `id_usuario`, `data_criacao`, `hora_criacao`, `valor`, `obs`, `status`, `data_entrega`, `hora_entrega`, `metodo_entrega`) VALUES
(1,	1,	'2019-05-09',	'10:45:43',	567.00,	'Essa é uma Observação',	'',	NULL,	NULL,	''),
(2,	1,	'2019-05-09',	'10:46:43',	567.00,	'Essa é uma Observação',	'',	NULL,	NULL,	''),
(3,	2,	'2019-05-09',	'10:47:11',	567.00,	'Essa é uma Observação',	'',	NULL,	NULL,	''),
(6,	1,	'2019-05-10',	'12:08:15',	567.00,	'Essa é uma Observação',	'',	NULL,	NULL,	''),
(7,	1,	'2019-05-10',	'12:49:05',	567.00,	'Essa é uma Observação',	'',	NULL,	NULL,	''),
(8,	1,	'2019-05-10',	'10:32:56',	0.00,	'Essa é uma Observação',	'',	NULL,	NULL,	''),
(9,	1,	'2019-05-10',	'10:33:26',	0.00,	'Essa é uma Observação',	'',	NULL,	NULL,	''),
(10,	1,	'2019-05-10',	'10:33:30',	0.00,	'Essa é uma Observação',	'',	NULL,	NULL,	''),
(11,	1,	'2019-05-10',	'10:37:39',	678.00,	'Essa é uma Observação',	'',	NULL,	NULL,	''),
(12,	1,	'2019-05-10',	'10:40:18',	678.00,	'Essa é uma Observação',	'',	NULL,	NULL,	''),
(13,	1,	'2019-05-10',	'10:40:23',	678.00,	'Essa é uma Observação',	'',	NULL,	NULL,	''),
(14,	1,	'2019-05-10',	'10:40:43',	678.00,	'Essa é uma Observação',	'',	NULL,	NULL,	''),
(15,	1,	'2019-05-10',	'10:52:04',	0.00,	'Essa é uma Observação',	'3',	NULL,	NULL,	''),
(16,	1,	'2019-05-10',	'10:52:48',	0.00,	'Essa é uma Observação',	'2',	NULL,	NULL,	''),
(17,	1,	'2019-05-10',	'10:53:55',	0.00,	'Essa é uma Observação',	'1',	NULL,	NULL,	''),
(18,	1,	'2019-05-10',	'10:54:26',	0.00,	'Essa é uma Observação',	'2',	NULL,	NULL,	''),
(19,	1,	'2019-05-10',	'10:54:50',	0.00,	'Essa é uma Observação',	'3',	NULL,	NULL,	''),
(20,	1,	'2019-05-10',	'11:01:47',	0.00,	'Essa é uma Observação',	'3',	NULL,	NULL,	''),
(21,	1,	'2019-05-10',	'11:02:01',	678.00,	'Essa é uma Observação',	'3',	NULL,	NULL,	''),
(22,	2,	'2019-05-10',	'11:02:53',	678.00,	'Essa é uma Observação',	'3',	NULL,	NULL,	''),
(23,	2,	'2019-05-10',	'11:04:14',	678.00,	'Essa é uma Observação',	'3',	NULL,	NULL,	''),
(24,	2,	'2019-05-10',	'11:08:27',	70.00,	'Essa é uma Observação',	'3',	NULL,	NULL,	''),
(25,	5,	'2019-05-11',	'04:41:02',	47.50,	'Essa é uma Observação',	'3',	NULL,	NULL,	''),
(26,	1,	'2019-05-13',	'11:12:00',	24.00,	'Essa é uma Observação',	'3',	NULL,	NULL,	''),
(27,	1,	'2019-05-15',	'11:34:02',	40.00,	'Essa é uma Observação',	'3',	NULL,	NULL,	''),
(28,	1,	'2019-05-16',	'10:37:30',	10.00,	NULL,	'3',	NULL,	NULL,	''),
(29,	1,	'2019-05-16',	'10:38:44',	80.50,	'Padrao',	'3',	NULL,	NULL,	''),
(30,	1,	'2019-05-16',	'10:41:45',	77.00,	'Padrao',	'2',	NULL,	NULL,	''),
(31,	1,	'2019-05-16',	'11:06:28',	334.78,	'Quero meus doces para ontem',	'1',	NULL,	NULL,	''),
(32,	2,	'2019-05-16',	'11:32:15',	96.00,	'Pedido do teu amigo pra ti',	'2',	NULL,	NULL,	''),
(33,	9,	'2019-06-13',	'07:29:19',	30.00,	'Quero doces bem feitinhos!',	'1',	'2019-06-13',	'07:29:00',	'1'),
(34,	9,	'2019-06-13',	'09:23:25',	30.00,	NULL,	'1',	'2019-06-21',	'22:23:00',	'1'),
(35,	10,	'2019-06-14',	'22:41:59',	170.00,	'Vou ai meio dia pq vou dormir até essa hora',	'3',	'2019-06-22',	'12:30:00',	'2');
ALTER TABLE `pedido` ENABLE KEYS;



-- --------------------------------------------------------

DROP TABLE IF EXISTS `produto`;

CREATE TABLE `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `preco_custo` decimal(10,2) NOT NULL,
  `preco_venda` decimal(10,2) NOT NULL,
  `qtd_produto` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `arquivado` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

ALTER TABLE `produto` DISABLE KEYS;

INSERT INTO `produto` (`id`, `nome`, `preco_custo`, `preco_venda`, `qtd_produto`, `descricao`, `img`, `arquivado`) VALUES
(17,	'Bombom de Uva',	2.00,	3.00,	50,	'Bombom de chocolate preto com recheio de creme de leite condensado e uva.',	'95a0828538a04d30dd18c8290ec8726a.png',	'0'),
(18,	'Bombom de Nozes',	1.00,	3.00,	50,	'Bombom de chocolate preto com recheio de creme nozes.',	'4c54af91737e06ade4285eb2d6001e1c.png',	'0'),
(19,	'Bombom de Cereja',	1.00,	2.00,	50,	'Bombom de chocolate preto com recheio de creme de leite condensado e cereja.',	'6a6a2aab22ff95d4d42df18965aae204.png',	'0'),
(20,	'Beijinho',	1.00,	2.00,	50,	'Docinho branquinho',	'be9cb7a5c099294ca3ea02fa11875a46.png',	'0'),
(21,	'Concha do Mar',	1.00,	3.00,	50,	'Doce com recheio branquinho e concha de chocolate branco em volta.',	'ec8fd6a3eed17dd4368298a3e121fc94.png',	'0'),
(22,	'Bombom Rosado',	1.00,	2.00,	50,	'Docinho bombom rosado.',	'04cd6afb04662054eba8675f0c9903cd.png',	'0'),
(23,	'Brigadeiro de bolinha',	1.00,	3.00,	50,	'Brigadeiro coberto com bolinhas de chocolate.',	'd02e7ad835f28f8407c71fde72acfe10.png',	'0'),
(24,	'Copinho de bolinhas',	1.00,	3.00,	50,	'Copinho de chocolate branco recheado creme de chocolate preto com bolinhas.',	'9fd9769a0c07295ed1241ac51dd21ef0.png',	'0'),
(25,	'Casadinho',	1.00,	2.00,	50,	'Docinho de brigadeiro com branquinho.',	'ff8e2ec063c901d1a53076ec9bb6c147.png',	'0'),
(26,	'Olho de Sogra',	1.00,	2.00,	50,	'Docinho de ameixa com creme coco.',	'9e938a41f9341b99fe9473c11c741795.png',	'0'),
(27,	'Tricolor',	1.00,	2.00,	50,	'Branquinho triplo com uma bala.',	'1b94f53ec7a20ea7c7f6367117b81d18.png',	'1'),
(28,	'Brigadeiro Comum',	1.00,	2.00,	50,	'Docinho de brigadeiro.',	'5f679c9bf9b3da6dd44cbd6460ce6ba6.png',	'1'),
(29,	'Bombom de Morango',	1.00,	3.00,	50,	'Bombom de chocolate com morango',	'fb61f74287ba5eb88685869b153047c3.png',	'0');
ALTER TABLE `produto` ENABLE KEYS;



-- --------------------------------------------------------

DROP TABLE IF EXISTS `unidade`;

CREATE TABLE `unidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qtd` int(11) DEFAULT NULL,
  `desconto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `unidade` DISABLE KEYS;

ALTER TABLE `unidade` ENABLE KEYS;



-- --------------------------------------------------------

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  `roles` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `telefone` varchar(25) NOT NULL,
  `username` varchar(180) NOT NULL,
  `telefone2` varchar(25) DEFAULT NULL,
  `estado` varchar(2) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `rua` varchar(30) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `complemento` varchar(20) NOT NULL,
  `num_residencia` varchar(5) NOT NULL,
  `codigo_recuperacao` varchar(255) DEFAULT NULL,
  `data_recuperacao` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2265B05DE7927C74` (`email`),
  UNIQUE KEY `UNIQ_2265B05D3E3E11F0` (`cpf`),
  UNIQUE KEY `UNIQ_2265B05DF85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

ALTER TABLE `usuario` DISABLE KEYS;

INSERT INTO `usuario` (`id`, `email`, `roles`, `password`, `nome`, `cpf`, `telefone`, `username`, `telefone2`, `estado`, `cidade`, `rua`, `bairro`, `cep`, `complemento`, `num_residencia`, `codigo_recuperacao`, `data_recuperacao`) VALUES
(7,	'akinncar@hotmail.com',	'ROLE_ADMIN',	'$2y$12$5iPCZ7Dr5zsFpbi.l1cFSeo623fErtNiUELbN8IaG/CNZPM3N/HLC',	'Akinn Costa de Aguiar Rosa',	'09493767957',	'+5548996472594',	'akinncar',	'48999330274',	'SC',	'Tubarao',	'Rua Manoel Antunes Correa',	'Centro',	'88701-350',	'Casa',	'842',	NULL,	NULL),
(8,	'madracat@hotmail.com',	'ROLE_ADMIN',	'$2y$12$5iPCZ7Dr5zsFpbi.l1cFSeo623fErtNiUELbN8IaG/CNZPM3N/HLC',	'Ana Maria Costa de Aguiar Rosa',	'29218144049',	'999330274',	'madracat',	'36223369',	'SC',	'Tubarao',	'Rua Manoel Antunes Correa',	'Centro',	'88701-350',	'Casa',	'842',	NULL,	NULL),
(9,	'diegoeliastb@gmail.com',	'ROLE_USER',	'$2y$12$c77JcyBS/tm/b4O2KXB9eeWMx4SfD/xlFHezuRjO.bPNiEGdDtXUe',	'Diego Formentin',	'76767656734',	'8877665544',	'diegao',	'8899009988',	'sc',	'Tubarao',	'Adolfo Machado',	'Dehon',	'77886-287',	'Casa',	'342',	NULL,	NULL),
(10,	'loranacar@hotmail.com',	'ROLE_USER',	'$2y$12$xGwgCT/jzICEFS.neJAIrOwlQ3sAN8o2idwm5qsviyADvU/zHRIrC',	'Lorana',	'8127491332',	'999031966',	'loranacar',	'678567665',	'SC',	'Tubarao',	'Rua Manoel Antunes Correa',	'Centro',	'88701-350',	'Casa',	'842',	'1',	'2019-06-15'),
(12,	'lorotuba@hotmail.com',	'ROLE_USER',	'$2y$12$KEf0BaBggyAkvcuj8zUVIeMM187.w0qGUsxTCbw5pozsPcIS22sEy',	'Lourival da Rosa',	'29218144075',	'48996472594',	'lorotuba',	'+5548996472594',	'SC',	'Tubarao',	'Rua Manoel Antunes Correa',	'Centro',	'88701-350',	'Casa',	'842',	NULL,	NULL);
ALTER TABLE `usuario` ENABLE KEYS;



COMMIT;
-- THE END
