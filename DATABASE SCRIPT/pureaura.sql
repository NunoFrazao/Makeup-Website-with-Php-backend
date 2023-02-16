-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2023 at 02:54 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pureaura`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id_evento` int(10) UNSIGNED NOT NULL,
  `nome_evento` varchar(50) NOT NULL,
  `descricao` text,
  `data_inicio` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `data_fim` date NOT NULL,
  `hora_fim` time NOT NULL,
  `id_funcionario` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categoriaproduto`
--

CREATE TABLE `categoriaproduto` (
  `id_categoria` tinyint(3) UNSIGNED NOT NULL,
  `designacao` varchar(50) NOT NULL,
  `id_servico` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoriaproduto`
--

INSERT INTO `categoriaproduto` (`id_categoria`, `designacao`, `id_servico`) VALUES
(1, 'Cremes', 3),
(2, 'Batons', 2),
(3, 'Vernizes', 1),
(4, 'Maquilhagem', 2),
(5, 'Rímel', 2),
(6, 'Óleos', 3),
(7, 'Eyeliners', 2),
(8, 'Bases', 2);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id_faq` tinyint(3) UNSIGNED NOT NULL,
  `pergunta` varchar(255) NOT NULL,
  `resposta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id_faq`, `pergunta`, `resposta`) VALUES
(1, 'Só estão disponibilizados dois tipos de massagens?', 'Sim. De momento só efetuamos dois tipos de massagens mas planeamos disponibilizar mais no futuro'),
(2, 'É possível fazer compras no site?', 'Não o Website terá uma loja, mas esta será apenas para informar os utilizadores dos produtos disponíveis para venda no salão'),
(3, 'Posso fazer uma marcação para mais que um serviço?', 'Sim, pode escolher o serviço que quiser dentro de cada categoria, de seguida escreva a mensagem, e será contactada por um funcionário brevemente');

-- --------------------------------------------------------

--
-- Table structure for table `fotogaleria`
--

CREATE TABLE `fotogaleria` (
  `id_fotografia` int(10) UNSIGNED NOT NULL,
  `descricao` text,
  `data_publicacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `caminho` varchar(255) NOT NULL,
  `id_servico` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fotogaleria`
--

INSERT INTO `fotogaleria` (`id_fotografia`, `descricao`, `data_publicacao`, `caminho`, `id_servico`) VALUES
(1, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-15 09:53:56', 'assets/img/nuno/unhas/1.jpg', 1),
(2, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-15 09:57:36', 'assets/img/nuno/unhas/2.jpg', 1),
(3, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-15 09:57:36', 'assets/img/nuno/unhas/3.jpg', 1),
(4, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-15 09:57:36', 'assets/img/nuno/unhas/4.jpg', 1),
(5, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-15 09:58:41', 'assets/img/nuno/unhas/5.jpg', 1),
(6, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-15 09:58:41', 'assets/img/nuno/unhas/6.jpg', 1),
(7, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-15 09:58:41', 'assets/img/nuno/unhas/7.jpg', 1),
(8, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-15 09:58:41', 'assets/img/nuno/unhas/8.jpg', 1),
(9, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-15 09:59:56', 'assets/img/nuno/unhas/9.jpg', 1),
(10, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-15 09:59:56', 'assets/img/nuno/unhas/10.jpg', 1),
(11, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-15 09:59:56', 'assets/img/nuno/unhas/11.jpg', 1),
(12, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-15 09:59:56', 'assets/img/nuno/unhas/12.jpg', 1),
(13, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-16 11:02:22', 'assets/img/nuno/unhas/13.jpg', 1),
(14, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-16 11:03:39', 'assets/img/nuno/unhas/14.jpg', 1),
(15, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-16 11:03:39', 'assets/img/nuno/unhas/15.jpg', 1),
(16, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-16 11:03:39', 'assets/img/nuno/unhas/16.jpg', 1),
(17, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-16 11:03:39', 'assets/img/nuno/unhas/17.jpg', 1),
(18, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-16 11:03:39', 'assets/img/nuno/unhas/18.jpg', 1),
(19, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-16 11:03:39', 'assets/img/nuno/unhas/19.jpg', 1),
(20, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-16 11:03:39', 'assets/img/nuno/unhas/20.jpg', 1),
(21, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-16 11:03:39', 'assets/img/nuno/unhas/21.jpg', 1),
(22, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-18 11:26:40', 'assets/img/nuno/maquilhagem/1.jpg', 2),
(23, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-18 11:27:41', 'assets/img/nuno/maquilhagem/2.jpg', 2),
(24, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-18 11:27:41', 'assets/img/nuno/maquilhagem/3.jpg', 2),
(25, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-18 11:27:41', 'assets/img/nuno/maquilhagem/4.jpg', 2),
(26, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-18 11:27:42', 'assets/img/nuno/maquilhagem/5.jpg', 2),
(27, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-18 11:27:42', 'assets/img/nuno/maquilhagem/6.jpg', 2),
(28, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-18 11:29:01', 'assets/img/nuno/massagem/1.jpg', 3),
(29, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-18 11:29:01', 'assets/img/nuno/massagem/2.jpg', 3),
(30, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-18 11:29:01', 'assets/img/nuno/massagem/3.jpg', 3),
(31, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-18 11:29:01', 'assets/img/nuno/massagem/4.jpg', 3),
(32, 'asdasdasdasdasdasdasdasdadasdasdasda', '2020-06-18 11:29:01', 'assets/img/nuno/massagem/5.jpg', 3),
(36, 'lalalalalal', '2020-06-18 11:41:15', 'assets/img/nuno/unhas/22.jpg', 1),
(37, 'lalalalalal', '2020-06-18 11:41:51', 'assets/img/nuno/unhas/23.jpg', 1),
(38, 'lalalalalal', '2020-06-18 11:41:51', 'assets/img/nuno/unhas/24.jpg', 1),
(39, 'lalalalalal', '2020-06-18 11:41:51', 'assets/img/nuno/unhas/25.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` tinyint(3) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `estatuto` enum('Administrador','Funcionário Normal') DEFAULT 'Funcionário Normal',
  `email` varchar(100) NOT NULL,
  `palavra_chave` varchar(255) NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome`, `estatuto`, `email`, `palavra_chave`, `foto_perfil`) VALUES
(1, 'Sara Frazão', 'Administrador', 'sara.frazao@pureaura.pt', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', NULL),
(2, 'Filipa Gaspar', 'Funcionário Normal', 'filipa.gaspar@pureaura.pt', '85f819b907bc1b698920e7f0e8d3fac6afeca1d23833fd2b54c3ec1fca43b9a5dda670ad73f48b9f85a30c084643a687a28f8e1bbb8ad5036ed7482436c65701', 'assets/img/users/emma.jpg'),
(3, 'Diana Pacheco', 'Funcionário Normal', 'diana.pacheco@pureaura.pt', '3ab9e5066fd266759dc704cae50490bb57e79bce662505233cf48687dea4da064d99fb7407cabb2dbbf06230052fd804fcaa96fea51d0dbd13623845472630da', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id_home` tinyint(3) UNSIGNED NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id_home`, `video`) VALUES
(1, 'assets/video/video_promocional.mp4');

-- --------------------------------------------------------

--
-- Stand-in structure for view `lucro_marcacoes`
-- (See below for the actual view)
--
CREATE TABLE `lucro_marcacoes` (
`N_Marcações` bigint(21)
,`Lucro_Total` decimal(27,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `marcacao`
--

CREATE TABLE `marcacao` (
  `id_marcacao` int(10) UNSIGNED NOT NULL,
  `mensagem` text,
  `data_pedido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dataHora_marcacao` datetime NOT NULL,
  `data_marcacao_confirmada` datetime DEFAULT NULL,
  `estado` enum('Pendente','Confirmada') NOT NULL DEFAULT 'Pendente',
  `telefone` char(9) NOT NULL,
  `id_utilizador` int(10) UNSIGNED DEFAULT NULL,
  `id_funcionario` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marcacao`
--

INSERT INTO `marcacao` (`id_marcacao`, `mensagem`, `data_pedido`, `dataHora_marcacao`, `data_marcacao_confirmada`, `estado`, `telefone`, `id_utilizador`, `id_funcionario`) VALUES
(1, NULL, '2020-07-06 16:15:39', '2020-07-25 18:15:00', '2020-07-17 13:58:00', 'Confirmada', '999999999', NULL, 1),
(2, 'asdasdasdasd', '2020-07-06 17:49:28', '2020-07-07 20:49:00', NULL, 'Pendente', '915396485', 1, 3),
(3, 'asdasd', '2020-07-06 17:49:36', '2020-07-19 19:49:00', '2020-07-16 17:58:00', 'Confirmada', '915396485', 2, 2),
(4, 'asdasdas', '2020-07-06 17:49:41', '2020-07-07 19:49:00', '2020-07-24 20:58:00', 'Confirmada', '915396485', 1, 1),
(5, 'asdasd', '2020-07-06 17:49:46', '2020-07-11 17:49:00', NULL, 'Pendente', '915396485', 3, 2),
(6, NULL, '2020-07-06 17:49:52', '2020-07-18 20:49:00', NULL, 'Pendente', '915396485', 2, 1),
(7, 'asdasd', '2020-07-06 17:49:59', '2020-07-11 17:49:00', NULL, 'Pendente', '915396485', 2, 3),
(8, 'asdasdasd', '2020-07-06 17:50:05', '2020-07-11 17:50:00', NULL, 'Pendente', '915396485', 3, 1),
(9, NULL, '2020-07-06 17:59:52', '2020-07-12 19:59:00', NULL, 'Pendente', '999999999', NULL, 1),
(10, 'adasd', '2020-07-06 18:51:21', '2020-07-19 18:51:00', NULL, 'Pendente', '999999999', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `marcacao_subservico`
--

CREATE TABLE `marcacao_subservico` (
  `id_marcacao` int(10) UNSIGNED NOT NULL,
  `id_subservico` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marcacao_subservico`
--

INSERT INTO `marcacao_subservico` (`id_marcacao`, `id_subservico`) VALUES
(1, 2),
(2, 2),
(6, 2),
(4, 3),
(7, 3),
(9, 3),
(7, 4),
(1, 6),
(3, 6),
(8, 6),
(10, 6),
(5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `mensagem`
--

CREATE TABLE `mensagem` (
  `id_mensagem` int(10) UNSIGNED NOT NULL,
  `assunto` varchar(100) DEFAULT NULL,
  `mensagem` text NOT NULL,
  `data_msg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mensagem_naoautenticado`
--

CREATE TABLE `mensagem_naoautenticado` (
  `id_mensagem` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mensagem_utilizador`
--

CREATE TABLE `mensagem_utilizador` (
  `id_mensagem` int(10) UNSIGNED NOT NULL,
  `id_utilizador` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `n_fotos_galeria`
-- (See below for the actual view)
--
CREATE TABLE `n_fotos_galeria` (
`Fotografias Publicadas` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `n_produtos_categoriaproduto`
-- (See below for the actual view)
--
CREATE TABLE `n_produtos_categoriaproduto` (
`IDcategoria` tinyint(3) unsigned
,`Categoria` varchar(50)
,`Quantidade produtos` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(5,2) UNSIGNED NOT NULL,
  `qtd_stock` smallint(5) UNSIGNED NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `id_categoria` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `marca`, `descricao`, `preco`, `qtd_stock`, `imagem`, `id_categoria`) VALUES
(1, 'Rouge Dior Lipstick', 'Dior', 'A fórmula avaçada de Rouge Dior Lipstick fará com que se sinta bem durante todo o dia. A nova fórmula de pigmentos inclui uma combinação única de ingredientes naturais que proporcionam um melhor conforto.', '37.22', 10, 'assets/img/ruben/loja/batons/1.jpg', 2),
(2, 'Creme de Limpeza', 'Cuide-se Bem', 'O creme de Limpeza Hodratante descomplica o cuidado com a pele. Limpa produndamente e ajuda a renovação celular, garantindo a hidratação natural da pele', '10.99', 6, 'assets/img/ruben/loja/cremes/1.jpg', 1),
(3, 'Creme de Limpeza Hidratante', 'Cuide-se Bem', 'O creme de Limpeza Hodratante descomplica o cuidado com a pele. Limpa produndamente e ajuda a renovação celular, garantindo a hidratação natural da pele', '10.99', 6, 'assets/img/ruben/loja/cremes/2.jpg', 1),
(4, 'Couture Eyeliner', 'Yves Saint Laurent', 'Couture Eyeliner de fácil aplicação para um resultado intenso em apenas uma passagem.', '12.99', 13, 'assets/img/ruben/loja/eyeliners/1.jpg', 7),
(5, 'Couture Eyeliner', 'Yves Saint Laurent', 'Couture Eyeliner de fácil aplicação para um resultado intenso em apenas uma passagem.', '12.99', 13, 'assets/img/ruben/loja/eyeliners/2.jpg', 7),
(6, 'Couture Eyeliner', 'Yves Saint Laurent', 'Couture Eyeliner de fácil aplicação para um resultado intenso em apenas uma passagem.', '12.99', 13, 'assets/img/ruben/loja/eyeliners/3.jpg', 7),
(7, 'Oleo Hidratante 250ml', 'Nativa SPA', 'Um toque de óleo hidratante no seu banho vai trazer mais carinho à sua pele.', '15.99', 53, 'assets/img/ruben/loja/oleos/1.jpg', 6),
(8, 'Creme Hidratante', 'Cuide-se Bem', 'O creme de Limpeza Hodratante descomplica o cuidado com a pele. Limpa produndamente e ajuda a renovação celular, garantindo a hidratação natural da pele', '10.99', 6, 'assets/img/ruben/loja/cremes/3.jpg', 1),
(9, 'Couture Eyeliner', 'Yves Saint Laurent', 'Couture Eyeliner de fácil aplicação para um resultado intenso em apenas uma passagem.', '12.99', 13, 'assets/img/ruben/loja/eyeliners/4.jpg', 7),
(10, 'Oleo Hidratante 250ml', 'Nativa SPA', 'Um toque de óleo hidratante no seu banho vai trazer mais carinho à sua pele.', '15.99', 53, 'assets/img/ruben/loja/oleos/2.jpg', 6),
(11, 'Oleo Hidratante 250ml', 'Nativa SPA', 'Um toque de óleo hidratante no seu banho vai trazer mais carinho à sua pele.', '15.99', 53, 'assets/img/ruben/loja/oleos/3.jpg', 6),
(12, 'Oleo Hidratante 250ml', 'Nativa SPA', 'Um toque de óleo hidratante no seu banho vai trazer mais carinho à sua pele.', '15.99', 53, 'assets/img/ruben/loja/oleos/4.jpg', 6),
(13, 'Rouge Lipstick', 'Kat Von D', 'A fórmula avaçada de Rouge Dior Lipstick fará com que se sinta bem durante todo o dia. A nova fórmula de pigmentos inclui uma combinação única de ingredientes naturais que proporcionam um melhor conforto.', '37.22', 10, 'assets/img/ruben/loja/batons/2.jpg', 2),
(14, 'Oleo Hidratante 250ml', 'Nativa SPA', 'Um toque de óleo hidratante no seu banho vai trazer mais carinho à sua pele.', '15.99', 53, 'assets/img/ruben/loja/oleos/5.jpg', 6),
(15, 'Couture Eyeliner', 'Yves Saint Laurent', 'Couture Eyeliner de fácil aplicação para um resultado intenso em apenas uma passagem.', '12.99', 13, 'assets/img/ruben/loja/cremes/4.jpg', 7),
(16, 'Powder Matte Lipstick', 'Makeup Revolution', 'Lorem ipsum Lorem ipsum.', '5.95', 13, 'assets/img/ruben/loja/batons/powder_matte.jpg', 2),
(17, 'Rouge Allure Camélia', 'Chanel', 'Lorem ipsum Lorem ipsum.', '35.44', 13, 'assets/img/ruben/loja/batons/chanel_rouge_allure.jpg', 2),
(18, 'Golden Gatsby Pop up', 'Lasplash', 'Lorem ipsum Lorem ipsum.', '15.30', 13, 'assets/img/ruben/loja/batons/lasplah_golden_gatsby.jpg', 2),
(19, 'Pure Matte Lips', 'Zoeva', 'Lorem ipsum Lorem ipsum.', '13.25', 13, 'assets/img/ruben/loja/batons/pure_matte.jpg', 2),
(20, 'Megalast Lip Color', 'Wet N Wild', 'Lorem ipsum Lorem ipsum.', '3.50', 13, 'assets/img/ruben/loja/batons/wetnwild_megalast.jpg', 2),
(21, 'Mickey Mouse Collection Satin', 'Dose Of Colors', 'Lorem ipsum Lorem ipsum.', '19.25', 13, 'assets/img/ruben/loja/batons/mickey_mouse_collection.jpg', 2),
(22, 'Holiday Collection 2018', 'Jeffree Star Cosmetics', 'Lorem ipsum Lorem ipsum.', '10.25', 13, 'assets/img/ruben/loja/batons/holiday_collection_2018.jpg', 2),
(23, 'Shane X Jeffree Velour Liquid', 'Jeffree Star Cosmetics', 'Lorem ipsum Lorem ipsum.', '17.95', 13, 'assets/img/ruben/loja/batons/shane_x_jeffree.jpg', 2),
(24, 'Lip Vinyl', 'Makeup Revolution', 'Lorem ipsum Lorem ipsum.', '5.95', 13, 'assets/img/ruben/loja/batons/lip_vinyl.jpg', 2),
(25, 'Matte Lipstick', 'Makeup Revolution', 'Lorem ipsum Lorem ipsum.', '4.75', 13, 'assets/img/ruben/loja/batons/matte_lipstick.jpg', 2),
(26, 'Supreme Lipstick', 'Revolution Pro', 'Lorem ipsum Lorem ipsum.', '6.00', 13, 'assets/img/ruben/loja/batons/supreme_lipstick.jpg', 2),
(27, 'Flexi Slick', 'Ofra', 'Lorem ipsum Lorem ipsum.', '14.50', 13, 'assets/img/ruben/loja/batons/flexi_slick.jpg', 2),
(28, 'Satin Kiss Lipstick', 'Makeup Revolution', 'Lorem ipsum Lorem ipsum.', '6.00', 13, 'assets/img/ruben/loja/batons/satin_kiss.jpg', 2),
(29, 'Creme Lip', 'Makeup Revolution', 'Lorem ipsum Lorem ipsum.', '4.75', 13, 'assets/img/ruben/loja/batons/creme_lip.jpg', 2),
(30, 'Velour Liquid Lipstick', 'Jeffree Star Cosmetics', 'Lorem ipsum Lorem ipsum.', '17.95', 13, 'assets/img/ruben/loja/batons/velour_liquid.jpg', 2),
(31, 'Mini Matte Lipstick Set Summer', 'Anastasia Beverly Hills', 'Desfrute do verão o mini set de batons Anastasia Beverly Hills. Contém 5 batons de diferentes tons.', '25.00', 3, 'assets/img/ruben/loja/batons/mini_matte_set_summer.jpg', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `qtd_subservicos_marcacao`
-- (See below for the actual view)
--
CREATE TABLE `qtd_subservicos_marcacao` (
`Nº marcação` int(10) unsigned
,`Qtd subserviços` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `servico`
--

CREATE TABLE `servico` (
  `id_servico` tinyint(3) UNSIGNED NOT NULL,
  `designacao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servico`
--

INSERT INTO `servico` (`id_servico`, `designacao`) VALUES
(1, 'Unhas'),
(2, 'Maquilhagem'),
(3, 'Massagens');

-- --------------------------------------------------------

--
-- Stand-in structure for view `servicos_marcacao`
-- (See below for the actual view)
--
CREATE TABLE `servicos_marcacao` (
`id_marcacao` int(10) unsigned
,`id_subservico` tinyint(3) unsigned
,`nome` varchar(100)
,`id_utilizador` int(10) unsigned
,`cliente` varchar(100)
,`valor` decimal(5,2) unsigned
);

-- --------------------------------------------------------

--
-- Table structure for table `subservico`
--

CREATE TABLE `subservico` (
  `id_subservico` tinyint(3) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` decimal(5,2) UNSIGNED NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `id_servico` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subservico`
--

INSERT INTO `subservico` (`id_subservico`, `nome`, `preco`, `imagem`, `id_servico`) VALUES
(1, 'Unhas de Gel', '20.00', 'assets/img/1.png', 1),
(2, 'Unhas de Gel C/ Extensão', '25.00', 'assets/img/2.png', 1),
(3, 'Unhas Verniz de Gel', '12.00', 'assets/img/3.png', 1),
(4, 'Unhas Verniz Normal', '5.50', 'assets/img/4.png', 1),
(5, 'Limpeza de Pele', '40.00', 'assets/img/5.png', 2),
(6, 'Maquilhagem Noiva', '65.00', 'assets/img/6.png', 2),
(7, 'Maquilhagem Convidada', '25.00', 'assets/img/7.png', 2),
(8, 'Massagem Corpo Inteiro', '35.00', 'assets/img/ruben/massagens/corpointeiro.jpg', 3),
(9, 'Massagem Costas', '25.00', 'assets/img/ruben/massagens/costas.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subservico_descricao`
--

CREATE TABLE `subservico_descricao` (
  `id_subservico` tinyint(3) UNSIGNED NOT NULL,
  `id_descricao` tinyint(3) UNSIGNED NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subservico_descricao`
--

INSERT INTO `subservico_descricao` (`id_subservico`, `id_descricao`, `descricao`) VALUES
(1, 1, 'As unhas de gel são unhas feitas à base de um gel fino e transparente. Esse material pode ser colocado sobre a unha e modelado de acordo com a forma e o tamanho que a pessoa preferir, que é um alongamento, geralmente indicado para quem tem o costume de roer as unhas.'),
(1, 2, 'De todas, as unhas de gel, ao lado das unhas de porcelana, são o tipo de unhas mais indicados. Por serem diferentes das unhas postiças, as unhas de gel também possuem durabilidade maior e são menos agressivas às unhas originais.'),
(1, 3, 'Por serem diferentes das unhas postiças, as unhas de gel também possuem durabilidade maior e são menos agressivas às unhas originais.'),
(3, 4, 'Tem a textura de um verniz semi-permanente, a cor e o brilho de umas unhas de gel, apresenta uma duração de 2 a 3 semanas: sem construção, sem lima e sem pó.'),
(4, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis necessitatibus ipsum corrupti iure veniam illum facere, minima ex placeat repellat.'),
(6, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris'),
(7, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris'),
(8, 8, 'Excelente para remover todo o stress do corpo.'),
(8, 9, 'A massagem de corpo inteiro é o melhor que pode desfrustar depois de um longo dia de trabalho. Liberte o stress do seu corpo numa sessão de massagem que o relaxará e fará sentir-se como novo.'),
(8, 10, 'Proporciona uma sensação de bem estar e relaxamento, assim como também ajuda na uniformização da pele, diminuindo rugas.'),
(9, 11, 'Massagem completa de costas com benefícios para a coluna.'),
(9, 12, 'A massagem de costas ajuda a recuperar das dores na coluna e mantém-na mais relaxada durante muito mais tempo.'),
(9, 13, 'Incluís óleos que ajudam a hidratar a pele e cremes que atuam na coluna para alivar dores.');

-- --------------------------------------------------------

--
-- Table structure for table `utilizador`
--

CREATE TABLE `utilizador` (
  `id_utilizador` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` char(9) NOT NULL,
  `rua` varchar(150) NOT NULL,
  `cod_postal` varchar(50) NOT NULL,
  `data_registo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `palavra_chave` varchar(255) NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `pergunta_seguranca` enum('Qual o nome do seu primeiro animal de estimacao?','Qual o seu livro favorito?','Qual era o seu apelido de infancia?') NOT NULL,
  `resposta_pergunta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilizador`
--

INSERT INTO `utilizador` (`id_utilizador`, `nome`, `email`, `telefone`, `rua`, `cod_postal`, `data_registo`, `palavra_chave`, `foto_perfil`, `pergunta_seguranca`, `resposta_pergunta`) VALUES
(1, 'Carolina Costa', 'carolina.costa@gmail.com', '912889251', 'Rua das Flores', '2210-132', '2023-02-10 17:15:21', '4a4f3f8dae289ae82835a8d966dfb11f237c29e45a648b01d8570f4d22d27a1173bbd8982df5d9758dfcf4ec306527ab943d6ef2e8df20e77ecf55ace3e5cecc', 'assets/img/users/emma_stone.jpg', 'Qual o nome do seu primeiro animal de estimacao?', '9248e5daf41e9037cd8b57ccaaa0fe381732cb0b37000593f57034f64f7fe69dee2660a153da851fe5f10bc45f2e85dc0ff9b2d53e6af5146db1ad78978e7f20'),
(2, 'Marta Santos', 'marta.santos@hotmail.com', '917729043', 'Urbanização das Nespereiras', '3221-562', '2023-02-10 17:15:21', 'bed4efa1d4fdbd954bd3705d6a2a78270ec9a52ecfbfb010c61862af5c76af1761ffeb1aef6aca1bf5d02b3781aa854fabd2b69c790de74e17ecfec3cb6ac4bf', 'assets/img/users/scarlett.jpg', 'Qual o seu livro favorito?', '75535893ed698f317d6e145c9ede8462d3d0df4b08451e7c1d4703a408a2571b5e834a847307971dfc4b994aa2ebac7b152cb5d02615ca418193b04358c79f07'),
(3, 'Rute Martins', 'rutemartins@gmail.com', '967838849', 'Avenida Nossa Senhora de Fátima', '1341-612', '2023-02-10 17:15:21', '42024e4f52ebc7b8f24b1aba3aab1c149504b13d76610d5f27e0fe47ed834a29a2ba54935b425ee44a8c9c359d82c3fe95a7e91d95267e83bb2a34d59d433b9b', 'assets/img/users/lawrence.jpg', 'Qual era o seu apelido de infancia?', 'f72f09fc949eaf2b6835adee7b487753bbcc0bc4962f60b3550b83ee2fd8fd6b50b23de5e5d873a11906e6a24b1abf0534d85ff7f68e87d8959a55421b29abe4');

-- --------------------------------------------------------

--
-- Stand-in structure for view `valor_total_marcacao`
-- (See below for the actual view)
--
CREATE TABLE `valor_total_marcacao` (
`Nº marcação` int(10) unsigned
,`Valor_total` decimal(27,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `viewcounter`
--

CREATE TABLE `viewcounter` (
  `contador` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `viewcounter`
--

INSERT INTO `viewcounter` (`contador`) VALUES
(1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_completa_marcacao`
-- (See below for the actual view)
--
CREATE TABLE `v_completa_marcacao` (
`n_marcacao` int(10) unsigned
,`id_utilizador` int(10) unsigned
,`cliente` varchar(100)
,`telefone` char(9)
,`qtd_subservicos` bigint(21)
,`id_subservico` tinyint(3) unsigned
,`servico` varchar(100)
,`estado` enum('Pendente','Confirmada')
,`valor` decimal(27,2)
,`data_pedido` varchar(10)
,`dataHora_pretendida` datetime
,`dataHora_confirmada` datetime
,`id_funcionario` tinyint(3) unsigned
,`funcionario` varchar(100)
,`foto_perfil` varchar(255)
,`mensagem` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_completa_produto`
-- (See below for the actual view)
--
CREATE TABLE `v_completa_produto` (
`id_produto` int(10) unsigned
,`marca` varchar(50)
,`produto` varchar(100)
,`id_categoria` tinyint(3) unsigned
,`categoria` varchar(50)
,`preco` decimal(5,2) unsigned
,`qtd_stock` smallint(5) unsigned
,`descricao` text
,`imagem` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_completa_subservico_descricao`
-- (See below for the actual view)
--
CREATE TABLE `v_completa_subservico_descricao` (
`id_subservico` tinyint(3) unsigned
,`nome` varchar(100)
,`id_descricao` tinyint(3) unsigned
,`descricao` text
);

-- --------------------------------------------------------

--
-- Structure for view `lucro_marcacoes`
--
DROP TABLE IF EXISTS `lucro_marcacoes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lucro_marcacoes`  AS  select count(distinct `ms`.`id_marcacao`) AS `N_Marcações`,sum(`s`.`preco`) AS `Lucro_Total` from ((`marcacao_subservico` `ms` join `subservico` `s` on((`ms`.`id_subservico` = `s`.`id_subservico`))) join `marcacao` `m` on((`m`.`id_marcacao` = `ms`.`id_marcacao`))) where (`m`.`estado` = 'Confirmada') ;

-- --------------------------------------------------------

--
-- Structure for view `n_fotos_galeria`
--
DROP TABLE IF EXISTS `n_fotos_galeria`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `n_fotos_galeria`  AS  select count(`fotogaleria`.`id_fotografia`) AS `Fotografias Publicadas` from `fotogaleria` ;

-- --------------------------------------------------------

--
-- Structure for view `n_produtos_categoriaproduto`
--
DROP TABLE IF EXISTS `n_produtos_categoriaproduto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `n_produtos_categoriaproduto`  AS  select `cp`.`id_categoria` AS `IDcategoria`,`cp`.`designacao` AS `Categoria`,count(`p`.`id_produto`) AS `Quantidade produtos` from (`categoriaproduto` `cp` join `produto` `p` on((`cp`.`id_categoria` = `p`.`id_categoria`))) group by `cp`.`id_categoria` order by `cp`.`id_categoria` ;

-- --------------------------------------------------------

--
-- Structure for view `qtd_subservicos_marcacao`
--
DROP TABLE IF EXISTS `qtd_subservicos_marcacao`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qtd_subservicos_marcacao`  AS  select `ms`.`id_marcacao` AS `Nº marcação`,count(`ms`.`id_subservico`) AS `Qtd subserviços` from `marcacao_subservico` `ms` group by `ms`.`id_marcacao` ;

-- --------------------------------------------------------

--
-- Structure for view `servicos_marcacao`
--
DROP TABLE IF EXISTS `servicos_marcacao`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `servicos_marcacao`  AS  select `ms`.`id_marcacao` AS `id_marcacao`,`ms`.`id_subservico` AS `id_subservico`,`ss`.`nome` AS `nome`,`m`.`id_utilizador` AS `id_utilizador`,`u`.`nome` AS `cliente`,`ss`.`preco` AS `valor` from ((((`marcacao_subservico` `ms` join `subservico` `ss` on((`ms`.`id_subservico` = `ss`.`id_subservico`))) join `marcacao` `m` on((`m`.`id_marcacao` = `ms`.`id_marcacao`))) left join `utilizador` `u` on((`u`.`id_utilizador` = `m`.`id_utilizador`))) left join `funcionario` `f` on((`f`.`id_funcionario` = `m`.`id_funcionario`))) order by `ms`.`id_marcacao` ;

-- --------------------------------------------------------

--
-- Structure for view `valor_total_marcacao`
--
DROP TABLE IF EXISTS `valor_total_marcacao`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `valor_total_marcacao`  AS  select `ms`.`id_marcacao` AS `Nº marcação`,sum(`s`.`preco`) AS `Valor_total` from (`marcacao_subservico` `ms` join `subservico` `s` on((`ms`.`id_subservico` = `s`.`id_subservico`))) group by `ms`.`id_marcacao` ;

-- --------------------------------------------------------

--
-- Structure for view `v_completa_marcacao`
--
DROP TABLE IF EXISTS `v_completa_marcacao`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_completa_marcacao`  AS  select `m`.`id_marcacao` AS `n_marcacao`,`m`.`id_utilizador` AS `id_utilizador`,`u`.`nome` AS `cliente`,`m`.`telefone` AS `telefone`,count(`ms`.`id_subservico`) AS `qtd_subservicos`,`ms`.`id_subservico` AS `id_subservico`,`ss`.`nome` AS `servico`,`m`.`estado` AS `estado`,sum(`ss`.`preco`) AS `valor`,date_format(`m`.`data_pedido`,'%Y-%m-%d') AS `data_pedido`,`m`.`dataHora_marcacao` AS `dataHora_pretendida`,`m`.`data_marcacao_confirmada` AS `dataHora_confirmada`,`m`.`id_funcionario` AS `id_funcionario`,`f`.`nome` AS `funcionario`,`u`.`foto_perfil` AS `foto_perfil`,`m`.`mensagem` AS `mensagem` from ((((`marcacao_subservico` `ms` left join `marcacao` `m` on((`ms`.`id_marcacao` = `m`.`id_marcacao`))) join `subservico` `ss` on((`ss`.`id_subservico` = `ms`.`id_subservico`))) left join `utilizador` `u` on((`u`.`id_utilizador` = `m`.`id_utilizador`))) join `funcionario` `f` on((`f`.`id_funcionario` = `m`.`id_funcionario`))) group by `m`.`id_marcacao` order by `m`.`id_marcacao` ;

-- --------------------------------------------------------

--
-- Structure for view `v_completa_produto`
--
DROP TABLE IF EXISTS `v_completa_produto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_completa_produto`  AS  select `p`.`id_produto` AS `id_produto`,`p`.`marca` AS `marca`,`p`.`nome` AS `produto`,`cp`.`id_categoria` AS `id_categoria`,`cp`.`designacao` AS `categoria`,`p`.`preco` AS `preco`,`p`.`qtd_stock` AS `qtd_stock`,`p`.`descricao` AS `descricao`,`p`.`imagem` AS `imagem` from (`produto` `p` join `categoriaproduto` `cp` on((`p`.`id_categoria` = `cp`.`id_categoria`))) group by `p`.`id_produto` order by `p`.`id_produto` desc ;

-- --------------------------------------------------------

--
-- Structure for view `v_completa_subservico_descricao`
--
DROP TABLE IF EXISTS `v_completa_subservico_descricao`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_completa_subservico_descricao`  AS  select `sd`.`id_subservico` AS `id_subservico`,`s`.`nome` AS `nome`,`sd`.`id_descricao` AS `id_descricao`,`sd`.`descricao` AS `descricao` from (`subservico_descricao` `sd` join `subservico` `s` on((`sd`.`id_subservico` = `s`.`id_subservico`))) order by `sd`.`id_subservico` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Indexes for table `categoriaproduto`
--
ALTER TABLE `categoriaproduto`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `id_servico` (`id_servico`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `fotogaleria`
--
ALTER TABLE `fotogaleria`
  ADD PRIMARY KEY (`id_fotografia`),
  ADD UNIQUE KEY `caminho` (`caminho`),
  ADD KEY `id_servico` (`id_servico`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id_home`),
  ADD UNIQUE KEY `video` (`video`);

--
-- Indexes for table `marcacao`
--
ALTER TABLE `marcacao`
  ADD PRIMARY KEY (`id_marcacao`),
  ADD KEY `id_utilizador` (`id_utilizador`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Indexes for table `marcacao_subservico`
--
ALTER TABLE `marcacao_subservico`
  ADD PRIMARY KEY (`id_marcacao`,`id_subservico`),
  ADD KEY `id_subservico` (`id_subservico`);

--
-- Indexes for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id_mensagem`);

--
-- Indexes for table `mensagem_naoautenticado`
--
ALTER TABLE `mensagem_naoautenticado`
  ADD PRIMARY KEY (`id_mensagem`);

--
-- Indexes for table `mensagem_utilizador`
--
ALTER TABLE `mensagem_utilizador`
  ADD PRIMARY KEY (`id_mensagem`),
  ADD KEY `id_utilizador` (`id_utilizador`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD UNIQUE KEY `imagem` (`imagem`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id_servico`);

--
-- Indexes for table `subservico`
--
ALTER TABLE `subservico`
  ADD PRIMARY KEY (`id_subservico`),
  ADD UNIQUE KEY `imagem` (`imagem`),
  ADD KEY `id_servico` (`id_servico`);

--
-- Indexes for table `subservico_descricao`
--
ALTER TABLE `subservico_descricao`
  ADD PRIMARY KEY (`id_subservico`,`id_descricao`),
  ADD UNIQUE KEY `id_descricao` (`id_descricao`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`id_utilizador`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telefone` (`telefone`);

--
-- Indexes for table `viewcounter`
--
ALTER TABLE `viewcounter`
  ADD PRIMARY KEY (`contador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_evento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoriaproduto`
--
ALTER TABLE `categoriaproduto`
  MODIFY `id_categoria` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fotogaleria`
--
ALTER TABLE `fotogaleria`
  MODIFY `id_fotografia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marcacao`
--
ALTER TABLE `marcacao`
  MODIFY `id_marcacao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id_mensagem` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `id_servico` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subservico`
--
ALTER TABLE `subservico`
  MODIFY `id_subservico` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id_utilizador` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`);

--
-- Constraints for table `categoriaproduto`
--
ALTER TABLE `categoriaproduto`
  ADD CONSTRAINT `categoriaproduto_ibfk_1` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`);

--
-- Constraints for table `fotogaleria`
--
ALTER TABLE `fotogaleria`
  ADD CONSTRAINT `fotogaleria_ibfk_1` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`);

--
-- Constraints for table `marcacao`
--
ALTER TABLE `marcacao`
  ADD CONSTRAINT `marcacao_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`id_utilizador`) ON DELETE CASCADE,
  ADD CONSTRAINT `marcacao_ibfk_2` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE CASCADE;

--
-- Constraints for table `marcacao_subservico`
--
ALTER TABLE `marcacao_subservico`
  ADD CONSTRAINT `marcacao_subservico_ibfk_1` FOREIGN KEY (`id_marcacao`) REFERENCES `marcacao` (`id_marcacao`) ON DELETE CASCADE,
  ADD CONSTRAINT `marcacao_subservico_ibfk_2` FOREIGN KEY (`id_subservico`) REFERENCES `subservico` (`id_subservico`) ON DELETE CASCADE;

--
-- Constraints for table `mensagem_naoautenticado`
--
ALTER TABLE `mensagem_naoautenticado`
  ADD CONSTRAINT `mensagem_naoautenticado_ibfk_1` FOREIGN KEY (`id_mensagem`) REFERENCES `mensagem` (`id_mensagem`);

--
-- Constraints for table `mensagem_utilizador`
--
ALTER TABLE `mensagem_utilizador`
  ADD CONSTRAINT `mensagem_utilizador_ibfk_1` FOREIGN KEY (`id_mensagem`) REFERENCES `mensagem` (`id_mensagem`),
  ADD CONSTRAINT `mensagem_utilizador_ibfk_2` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`id_utilizador`);

--
-- Constraints for table `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoriaproduto` (`id_categoria`);

--
-- Constraints for table `subservico`
--
ALTER TABLE `subservico`
  ADD CONSTRAINT `subservico_ibfk_1` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`);

--
-- Constraints for table `subservico_descricao`
--
ALTER TABLE `subservico_descricao`
  ADD CONSTRAINT `subservico_descricao_ibfk_1` FOREIGN KEY (`id_subservico`) REFERENCES `subservico` (`id_subservico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
