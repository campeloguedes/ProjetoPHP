-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: feitonotocanti.mysql.dbaas.com.br
-- Generation Time: 07-Jul-2017 às 14:03
-- Versão do servidor: 5.6.35-81.0-log
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feitonotocanti`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `perfil_idperfil` int(11) NOT NULL COMMENT 'Perfil',
  `nome` varchar(195) COLLATE latin1_general_ci NOT NULL COMMENT 'Nome',
  `usuario` varchar(45) COLLATE latin1_general_ci NOT NULL COMMENT 'Usuário',
  `senha` varchar(20) COLLATE latin1_general_ci NOT NULL COMMENT 'Senha',
  `foto` varchar(123) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Foto',
  `bloqueado` tinyint(4) DEFAULT NULL COMMENT 'Bloqueado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='nome';

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`idadmin`, `perfil_idperfil`, `nome`, `usuario`, `senha`, `foto`, `bloqueado`) VALUES
(1, 1, 'feitonotocantins', 'feitonotocantins', 'palmasite@', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anunciante`
--

CREATE TABLE `anunciante` (
  `idanunciante` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Título',
  `telefone` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Telefone',
  `whatsapp` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Whatsapp',
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'E-mail',
  `endereco` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Endereço',
  `bairro` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Bairro',
  `cidade` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Cidade',
  `googlemaps` longtext COLLATE latin1_general_ci NOT NULL COMMENT 'Googlemaps (Código de Incorporação)',
  `logotipo` varchar(123) COLLATE latin1_general_ci NOT NULL COMMENT 'Logotipo (65x55)',
  `sexo` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Sexo',
  `cpf` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'CPF',
  `fantasia` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Nome Fantasia',
  `cnpj` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'CNPJ',
  `telefone1` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Telefone (1)',
  `telefone2` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Telefone (2)',
  `telefone3` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Telefone (3)',
  `oqueproduz` longtext COLLATE latin1_general_ci COMMENT 'O que você produz?',
  `realizaentrega` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Realiza Entrega?',
  `formasdepagamento` longtext COLLATE latin1_general_ci COMMENT 'Formas de Pagamento',
  `atendeligacoes` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Atende Ligações?',
  `frequenciaemail` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Frequência de visualização de E-mail?',
  `autorizaosebrae` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Autoriza o Sebrae?',
  `liberado` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Esta liberado?'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='titulo*Anunciante-Anunciantes';

--
-- Extraindo dados da tabela `anunciante`
--

INSERT INTO `anunciante` (`idanunciante`, `titulo`, `telefone`, `whatsapp`, `email`, `endereco`, `bairro`, `cidade`, `googlemaps`, `logotipo`, `sexo`, `cpf`, `fantasia`, `cnpj`, `telefone1`, `telefone2`, `telefone3`, `oqueproduz`, `realizaentrega`, `formasdepagamento`, `atendeligacoes`, `frequenciaemail`, `autorizaosebrae`, `liberado`) VALUES
(1, 'Manuel Elias', '6335213557', '63999412423', 'conteudo@palmasite.com', '605 Sul, Alameda 07, Lote 22', 'Centro', 'Palmas/TO', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3731.6403519502637!2d-46.61491428507248!3d-20.72482408616377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b6c24aa871a17b%3A0x4a009724b1b35d3f!2sR.+Dr.+Manoel+Patti%2C+518+-+Muarama%2C+Passos+-+MG!5e0!3m2!1spt-BR!2sbr!4v1496770358553" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', '20170606143545.png', '', '', '', '', '', '', '', '', 0, '', 0, '', 0, 1),
(2, 'Bodestore', '6333226897', '63999412423', 'sac@bodestore.com.br', 'Quadra 605 Sul, Alameda 07, Lote 22, Qi 16', 'Centro', 'Palmas', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.4864422055616!2d-48.34799268444251!3d-10.222294992698906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x933b34e9ba9f2309%3A0x293058317b607163!2sBodestore+-+Loja+de+Artigos+Ma%C3%A7%C3%B4nicos+e+Esot%C3%A9ricos!5e0!3m2!1spt-BR!2sbr!4v1497302520889" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', '20170612181939.jpg', '', '', '', '', '', '', '', '', 0, '', 0, '', 0, 1),
(7, 'teste', '', '', '111111@teste.com', 'testet ete ', '', 'teste', '', '', '', '111111111111111111111111111111111111111', '', '11111111111111111', '', '', '', 'teste', 0, '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Nome',
  `icone` varchar(123) COLLATE latin1_general_ci NOT NULL COMMENT 'Ícone (Azul) 32x25'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='nome*Categoria-Categorias';

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nome`, `icone`) VALUES
(1, 'Alimentação', '20170606142034.png'),
(2, 'Moda e Acessórios', '20170606142247.png'),
(3, 'Lembrancinhas', '20170606142339.png'),
(4, 'Decoração', '20170606142418.png'),
(5, 'Bebê e Infantil', '20170606142448.png'),
(6, 'Capim Dourado', '20170606142527.png'),
(7, 'Artesanato', '20170606142624.png'),
(8, 'Outros', '20170606142709.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `destaque`
--

CREATE TABLE `destaque` (
  `iddestaque` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Título',
  `url` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'URL',
  `arquivo` varchar(123) COLLATE latin1_general_ci NOT NULL COMMENT 'arquivo (1920x400)',
  `posicao` int(10) UNSIGNED NOT NULL COMMENT 'Posição'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='titulo*Destaque-Destaques';

--
-- Extraindo dados da tabela `destaque`
--

INSERT INTO `destaque` (`iddestaque`, `titulo`, `url`, `arquivo`, `posicao`) VALUES
(1, 'Destaque 1', '', '20170606134722.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `geral`
--

CREATE TABLE `geral` (
  `idgeral` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'E-mail',
  `telefone` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Telefone',
  `urlfacebook` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'URL do Facebook',
  `urltwitter` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'URL do Twitter',
  `urlinstagram` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'URL do Instagram',
  `urlyoutube` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'URL do Youtube',
  `anuncinformacoes` longtext COLLATE latin1_general_ci NOT NULL COMMENT 'Anuncie (Informações)',
  `endereco` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Endereço',
  `bairro` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Bairro',
  `cidade` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Cidade',
  `googlemaps` longtext COLLATE latin1_general_ci NOT NULL COMMENT 'GoogleMaps (Código de Incorporação)',
  `objetivos` longtext COLLATE latin1_general_ci NOT NULL COMMENT 'Objetivos e Responsabilidade do Site',
  `e1icone` varchar(123) COLLATE latin1_general_ci NOT NULL COMMENT 'Etapa 1 (Ícone)',
  `e1titulo` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Etapa 1 (Título)',
  `e1descricao` longtext COLLATE latin1_general_ci NOT NULL COMMENT 'Etapa 1 (Descrição)',
  `e2icone` varchar(123) COLLATE latin1_general_ci NOT NULL COMMENT 'Etapa 2 (Ícone)',
  `e2titulo` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Etapa 2 (Título)',
  `e2descricao` longtext COLLATE latin1_general_ci NOT NULL COMMENT 'Etapa 2 (Descrição)',
  `e3icone` varchar(123) COLLATE latin1_general_ci NOT NULL COMMENT 'Etapa 3 (Ícone)',
  `e3titulo` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Etapa 3 (Título)',
  `e3descricao` longtext COLLATE latin1_general_ci NOT NULL COMMENT 'Etapa 3 (Descrição)',
  `e4icone` varchar(123) COLLATE latin1_general_ci NOT NULL COMMENT 'Etapa 4 (Ícone)',
  `e4titulo` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Etapa 4 (Titulo)',
  `e4descricao` longtext COLLATE latin1_general_ci NOT NULL COMMENT 'Etapa 4 (Descrição)',
  `parallax` varchar(123) COLLATE latin1_general_ci NOT NULL COMMENT 'Foto Parallax (Etapas Home) (1920x1080)',
  `codigoanalytics` longtext COLLATE latin1_general_ci COMMENT 'Código Analytics',
  `codigochat` longtext COLLATE latin1_general_ci COMMENT 'Código Chat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='email*Geral-Geral';

--
-- Extraindo dados da tabela `geral`
--

INSERT INTO `geral` (`idgeral`, `email`, `telefone`, `urlfacebook`, `urltwitter`, `urlinstagram`, `urlyoutube`, `anuncinformacoes`, `endereco`, `bairro`, `cidade`, `googlemaps`, `objetivos`, `e1icone`, `e1titulo`, `e1descricao`, `e2icone`, `e2titulo`, `e2descricao`, `e3icone`, `e3titulo`, `e3descricao`, `e4icone`, `e4titulo`, `e4descricao`, `parallax`, `codigoanalytics`, `codigochat`) VALUES
(1, 'feitonotocantins@to.sebrae.com.br', '08005700800', 'http://palmasite.com', 'http://palmasite.com', 'http://palmasite.com', 'http://palmasite.com', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.', '605 Sul Alameda 7', 'Centro', 'Palmas/TO', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.4872145810937!2d-48.34804328444252!3d-10.222232492698932!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9324cb5c4f2f53e9%3A0x6152811b84e5b8a!2sPALMASITE+-+Ag%C3%AAncia+Digital!5e0!3m2!1spt-BR!2sbr!4v1497304545578" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 'Sed id eleifend mi. Aliquam fringilla urna dui, a fringilla sapien eleifend molestie. Pellentesque eget felis et ligula consectetur feugiat aecenas lobortis orci ac magna gravida dignissim. Phasellus eget tempor ligula, et pulvinar ante. Maecenas tempor ante auctor magna porta, sed lobortis dolor auctored posuere lacus et posuere aliquet. Sed non leo in diam ultrices scelerisque ac vitae ante 2.', '20170606132905.png', 'Cadastre-se Grátis', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi ut dui ac felis mattis posuere.', '20170606132905.png', 'O que Fabrica?', 'Nulla cursus elit mauris, in fringilla dolor aliquam sit amet. Nunc ornare felis mauris, sit amet faucibus eros lacinia eu. Sed lacinia ligula quis lorem varius vulputate.', '20170606132905.png', 'Análise do Sebrae', 'Proin dictum, metus scelerisque aliquam vehicula, ligula lacus rutrum orci, non viverra tortor elit a mi. Mauris vulputate purusectetur.', '20170606132905.png', 'Produto Publicado', 'Nam nec malesuada urna, ac varius mi. Nullam arcu est, varius id ligula in, scelerisque blandit diam. Maecenas quis ornare ligula.', '20170606132905.jpg', 's', 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `idlog` int(11) NOT NULL,
  `dt` datetime NOT NULL,
  `tabela` varchar(120) COLLATE latin1_general_ci NOT NULL,
  `chave` int(11) NOT NULL,
  `acao` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `ip` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  `admin_idadmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`idlog`, `dt`, `tabela`, `chave`, `acao`, `ip`, `tipo`, `admin_idadmin`) VALUES
(1, '2017-06-06 13:27:00', 'admin', 1, 'login', '201.159.181.97', 1, 1),
(2, '2017-06-06 13:27:00', 'admin', 1, 'listarPorId', '201.159.181.97', 1, 1),
(3, '2017-06-06 13:43:00', 'geral', 1, 'salvar', '201.159.181.97', 2, 1),
(4, '2017-06-06 13:43:00', 'geral', 1, 'listarPorId', '201.159.181.97', 1, 1),
(5, '2017-06-06 13:44:00', 'geral', 1, 'atualizar', '201.159.181.97', 2, 1),
(6, '2017-06-06 13:44:00', 'geral', 1, 'listarPorId', '201.159.181.97', 1, 1),
(7, '2017-06-06 13:44:00', 'geral', 1, 'listarPorId', '201.159.181.97', 1, 1),
(8, '2017-06-06 13:48:00', 'destaque', 1, 'salvar', '201.159.181.97', 2, 1),
(9, '2017-06-06 13:48:00', 'destaque', 1, 'salvarPosicao', '201.159.181.97', 2, 1),
(10, '2017-06-06 13:49:00', 'noticia', 1, 'salvar', '201.159.181.97', 2, 1),
(11, '2017-06-06 13:52:00', 'noticia', 2, 'salvar', '201.159.181.97', 2, 1),
(12, '2017-06-06 13:53:00', 'noticia', 3, 'salvar', '201.159.181.97', 2, 1),
(13, '2017-06-06 13:55:00', 'noticia', 4, 'salvar', '201.159.181.97', 2, 1),
(14, '2017-06-06 13:57:00', 'parceiro', 1, 'salvar', '201.159.181.97', 2, 1),
(15, '2017-06-06 14:00:00', 'parceiro', 2, 'salvar', '201.159.181.97', 2, 1),
(16, '2017-06-06 14:01:00', 'parceiro', 3, 'salvar', '201.159.181.97', 2, 1),
(17, '2017-06-06 14:02:00', 'parceiro', 4, 'salvar', '201.159.181.97', 2, 1),
(18, '2017-06-06 14:05:00', 'parceiro', 5, 'salvar', '201.159.181.97', 2, 1),
(19, '2017-06-06 14:06:00', 'parceiro', 6, 'salvar', '201.159.181.97', 2, 1),
(20, '2017-06-06 14:08:00', 'parceiro', 7, 'salvar', '201.159.181.97', 2, 1),
(21, '2017-06-06 14:09:00', 'parceiro', 8, 'salvar', '201.159.181.97', 2, 1),
(22, '2017-06-06 14:11:00', 'paginatexto', 1, 'salvar', '201.159.181.97', 2, 1),
(23, '2017-06-06 14:12:00', 'paginatexto', 1, 'salvarPosicao', '201.159.181.97', 2, 1),
(24, '2017-06-06 14:12:00', 'paginatexto', 2, 'salvar', '201.159.181.97', 2, 1),
(25, '2017-06-06 14:12:00', 'paginatexto', 2, 'salvarPosicao', '201.159.181.97', 2, 1),
(26, '2017-06-06 14:12:00', 'paginatexto', 1, 'salvarPosicao', '201.159.181.97', 2, 1),
(27, '2017-06-06 14:12:00', 'paginatexto', 3, 'salvar', '201.159.181.97', 2, 1),
(28, '2017-06-06 14:12:00', 'paginatexto', 3, 'salvarPosicao', '201.159.181.97', 2, 1),
(29, '2017-06-06 14:12:00', 'paginatexto', 1, 'salvarPosicao', '201.159.181.97', 2, 1),
(30, '2017-06-06 14:12:00', 'paginatexto', 2, 'salvarPosicao', '201.159.181.97', 2, 1),
(31, '2017-06-06 14:12:00', 'paginatexto', 4, 'salvar', '201.159.181.97', 2, 1),
(32, '2017-06-06 14:12:00', 'paginatexto', 4, 'salvarPosicao', '201.159.181.97', 2, 1),
(33, '2017-06-06 14:12:00', 'paginatexto', 1, 'salvarPosicao', '201.159.181.97', 2, 1),
(34, '2017-06-06 14:12:00', 'paginatexto', 2, 'salvarPosicao', '201.159.181.97', 2, 1),
(35, '2017-06-06 14:12:00', 'paginatexto', 3, 'salvarPosicao', '201.159.181.97', 2, 1),
(36, '2017-06-06 14:22:00', 'categoria', 1, 'salvar', '201.159.181.97', 2, 1),
(37, '2017-06-06 14:23:00', 'categoria', 2, 'salvar', '201.159.181.97', 2, 1),
(38, '2017-06-06 14:24:00', 'categoria', 3, 'salvar', '201.159.181.97', 2, 1),
(39, '2017-06-06 14:24:00', 'categoria', 4, 'salvar', '201.159.181.97', 2, 1),
(40, '2017-06-06 14:25:00', 'categoria', 5, 'salvar', '201.159.181.97', 2, 1),
(41, '2017-06-06 14:26:00', 'categoria', 6, 'salvar', '201.159.181.97', 2, 1),
(42, '2017-06-06 14:27:00', 'categoria', 7, 'salvar', '201.159.181.97', 2, 1),
(43, '2017-06-06 14:27:00', 'categoria', 8, 'salvar', '201.159.181.97', 2, 1),
(44, '2017-06-06 14:28:00', 'subcategoria', 1, 'salvar', '201.159.181.97', 2, 1),
(45, '2017-06-06 14:28:00', 'subcategoria', 2, 'salvar', '201.159.181.97', 2, 1),
(46, '2017-06-06 14:28:00', 'subcategoria', 3, 'salvar', '201.159.181.97', 2, 1),
(47, '2017-06-06 14:28:00', 'subcategoria', 4, 'salvar', '201.159.181.97', 2, 1),
(48, '2017-06-06 14:28:00', 'subcategoria', 5, 'salvar', '201.159.181.97', 2, 1),
(49, '2017-06-06 14:29:00', 'subcategoria', 6, 'salvar', '201.159.181.97', 2, 1),
(50, '2017-06-06 14:29:00', 'subcategoria', 7, 'salvar', '201.159.181.97', 2, 1),
(51, '2017-06-06 14:29:00', 'subcategoria', 8, 'salvar', '201.159.181.97', 2, 1),
(52, '2017-06-06 14:30:00', 'subcategoria', 9, 'salvar', '201.159.181.97', 2, 1),
(53, '2017-06-06 14:30:00', 'subcategoria', 9, 'listarPorId', '201.159.181.97', 1, 1),
(54, '2017-06-06 14:30:00', 'subcategoria', 9, 'atualizar', '201.159.181.97', 2, 1),
(55, '2017-06-06 14:30:00', 'subcategoria', 10, 'salvar', '201.159.181.97', 2, 1),
(56, '2017-06-06 14:30:00', 'subcategoria', 11, 'salvar', '201.159.181.97', 2, 1),
(57, '2017-06-06 14:30:00', 'subcategoria', 12, 'salvar', '201.159.181.97', 2, 1),
(58, '2017-06-06 14:30:00', 'subcategoria', 13, 'salvar', '201.159.181.97', 2, 1),
(59, '2017-06-06 14:31:00', 'subcategoria', 14, 'salvar', '201.159.181.97', 2, 1),
(60, '2017-06-06 14:34:00', 'anunciante', 1, 'salvar', '201.159.181.97', 2, 1),
(61, '2017-06-06 14:35:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 1, 1),
(62, '2017-06-06 14:38:00', 'anunciante', 1, 'atualizar', '201.159.181.97', 2, 1),
(63, '2017-06-06 14:38:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 1, 1),
(64, '2017-06-06 14:43:00', 'produto', 1, 'salvar', '201.159.181.97', 2, 1),
(65, '2017-06-06 14:43:00', 'produtofoto', 1, 'salvar', '201.159.181.97', 2, 1),
(66, '2017-06-06 14:43:00', 'produto', 1, 'listarPorId', '201.159.181.97', 1, 1),
(67, '2017-06-06 14:44:00', 'produto', 1, 'listarPorId', '201.159.181.97', 1, 1),
(68, '2017-06-06 14:44:00', 'produto', 1, 'listarPorId', '201.159.181.97', 1, 1),
(69, '2017-06-06 14:47:00', 'produto', 2, 'salvar', '201.159.181.97', 2, 1),
(70, '2017-06-06 14:47:00', 'produtofoto', 2, 'salvar', '201.159.181.97', 2, 1),
(71, '2017-06-06 14:47:00', 'produto', 2, 'listarPorId', '201.159.181.97', 1, 1),
(72, '2017-06-06 14:49:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 1, 1),
(73, '2017-06-06 14:49:00', 'anunciante', 1, 'atualizar', '201.159.181.97', 2, 1),
(74, '2017-06-06 14:49:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 1, 1),
(75, '2017-06-06 14:50:00', 'produto', 3, 'salvar', '201.159.181.97', 2, 1),
(76, '2017-06-06 14:50:00', 'produtofoto', 3, 'salvar', '201.159.181.97', 2, 1),
(77, '2017-06-06 14:50:00', 'produto', 3, 'listarPorId', '201.159.181.97', 1, 1),
(78, '2017-06-06 14:53:00', 'produto', 4, 'salvar', '201.159.181.97', 2, 1),
(79, '2017-06-06 14:53:00', 'produtofoto', 4, 'salvar', '201.159.181.97', 2, 1),
(80, '2017-06-06 14:53:00', 'produto', 4, 'listarPorId', '201.159.181.97', 1, 1),
(81, '2017-06-06 15:01:00', 'geral', 1, 'listarPorId', '201.159.181.97', 1, 1),
(82, '2017-06-09 10:54:00', 'paginatexto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(83, '2017-06-09 10:54:00', 'paginatexto', 2, 'listarPorId', '127.0.0.1', 2, NULL),
(84, '2017-06-09 10:54:00', 'paginatexto', 3, 'listarPorId', '127.0.0.1', 2, NULL),
(85, '2017-06-09 10:54:00', 'paginatexto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(86, '2017-06-09 10:55:00', 'paginatexto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(87, '2017-06-09 10:55:00', 'paginatexto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(88, '2017-06-09 10:55:00', 'paginatexto', 2, 'listarPorId', '127.0.0.1', 2, NULL),
(89, '2017-06-09 10:55:00', 'paginatexto', 3, 'listarPorId', '127.0.0.1', 2, NULL),
(90, '2017-06-09 10:55:00', 'paginatexto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(91, '2017-06-09 10:55:00', 'paginatexto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(92, '2017-06-09 10:56:00', 'paginatexto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(93, '2017-06-09 10:56:00', 'paginatexto', 3, 'listarPorId', '127.0.0.1', 2, NULL),
(94, '2017-06-09 10:56:00', 'paginatexto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(95, '2017-06-09 11:03:00', 'noticia', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(96, '2017-06-09 11:05:00', 'paginatexto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(97, '2017-06-09 11:06:00', 'paginatexto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(98, '2017-06-09 11:06:00', 'paginatexto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(99, '2017-06-09 11:07:00', 'paginatexto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(100, '2017-06-09 11:07:00', 'paginatexto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(101, '2017-06-09 11:08:00', 'paginatexto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(102, '2017-06-09 11:08:00', 'paginatexto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(103, '2017-06-09 11:10:00', 'paginatexto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(104, '2017-06-09 11:11:00', 'paginatexto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(105, '2017-06-09 11:31:00', 'categoria', 5, 'listarPorId', '127.0.0.1', 2, NULL),
(106, '2017-06-09 11:31:00', 'categoria', 5, 'listarPorId', '127.0.0.1', 2, NULL),
(107, '2017-06-09 11:32:00', 'categoria', 5, 'listarPorId', '127.0.0.1', 2, NULL),
(108, '2017-06-09 11:32:00', 'categoria', 5, 'listarPorId', '127.0.0.1', 2, NULL),
(109, '2017-06-09 11:35:00', 'categoria', 5, 'listarPorId', '127.0.0.1', 2, NULL),
(110, '2017-06-09 11:35:00', 'categoria', 5, 'listarPorId', '127.0.0.1', 2, NULL),
(111, '2017-06-09 11:36:00', 'categoria', 5, 'listarPorId', '127.0.0.1', 2, NULL),
(112, '2017-06-09 11:36:00', 'categoria', 5, 'listarPorId', '127.0.0.1', 2, NULL),
(113, '2017-06-09 11:37:00', 'subcategoria', 2, 'listarPorId', '127.0.0.1', 2, NULL),
(114, '2017-06-09 11:37:00', 'subcategoria', 2, 'listarPorId', '127.0.0.1', 2, NULL),
(115, '2017-06-09 11:37:00', 'subcategoria', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(116, '2017-06-09 11:37:00', 'subcategoria', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(117, '2017-06-09 11:43:00', 'subcategoria', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(118, '2017-06-09 11:43:00', 'subcategoria', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(119, '2017-06-09 11:45:00', 'subcategoria', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(120, '2017-06-09 11:48:00', 'subcategoria', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(121, '2017-06-09 11:52:00', 'subcategoria', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(122, '2017-06-09 11:53:00', 'subcategoria', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(123, '2017-06-09 11:54:00', 'subcategoria', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(124, '2017-06-09 11:54:00', 'subcategoria', 2, 'listarPorId', '127.0.0.1', 2, NULL),
(125, '2017-06-09 11:55:00', 'categoria', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(126, '2017-06-09 11:55:00', 'categoria', 7, 'listarPorId', '127.0.0.1', 2, NULL),
(127, '2017-06-09 11:55:00', 'categoria', 5, 'listarPorId', '127.0.0.1', 2, NULL),
(128, '2017-06-09 11:55:00', 'categoria', 6, 'listarPorId', '127.0.0.1', 2, NULL),
(129, '2017-06-09 11:55:00', 'categoria', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(130, '2017-06-09 11:55:00', 'categoria', 2, 'listarPorId', '127.0.0.1', 2, NULL),
(131, '2017-06-09 11:56:00', 'categoria', 2, 'listarPorId', '127.0.0.1', 2, NULL),
(132, '2017-06-09 11:56:00', 'subcategoria', 13, 'listarPorId', '127.0.0.1', 2, NULL),
(133, '2017-06-09 11:56:00', 'subcategoria', 14, 'listarPorId', '127.0.0.1', 2, NULL),
(134, '2017-06-09 11:56:00', 'subcategoria', 14, 'listarPorId', '127.0.0.1', 2, NULL),
(135, '2017-06-09 13:28:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(136, '2017-06-09 13:28:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(137, '2017-06-09 13:28:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(138, '2017-06-09 13:28:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(139, '2017-06-09 13:28:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(140, '2017-06-09 13:28:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(141, '2017-06-09 13:28:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(142, '2017-06-09 13:29:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(143, '2017-06-09 13:37:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(144, '2017-06-09 13:37:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(145, '2017-06-09 13:37:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(146, '2017-06-09 13:37:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(147, '2017-06-09 13:38:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(148, '2017-06-09 13:38:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(149, '2017-06-09 13:38:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(150, '2017-06-09 13:38:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(151, '2017-06-09 13:38:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(152, '2017-06-09 13:38:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(153, '2017-06-09 13:38:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(154, '2017-06-09 13:38:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(155, '2017-06-09 13:38:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(156, '2017-06-09 13:39:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(157, '2017-06-09 13:39:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(158, '2017-06-09 13:39:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(159, '2017-06-09 13:39:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(160, '2017-06-09 13:41:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(161, '2017-06-09 13:41:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(162, '2017-06-09 13:41:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(163, '2017-06-09 13:41:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(164, '2017-06-09 13:41:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(165, '2017-06-09 13:41:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(166, '2017-06-09 13:41:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(167, '2017-06-09 13:41:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(168, '2017-06-09 13:44:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(169, '2017-06-09 13:51:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(170, '2017-06-09 13:55:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(171, '2017-06-09 13:55:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(172, '2017-06-09 13:55:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(173, '2017-06-09 13:56:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(174, '2017-06-09 13:56:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(175, '2017-06-09 13:56:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(176, '2017-06-09 14:01:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(177, '2017-06-09 14:02:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(178, '2017-06-09 14:02:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(179, '2017-06-09 14:03:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(180, '2017-06-09 14:09:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(181, '2017-06-09 14:10:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(182, '2017-06-09 14:11:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(183, '2017-06-09 14:14:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(184, '2017-06-09 14:14:00', 'categoria', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(185, '2017-06-09 14:42:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(186, '2017-06-09 14:43:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(187, '2017-06-09 14:43:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(188, '2017-06-09 14:43:00', 'paginatexto', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(189, '2017-06-09 14:43:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(190, '2017-06-09 14:44:00', 'paginatexto', 2, 'listarPorId', '170.254.199.159', 2, NULL),
(191, '2017-06-09 14:44:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(192, '2017-06-09 14:44:00', 'paginatexto', 3, 'listarPorId', '170.254.199.159', 2, NULL),
(193, '2017-06-09 14:44:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(194, '2017-06-09 14:44:00', 'paginatexto', 4, 'listarPorId', '170.254.199.159', 2, NULL),
(195, '2017-06-09 14:44:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(196, '2017-06-09 14:44:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(197, '2017-06-09 14:44:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(198, '2017-06-09 14:44:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(199, '2017-06-09 14:47:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(200, '2017-06-09 14:49:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(201, '2017-06-09 19:50:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(202, '2017-06-09 19:50:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(203, '2017-06-09 19:50:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(204, '2017-06-09 14:51:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(205, '2017-06-09 14:51:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(206, '2017-06-09 14:51:00', 'categoria', 7, 'listarPorId', '179.105.162.17', 2, NULL),
(207, '2017-06-09 19:51:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(208, '2017-06-09 19:51:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(209, '2017-06-09 19:51:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(210, '2017-06-09 19:52:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(211, '2017-06-09 19:52:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(212, '2017-06-09 19:52:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(213, '2017-06-09 14:52:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(214, '2017-06-09 14:52:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(215, '2017-06-09 14:52:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(216, '2017-06-09 14:52:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(217, '2017-06-09 14:52:00', 'categoria', 8, 'listarPorId', '179.105.162.17', 2, NULL),
(218, '2017-06-09 19:53:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(219, '2017-06-09 19:53:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(220, '2017-06-09 19:53:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(221, '2017-06-09 14:53:00', 'paginatexto', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(222, '2017-06-09 14:53:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(223, '2017-06-09 19:53:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(224, '2017-06-09 19:53:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(225, '2017-06-09 19:53:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(226, '2017-06-09 14:53:00', 'paginatexto', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(227, '2017-06-09 14:53:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(228, '2017-06-09 14:53:00', 'paginatexto', 3, 'listarPorId', '179.105.162.17', 2, NULL),
(229, '2017-06-09 14:53:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(230, '2017-06-09 14:53:00', 'paginatexto', 4, 'listarPorId', '179.105.162.17', 2, NULL),
(231, '2017-06-09 14:53:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(232, '2017-06-09 14:53:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(233, '2017-06-09 19:53:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(234, '2017-06-09 14:53:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(235, '2017-06-09 19:53:00', 'produto', 4, 'listarPorId', '::1', 2, NULL),
(236, '2017-06-09 19:53:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(237, '2017-06-09 19:53:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(238, '2017-06-09 19:54:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(239, '2017-06-09 19:54:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(240, '2017-06-09 19:54:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(241, '2017-06-09 19:54:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(242, '2017-06-09 19:54:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(243, '2017-06-09 19:54:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(244, '2017-06-09 19:54:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(245, '2017-06-09 19:54:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(246, '2017-06-09 19:54:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(247, '2017-06-09 19:55:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(248, '2017-06-09 19:55:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(249, '2017-06-09 19:55:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(250, '2017-06-09 19:56:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(251, '2017-06-09 19:56:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(252, '2017-06-09 19:56:00', 'categoria', 3, 'listarPorId', '::1', 2, NULL),
(253, '2017-06-09 19:56:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(254, '2017-06-09 19:56:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(255, '2017-06-09 19:57:00', 'categoria', 3, 'listarPorId', '::1', 2, NULL),
(256, '2017-06-09 20:00:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(257, '2017-06-09 20:00:00', 'categoria', 3, 'listarPorId', '::1', 2, NULL),
(258, '2017-06-09 20:00:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(259, '2017-06-09 20:00:00', 'categoria', 3, 'listarPorId', '::1', 2, NULL),
(260, '2017-06-09 20:00:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(261, '2017-06-09 20:00:00', 'categoria', 3, 'listarPorId', '::1', 2, NULL),
(262, '2017-06-09 20:00:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(263, '2017-06-09 20:00:00', 'categoria', 3, 'listarPorId', '::1', 2, NULL),
(264, '2017-06-09 20:00:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(265, '2017-06-09 20:00:00', 'categoria', 3, 'listarPorId', '::1', 2, NULL),
(266, '2017-06-09 20:00:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(267, '2017-06-09 20:00:00', 'categoria', 3, 'listarPorId', '::1', 2, NULL),
(268, '2017-06-09 20:01:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(269, '2017-06-09 20:01:00', 'subcategoria', 11, 'listarPorId', '::1', 2, NULL),
(270, '2017-06-09 20:03:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(271, '2017-06-09 20:03:00', 'subcategoria', 11, 'listarPorId', '::1', 2, NULL),
(272, '2017-06-09 20:03:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(273, '2017-06-09 20:03:00', 'subcategoria', 11, 'listarPorId', '::1', 2, NULL),
(274, '2017-06-09 20:03:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(275, '2017-06-09 20:03:00', 'subcategoria', 11, 'listarPorId', '::1', 2, NULL),
(276, '2017-06-09 20:03:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(277, '2017-06-09 20:03:00', 'subcategoria', 4, 'listarPorId', '::1', 2, NULL),
(278, '2017-06-09 15:03:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(279, '2017-06-09 20:04:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(280, '2017-06-09 20:04:00', 'subcategoria', 4, 'listarPorId', '::1', 2, NULL),
(281, '2017-06-09 20:04:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(282, '2017-06-09 20:04:00', 'subcategoria', 2, 'listarPorId', '::1', 2, NULL),
(283, '2017-06-09 20:04:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(284, '2017-06-09 20:04:00', 'subcategoria', 13, 'listarPorId', '::1', 2, NULL),
(285, '2017-06-09 20:04:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(286, '2017-06-09 20:04:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(287, '2017-06-09 20:04:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(288, '2017-06-09 20:05:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(289, '2017-06-09 20:05:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(290, '2017-06-09 20:05:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(291, '2017-06-09 20:06:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(292, '2017-06-09 20:06:00', 'categoria', 2, 'listarPorId', '::1', 2, NULL),
(293, '2017-06-09 20:06:00', 'produto', 3, 'listarPorId', '::1', 2, NULL),
(294, '2017-06-09 20:06:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(295, '2017-06-09 20:06:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(296, '2017-06-09 20:10:00', 'produto', 3, 'listarPorId', '::1', 2, NULL),
(297, '2017-06-09 20:10:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(298, '2017-06-09 20:10:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(299, '2017-06-09 20:10:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(300, '2017-06-09 20:10:00', 'categoria', 2, 'listarPorId', '::1', 2, NULL),
(301, '2017-06-09 20:11:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(302, '2017-06-09 20:11:00', 'categoria', 2, 'listarPorId', '::1', 2, NULL),
(303, '2017-06-09 20:11:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(304, '2017-06-09 20:11:00', 'categoria', 2, 'listarPorId', '::1', 2, NULL),
(305, '2017-06-09 20:12:00', 'produto', 4, 'listarPorId', '::1', 2, NULL),
(306, '2017-06-09 20:12:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(307, '2017-06-09 20:12:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(308, '2017-06-09 20:12:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(309, '2017-06-09 20:12:00', 'categoria', 2, 'listarPorId', '::1', 2, NULL),
(310, '2017-06-09 20:12:00', 'produto', 3, 'listarPorId', '::1', 2, NULL),
(311, '2017-06-09 20:12:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(312, '2017-06-09 20:12:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(313, '2017-06-09 20:12:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(314, '2017-06-09 20:12:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(315, '2017-06-09 20:12:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(316, '2017-06-09 20:12:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(317, '2017-06-09 20:13:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(318, '2017-06-09 20:13:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(319, '2017-06-09 20:13:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(320, '2017-06-09 20:14:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(321, '2017-06-09 20:16:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(322, '2017-06-09 20:16:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(323, '2017-06-09 20:20:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(324, '2017-06-09 20:21:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(325, '2017-06-09 20:21:00', 'noticia', 1, 'listarPorId', '::1', 2, NULL),
(326, '2017-06-09 20:21:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(327, '2017-06-09 20:21:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(328, '2017-06-09 20:21:00', 'paginatexto', 4, 'listarPorId', '::1', 2, NULL),
(329, '2017-06-09 20:21:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(330, '2017-06-09 20:21:00', 'paginatexto', 3, 'listarPorId', '::1', 2, NULL),
(331, '2017-06-09 20:21:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(332, '2017-06-09 20:21:00', 'paginatexto', 2, 'listarPorId', '::1', 2, NULL),
(333, '2017-06-09 20:21:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(334, '2017-06-09 20:21:00', 'paginatexto', 4, 'listarPorId', '::1', 2, NULL),
(335, '2017-06-09 20:21:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(336, '2017-06-09 20:23:00', 'paginatexto', 4, 'listarPorId', '::1', 2, NULL),
(337, '2017-06-09 20:23:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(338, '2017-06-09 20:23:00', 'paginatexto', 2, 'listarPorId', '::1', 2, NULL),
(339, '2017-06-09 20:23:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(340, '2017-06-09 20:24:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(341, '2017-06-09 20:24:00', 'categoria', 2, 'listarPorId', '::1', 2, NULL),
(342, '2017-06-09 20:25:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(343, '2017-06-09 20:25:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(344, '2017-06-09 20:25:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(345, '2017-06-09 15:25:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(346, '2017-06-09 15:25:00', 'categoria', 7, 'listarPorId', '179.105.162.17', 2, NULL),
(347, '2017-06-09 15:25:00', 'produto', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(348, '2017-06-09 15:25:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(349, '2017-06-09 15:25:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(350, '2017-06-09 15:25:00', 'produto', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(351, '2017-06-09 15:25:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(352, '2017-06-09 15:25:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(353, '2017-06-09 15:25:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(354, '2017-06-09 15:25:00', 'categoria', 2, 'listarPorId', '201.159.181.97', 2, NULL),
(355, '2017-06-09 15:25:00', 'produto', 3, 'listarPorId', '201.159.181.97', 2, NULL),
(356, '2017-06-09 15:25:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(357, '2017-06-09 15:25:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(358, '2017-06-09 15:25:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(359, '2017-06-09 15:25:00', 'categoria', 2, 'listarPorId', '201.159.181.97', 2, NULL),
(360, '2017-06-09 15:25:00', 'produto', 2, 'listarPorId', '201.159.181.97', 2, NULL),
(361, '2017-06-09 15:25:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(362, '2017-06-09 15:25:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(363, '2017-06-09 15:26:00', 'produto', 2, 'listarPorId', '201.159.181.97', 2, NULL),
(364, '2017-06-09 15:26:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(365, '2017-06-09 15:26:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(366, '2017-06-09 15:26:00', 'produto', 2, 'listarPorId', '201.159.181.97', 2, NULL),
(367, '2017-06-09 15:26:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(368, '2017-06-09 15:26:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(369, '2017-06-09 15:26:00', 'produto', 2, 'listarPorId', '201.159.181.97', 2, NULL),
(370, '2017-06-09 15:26:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(371, '2017-06-09 15:26:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(372, '2017-06-09 20:26:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(373, '2017-06-09 20:26:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(374, '2017-06-09 20:27:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(375, '2017-06-09 15:28:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(376, '2017-06-09 15:28:00', 'produto', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(377, '2017-06-09 15:28:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(378, '2017-06-09 15:28:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(379, '2017-06-09 15:29:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(380, '2017-06-09 15:29:00', 'categoria', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(381, '2017-06-09 15:29:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(382, '2017-06-09 15:29:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(383, '2017-06-09 15:29:00', 'paginatexto', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(384, '2017-06-09 15:29:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(385, '2017-06-09 15:29:00', 'paginatexto', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(386, '2017-06-09 15:29:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(387, '2017-06-09 15:29:00', 'paginatexto', 3, 'listarPorId', '179.105.162.17', 2, NULL),
(388, '2017-06-09 15:29:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(389, '2017-06-09 15:29:00', 'paginatexto', 4, 'listarPorId', '179.105.162.17', 2, NULL),
(390, '2017-06-09 15:29:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(391, '2017-06-09 15:29:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(392, '2017-06-09 15:29:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(393, '2017-06-09 15:29:00', 'noticia', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(394, '2017-06-09 15:29:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(395, '2017-06-09 15:29:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(396, '2017-06-09 15:29:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(397, '2017-06-09 15:29:00', 'categoria', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(398, '2017-06-09 15:30:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(399, '2017-06-09 15:30:00', 'subcategoria', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(400, '2017-06-09 15:30:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(401, '2017-06-09 15:30:00', 'categoria', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(402, '2017-06-09 15:30:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(403, '2017-06-09 15:30:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(404, '2017-06-09 15:41:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(405, '2017-06-09 15:41:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(406, '2017-06-09 15:42:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(407, '2017-06-09 15:42:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(408, '2017-06-09 15:43:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(409, '2017-06-09 15:47:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(410, '2017-06-09 15:47:00', 'categoria', 7, 'listarPorId', '179.105.162.17', 2, NULL),
(411, '2017-06-09 15:47:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(412, '2017-06-09 15:47:00', 'categoria', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(413, '2017-06-09 15:47:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(414, '2017-06-09 15:47:00', 'categoria', 6, 'listarPorId', '179.105.162.17', 2, NULL),
(415, '2017-06-09 15:47:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(416, '2017-06-09 15:47:00', 'categoria', 4, 'listarPorId', '179.105.162.17', 2, NULL),
(417, '2017-06-09 15:47:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(418, '2017-06-09 15:47:00', 'categoria', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(419, '2017-06-09 15:47:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(420, '2017-06-09 15:47:00', 'categoria', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(421, '2017-06-09 15:52:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(422, '2017-06-09 15:52:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(423, '2017-06-09 15:52:00', 'categoria', 7, 'listarPorId', '179.105.162.17', 2, NULL),
(424, '2017-06-09 15:52:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(425, '2017-06-09 15:52:00', 'categoria', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(426, '2017-06-09 15:52:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(427, '2017-06-09 15:52:00', 'categoria', 6, 'listarPorId', '179.105.162.17', 2, NULL),
(428, '2017-06-09 15:52:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(429, '2017-06-09 15:53:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(430, '2017-06-09 15:53:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(431, '2017-06-09 15:53:00', 'categoria', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(432, '2017-06-09 15:53:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(433, '2017-06-09 15:53:00', 'produto', 4, 'listarPorId', '179.105.162.17', 2, NULL),
(434, '2017-06-09 15:53:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(435, '2017-06-09 15:53:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(436, '2017-06-09 15:53:00', 'produto', 3, 'listarPorId', '179.105.162.17', 2, NULL),
(437, '2017-06-09 15:53:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(438, '2017-06-09 15:53:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(439, '2017-06-09 15:54:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(440, '2017-06-09 15:54:00', 'categoria', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(441, '2017-06-09 15:54:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(442, '2017-06-09 15:55:00', 'admin', 1, 'login', '179.105.162.17', 1, 1),
(443, '2017-06-09 15:55:00', 'admin', 1, 'listarPorId', '179.105.162.17', 1, 1),
(444, '2017-06-09 15:56:00', 'categoria', 7, 'listarPorId', '179.105.162.17', 1, 1),
(445, '2017-06-09 15:56:00', 'categoria', 7, 'atualizar', '179.105.162.17', 2, 1),
(446, '2017-06-09 15:56:00', 'categoria', 7, 'listarPorId', '179.105.162.17', 1, 1),
(447, '2017-06-09 15:56:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(448, '2017-06-09 15:56:00', 'categoria', 7, 'atualizar', '179.105.162.17', 2, 1),
(449, '2017-06-09 15:56:00', 'categoria', 7, 'listarPorId', '179.105.162.17', 1, 1),
(450, '2017-06-09 15:56:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(451, '2017-06-09 15:57:00', 'subcategoria', 15, 'salvar', '179.105.162.17', 2, 1),
(452, '2017-06-09 15:57:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(453, '2017-06-09 15:57:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(454, '2017-06-09 15:57:00', 'categoria', 8, 'listarPorId', '179.105.162.17', 2, NULL),
(455, '2017-06-09 15:57:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(456, '2017-06-09 15:57:00', 'subcategoria', 15, 'listarPorId', '179.105.162.17', 2, NULL),
(457, '2017-06-09 15:57:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(458, '2017-06-09 15:57:00', 'categoria', 8, 'listarPorId', '179.105.162.17', 2, NULL),
(459, '2017-06-09 15:58:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(460, '2017-06-09 15:59:00', 'produto', 4, 'listarPorId', '170.254.199.159', 2, NULL),
(461, '2017-06-09 15:59:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(462, '2017-06-09 15:59:00', 'anunciante', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(463, '2017-06-09 15:59:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(464, '2017-06-09 16:00:00', 'produto', 5, 'salvar', '179.105.162.17', 2, 1),
(465, '2017-06-09 16:00:00', 'produtofoto', 5, 'salvar', '179.105.162.17', 2, 1),
(466, '2017-06-09 16:00:00', 'produto', 5, 'listarPorId', '179.105.162.17', 1, 1),
(467, '2017-06-09 16:01:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(468, '2017-06-09 16:01:00', 'produto', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(469, '2017-06-09 16:01:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(470, '2017-06-09 16:01:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(471, '2017-06-09 16:03:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 1, 1),
(472, '2017-06-09 16:04:00', 'anunciante', 1, 'atualizar', '179.105.162.17', 2, 1),
(473, '2017-06-09 16:04:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 1, 1),
(474, '2017-06-09 16:04:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(475, '2017-06-09 16:04:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(476, '2017-06-09 16:04:00', 'categoria', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(477, '2017-06-09 16:04:00', 'produto', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(478, '2017-06-09 16:04:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(479, '2017-06-09 16:04:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(480, '2017-06-09 16:05:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(481, '2017-06-09 16:06:00', 'anunciante', 1, 'atualizar', '179.105.162.17', 2, 1),
(482, '2017-06-09 16:06:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 1, 1),
(483, '2017-06-09 16:06:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(484, '2017-06-09 16:06:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(485, '2017-06-09 16:06:00', 'categoria', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(486, '2017-06-09 16:06:00', 'produto', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(487, '2017-06-09 16:06:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(488, '2017-06-09 16:06:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(489, '2017-06-09 16:08:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(490, '2017-06-09 16:13:00', 'produto', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(491, '2017-06-09 16:13:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(492, '2017-06-09 16:13:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(493, '2017-06-09 16:19:00', 'geral', 1, 'listarPorId', '179.105.162.17', 1, 1),
(494, '2017-06-09 16:23:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(495, '2017-06-09 16:26:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(496, '2017-06-09 16:29:00', 'produto', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(497, '2017-06-09 16:29:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(498, '2017-06-09 16:29:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(499, '2017-06-09 16:32:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(500, '2017-06-09 16:34:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(501, '2017-06-09 16:35:00', 'produto', 5, 'listarPorId', '179.105.162.17', 1, 1),
(502, '2017-06-09 16:35:00', 'produto', 5, 'atualizar', '179.105.162.17', 2, 1),
(503, '2017-06-09 16:35:00', 'produtofoto', 5, 'atualizar', '179.105.162.17', 2, 1),
(504, '2017-06-09 16:35:00', 'produto', 5, 'listarPorId', '179.105.162.17', 1, 1),
(505, '2017-06-09 16:35:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(506, '2017-06-09 16:35:00', 'produto', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(507, '2017-06-09 16:35:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(508, '2017-06-09 16:35:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(509, '2017-06-09 16:37:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(510, '2017-06-09 16:38:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(511, '2017-06-09 16:39:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(512, '2017-06-09 16:39:00', 'produto', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(513, '2017-06-09 16:39:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(514, '2017-06-09 16:39:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(515, '2017-06-09 16:46:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(516, '2017-06-09 16:46:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(517, '2017-06-09 16:46:00', 'categoria', 5, 'listarPorId', '170.254.199.159', 2, NULL),
(518, '2017-06-09 16:46:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(519, '2017-06-09 16:46:00', 'categoria', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(520, '2017-06-09 16:46:00', 'produto', 5, 'listarPorId', '170.254.199.159', 2, NULL),
(521, '2017-06-09 16:46:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(522, '2017-06-09 16:46:00', 'anunciante', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(523, '2017-06-09 16:49:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(524, '2017-06-09 16:49:00', 'categoria', 6, 'listarPorId', '170.254.199.159', 2, NULL),
(525, '2017-06-09 16:50:00', 'produto', 5, 'listarPorId', '179.105.162.17', 1, 1),
(526, '2017-06-09 16:50:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 1, 1),
(527, '2017-06-09 16:50:00', 'categoria', 1, 'listarPorId', '179.105.162.17', 1, 1),
(528, '2017-06-09 16:50:00', 'subcategoria', 1, 'listarPorId', '179.105.162.17', 1, 1),
(529, '2017-06-09 16:50:00', 'categoria', 1, 'listarPorId', '179.105.162.17', 1, 1),
(530, '2017-06-09 16:51:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(531, '2017-06-09 16:51:00', 'categoria', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(532, '2017-06-09 16:51:00', 'produto', 5, 'listarPorId', '170.254.199.159', 2, NULL),
(533, '2017-06-09 16:51:00', 'geral', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(534, '2017-06-09 16:51:00', 'anunciante', 1, 'listarPorId', '170.254.199.159', 2, NULL),
(535, '2017-06-09 21:52:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(536, '2017-06-09 21:52:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(537, '2017-06-09 21:52:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(538, '2017-06-09 21:52:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(539, '2017-06-09 21:53:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(540, '2017-06-09 21:53:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(541, '2017-06-09 21:53:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(542, '2017-06-09 21:53:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(543, '2017-06-09 21:55:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(544, '2017-06-09 21:55:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(545, '2017-06-09 21:56:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(546, '2017-06-09 21:56:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(547, '2017-06-09 21:57:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(548, '2017-06-09 21:57:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(549, '2017-06-09 21:57:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(550, '2017-06-09 21:57:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(551, '2017-06-09 21:57:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(552, '2017-06-09 21:58:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(553, '2017-06-09 21:58:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(554, '2017-06-09 21:58:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(555, '2017-06-09 21:58:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(556, '2017-06-09 21:58:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(557, '2017-06-09 21:59:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(558, '2017-06-09 21:59:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(559, '2017-06-09 21:59:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(560, '2017-06-09 21:59:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(561, '2017-06-09 21:59:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(562, '2017-06-09 21:59:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(563, '2017-06-09 22:00:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(564, '2017-06-09 22:00:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(565, '2017-06-09 22:00:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(566, '2017-06-09 22:00:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(567, '2017-06-09 22:00:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(568, '2017-06-09 22:01:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(569, '2017-06-09 22:01:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(570, '2017-06-09 22:01:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(571, '2017-06-09 22:01:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(572, '2017-06-09 22:02:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(573, '2017-06-09 22:02:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(574, '2017-06-09 22:03:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(575, '2017-06-09 22:03:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(576, '2017-06-09 22:05:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(577, '2017-06-09 22:06:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(578, '2017-06-09 22:07:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(579, '2017-06-09 22:07:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(580, '2017-06-09 22:07:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(581, '2017-06-09 22:08:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(582, '2017-06-09 22:09:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(583, '2017-06-09 22:09:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(584, '2017-06-09 22:09:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(585, '2017-06-09 22:09:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(586, '2017-06-09 22:10:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(587, '2017-06-09 22:10:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(588, '2017-06-09 22:10:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(589, '2017-06-09 17:17:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(590, '2017-06-09 22:29:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(591, '2017-06-09 17:31:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(592, '2017-06-09 17:31:00', 'geral', 1, 'listarPorId', '179.105.162.17', 1, 1),
(593, '2017-06-09 17:35:00', 'parceiro', 9, 'salvar', '179.105.162.17', 2, 1),
(594, '2017-06-09 17:35:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(595, '2017-06-09 17:36:00', 'geral', 1, 'listarPorId', '179.105.162.17', 1, 1),
(596, '2017-06-09 17:36:00', 'geral', 1, 'atualizar', '179.105.162.17', 2, 1),
(597, '2017-06-09 17:36:00', 'geral', 1, 'listarPorId', '179.105.162.17', 1, 1),
(598, '2017-06-09 17:37:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(599, '2017-06-09 17:37:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(600, '2017-06-09 17:37:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(601, '2017-06-09 17:37:00', 'categoria', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(602, '2017-06-09 17:37:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(603, '2017-06-09 17:37:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(604, '2017-06-09 17:37:00', 'produto', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(605, '2017-06-09 17:37:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(606, '2017-06-09 17:37:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(607, '2017-06-09 17:38:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(608, '2017-06-09 17:38:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(609, '2017-06-09 17:38:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(610, '2017-06-09 17:38:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(611, '2017-06-09 17:38:00', 'noticia', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(612, '2017-06-09 17:38:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(613, '2017-06-09 17:38:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(614, '2017-06-09 17:38:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(615, '2017-06-12 08:59:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(616, '2017-06-12 09:05:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(617, '2017-06-12 09:05:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(618, '2017-06-12 09:05:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(619, '2017-06-12 09:09:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(620, '2017-06-12 09:10:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(621, '2017-06-12 09:11:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(622, '2017-06-12 09:18:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(623, '2017-06-12 09:18:00', 'categoria', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(624, '2017-06-12 09:20:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(625, '2017-06-12 09:20:00', 'categoria', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(626, '2017-06-12 09:28:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(627, '2017-06-12 09:28:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(628, '2017-06-12 09:28:00', 'categoria', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(629, '2017-06-12 09:28:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL);
INSERT INTO `log` (`idlog`, `dt`, `tabela`, `chave`, `acao`, `ip`, `tipo`, `admin_idadmin`) VALUES
(630, '2017-06-12 09:28:00', 'produto', 5, 'listarPorId', '201.159.181.97', 2, NULL),
(631, '2017-06-12 09:28:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(632, '2017-06-12 09:28:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(633, '2017-06-12 09:30:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(634, '2017-06-12 09:34:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(635, '2017-06-12 09:34:00', 'categoria', 8, 'listarPorId', '127.0.0.1', 2, NULL),
(636, '2017-06-12 09:35:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(637, '2017-06-12 09:36:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(638, '2017-06-12 09:37:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(639, '2017-06-12 09:37:00', 'categoria', 7, 'listarPorId', '179.105.162.17', 2, NULL),
(640, '2017-06-12 09:40:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(641, '2017-06-12 09:41:00', 'categoria', 8, 'listarPorId', '127.0.0.1', 2, NULL),
(642, '2017-06-12 09:43:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(643, '2017-06-12 09:43:00', 'categoria', 8, 'listarPorId', '127.0.0.1', 2, NULL),
(644, '2017-06-12 09:49:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(645, '2017-06-12 09:49:00', 'categoria', 8, 'listarPorId', '127.0.0.1', 2, NULL),
(646, '2017-06-12 09:49:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(647, '2017-06-12 09:49:00', 'categoria', 8, 'listarPorId', '127.0.0.1', 2, NULL),
(648, '2017-06-12 09:53:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(649, '2017-06-12 09:53:00', 'categoria', 8, 'listarPorId', '127.0.0.1', 2, NULL),
(650, '2017-06-12 09:53:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(651, '2017-06-12 09:53:00', 'categoria', 8, 'listarPorId', '127.0.0.1', 2, NULL),
(652, '2017-06-12 09:53:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(653, '2017-06-12 09:53:00', 'categoria', 8, 'listarPorId', '127.0.0.1', 2, NULL),
(654, '2017-06-12 09:54:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(655, '2017-06-12 09:54:00', 'categoria', 8, 'listarPorId', '127.0.0.1', 2, NULL),
(656, '2017-06-12 10:06:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(657, '2017-06-12 10:06:00', 'categoria', 8, 'listarPorId', '127.0.0.1', 2, NULL),
(658, '2017-06-12 10:06:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(659, '2017-06-12 10:06:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(660, '2017-06-12 10:07:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(661, '2017-06-12 10:11:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(662, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(663, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(664, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(665, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(666, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(667, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(668, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(669, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(670, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(671, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(672, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(673, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(674, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(675, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(676, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(677, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(678, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(679, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(680, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(681, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(682, '2017-06-12 10:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(683, '2017-06-12 10:21:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(684, '2017-06-12 10:21:00', 'produto', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(685, '2017-06-12 10:21:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(686, '2017-06-12 10:21:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(687, '2017-06-12 10:22:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(688, '2017-06-12 10:22:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(689, '2017-06-12 10:22:00', 'categoria', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(690, '2017-06-12 10:22:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(691, '2017-06-12 10:22:00', 'subcategoria', 4, 'listarPorId', '179.105.162.17', 2, NULL),
(692, '2017-06-12 10:22:00', 'paginatexto', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(693, '2017-06-12 10:22:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(694, '2017-06-12 10:22:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(695, '2017-06-12 10:45:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(696, '2017-06-12 11:27:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(697, '2017-06-12 11:49:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(698, '2017-06-12 11:49:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(699, '2017-06-12 11:50:00', 'produto', 4, 'listarPorId', '179.105.162.17', 2, NULL),
(700, '2017-06-12 11:50:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(701, '2017-06-12 11:50:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(702, '2017-06-12 11:50:00', 'produto', 4, 'listarPorId', '179.105.162.17', 2, NULL),
(703, '2017-06-12 11:50:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(704, '2017-06-12 11:50:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(705, '2017-06-12 11:52:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(706, '2017-06-12 19:21:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(707, '2017-06-12 19:28:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(708, '2017-06-12 19:28:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(709, '2017-06-12 19:28:00', 'subcategoria', 1, 'listarPorId', '::1', 2, NULL),
(710, '2017-06-12 19:29:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(711, '2017-06-12 19:29:00', 'subcategoria', 1, 'listarPorId', '::1', 2, NULL),
(712, '2017-06-12 19:29:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(713, '2017-06-12 19:29:00', 'subcategoria', 1, 'listarPorId', '::1', 2, NULL),
(714, '2017-06-12 19:29:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(715, '2017-06-12 19:29:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(716, '2017-06-12 19:30:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(717, '2017-06-12 19:30:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(718, '2017-06-12 19:31:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(719, '2017-06-12 19:31:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(720, '2017-06-12 19:31:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(721, '2017-06-12 19:31:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(722, '2017-06-12 19:31:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(723, '2017-06-12 19:31:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(724, '2017-06-12 19:32:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(725, '2017-06-12 19:32:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(726, '2017-06-12 19:32:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(727, '2017-06-12 19:32:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(728, '2017-06-12 19:32:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(729, '2017-06-12 19:32:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(730, '2017-06-12 19:32:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(731, '2017-06-12 19:32:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(732, '2017-06-12 19:33:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(733, '2017-06-12 19:33:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(734, '2017-06-12 19:33:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(735, '2017-06-12 19:33:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(736, '2017-06-12 19:33:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(737, '2017-06-12 19:33:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(738, '2017-06-12 19:34:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(739, '2017-06-12 19:34:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(740, '2017-06-12 19:34:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(741, '2017-06-12 19:34:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(742, '2017-06-12 19:35:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(743, '2017-06-12 19:35:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(744, '2017-06-12 19:35:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(745, '2017-06-12 19:35:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(746, '2017-06-12 19:35:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(747, '2017-06-12 19:35:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(748, '2017-06-12 19:36:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(749, '2017-06-12 19:36:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(750, '2017-06-12 19:36:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(751, '2017-06-12 19:36:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(752, '2017-06-12 19:36:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(753, '2017-06-12 19:36:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(754, '2017-06-12 19:36:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(755, '2017-06-12 19:36:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(756, '2017-06-12 19:36:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(757, '2017-06-12 19:36:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(758, '2017-06-12 19:37:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(759, '2017-06-12 19:37:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(760, '2017-06-12 19:37:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(761, '2017-06-12 19:37:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(762, '2017-06-12 19:37:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(763, '2017-06-12 19:37:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(764, '2017-06-12 19:37:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(765, '2017-06-12 19:37:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(766, '2017-06-12 19:37:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(767, '2017-06-12 19:37:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(768, '2017-06-12 19:39:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(769, '2017-06-12 19:39:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(770, '2017-06-12 19:41:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(771, '2017-06-12 19:41:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(772, '2017-06-12 19:42:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(773, '2017-06-12 19:42:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(774, '2017-06-12 19:42:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(775, '2017-06-12 19:42:00', 'categoria', 1, 'listarPorId', '::1', 2, NULL),
(776, '2017-06-12 19:42:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(777, '2017-06-12 19:43:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(778, '2017-06-12 19:44:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(779, '2017-06-12 19:44:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(780, '2017-06-12 19:44:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(781, '2017-06-12 19:44:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(782, '2017-06-12 19:45:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(783, '2017-06-12 19:47:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(784, '2017-06-12 19:47:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(785, '2017-06-12 19:47:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(786, '2017-06-12 19:48:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(787, '2017-06-12 19:49:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(788, '2017-06-12 19:51:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(789, '2017-06-12 19:52:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(790, '2017-06-12 19:52:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(791, '2017-06-12 19:52:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(792, '2017-06-12 19:59:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(793, '2017-06-12 19:59:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(794, '2017-06-12 19:59:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(795, '2017-06-12 20:00:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(796, '2017-06-12 20:00:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(797, '2017-06-12 20:00:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(798, '2017-06-12 20:01:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(799, '2017-06-12 20:01:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(800, '2017-06-12 20:01:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(801, '2017-06-12 20:02:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(802, '2017-06-12 20:02:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(803, '2017-06-12 20:02:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(804, '2017-06-12 20:03:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(805, '2017-06-12 20:03:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(806, '2017-06-12 20:03:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(807, '2017-06-12 20:05:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(808, '2017-06-12 20:05:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(809, '2017-06-12 20:05:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(810, '2017-06-12 20:05:00', 'produto', 3, 'listarPorId', '::1', 2, NULL),
(811, '2017-06-12 20:05:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(812, '2017-06-12 20:05:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(813, '2017-06-12 20:05:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(814, '2017-06-12 20:05:00', 'produto', 4, 'listarPorId', '::1', 2, NULL),
(815, '2017-06-12 20:05:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(816, '2017-06-12 20:05:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(817, '2017-06-12 20:05:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(818, '2017-06-12 20:05:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(819, '2017-06-12 20:05:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(820, '2017-06-12 20:05:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(821, '2017-06-12 20:05:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(822, '2017-06-12 20:05:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(823, '2017-06-12 20:05:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(824, '2017-06-12 20:05:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(825, '2017-06-12 20:06:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(826, '2017-06-12 20:06:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(827, '2017-06-12 20:06:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(828, '2017-06-12 20:07:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(829, '2017-06-12 20:07:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(830, '2017-06-12 20:07:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(831, '2017-06-12 20:07:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(832, '2017-06-12 20:07:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(833, '2017-06-12 20:07:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(834, '2017-06-12 20:07:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(835, '2017-06-12 20:07:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(836, '2017-06-12 20:07:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(837, '2017-06-12 20:11:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(838, '2017-06-12 20:11:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(839, '2017-06-12 20:11:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(840, '2017-06-12 20:12:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(841, '2017-06-12 20:12:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(842, '2017-06-12 20:12:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(843, '2017-06-12 20:13:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(844, '2017-06-12 20:13:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(845, '2017-06-12 20:13:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(846, '2017-06-12 20:13:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(847, '2017-06-12 20:13:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(848, '2017-06-12 20:14:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(849, '2017-06-12 20:14:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(850, '2017-06-12 20:14:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(851, '2017-06-12 20:14:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(852, '2017-06-12 20:14:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(853, '2017-06-12 20:14:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(854, '2017-06-12 20:15:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(855, '2017-06-12 20:15:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(856, '2017-06-12 20:15:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(857, '2017-06-12 20:15:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(858, '2017-06-12 20:15:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(859, '2017-06-12 20:15:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(860, '2017-06-12 20:15:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(861, '2017-06-12 20:15:00', 'produto', 4, 'listarPorId', '::1', 2, NULL),
(862, '2017-06-12 20:15:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(863, '2017-06-12 20:15:00', 'produto', 3, 'listarPorId', '::1', 2, NULL),
(864, '2017-06-12 20:15:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(865, '2017-06-12 20:15:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(866, '2017-06-12 20:15:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(867, '2017-06-12 20:15:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(868, '2017-06-12 20:16:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(869, '2017-06-12 20:16:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(870, '2017-06-12 20:16:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(871, '2017-06-12 20:16:00', 'produto', 3, 'listarPorId', '::1', 2, NULL),
(872, '2017-06-12 20:16:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(873, '2017-06-12 20:16:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(874, '2017-06-12 20:16:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(875, '2017-06-12 20:16:00', 'produto', 4, 'listarPorId', '::1', 2, NULL),
(876, '2017-06-12 20:16:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(877, '2017-06-12 20:16:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(878, '2017-06-12 20:16:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(879, '2017-06-12 20:16:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(880, '2017-06-12 20:16:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(881, '2017-06-12 20:16:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(882, '2017-06-12 15:23:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(883, '2017-06-12 15:24:00', 'produto', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(884, '2017-06-12 15:24:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(885, '2017-06-12 15:24:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(886, '2017-06-12 15:24:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(887, '2017-06-12 15:24:00', 'produto', 4, 'listarPorId', '179.105.162.17', 2, NULL),
(888, '2017-06-12 15:24:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(889, '2017-06-12 15:24:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(890, '2017-06-12 15:24:00', 'produto', 4, 'listarPorId', '179.105.162.17', 2, NULL),
(891, '2017-06-12 15:24:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(892, '2017-06-12 15:24:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(893, '2017-06-12 20:26:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(894, '2017-06-12 20:26:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(895, '2017-06-12 20:26:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(896, '2017-06-12 15:26:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(897, '2017-06-12 15:27:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(898, '2017-06-12 15:27:00', 'produto', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(899, '2017-06-12 15:27:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(900, '2017-06-12 15:27:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(901, '2017-06-12 15:27:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(902, '2017-06-12 15:27:00', 'produto', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(903, '2017-06-12 15:27:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(904, '2017-06-12 15:27:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(905, '2017-06-12 15:27:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(906, '2017-06-12 15:28:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(907, '2017-06-12 20:28:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(908, '2017-06-12 20:28:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(909, '2017-06-12 20:28:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(910, '2017-06-12 15:30:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(911, '2017-06-12 20:30:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(912, '2017-06-12 20:30:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(913, '2017-06-12 20:30:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(914, '2017-06-12 15:30:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(915, '2017-06-12 15:31:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(916, '2017-06-12 20:31:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(917, '2017-06-12 20:31:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(918, '2017-06-12 20:31:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(919, '2017-06-12 15:32:00', 'produto', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(920, '2017-06-12 15:32:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(921, '2017-06-12 15:32:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(922, '2017-06-12 15:32:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(923, '2017-06-12 15:32:00', 'categoria', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(924, '2017-06-12 15:32:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(925, '2017-06-12 15:32:00', 'categoria', 7, 'listarPorId', '179.105.162.17', 2, NULL),
(926, '2017-06-12 15:32:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(927, '2017-06-12 15:32:00', 'categoria', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(928, '2017-06-12 15:32:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(929, '2017-06-12 15:32:00', 'categoria', 6, 'listarPorId', '179.105.162.17', 2, NULL),
(930, '2017-06-12 15:32:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(931, '2017-06-12 15:32:00', 'categoria', 4, 'listarPorId', '179.105.162.17', 2, NULL),
(932, '2017-06-12 15:32:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(933, '2017-06-12 15:32:00', 'categoria', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(934, '2017-06-12 15:33:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(935, '2017-06-12 15:33:00', 'categoria', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(936, '2017-06-12 15:33:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(937, '2017-06-12 15:33:00', 'categoria', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(938, '2017-06-12 20:33:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(939, '2017-06-12 20:33:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(940, '2017-06-12 20:33:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(941, '2017-06-12 15:33:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(942, '2017-06-12 20:33:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(943, '2017-06-12 20:33:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(944, '2017-06-12 20:33:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(945, '2017-06-12 15:33:00', 'categoria', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(946, '2017-06-12 15:33:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(947, '2017-06-12 15:33:00', 'categoria', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(948, '2017-06-12 20:34:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(949, '2017-06-12 20:34:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(950, '2017-06-12 20:34:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(951, '2017-06-12 15:34:00', 'produto', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(952, '2017-06-12 15:34:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(953, '2017-06-12 15:34:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(954, '2017-06-12 15:34:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(955, '2017-06-12 20:35:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(956, '2017-06-12 20:35:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(957, '2017-06-12 20:35:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(958, '2017-06-12 20:36:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(959, '2017-06-12 20:36:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(960, '2017-06-12 20:36:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(961, '2017-06-12 20:36:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(962, '2017-06-12 20:36:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(963, '2017-06-12 20:37:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(964, '2017-06-12 20:39:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(965, '2017-06-12 20:39:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(966, '2017-06-12 20:39:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(967, '2017-06-12 20:39:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(968, '2017-06-12 20:39:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(969, '2017-06-12 20:40:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(970, '2017-06-12 20:42:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(971, '2017-06-12 20:42:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(972, '2017-06-12 20:42:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(973, '2017-06-12 20:42:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(974, '2017-06-12 20:42:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(975, '2017-06-12 20:42:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(976, '2017-06-12 20:43:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(977, '2017-06-12 20:43:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(978, '2017-06-12 20:43:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(979, '2017-06-12 20:43:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(980, '2017-06-12 20:43:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(981, '2017-06-12 20:43:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(982, '2017-06-12 20:45:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(983, '2017-06-12 20:45:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(984, '2017-06-12 20:45:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(985, '2017-06-12 20:47:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(986, '2017-06-12 20:47:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(987, '2017-06-12 20:47:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(988, '2017-06-12 20:48:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(989, '2017-06-12 20:48:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(990, '2017-06-12 20:48:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(991, '2017-06-12 20:51:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(992, '2017-06-12 20:51:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(993, '2017-06-12 20:51:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(994, '2017-06-12 20:52:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(995, '2017-06-12 20:52:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(996, '2017-06-12 20:52:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(997, '2017-06-12 20:53:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(998, '2017-06-12 20:53:00', 'produto', 4, 'listarPorId', '::1', 2, NULL),
(999, '2017-06-12 20:53:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1000, '2017-06-12 20:53:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1001, '2017-06-12 20:53:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(1002, '2017-06-12 20:53:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1003, '2017-06-12 20:53:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1004, '2017-06-12 20:55:00', 'produto', 4, 'listarPorId', '::1', 2, NULL),
(1005, '2017-06-12 20:55:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1006, '2017-06-12 20:55:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1007, '2017-06-12 20:55:00', 'produto', 4, 'listarPorId', '::1', 2, NULL),
(1008, '2017-06-12 20:55:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1009, '2017-06-12 20:55:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1010, '2017-06-12 20:55:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(1011, '2017-06-12 20:55:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1012, '2017-06-12 20:55:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1013, '2017-06-12 20:55:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(1014, '2017-06-12 20:55:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1015, '2017-06-12 20:55:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1016, '2017-06-12 20:55:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(1017, '2017-06-12 20:55:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1018, '2017-06-12 20:55:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1019, '2017-06-12 20:55:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(1020, '2017-06-12 20:55:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1021, '2017-06-12 20:55:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1022, '2017-06-12 20:57:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(1023, '2017-06-12 20:57:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1024, '2017-06-12 20:57:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1025, '2017-06-12 21:00:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1026, '2017-06-12 21:00:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(1027, '2017-06-12 21:00:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1028, '2017-06-12 21:00:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1029, '2017-06-12 21:01:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(1030, '2017-06-12 21:01:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1031, '2017-06-12 21:01:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1032, '2017-06-12 21:02:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(1033, '2017-06-12 21:02:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1034, '2017-06-12 21:02:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1035, '2017-06-12 21:02:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1036, '2017-06-12 21:02:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(1037, '2017-06-12 21:02:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1038, '2017-06-12 21:02:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1039, '2017-06-12 21:04:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1040, '2017-06-12 21:04:00', 'subcategoria', 15, 'listarPorId', '::1', 2, NULL),
(1041, '2017-06-12 21:05:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1042, '2017-06-12 21:05:00', 'subcategoria', 15, 'listarPorId', '::1', 2, NULL),
(1043, '2017-06-12 21:05:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1044, '2017-06-12 21:05:00', 'subcategoria', 3, 'listarPorId', '::1', 2, NULL),
(1045, '2017-06-12 21:05:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1046, '2017-06-12 21:06:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(1047, '2017-06-12 21:06:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1048, '2017-06-12 21:06:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1049, '2017-06-12 21:07:00', 'produto', 5, 'listarPorId', '::1', 2, NULL),
(1050, '2017-06-12 21:07:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1051, '2017-06-12 21:07:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1052, '2017-06-12 21:07:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1053, '2017-06-12 21:07:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(1054, '2017-06-12 21:07:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1055, '2017-06-12 21:07:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1056, '2017-06-12 21:07:00', 'produto', 3, 'listarPorId', '::1', 2, NULL),
(1057, '2017-06-12 21:07:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1058, '2017-06-12 21:07:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1059, '2017-06-12 21:07:00', 'produto', 4, 'listarPorId', '::1', 2, NULL),
(1060, '2017-06-12 21:07:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1061, '2017-06-12 21:07:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1062, '2017-06-12 21:07:00', 'produto', 2, 'listarPorId', '::1', 2, NULL),
(1063, '2017-06-12 21:07:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1064, '2017-06-12 21:07:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1065, '2017-06-12 21:07:00', 'produto', 4, 'listarPorId', '::1', 2, NULL),
(1066, '2017-06-12 21:07:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1067, '2017-06-12 21:07:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1068, '2017-06-12 16:17:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1069, '2017-06-12 16:17:00', 'produto', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1070, '2017-06-12 16:17:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1071, '2017-06-12 16:17:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1072, '2017-06-12 16:17:00', 'produto', 1, 'listarPorId', '66.220.152.143', 2, NULL),
(1073, '2017-06-12 16:17:00', 'geral', 1, 'listarPorId', '66.220.152.143', 2, NULL),
(1074, '2017-06-12 16:17:00', 'anunciante', 1, 'listarPorId', '66.220.152.143', 2, NULL),
(1075, '2017-06-12 16:21:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1076, '2017-06-12 16:21:00', 'produto', 2, 'listarPorId', '201.159.181.97', 2, NULL),
(1077, '2017-06-12 16:21:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1078, '2017-06-12 16:21:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1079, '2017-06-12 16:21:00', 'produto', 2, 'listarPorId', '66.220.152.172', 2, NULL),
(1080, '2017-06-12 16:21:00', 'geral', 1, 'listarPorId', '66.220.152.172', 2, NULL),
(1081, '2017-06-12 16:21:00', 'anunciante', 1, 'listarPorId', '66.220.152.172', 2, NULL),
(1082, '2017-06-12 16:22:00', 'produto', 2, 'listarPorId', '66.220.145.245', 2, NULL),
(1083, '2017-06-12 16:22:00', 'geral', 1, 'listarPorId', '66.220.145.245', 2, NULL),
(1084, '2017-06-12 16:22:00', 'anunciante', 1, 'listarPorId', '66.220.145.245', 2, NULL),
(1085, '2017-06-12 16:22:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1086, '2017-06-12 16:28:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1087, '2017-06-12 16:28:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1088, '2017-06-12 16:28:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1089, '2017-06-12 16:29:00', 'produto', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(1090, '2017-06-12 16:29:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1091, '2017-06-12 16:29:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1092, '2017-06-12 16:29:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1093, '2017-06-12 16:30:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1094, '2017-06-12 16:30:00', 'subcategoria', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(1095, '2017-06-12 16:30:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1096, '2017-06-12 16:30:00', 'produto', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(1097, '2017-06-12 16:30:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1098, '2017-06-12 16:30:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1099, '2017-06-12 16:30:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1100, '2017-06-12 16:45:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1101, '2017-06-12 16:45:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1102, '2017-06-12 16:45:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1103, '2017-06-12 16:45:00', 'categoria', 8, 'listarPorId', '179.105.162.17', 2, NULL),
(1104, '2017-06-12 16:45:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1105, '2017-06-12 16:45:00', 'categoria', 7, 'listarPorId', '179.105.162.17', 2, NULL),
(1106, '2017-06-12 16:45:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1107, '2017-06-12 16:48:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1108, '2017-06-12 16:49:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1109, '2017-06-12 16:49:00', 'produto', 5, 'listarPorId', '201.159.181.97', 2, NULL),
(1110, '2017-06-12 16:49:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1111, '2017-06-12 16:49:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1112, '2017-06-12 16:49:00', 'produto', 5, 'listarPorId', '66.220.152.165', 2, NULL),
(1113, '2017-06-12 16:49:00', 'geral', 1, 'listarPorId', '66.220.152.165', 2, NULL),
(1114, '2017-06-12 16:49:00', 'anunciante', 1, 'listarPorId', '66.220.152.165', 2, NULL),
(1115, '2017-06-12 16:50:00', 'produto', 5, 'listarPorId', '66.220.145.245', 2, NULL),
(1116, '2017-06-12 16:50:00', 'geral', 1, 'listarPorId', '66.220.145.245', 2, NULL),
(1117, '2017-06-12 16:50:00', 'anunciante', 1, 'listarPorId', '66.220.145.245', 2, NULL),
(1118, '2017-06-12 16:50:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1119, '2017-06-12 16:50:00', 'produto', 3, 'listarPorId', '201.159.181.97', 2, NULL),
(1120, '2017-06-12 16:50:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1121, '2017-06-12 16:50:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1122, '2017-06-12 16:50:00', 'produto', 3, 'listarPorId', '66.220.152.131', 2, NULL),
(1123, '2017-06-12 16:50:00', 'geral', 1, 'listarPorId', '66.220.152.131', 2, NULL),
(1124, '2017-06-12 16:50:00', 'anunciante', 1, 'listarPorId', '66.220.152.131', 2, NULL),
(1125, '2017-06-12 21:51:00', 'produto', 4, 'listarPorId', '::1', 2, NULL),
(1126, '2017-06-12 21:51:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1127, '2017-06-12 21:51:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1128, '2017-06-12 16:51:00', 'produto', 4, 'listarPorId', '201.159.181.97', 2, NULL),
(1129, '2017-06-12 16:51:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1130, '2017-06-12 16:51:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1131, '2017-06-12 16:51:00', 'produto', 4, 'listarPorId', '173.252.90.108', 2, NULL),
(1132, '2017-06-12 16:51:00', 'geral', 1, 'listarPorId', '173.252.90.108', 2, NULL),
(1133, '2017-06-12 16:51:00', 'anunciante', 1, 'listarPorId', '173.252.90.108', 2, NULL),
(1134, '2017-06-12 16:51:00', 'produto', 4, 'listarPorId', '66.220.145.243', 2, NULL),
(1135, '2017-06-12 16:51:00', 'geral', 1, 'listarPorId', '66.220.145.243', 2, NULL),
(1136, '2017-06-12 16:51:00', 'anunciante', 1, 'listarPorId', '66.220.145.243', 2, NULL),
(1137, '2017-06-12 16:51:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1138, '2017-06-12 16:52:00', 'produto', 5, 'listarPorId', '201.159.181.97', 2, NULL),
(1139, '2017-06-12 16:52:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1140, '2017-06-12 16:52:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1141, '2017-06-12 16:52:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1142, '2017-06-12 16:52:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1143, '2017-06-12 16:52:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1144, '2017-06-12 17:00:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1145, '2017-06-12 17:19:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1146, '2017-06-12 17:19:00', 'produto', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(1147, '2017-06-12 17:19:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1148, '2017-06-12 17:19:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1149, '2017-06-12 17:19:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1150, '2017-06-12 17:19:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1151, '2017-06-12 17:21:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1152, '2017-06-12 18:19:00', 'admin', 1, 'login', '179.105.162.17', 1, 1),
(1153, '2017-06-12 18:19:00', 'admin', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1154, '2017-06-12 18:22:00', 'anunciante', 2, 'salvar', '179.105.162.17', 2, 1),
(1155, '2017-06-12 18:25:00', 'produto', 6, 'salvar', '179.105.162.17', 2, 1),
(1156, '2017-06-12 18:25:00', 'produtofoto', 6, 'salvar', '179.105.162.17', 2, 1),
(1157, '2017-06-12 18:25:00', 'produtofoto', 7, 'salvar', '179.105.162.17', 2, 1),
(1158, '2017-06-12 18:25:00', 'produto', 6, 'listarPorId', '179.105.162.17', 1, 1),
(1159, '2017-06-12 18:25:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1160, '2017-06-12 18:25:00', 'produto', 6, 'listarPorId', '179.105.162.17', 2, NULL),
(1161, '2017-06-12 18:25:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1162, '2017-06-12 18:25:00', 'anunciante', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(1163, '2017-06-12 18:25:00', 'produto', 6, 'listarPorId', '173.252.90.101', 2, NULL),
(1164, '2017-06-12 18:25:00', 'geral', 1, 'listarPorId', '173.252.90.101', 2, NULL),
(1165, '2017-06-12 18:25:00', 'anunciante', 2, 'listarPorId', '173.252.90.101', 2, NULL),
(1166, '2017-06-12 18:26:00', 'produto', 6, 'listarPorId', '179.105.162.17', 1, 1),
(1167, '2017-06-12 18:27:00', 'produto', 6, 'atualizar', '179.105.162.17', 2, 1),
(1168, '2017-06-12 18:27:00', 'produtofoto', 6, 'atualizar', '179.105.162.17', 2, 1),
(1169, '2017-06-12 18:27:00', 'produtofoto', 7, 'atualizar', '179.105.162.17', 2, 1),
(1170, '2017-06-12 18:27:00', 'produtofoto', 8, 'salvar', '179.105.162.17', 2, 1),
(1171, '2017-06-12 18:27:00', 'produtofoto', 9, 'salvar', '179.105.162.17', 2, 1),
(1172, '2017-06-12 18:27:00', 'produtofoto', 10, 'salvar', '179.105.162.17', 2, 1),
(1173, '2017-06-12 18:27:00', 'produto', 6, 'listarPorId', '179.105.162.17', 1, 1),
(1174, '2017-06-12 18:27:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1175, '2017-06-12 18:27:00', 'produto', 6, 'listarPorId', '179.105.162.17', 2, NULL),
(1176, '2017-06-12 18:27:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1177, '2017-06-12 18:27:00', 'anunciante', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(1178, '2017-06-12 18:30:00', 'geral', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1179, '2017-06-12 18:38:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1180, '2017-06-12 18:38:00', 'noticia', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1181, '2017-06-12 18:38:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1182, '2017-06-12 18:38:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1183, '2017-06-12 18:38:00', 'geral', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1184, '2017-06-12 18:41:00', 'geral', 1, 'atualizar', '179.105.162.17', 2, 1),
(1185, '2017-06-12 18:41:00', 'geral', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1186, '2017-06-12 18:41:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1187, '2017-06-12 18:54:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1188, '2017-06-12 18:54:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1189, '2017-06-12 18:54:00', 'categoria', 7, 'listarPorId', '179.105.162.17', 2, NULL),
(1190, '2017-06-12 18:54:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1191, '2017-06-12 18:54:00', 'subcategoria', 4, 'listarPorId', '179.105.162.17', 2, NULL),
(1192, '2017-06-12 18:54:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1193, '2017-06-12 18:54:00', 'categoria', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(1194, '2017-06-12 18:54:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1195, '2017-06-12 18:54:00', 'geral', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1196, '2017-06-12 18:56:00', 'geral', 1, 'atualizar', '179.105.162.17', 2, 1),
(1197, '2017-06-12 18:56:00', 'geral', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1198, '2017-06-12 18:56:00', 'destaque', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1199, '2017-06-12 18:56:00', 'parceiro', 2, 'listarPorId', '179.105.162.17', 1, 1),
(1200, '2017-06-12 18:56:00', 'parceiro', 2, 'atualizar', '179.105.162.17', 2, 1),
(1201, '2017-06-12 18:56:00', 'parceiro', 2, 'listarPorId', '179.105.162.17', 1, 1),
(1202, '2017-06-12 18:57:00', 'parceiro', 3, 'listarPorId', '179.105.162.17', 1, 1),
(1203, '2017-06-12 18:57:00', 'parceiro', 3, 'atualizar', '179.105.162.17', 2, 1),
(1204, '2017-06-12 18:57:00', 'parceiro', 3, 'listarPorId', '179.105.162.17', 1, 1),
(1205, '2017-06-12 18:57:00', 'parceiro', 4, 'listarPorId', '179.105.162.17', 1, 1),
(1206, '2017-06-12 18:57:00', 'parceiro', 4, 'atualizar', '179.105.162.17', 2, 1),
(1207, '2017-06-12 18:57:00', 'parceiro', 4, 'listarPorId', '179.105.162.17', 1, 1),
(1208, '2017-06-12 18:57:00', 'parceiro', 5, 'listarPorId', '179.105.162.17', 1, 1),
(1209, '2017-06-12 18:57:00', 'parceiro', 5, 'atualizar', '179.105.162.17', 2, 1),
(1210, '2017-06-12 18:57:00', 'parceiro', 5, 'listarPorId', '179.105.162.17', 1, 1),
(1211, '2017-06-12 18:57:00', 'parceiro', 6, 'listarPorId', '179.105.162.17', 1, 1),
(1212, '2017-06-12 18:57:00', 'parceiro', 6, 'atualizar', '179.105.162.17', 2, 1),
(1213, '2017-06-12 18:57:00', 'parceiro', 6, 'listarPorId', '179.105.162.17', 1, 1),
(1214, '2017-06-12 18:57:00', 'parceiro', 7, 'listarPorId', '179.105.162.17', 1, 1),
(1215, '2017-06-12 18:57:00', 'parceiro', 7, 'atualizar', '179.105.162.17', 2, 1),
(1216, '2017-06-12 18:57:00', 'parceiro', 7, 'listarPorId', '179.105.162.17', 1, 1),
(1217, '2017-06-12 18:57:00', 'parceiro', 8, 'listarPorId', '179.105.162.17', 1, 1),
(1218, '2017-06-12 18:57:00', 'parceiro', 8, 'atualizar', '179.105.162.17', 2, 1),
(1219, '2017-06-12 18:57:00', 'parceiro', 8, 'listarPorId', '179.105.162.17', 1, 1),
(1220, '2017-06-12 18:58:00', 'parceiro', 9, 'listarPorId', '179.105.162.17', 1, 1),
(1221, '2017-06-12 18:58:00', 'parceiro', 9, 'atualizar', '179.105.162.17', 2, 1),
(1222, '2017-06-12 18:58:00', 'parceiro', 9, 'listarPorId', '179.105.162.17', 1, 1),
(1223, '2017-06-12 18:58:00', 'geral', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1224, '2017-06-12 18:58:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1225, '2017-06-12 18:58:00', 'categoria', 4, 'listarPorId', '179.105.162.17', 2, NULL),
(1226, '2017-06-12 18:59:00', 'produto', 6, 'listarPorId', '179.105.162.17', 2, NULL),
(1227, '2017-06-12 18:59:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1228, '2017-06-12 18:59:00', 'anunciante', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(1229, '2017-06-12 18:59:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1230, '2017-06-12 18:59:00', 'categoria', 4, 'listarPorId', '179.105.162.17', 2, NULL),
(1231, '2017-06-12 18:59:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1232, '2017-06-12 18:59:00', 'categoria', 4, 'listarPorId', '179.105.162.17', 2, NULL),
(1233, '2017-06-12 18:59:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1234, '2017-06-12 18:59:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1235, '2017-06-12 19:01:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1236, '2017-06-13 14:57:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1237, '2017-06-13 14:58:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1238, '2017-06-13 14:59:00', 'produto', 3, 'listarPorId', '127.0.0.1', 2, NULL),
(1239, '2017-06-13 14:59:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1240, '2017-06-13 14:59:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1241, '2017-06-13 15:00:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1242, '2017-06-13 15:00:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1243, '2017-06-13 15:00:00', 'subcategoria', 5, 'listarPorId', '127.0.0.1', 2, NULL),
(1244, '2017-06-13 15:00:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1245, '2017-06-13 15:01:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1246, '2017-06-13 15:01:00', 'categoria', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1247, '2017-06-13 15:01:00', 'produto', 5, 'listarPorId', '127.0.0.1', 2, NULL),
(1248, '2017-06-13 15:01:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1249, '2017-06-13 15:01:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1250, '2017-06-13 15:01:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1251, '2017-06-13 15:01:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1252, '2017-06-13 15:01:00', 'categoria', 7, 'listarPorId', '127.0.0.1', 2, NULL),
(1253, '2017-06-13 15:01:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1254, '2017-06-13 15:01:00', 'categoria', 3, 'listarPorId', '127.0.0.1', 2, NULL),
(1255, '2017-06-13 15:02:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1256, '2017-06-13 15:02:00', 'categoria', 2, 'listarPorId', '127.0.0.1', 2, NULL),
(1257, '2017-06-13 15:02:00', 'produto', 2, 'listarPorId', '127.0.0.1', 2, NULL),
(1258, '2017-06-13 15:02:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1259, '2017-06-13 15:02:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1260, '2017-06-13 15:02:00', 'produto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(1261, '2017-06-13 15:02:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1262, '2017-06-13 15:02:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1263, '2017-06-13 15:02:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1264, '2017-06-13 15:02:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1265, '2017-06-13 15:02:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1266, '2017-06-13 10:03:00', 'admin', 1, 'login', '170.254.199.159', 1, 1),
(1267, '2017-06-13 10:03:00', 'admin', 1, 'listarPorId', '170.254.199.159', 1, 1);
INSERT INTO `log` (`idlog`, `dt`, `tabela`, `chave`, `acao`, `ip`, `tipo`, `admin_idadmin`) VALUES
(1268, '2017-06-13 10:03:00', 'geral', 1, 'listarPorId', '170.254.199.159', 1, 1),
(1269, '2017-06-13 10:03:00', 'produto', 1, 'listarPorId', '170.254.199.159', 1, 1),
(1270, '2017-06-13 10:04:00', 'produto', 1, 'atualizar', '170.254.199.159', 2, 1),
(1271, '2017-06-13 10:04:00', 'produtofoto', 1, 'atualizar', '170.254.199.159', 2, 1),
(1272, '2017-06-13 10:04:00', 'produtofoto', 11, 'salvar', '170.254.199.159', 2, 1),
(1273, '2017-06-13 10:04:00', 'produtofoto', 12, 'salvar', '170.254.199.159', 2, 1),
(1274, '2017-06-13 10:04:00', 'produto', 1, 'listarPorId', '170.254.199.159', 1, 1),
(1275, '2017-06-13 15:04:00', 'produto', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1276, '2017-06-13 15:04:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1277, '2017-06-13 15:04:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1278, '2017-06-13 15:06:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1279, '2017-06-13 10:12:00', 'produto', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1280, '2017-06-13 10:12:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1281, '2017-06-13 10:12:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1282, '2017-06-13 10:29:00', 'admin', 1, 'login', '201.159.181.97', 1, 1),
(1283, '2017-06-13 10:29:00', 'admin', 1, 'listarPorId', '201.159.181.97', 1, 1),
(1284, '2017-06-13 10:30:00', 'produto', 1, 'listarPorId', '201.159.181.97', 1, 1),
(1285, '2017-06-13 10:32:00', 'produto', 1, 'atualizar', '201.159.181.97', 2, 1),
(1286, '2017-06-13 10:32:00', 'produtofoto', 1, 'atualizar', '201.159.181.97', 2, 1),
(1287, '2017-06-13 10:32:00', 'produtofoto', 11, 'atualizar', '201.159.181.97', 2, 1),
(1288, '2017-06-13 10:32:00', 'produtofoto', 12, 'atualizar', '201.159.181.97', 2, 1),
(1289, '2017-06-13 10:32:00', 'produtofoto', 13, 'salvar', '201.159.181.97', 2, 1),
(1290, '2017-06-13 10:32:00', 'produto', 1, 'listarPorId', '201.159.181.97', 1, 1),
(1291, '2017-06-13 10:32:00', 'produto', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1292, '2017-06-13 10:32:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1293, '2017-06-13 10:32:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1294, '2017-06-13 15:39:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(1295, '2017-06-13 15:39:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1296, '2017-06-13 15:39:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1297, '2017-06-13 15:39:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(1298, '2017-06-13 15:39:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1299, '2017-06-13 15:39:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1300, '2017-06-13 15:39:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(1301, '2017-06-13 15:39:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1302, '2017-06-13 15:39:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1303, '2017-06-13 15:40:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(1304, '2017-06-13 15:40:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1305, '2017-06-13 15:40:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1306, '2017-06-13 15:41:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(1307, '2017-06-13 15:41:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1308, '2017-06-13 15:41:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1309, '2017-06-13 15:42:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(1310, '2017-06-13 15:42:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1311, '2017-06-13 15:42:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1312, '2017-06-13 15:43:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(1313, '2017-06-13 15:43:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1314, '2017-06-13 15:43:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1315, '2017-06-13 15:44:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(1316, '2017-06-13 15:44:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1317, '2017-06-13 15:44:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1318, '2017-06-13 15:44:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(1319, '2017-06-13 15:44:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1320, '2017-06-13 15:44:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1321, '2017-06-13 10:50:00', 'produto', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1322, '2017-06-13 10:50:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1323, '2017-06-13 10:50:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1324, '2017-06-13 10:51:00', 'produto', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1325, '2017-06-13 10:51:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1326, '2017-06-13 10:51:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1327, '2017-06-13 15:51:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(1328, '2017-06-13 15:51:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1329, '2017-06-13 15:51:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1330, '2017-06-13 15:52:00', 'produto', 1, 'listarPorId', '::1', 2, NULL),
(1331, '2017-06-13 15:52:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1332, '2017-06-13 15:52:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1333, '2017-06-13 10:53:00', 'produto', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1334, '2017-06-13 10:53:00', 'geral', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1335, '2017-06-13 10:53:00', 'anunciante', 1, 'listarPorId', '201.159.181.97', 2, NULL),
(1336, '2017-06-19 15:27:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1337, '2017-06-19 15:48:00', 'geral', 1, 'listarPorId', '177.203.53.9', 2, NULL),
(1338, '2017-06-19 16:33:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1339, '2017-06-19 16:37:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1340, '2017-06-19 17:04:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1341, '2017-06-19 17:05:00', 'anunciante', 3, 'salvar', '127.0.0.1', 2, NULL),
(1342, '2017-06-19 17:06:00', 'anunciante', 4, 'salvar', '127.0.0.1', 2, NULL),
(1343, '2017-06-19 17:09:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1344, '2017-06-19 17:09:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1345, '2017-06-19 17:11:00', 'anunciante', 5, 'salvar', '127.0.0.1', 2, NULL),
(1346, '2017-06-19 17:37:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1347, '2017-06-19 17:38:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1348, '2017-06-19 17:39:00', 'anunciante', 6, 'salvar', '127.0.0.1', 2, NULL),
(1349, '2017-06-19 17:45:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1350, '2017-06-20 10:16:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1351, '2017-06-20 10:16:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1352, '2017-06-20 18:30:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1353, '2017-06-20 18:31:00', 'admin', 1, 'login', '179.105.162.17', 1, 1),
(1354, '2017-06-20 18:31:00', 'admin', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1355, '2017-06-20 18:31:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1356, '2017-06-20 18:31:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1357, '2017-06-20 18:31:00', 'produto', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1358, '2017-06-20 18:32:00', 'produto', 1, 'atualizar', '179.105.162.17', 2, 1),
(1359, '2017-06-20 18:32:00', 'produtofoto', 1, 'atualizar', '179.105.162.17', 2, 1),
(1360, '2017-06-20 18:32:00', 'produtofoto', 11, 'atualizar', '179.105.162.17', 2, 1),
(1361, '2017-06-20 18:32:00', 'produtofoto', 12, 'atualizar', '179.105.162.17', 2, 1),
(1362, '2017-06-20 18:32:00', 'produtofoto', 13, 'atualizar', '179.105.162.17', 2, 1),
(1363, '2017-06-20 18:32:00', 'produto', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1364, '2017-06-20 18:32:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1365, '2017-06-20 18:32:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1366, '2017-06-20 18:32:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1367, '2017-06-20 18:32:00', 'subcategoria', 12, 'listarPorId', '179.105.162.17', 2, NULL),
(1368, '2017-06-20 18:32:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1369, '2017-06-20 18:32:00', 'subcategoria', 15, 'listarPorId', '179.105.162.17', 2, NULL),
(1370, '2017-06-20 18:32:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1371, '2017-06-20 18:33:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1372, '2017-06-20 18:34:00', 'geral', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1373, '2017-06-20 18:34:00', 'produto', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1374, '2017-06-20 18:35:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1375, '2017-06-20 18:35:00', 'anunciante', 3, 'excluir', '179.105.162.17', 2, 1),
(1376, '2017-06-20 18:35:00', 'anunciante', 4, 'excluir', '179.105.162.17', 2, 1),
(1377, '2017-06-20 18:35:00', 'anunciante', 5, 'excluir', '179.105.162.17', 2, 1),
(1378, '2017-06-20 18:35:00', 'anunciante', 6, 'excluir', '179.105.162.17', 2, 1),
(1379, '2017-06-20 18:35:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1380, '2017-06-20 18:36:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1381, '2017-06-20 18:37:00', 'produto', 6, 'listarPorId', '179.105.162.17', 1, 1),
(1382, '2017-06-20 18:39:00', 'produtofoto', 6, 'excluir', '179.105.162.17', 2, 1),
(1383, '2017-06-20 18:39:00', 'produtofoto', 7, 'excluir', '179.105.162.17', 2, 1),
(1384, '2017-06-20 18:39:00', 'produtofoto', 8, 'excluir', '179.105.162.17', 2, 1),
(1385, '2017-06-20 18:39:00', 'produtofoto', 9, 'excluir', '179.105.162.17', 2, 1),
(1386, '2017-06-20 18:40:00', 'produtofoto', 10, 'excluir', '179.105.162.17', 2, 1),
(1387, '2017-06-20 18:40:00', 'produto', 6, 'atualizar', '179.105.162.17', 2, 1),
(1388, '2017-06-20 18:40:00', 'produtofoto', 14, 'salvar', '179.105.162.17', 2, 1),
(1389, '2017-06-20 18:40:00', 'produtofoto', 15, 'salvar', '179.105.162.17', 2, 1),
(1390, '2017-06-20 18:40:00', 'produtofoto', 16, 'salvar', '179.105.162.17', 2, 1),
(1391, '2017-06-20 18:40:00', 'produtofoto', 17, 'salvar', '179.105.162.17', 2, 1),
(1392, '2017-06-20 18:40:00', 'produto', 6, 'listarPorId', '179.105.162.17', 1, 1),
(1393, '2017-06-20 18:40:00', 'produto', 6, 'listarPorId', '179.105.162.17', 1, 1),
(1394, '2017-06-20 18:40:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1395, '2017-06-20 18:40:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1396, '2017-06-20 18:40:00', 'produto', 6, 'listarPorId', '179.105.162.17', 2, NULL),
(1397, '2017-06-20 18:40:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1398, '2017-06-20 18:40:00', 'anunciante', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(1399, '2017-06-20 18:40:00', 'produto', 6, 'listarPorId', '173.252.90.119', 2, NULL),
(1400, '2017-06-20 18:40:00', 'geral', 1, 'listarPorId', '173.252.90.119', 2, NULL),
(1401, '2017-06-20 18:40:00', 'anunciante', 2, 'listarPorId', '173.252.90.119', 2, NULL),
(1402, '2017-06-20 18:41:00', 'subcategoria', 16, 'salvar', '179.105.162.17', 2, 1),
(1403, '2017-06-20 18:41:00', 'produto', 6, 'listarPorId', '179.105.162.17', 1, 1),
(1404, '2017-06-20 18:42:00', 'produto', 6, 'atualizar', '179.105.162.17', 2, 1),
(1405, '2017-06-20 18:42:00', 'produtofoto', 14, 'atualizar', '179.105.162.17', 2, 1),
(1406, '2017-06-20 18:42:00', 'produtofoto', 15, 'atualizar', '179.105.162.17', 2, 1),
(1407, '2017-06-20 18:42:00', 'produtofoto', 16, 'atualizar', '179.105.162.17', 2, 1),
(1408, '2017-06-20 18:42:00', 'produtofoto', 17, 'atualizar', '179.105.162.17', 2, 1),
(1409, '2017-06-20 18:42:00', 'produto', 6, 'listarPorId', '179.105.162.17', 1, 1),
(1410, '2017-06-20 18:42:00', 'produto', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1411, '2017-06-20 18:43:00', 'produtofoto', 1, 'excluir', '179.105.162.17', 2, 1),
(1412, '2017-06-20 18:43:00', 'produtofoto', 11, 'excluir', '179.105.162.17', 2, 1),
(1413, '2017-06-20 18:43:00', 'produtofoto', 12, 'excluir', '179.105.162.17', 2, 1),
(1414, '2017-06-20 18:43:00', 'produtofoto', 13, 'excluir', '179.105.162.17', 2, 1),
(1415, '2017-06-20 18:45:00', 'produto', 1, 'atualizar', '179.105.162.17', 2, 1),
(1416, '2017-06-20 18:45:00', 'produtofoto', 18, 'salvar', '179.105.162.17', 2, 1),
(1417, '2017-06-20 18:45:00', 'produtofoto', 19, 'salvar', '179.105.162.17', 2, 1),
(1418, '2017-06-20 18:45:00', 'produtofoto', 20, 'salvar', '179.105.162.17', 2, 1),
(1419, '2017-06-20 18:45:00', 'produtofoto', 21, 'salvar', '179.105.162.17', 2, 1),
(1420, '2017-06-20 18:45:00', 'produto', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1421, '2017-06-20 18:45:00', 'produto', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1422, '2017-06-20 18:45:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1423, '2017-06-20 18:46:00', 'subcategoria', 17, 'salvar', '179.105.162.17', 2, 1),
(1424, '2017-06-20 18:47:00', 'produto', 2, 'listarPorId', '179.105.162.17', 1, 1),
(1425, '2017-06-20 18:48:00', 'produtofoto', 2, 'excluir', '179.105.162.17', 2, 1),
(1426, '2017-06-20 18:48:00', 'produto', 2, 'atualizar', '179.105.162.17', 2, 1),
(1427, '2017-06-20 18:48:00', 'produtofoto', 22, 'salvar', '179.105.162.17', 2, 1),
(1428, '2017-06-20 18:48:00', 'produto', 2, 'listarPorId', '179.105.162.17', 1, 1),
(1429, '2017-06-20 18:48:00', 'produto', 2, 'listarPorId', '179.105.162.17', 1, 1),
(1430, '2017-06-20 18:48:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1431, '2017-06-20 18:48:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1432, '2017-06-20 18:50:00', 'produto', 3, 'listarPorId', '179.105.162.17', 1, 1),
(1433, '2017-06-20 18:51:00', 'subcategoria', 14, 'listarPorId', '179.105.162.17', 1, 1),
(1434, '2017-06-20 18:51:00', 'subcategoria', 18, 'salvar', '179.105.162.17', 2, 1),
(1435, '2017-06-20 18:52:00', 'produtofoto', 3, 'excluir', '179.105.162.17', 2, 1),
(1436, '2017-06-20 18:52:00', 'produto', 3, 'atualizar', '179.105.162.17', 2, 1),
(1437, '2017-06-20 18:52:00', 'produtofoto', 23, 'salvar', '179.105.162.17', 2, 1),
(1438, '2017-06-20 18:52:00', 'produto', 3, 'listarPorId', '179.105.162.17', 1, 1),
(1439, '2017-06-20 18:52:00', 'produto', 3, 'listarPorId', '179.105.162.17', 1, 1),
(1440, '2017-06-20 18:53:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1441, '2017-06-20 18:53:00', 'produto', 3, 'listarPorId', '179.105.162.17', 2, NULL),
(1442, '2017-06-20 18:53:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1443, '2017-06-20 18:53:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1444, '2017-06-20 18:53:00', 'produto', 3, 'listarPorId', '173.252.90.117', 2, NULL),
(1445, '2017-06-20 18:53:00', 'geral', 1, 'listarPorId', '173.252.90.117', 2, NULL),
(1446, '2017-06-20 18:53:00', 'anunciante', 1, 'listarPorId', '173.252.90.117', 2, NULL),
(1447, '2017-06-20 18:53:00', 'produto', 4, 'listarPorId', '179.105.162.17', 1, 1),
(1448, '2017-06-20 18:56:00', 'produtofoto', 4, 'excluir', '179.105.162.17', 2, 1),
(1449, '2017-06-20 18:56:00', 'subcategoria', 19, 'salvar', '179.105.162.17', 2, 1),
(1450, '2017-06-20 18:57:00', 'produto', 4, 'atualizar', '179.105.162.17', 2, 1),
(1451, '2017-06-20 18:57:00', 'produtofoto', 24, 'salvar', '179.105.162.17', 2, 1),
(1452, '2017-06-20 18:57:00', 'produtofoto', 25, 'salvar', '179.105.162.17', 2, 1),
(1453, '2017-06-20 18:57:00', 'produtofoto', 26, 'salvar', '179.105.162.17', 2, 1),
(1454, '2017-06-20 18:57:00', 'produtofoto', 27, 'salvar', '179.105.162.17', 2, 1),
(1455, '2017-06-20 18:57:00', 'produto', 4, 'listarPorId', '179.105.162.17', 1, 1),
(1456, '2017-06-20 18:57:00', 'produto', 4, 'listarPorId', '179.105.162.17', 1, 1),
(1457, '2017-06-20 18:57:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1458, '2017-06-20 18:59:00', 'produto', 7, 'salvar', '179.105.162.17', 2, 1),
(1459, '2017-06-20 18:59:00', 'produtofoto', 28, 'salvar', '179.105.162.17', 2, 1),
(1460, '2017-06-20 18:59:00', 'produtofoto', 29, 'salvar', '179.105.162.17', 2, 1),
(1461, '2017-06-20 18:59:00', 'produtofoto', 30, 'salvar', '179.105.162.17', 2, 1),
(1462, '2017-06-20 18:59:00', 'produto', 7, 'listarPorId', '179.105.162.17', 1, 1),
(1463, '2017-06-20 19:00:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1464, '2017-06-20 19:01:00', 'produto', 5, 'listarPorId', '179.105.162.17', 1, 1),
(1465, '2017-06-20 19:02:00', 'produtofoto', 5, 'excluir', '179.105.162.17', 2, 1),
(1466, '2017-06-20 19:02:00', 'produto', 5, 'atualizar', '179.105.162.17', 2, 1),
(1467, '2017-06-20 19:02:00', 'produtofoto', 31, 'salvar', '179.105.162.17', 2, 1),
(1468, '2017-06-20 19:02:00', 'produtofoto', 32, 'salvar', '179.105.162.17', 2, 1),
(1469, '2017-06-20 19:02:00', 'produto', 5, 'listarPorId', '179.105.162.17', 1, 1),
(1470, '2017-06-20 19:03:00', 'produto', 5, 'listarPorId', '179.105.162.17', 1, 1),
(1471, '2017-06-20 19:03:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1472, '2017-06-20 19:03:00', 'produto', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(1473, '2017-06-20 19:03:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1474, '2017-06-20 19:03:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1475, '2017-06-20 19:03:00', 'produto', 5, 'listarPorId', '173.252.90.102', 2, NULL),
(1476, '2017-06-20 19:03:00', 'geral', 1, 'listarPorId', '173.252.90.102', 2, NULL),
(1477, '2017-06-20 19:03:00', 'anunciante', 1, 'listarPorId', '173.252.90.102', 2, NULL),
(1478, '2017-06-20 19:03:00', 'produto', 5, 'listarPorId', '66.220.145.244', 2, NULL),
(1479, '2017-06-20 19:03:00', 'geral', 1, 'listarPorId', '66.220.145.244', 2, NULL),
(1480, '2017-06-20 19:03:00', 'anunciante', 1, 'listarPorId', '66.220.145.244', 2, NULL),
(1481, '2017-06-20 19:03:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1482, '2017-06-20 19:06:00', 'subcategoria', 20, 'salvar', '179.105.162.17', 2, 1),
(1483, '2017-06-20 19:07:00', 'produto', 8, 'salvar', '179.105.162.17', 2, 1),
(1484, '2017-06-20 19:07:00', 'produtofoto', 33, 'salvar', '179.105.162.17', 2, 1),
(1485, '2017-06-20 19:07:00', 'produtofoto', 34, 'salvar', '179.105.162.17', 2, 1),
(1486, '2017-06-20 19:07:00', 'produtofoto', 35, 'salvar', '179.105.162.17', 2, 1),
(1487, '2017-06-20 19:07:00', 'produto', 8, 'listarPorId', '179.105.162.17', 1, 1),
(1488, '2017-06-20 19:09:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1489, '2017-06-20 19:09:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1490, '2017-06-20 19:09:00', 'subcategoria', 15, 'listarPorId', '179.105.162.17', 2, NULL),
(1491, '2017-06-20 19:09:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1492, '2017-06-20 19:09:00', 'geral', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1493, '2017-06-20 19:09:00', 'geral', 1, 'atualizar', '179.105.162.17', 2, 1),
(1494, '2017-06-20 19:09:00', 'geral', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1495, '2017-06-20 19:09:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1496, '2017-06-20 19:09:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1497, '2017-06-20 19:11:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1498, '2017-06-20 19:11:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1499, '2017-06-20 19:11:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1500, '2017-06-20 19:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1501, '2017-06-20 19:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1502, '2017-06-20 19:18:00', 'subcategoria', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1503, '2017-06-20 19:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1504, '2017-06-20 19:18:00', 'subcategoria', 19, 'listarPorId', '179.105.162.17', 2, NULL),
(1505, '2017-06-20 19:18:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1506, '2017-06-20 19:19:00', 'subcategoria', 19, 'listarPorId', '179.105.162.17', 2, NULL),
(1507, '2017-06-20 19:19:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1508, '2017-06-20 19:19:00', 'produto', 4, 'listarPorId', '179.105.162.17', 2, NULL),
(1509, '2017-06-20 19:19:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1510, '2017-06-20 19:19:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1511, '2017-06-20 19:19:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1512, '2017-06-20 19:19:00', 'categoria', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1513, '2017-06-20 19:19:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1514, '2017-06-20 19:19:00', 'subcategoria', 19, 'listarPorId', '179.105.162.17', 2, NULL),
(1515, '2017-06-20 19:19:00', 'produto', 4, 'listarPorId', '173.252.90.110', 2, NULL),
(1516, '2017-06-20 19:19:00', 'geral', 1, 'listarPorId', '173.252.90.110', 2, NULL),
(1517, '2017-06-20 19:19:00', 'anunciante', 1, 'listarPorId', '173.252.90.110', 2, NULL),
(1518, '2017-06-20 19:20:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1519, '2017-06-20 19:20:00', 'subcategoria', 19, 'listarPorId', '179.105.162.17', 2, NULL),
(1520, '2017-06-20 19:20:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1521, '2017-06-20 19:20:00', 'subcategoria', 19, 'listarPorId', '179.105.162.17', 2, NULL),
(1522, '2017-06-20 19:20:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1523, '2017-06-20 19:20:00', 'subcategoria', 4, 'listarPorId', '179.105.162.17', 2, NULL),
(1524, '2017-06-20 19:23:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1525, '2017-06-20 19:23:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1526, '2017-06-20 19:23:00', 'subcategoria', 19, 'listarPorId', '179.105.162.17', 2, NULL),
(1527, '2017-06-20 19:23:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1528, '2017-06-20 19:23:00', 'produto', 7, 'listarPorId', '179.105.162.17', 2, NULL),
(1529, '2017-06-20 19:23:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1530, '2017-06-20 19:23:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1531, '2017-06-20 19:23:00', 'produto', 5, 'listarPorId', '179.105.162.17', 2, NULL),
(1532, '2017-06-20 19:23:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1533, '2017-06-20 19:23:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1534, '2017-06-20 19:23:00', 'produto', 7, 'listarPorId', '173.252.90.99', 2, NULL),
(1535, '2017-06-20 19:23:00', 'geral', 1, 'listarPorId', '173.252.90.99', 2, NULL),
(1536, '2017-06-20 19:23:00', 'anunciante', 1, 'listarPorId', '173.252.90.99', 2, NULL),
(1537, '2017-06-20 19:23:00', 'produto', 7, 'listarPorId', '66.220.145.244', 2, NULL),
(1538, '2017-06-20 19:23:00', 'geral', 1, 'listarPorId', '66.220.145.244', 2, NULL),
(1539, '2017-06-20 19:23:00', 'anunciante', 1, 'listarPorId', '66.220.145.244', 2, NULL),
(1540, '2017-06-20 19:23:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1541, '2017-06-20 19:23:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1542, '2017-06-20 19:24:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1543, '2017-06-21 08:14:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1544, '2017-06-21 13:20:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1545, '2017-06-21 08:20:00', 'admin', 1, 'login', '170.254.198.146', 1, 1),
(1546, '2017-06-21 08:20:00', 'admin', 1, 'listarPorId', '170.254.198.146', 1, 1),
(1547, '2017-06-21 08:20:00', 'anunciante', 1, 'listarPorId', '170.254.198.146', 1, 1),
(1548, '2017-06-21 08:21:00', 'anunciante', 1, 'atualizar', '170.254.198.146', 2, 1),
(1549, '2017-06-21 08:21:00', 'anunciante', 1, 'listarPorId', '170.254.198.146', 1, 1),
(1550, '2017-06-21 13:21:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1551, '2017-06-21 08:21:00', 'anunciante', 1, 'atualizar', '170.254.198.146', 2, 1),
(1552, '2017-06-21 08:21:00', 'anunciante', 1, 'listarPorId', '170.254.198.146', 1, 1),
(1553, '2017-06-21 13:22:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1554, '2017-06-21 13:22:00', 'categoria', 5, 'listarPorId', '127.0.0.1', 2, NULL),
(1555, '2017-06-21 08:22:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1556, '2017-06-21 13:22:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1557, '2017-06-21 08:22:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1558, '2017-06-21 08:22:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1559, '2017-06-21 08:22:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1560, '2017-06-21 08:22:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1561, '2017-06-21 08:23:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1562, '2017-06-21 08:24:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1563, '2017-06-21 08:25:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1564, '2017-06-21 08:25:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1565, '2017-06-21 08:25:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1566, '2017-06-21 08:25:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1567, '2017-06-21 08:25:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1568, '2017-06-21 08:26:00', 'admin', 1, 'login', '179.105.162.17', 1, 1),
(1569, '2017-06-21 08:26:00', 'admin', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1570, '2017-06-21 08:26:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1571, '2017-06-21 08:26:00', 'anunciante', 1, 'atualizar', '179.105.162.17', 2, 1),
(1572, '2017-06-21 08:26:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1573, '2017-06-21 08:26:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1574, '2017-06-21 08:27:00', 'anunciante', 2, 'listarPorId', '179.105.162.17', 1, 1),
(1575, '2017-06-21 08:27:00', 'anunciante', 2, 'atualizar', '179.105.162.17', 2, 1),
(1576, '2017-06-21 08:27:00', 'anunciante', 2, 'listarPorId', '179.105.162.17', 1, 1),
(1577, '2017-06-21 08:27:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1578, '2017-06-21 08:27:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1579, '2017-06-21 08:27:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1580, '2017-06-21 08:27:00', 'subcategoria', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(1581, '2017-06-21 08:27:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1582, '2017-06-21 08:27:00', 'subcategoria', 19, 'listarPorId', '179.105.162.17', 2, NULL),
(1583, '2017-06-21 08:27:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1584, '2017-06-21 08:27:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1585, '2017-06-21 08:27:00', 'subcategoria', 19, 'listarPorId', '179.105.162.17', 2, NULL),
(1586, '2017-06-21 08:27:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1587, '2017-06-21 08:27:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1588, '2017-06-21 08:27:00', 'subcategoria', 19, 'listarPorId', '179.105.162.17', 2, NULL),
(1589, '2017-06-21 08:27:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1590, '2017-06-21 08:27:00', 'produto', 4, 'listarPorId', '170.254.198.146', 2, NULL),
(1591, '2017-06-21 08:27:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1592, '2017-06-21 08:27:00', 'anunciante', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1593, '2017-06-21 08:27:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1594, '2017-06-21 08:27:00', 'subcategoria', 19, 'listarPorId', '179.105.162.17', 2, NULL),
(1595, '2017-06-21 08:27:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1596, '2017-06-21 08:27:00', 'subcategoria', 19, 'listarPorId', '179.105.162.17', 2, NULL),
(1597, '2017-06-21 08:27:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1598, '2017-06-21 08:27:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1599, '2017-06-21 08:29:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1600, '2017-06-21 08:29:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1601, '2017-06-21 08:31:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1602, '2017-06-21 08:31:00', 'subcategoria', 16, 'listarPorId', '170.254.198.146', 2, NULL),
(1603, '2017-06-21 08:31:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1604, '2017-06-21 08:39:00', 'paginatexto', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(1605, '2017-06-21 08:39:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1606, '2017-06-21 08:39:00', 'paginatexto', 3, 'listarPorId', '179.105.162.17', 2, NULL),
(1607, '2017-06-21 08:39:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1608, '2017-06-21 08:39:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1609, '2017-06-21 08:39:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1610, '2017-06-21 08:39:00', 'produto', 6, 'listarPorId', '179.105.162.17', 2, NULL),
(1611, '2017-06-21 08:39:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1612, '2017-06-21 08:40:00', 'anunciante', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(1613, '2017-06-21 08:45:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1614, '2017-06-21 09:11:00', 'geral', 1, 'listarPorId', '66.249.85.18', 2, NULL),
(1615, '2017-06-21 09:12:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1616, '2017-06-21 09:12:00', 'geral', 1, 'listarPorId', '66.249.85.17', 2, NULL),
(1617, '2017-06-21 09:14:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1618, '2017-06-21 09:20:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1619, '2017-06-21 09:20:00', 'geral', 1, 'listarPorId', '66.249.85.6', 2, NULL),
(1620, '2017-06-21 09:21:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1621, '2017-06-21 09:21:00', 'geral', 1, 'listarPorId', '66.249.85.16', 2, NULL),
(1622, '2017-06-21 09:23:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1623, '2017-06-21 09:23:00', 'subcategoria', 19, 'listarPorId', '179.105.162.17', 2, NULL),
(1624, '2017-06-21 09:23:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1625, '2017-06-21 09:23:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1626, '2017-06-21 09:23:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1627, '2017-06-21 09:23:00', 'subcategoria', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(1628, '2017-06-21 09:23:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1629, '2017-06-21 09:23:00', 'subcategoria', 19, 'listarPorId', '179.105.162.17', 2, NULL),
(1630, '2017-06-21 09:23:00', 'produto', 4, 'listarPorId', '179.105.162.17', 2, NULL),
(1631, '2017-06-21 09:23:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1632, '2017-06-21 09:23:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1633, '2017-06-21 09:23:00', 'produto', 4, 'listarPorId', '173.252.90.123', 2, NULL),
(1634, '2017-06-21 09:23:00', 'geral', 1, 'listarPorId', '173.252.90.123', 2, NULL),
(1635, '2017-06-21 09:23:00', 'anunciante', 1, 'listarPorId', '173.252.90.123', 2, NULL),
(1636, '2017-06-21 09:29:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1637, '2017-06-21 09:57:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1638, '2017-06-21 09:57:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1639, '2017-06-21 09:57:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1640, '2017-06-21 09:57:00', 'subcategoria', 19, 'listarPorId', '127.0.0.1', 2, NULL),
(1641, '2017-06-21 09:58:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1642, '2017-06-21 09:58:00', 'subcategoria', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1643, '2017-06-21 09:58:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1644, '2017-06-21 09:58:00', 'subcategoria', 2, 'listarPorId', '127.0.0.1', 2, NULL),
(1645, '2017-06-21 09:58:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1646, '2017-06-21 09:58:00', 'subcategoria', 19, 'listarPorId', '127.0.0.1', 2, NULL),
(1647, '2017-06-21 09:59:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1648, '2017-06-21 09:59:00', 'subcategoria', 19, 'listarPorId', '127.0.0.1', 2, NULL),
(1649, '2017-06-21 09:59:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1650, '2017-06-21 09:59:00', 'subcategoria', 19, 'listarPorId', '127.0.0.1', 2, NULL),
(1651, '2017-06-21 10:01:00', 'produto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(1652, '2017-06-21 10:01:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1653, '2017-06-21 10:01:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1654, '2017-06-21 10:02:00', 'produto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(1655, '2017-06-21 10:02:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1656, '2017-06-21 10:02:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1657, '2017-06-21 10:03:00', 'produto', 4, 'listarPorId', '127.0.0.1', 2, NULL),
(1658, '2017-06-21 10:03:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1659, '2017-06-21 10:03:00', 'anunciante', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1660, '2017-06-21 10:03:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1661, '2017-06-21 10:03:00', 'subcategoria', 19, 'listarPorId', '127.0.0.1', 2, NULL),
(1662, '2017-06-21 10:07:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1663, '2017-06-21 10:07:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1664, '2017-06-21 10:07:00', 'subcategoria', 19, 'listarPorId', '170.254.198.146', 2, NULL),
(1665, '2017-06-21 10:07:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1666, '2017-06-21 10:07:00', 'subcategoria', 19, 'listarPorId', '170.254.198.146', 2, NULL),
(1667, '2017-06-21 10:07:00', 'produto', 4, 'listarPorId', '170.254.198.146', 2, NULL),
(1668, '2017-06-21 10:07:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1669, '2017-06-21 10:07:00', 'anunciante', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1670, '2017-06-21 10:07:00', 'geral', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1671, '2017-06-21 10:07:00', 'categoria', 1, 'listarPorId', '127.0.0.1', 2, NULL),
(1672, '2017-06-21 10:07:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1673, '2017-06-21 10:07:00', 'categoria', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1674, '2017-06-21 10:07:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1675, '2017-06-21 10:07:00', 'subcategoria', 19, 'listarPorId', '170.254.198.146', 2, NULL),
(1676, '2017-06-21 10:07:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1677, '2017-06-21 10:07:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1678, '2017-06-21 10:07:00', 'categoria', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1679, '2017-06-21 10:07:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1680, '2017-06-21 10:28:00', 'geral', 1, 'listarPorId', '170.254.198.146', 2, NULL),
(1681, '2017-06-21 11:09:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1682, '2017-06-21 11:09:00', 'subcategoria', 15, 'listarPorId', '177.126.91.190', 2, NULL),
(1683, '2017-06-21 11:09:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1684, '2017-06-21 11:40:00', 'geral', 1, 'listarPorId', '177.126.91.130', 2, NULL),
(1685, '2017-06-21 11:40:00', 'subcategoria', 19, 'listarPorId', '177.126.91.130', 2, NULL),
(1686, '2017-06-21 11:40:00', 'geral', 1, 'listarPorId', '177.126.91.130', 2, NULL),
(1687, '2017-06-21 11:41:00', 'geral', 1, 'listarPorId', '177.126.91.130', 2, NULL),
(1688, '2017-06-21 11:41:00', 'subcategoria', 20, 'listarPorId', '177.126.91.130', 2, NULL),
(1689, '2017-06-21 11:41:00', 'geral', 1, 'listarPorId', '177.126.91.130', 2, NULL),
(1690, '2017-06-21 11:41:00', 'categoria', 7, 'listarPorId', '177.126.91.130', 2, NULL),
(1691, '2017-06-21 11:41:00', 'geral', 1, 'listarPorId', '177.126.91.130', 2, NULL),
(1692, '2017-06-21 11:41:00', 'categoria', 1, 'listarPorId', '177.126.91.130', 2, NULL),
(1693, '2017-06-21 11:41:00', 'geral', 1, 'listarPorId', '177.126.91.130', 2, NULL),
(1694, '2017-06-21 11:41:00', 'subcategoria', 13, 'listarPorId', '177.126.91.130', 2, NULL),
(1695, '2017-06-21 11:41:00', 'geral', 1, 'listarPorId', '177.126.91.130', 2, NULL),
(1696, '2017-06-21 11:41:00', 'categoria', 2, 'listarPorId', '177.126.91.130', 2, NULL),
(1697, '2017-06-21 11:41:00', 'geral', 1, 'listarPorId', '177.126.91.130', 2, NULL),
(1698, '2017-06-21 11:42:00', 'categoria', 1, 'listarPorId', '177.126.91.130', 2, NULL),
(1699, '2017-06-21 11:48:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1700, '2017-06-21 11:48:00', 'produto', 8, 'listarPorId', '179.105.162.17', 2, NULL),
(1701, '2017-06-21 11:48:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1702, '2017-06-21 11:48:00', 'anunciante', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(1703, '2017-06-21 11:48:00', 'produto', 8, 'listarPorId', '173.252.90.107', 2, NULL),
(1704, '2017-06-21 11:48:00', 'geral', 1, 'listarPorId', '173.252.90.107', 2, NULL),
(1705, '2017-06-21 11:48:00', 'anunciante', 2, 'listarPorId', '173.252.90.107', 2, NULL),
(1706, '2017-06-21 11:48:00', 'paginatexto', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(1707, '2017-06-21 11:48:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1708, '2017-06-21 11:49:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1709, '2017-06-21 11:49:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1710, '2017-06-21 11:49:00', 'produto', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1711, '2017-06-21 11:49:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1712, '2017-06-21 11:49:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1713, '2017-06-21 11:50:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1714, '2017-06-21 14:11:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1715, '2017-06-21 14:11:00', 'produto', 8, 'listarPorId', '179.105.162.17', 2, NULL),
(1716, '2017-06-21 14:11:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1717, '2017-06-21 14:11:00', 'anunciante', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(1718, '2017-06-21 14:12:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1719, '2017-06-21 14:12:00', 'produto', 6, 'listarPorId', '179.105.162.17', 2, NULL),
(1720, '2017-06-21 14:12:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1721, '2017-06-21 14:12:00', 'anunciante', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(1722, '2017-06-21 14:12:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1723, '2017-06-21 14:12:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1724, '2017-06-21 14:12:00', 'subcategoria', 17, 'listarPorId', '179.105.162.17', 2, NULL),
(1725, '2017-06-21 14:12:00', 'produto', 2, 'listarPorId', '179.105.162.17', 2, NULL),
(1726, '2017-06-21 14:12:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1727, '2017-06-21 14:12:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1728, '2017-06-21 14:12:00', 'subcategoria', 17, 'listarPorId', '179.105.162.17', 2, NULL),
(1729, '2017-06-21 14:17:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1730, '2017-06-21 14:29:00', 'produto', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1731, '2017-06-21 14:29:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1732, '2017-06-21 14:29:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1733, '2017-06-21 14:29:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1734, '2017-06-21 22:07:00', 'geral', 1, 'listarPorId', '66.249.88.2', 2, NULL),
(1735, '2017-06-21 22:07:00', 'geral', 1, 'listarPorId', '66.249.88.61', 2, NULL),
(1736, '2017-06-22 09:32:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1737, '2017-06-22 10:14:00', 'admin', 0, 'tentativaLogin', '179.105.162.17', 2, NULL),
(1738, '2017-06-22 10:15:00', 'admin', 1, 'login', '179.105.162.17', 1, 1),
(1739, '2017-06-22 10:15:00', 'admin', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1740, '2017-06-22 10:16:00', 'admin', 1, 'login', '179.105.162.17', 1, 1),
(1741, '2017-06-22 10:16:00', 'admin', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1742, '2017-06-22 10:17:00', 'admin', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1743, '2017-06-22 10:18:00', 'admin', 1, 'atualizar', '179.105.162.17', 2, 1),
(1744, '2017-06-22 10:19:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1745, '2017-06-22 10:19:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1746, '2017-06-22 10:19:00', 'anunciante', 1, 'atualizar', '179.105.162.17', 2, 1),
(1747, '2017-06-22 10:19:00', 'anunciante', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1748, '2017-06-22 10:19:00', 'geral', 1, 'listarPorId', '179.105.162.17', 1, 1),
(1749, '2017-06-22 10:20:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1750, '2017-06-22 10:20:00', 'produto', 4, 'listarPorId', '177.126.91.190', 2, NULL),
(1751, '2017-06-22 10:20:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1752, '2017-06-22 10:20:00', 'anunciante', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1753, '2017-06-22 10:23:00', 'paginatexto', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1754, '2017-06-22 10:23:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1755, '2017-06-22 10:23:00', 'paginatexto', 2, 'listarPorId', '177.126.91.190', 2, NULL),
(1756, '2017-06-22 10:23:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1757, '2017-06-22 10:23:00', 'paginatexto', 3, 'listarPorId', '177.126.91.190', 2, NULL),
(1758, '2017-06-22 10:23:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1759, '2017-06-22 10:23:00', 'paginatexto', 4, 'listarPorId', '177.126.91.190', 2, NULL),
(1760, '2017-06-22 10:23:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1761, '2017-06-22 10:23:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1762, '2017-06-22 10:24:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1763, '2017-06-22 10:25:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1764, '2017-06-22 10:25:00', 'subcategoria', 15, 'listarPorId', '177.126.91.190', 2, NULL),
(1765, '2017-06-22 10:25:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1766, '2017-06-22 10:25:00', 'subcategoria', 5, 'listarPorId', '177.126.91.190', 2, NULL),
(1767, '2017-06-22 10:26:00', 'admin', 1, 'login', '177.126.91.190', 1, 1),
(1768, '2017-06-22 10:26:00', 'admin', 1, 'listarPorId', '177.126.91.190', 1, 1),
(1769, '2017-06-22 10:26:00', 'geral', 1, 'listarPorId', '177.126.91.190', 1, 1),
(1770, '2017-06-22 10:26:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1771, '2017-06-22 10:27:00', 'geral', 1, 'atualizar', '177.126.91.190', 2, 1),
(1772, '2017-06-22 10:27:00', 'geral', 1, 'listarPorId', '177.126.91.190', 1, 1),
(1773, '2017-06-22 10:27:00', 'produto', 4, 'listarPorId', '177.126.91.190', 2, NULL),
(1774, '2017-06-22 10:27:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1775, '2017-06-22 10:27:00', 'anunciante', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1776, '2017-06-22 10:27:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1777, '2017-06-22 10:28:00', 'categoria', 1, 'listarPorId', '177.126.91.190', 1, 1),
(1778, '2017-06-22 10:28:00', 'categoria', 5, 'listarPorId', '177.126.91.190', 1, 1),
(1779, '2017-06-22 10:28:00', 'subcategoria', 1, 'listarPorId', '177.126.91.190', 1, 1),
(1780, '2017-06-22 11:15:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1781, '2017-06-22 11:16:00', 'anunciante', 7, 'salvar', '177.126.91.190', 2, NULL),
(1782, '2017-06-22 11:17:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1783, '2017-06-22 11:17:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1784, '2017-06-22 13:19:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1785, '2017-06-22 16:58:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1786, '2017-06-22 16:58:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1787, '2017-06-22 16:58:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1788, '2017-06-22 16:59:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1789, '2017-06-22 16:59:00', 'subcategoria', 2, 'listarPorId', '177.126.91.190', 2, NULL),
(1790, '2017-06-22 16:59:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1791, '2017-06-22 16:59:00', 'subcategoria', 16, 'listarPorId', '177.126.91.190', 2, NULL),
(1792, '2017-06-22 16:59:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1793, '2017-06-22 16:59:00', 'categoria', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1794, '2017-06-22 17:00:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1795, '2017-06-22 17:00:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1796, '2017-06-22 17:00:00', 'subcategoria', 5, 'listarPorId', '177.126.91.190', 2, NULL),
(1797, '2017-06-22 17:00:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1798, '2017-06-22 17:00:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1799, '2017-06-22 17:00:00', 'subcategoria', 8, 'listarPorId', '177.126.91.190', 2, NULL),
(1800, '2017-06-22 17:00:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1801, '2017-06-22 17:00:00', 'categoria', 2, 'listarPorId', '177.126.91.190', 2, NULL),
(1802, '2017-06-22 17:00:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1803, '2017-06-22 17:00:00', 'subcategoria', 15, 'listarPorId', '177.126.91.190', 2, NULL),
(1804, '2017-06-22 17:00:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1805, '2017-06-22 17:00:00', 'subcategoria', 2, 'listarPorId', '177.126.91.190', 2, NULL),
(1806, '2017-06-22 17:00:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1807, '2017-06-22 17:01:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1808, '2017-06-22 17:01:00', 'subcategoria', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1809, '2017-06-22 17:01:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1810, '2017-06-22 17:01:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1811, '2017-06-22 17:01:00', 'subcategoria', 16, 'listarPorId', '177.126.91.190', 2, NULL),
(1812, '2017-06-22 17:01:00', 'subcategoria', 2, 'listarPorId', '177.126.91.190', 2, NULL),
(1813, '2017-06-22 17:01:00', 'produto', 6, 'listarPorId', '177.126.91.190', 2, NULL),
(1814, '2017-06-22 17:01:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1815, '2017-06-22 17:01:00', 'anunciante', 2, 'listarPorId', '177.126.91.190', 2, NULL),
(1816, '2017-06-22 17:01:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1817, '2017-06-22 17:01:00', 'categoria', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1818, '2017-06-22 17:01:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1819, '2017-06-22 17:02:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1820, '2017-06-22 17:02:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1821, '2017-06-22 17:03:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1822, '2017-06-22 17:03:00', 'admin', 1, 'login', '177.126.91.190', 1, 1),
(1823, '2017-06-22 17:03:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1824, '2017-06-22 17:03:00', 'categoria', 8, 'listarPorId', '177.126.91.190', 2, NULL),
(1825, '2017-06-22 17:03:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1826, '2017-06-22 17:03:00', 'subcategoria', 15, 'listarPorId', '177.126.91.190', 2, NULL),
(1827, '2017-06-22 17:03:00', 'admin', 1, 'listarPorId', '177.126.91.190', 1, 1),
(1828, '2017-06-22 17:03:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1829, '2017-06-22 17:03:00', 'categoria', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1830, '2017-06-22 17:03:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1831, '2017-06-22 17:03:00', 'categoria', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1832, '2017-06-22 17:04:00', 'geral', 1, 'listarPorId', '177.126.91.190', 1, 1),
(1833, '2017-06-22 17:53:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1834, '2017-06-22 20:28:00', 'geral', 1, 'listarPorId', '181.222.177.83', 2, NULL),
(1835, '2017-06-22 20:30:00', 'geral', 1, 'listarPorId', '181.222.177.83', 2, NULL),
(1836, '2017-06-23 15:20:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1837, '2017-06-23 15:20:00', 'produto', 3, 'listarPorId', '::1', 2, NULL),
(1838, '2017-06-23 15:20:00', 'geral', 1, 'listarPorId', '::1', 2, NULL),
(1839, '2017-06-23 15:20:00', 'anunciante', 1, 'listarPorId', '::1', 2, NULL),
(1840, '2017-06-23 16:11:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1841, '2017-06-23 16:15:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1842, '2017-06-23 16:15:00', 'subcategoria', 19, 'listarPorId', '177.126.91.190', 2, NULL),
(1843, '2017-06-23 16:16:00', 'produto', 4, 'listarPorId', '177.126.91.190', 2, NULL),
(1844, '2017-06-23 16:16:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1845, '2017-06-23 16:16:00', 'anunciante', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1846, '2017-06-23 17:03:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1847, '2017-06-23 17:03:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1848, '2017-06-23 23:36:00', 'geral', 1, 'listarPorId', '181.222.177.83', 2, NULL),
(1849, '2017-06-24 10:22:00', 'geral', 1, 'listarPorId', '191.8.206.8', 2, NULL),
(1850, '2017-06-24 10:24:00', 'geral', 1, 'listarPorId', '66.249.88.61', 2, NULL),
(1851, '2017-06-24 13:43:00', 'geral', 1, 'listarPorId', '181.222.177.83', 2, NULL),
(1852, '2017-06-24 16:34:00', 'geral', 1, 'listarPorId', '200.103.37.211', 2, NULL),
(1853, '2017-06-24 16:34:00', 'geral', 1, 'listarPorId', '200.103.37.211', 2, NULL),
(1854, '2017-06-25 15:57:00', 'geral', 1, 'listarPorId', '66.249.88.2', 2, NULL),
(1855, '2017-06-26 10:10:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1856, '2017-06-28 17:45:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1857, '2017-06-28 17:45:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL),
(1858, '2017-06-28 17:49:00', 'geral', 1, 'listarPorId', '181.222.164.149', 2, NULL),
(1859, '2017-06-28 17:50:00', 'geral', 1, 'listarPorId', '181.222.164.149', 2, NULL),
(1860, '2017-06-29 17:34:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1861, '2017-06-29 17:35:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1862, '2017-06-29 17:37:00', 'paginatexto', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1863, '2017-06-29 17:37:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1864, '2017-06-29 17:37:00', 'paginatexto', 2, 'listarPorId', '177.126.91.190', 2, NULL),
(1865, '2017-06-29 17:37:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1866, '2017-06-29 17:37:00', 'paginatexto', 4, 'listarPorId', '177.126.91.190', 2, NULL),
(1867, '2017-06-29 17:37:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL);
INSERT INTO `log` (`idlog`, `dt`, `tabela`, `chave`, `acao`, `ip`, `tipo`, `admin_idadmin`) VALUES
(1868, '2017-06-29 17:37:00', 'paginatexto', 3, 'listarPorId', '177.126.91.190', 2, NULL),
(1869, '2017-06-29 17:37:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1870, '2017-06-29 17:37:00', 'paginatexto', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1871, '2017-06-29 17:37:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1872, '2017-06-29 17:38:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1873, '2017-06-29 17:39:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1874, '2017-06-29 17:39:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1875, '2017-06-29 17:40:00', 'geral', 1, 'listarPorId', '177.126.91.190', 2, NULL),
(1876, '2017-07-05 19:00:00', 'geral', 1, 'listarPorId', '179.105.162.17', 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` int(11) NOT NULL,
  `nome` varchar(45) COLLATE latin1_general_ci NOT NULL COMMENT 'Nome',
  `posicao` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='nome';

--
-- Extraindo dados da tabela `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `nome`, `posicao`) VALUES
(1, 'Controle de Acesso', 0),
(2, 'Logs', 0),
(3, 'destaque', 0),
(4, 'categoria', 0),
(5, 'subcategoria', 0),
(6, 'anunciante', 0),
(7, 'parceiro', 0),
(8, 'paginatexto', 0),
(9, 'noticia', 0),
(10, 'geral', 0),
(11, 'produto', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE `noticia` (
  `idnoticia` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Título',
  `dt` date NOT NULL COMMENT 'Data',
  `texto` longtext COLLATE latin1_general_ci NOT NULL COMMENT 'Texto'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='titulo*Notícia-Notícias';

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`idnoticia`, `titulo`, `dt`, `texto`) VALUES
(1, '\'Chegaremos ao fim de 2018 com a casa em ordem\', diz Temer', '2017-06-06', '<p>\n	O presidente da Rep&uacute;blica, Michel Temer (PMDB), afirmou nesta ter&ccedil;a-feira (30) que a trajet&oacute;ria de seu governo, segundo ele marcada por reformas e por medidas para tentar recuperar a economia, n&atilde;o ser&aacute; &quot;interrompida&quot; e que chegar&aacute; ao final de 2018 com a &quot;casa em ordem&quot;. &quot;Estamos no rumo certo, colocamos o pa&iacute;s nos trilhos. Quem assumir encontrar&aacute; os trilhos em seu lugar, por isso agora &eacute; continuar a travessia, chegaremos ao fim de 2018 com a casa em ordem&quot;, disse. Temer participou da abertura do Brazil Investment Forum, em S&atilde;o Paulo. &quot;Esta trajet&oacute;ria que tra&ccedil;amos logo no in&iacute;cio do nosso governo n&atilde;o ser&aacute; interrompida. Nela n&oacute;s seguiremos firmes em nome da agenda de reformas que n&atilde;o poderemos abandonar&quot;, afirmou.</p>\n'),
(2, 'Com "bom pressentimento", Demian quer lutar com Woodley em outubro', '2017-06-06', '<p>\n	N&uacute;mero 1 do ranking peso-meio-m&eacute;dio do UFC, Demian Maia deve ser o pr&oacute;ximo desafiante ao cintur&atilde;o do campe&atilde;o Tyron Woodley. Ap&oacute;s vencer Jorge Masvidal no m&ecirc;s passado, em Dallas, o lutador brasileiro espera voltar ao oct&oacute;gono apenas em outubro, justamente na luta pelo t&iacute;tulo. Mas ele sabe que o Ultimate pode marcar esse duelo para antes disso, e se disse com um bom pressentimento.</p>\n<p>\n	- Quero lutar, se pudesse escolher, em outubro. Pelo que o UFC falou, vai ser a luta pelo cintur&atilde;o com o Tyron Woodley, agora depende de eles marcarem a data (...). Estou com um bom pressentimento para essa luta. Nesse n&iacute;vel de top 5, top 10, qualquer um pode ganhar. Ainda mais no meu peso, considero que tem uns cinco ou seis ali que podem ser campe&otilde;es. Mas o campe&atilde;o &eacute; o Tyron e sei que vai ser uma luta dif&iacute;cil, mas acho que tenho uma boa chance de ganhar - disse Demian, confiante, durante entrevista ao Combate.com.</p>\n'),
(3, 'Silêncio do Botafogo preocupa Jefferson em renovação; clube prepara oferta', '2017-06-06', '<p>\n	Entre idas e vindas, Botafogo e Jefferson t&ecirc;m uma rela&ccedil;&atilde;o de quase 15 anos. Somando as duas passagens s&atilde;o quase dez temporadas em General Severiano. Um casamento feliz, que ainda parece estar longe do fim. Assim desejam clube e jogador. Por&eacute;m, como em toda longa rela&ccedil;&atilde;o, as partes precisam sentar e conversar.</p>\n<p>\n	Jefferson tem contrato at&eacute; dezembro e ainda n&atilde;o foi procurado para renovar. Fato que preocupa o goleiro. A pessoas pr&oacute;ximas, ele afirma causar estranhamento o fato de ningu&eacute;m no clube ter o procurado at&eacute; o momento. O Botafogo vem negociando com v&aacute;rios atletas com contrato at&eacute; o fim do ano. Igor Rabello, por exemplo, renovou nesta segunda-feira.</p>\n'),
(4, 'Sampaoli ensaia Argentina com Messi, Dybala e Higuaín para pegar o Brasil', '2017-06-06', '<p>\n	Em seu segundo dia de trabalhos como t&eacute;cnico da Argentina, Jorge Sampaoli come&ccedil;ou a dar sua cara ao time que enfrenta o Brasil em amistoso na pr&oacute;xima sexta-feira, em Melbourne, na Austr&aacute;lia. Diferente de seu antecessor, Edgardo Bauza, o novo comandante ensaiou um time bastante ofensivo, com tr&ecirc;s zagueiros e sem laterais, juntando Di Mar&iacute;a, Messi, Dybala e Higua&iacute;n na forma&ccedil;&atilde;o.</p>\n<p>\n	Segundo o jornal Ol&eacute;, que acompanhou a atividade desta ter&ccedil;a-feira, o treinador tentou dar uma din&acirc;mica de press&atilde;o ofensiva &agrave; Argentina. O esquema de tr&ecirc;s zagueiros ficou guarnecido com a marca&ccedil;&atilde;o da dupla Biglia e Banega no meio-campo, com Salvio e Di Mar&iacute;a mais soltos para atacar pelas pontas, sem se posicionarem como laterais. &Agrave; frente, Dybala e Messi atuaram sem posi&ccedil;&atilde;o fixa, enquanto Higua&iacute;n ficou como um homem fixo, na &aacute;rea.</p>\n<p>\n	Se mantiver a equipe, a Argentina deve enfrentar o Brasil com Romero; Mercado, Mammana e Otamendi; Salvio, Biglia, Banega e Di Mar&iacute;a; Messi, Dybala e Higua&iacute;n.</p>\n<p>\n	A quatro rodadas para o fim das eliminat&oacute;rias sul-americanas para a Copa do Mundo, a Argentina est&aacute; na 5&ordf; coloca&ccedil;&atilde;o da tabela, o que lhe valeria apenas uma vaga na repescagem contra uma sele&ccedil;&atilde;o da Oceania pelo direito de disputar o torneio.</p>\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagina`
--

CREATE TABLE `pagina` (
  `idpagina` int(11) NOT NULL,
  `modulo_idmodulo` int(11) NOT NULL,
  `nome` varchar(65) COLLATE latin1_general_ci NOT NULL,
  `descricao` varchar(120) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `posicao` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='nome';

--
-- Extraindo dados da tabela `pagina`
--

INSERT INTO `pagina` (`idpagina`, `modulo_idmodulo`, `nome`, `descricao`, `posicao`) VALUES
(1, 1, 'cadAdmin', 'cadAdmin', 0),
(2, 1, 'listAdmin', 'listAdmin', 0),
(3, 1, 'alterarDados', 'alterarDados', 0),
(4, 1, 'cadPerfil', 'cadPerfil', 0),
(5, 1, 'listPerfil', 'listPerfil', 0),
(6, 2, 'listLog', 'listLog', 0),
(7, 3, 'cadDestaque', 'cadDestaque', 0),
(8, 3, 'listDestaque', 'listDestaque', 0),
(9, 3, 'orderDestaque', 'orderDestaque', 0),
(10, 3, 'cropDestaque', 'cropDestaque', 0),
(11, 3, 'crop2Destaque', 'crop2Destaque', 0),
(12, 4, 'cadCategoria', 'cadCategoria', 0),
(13, 4, 'listCategoria', 'listCategoria', 0),
(14, 4, 'orderCategoria', 'orderCategoria', 0),
(15, 4, 'cropCategoria', 'cropCategoria', 0),
(16, 4, 'crop2Categoria', 'crop2Categoria', 0),
(17, 5, 'cadSubcategoria', 'cadSubcategoria', 0),
(18, 5, 'listSubcategoria', 'listSubcategoria', 0),
(19, 5, 'orderSubcategoria', 'orderSubcategoria', 0),
(20, 5, 'cropSubcategoria', 'cropSubcategoria', 0),
(21, 5, 'crop2Subcategoria', 'crop2Subcategoria', 0),
(22, 6, 'cadAnunciante', 'cadAnunciante', 0),
(23, 6, 'listAnunciante', 'listAnunciante', 0),
(24, 6, 'orderAnunciante', 'orderAnunciante', 0),
(25, 6, 'cropAnunciante', 'cropAnunciante', 0),
(26, 6, 'crop2Anunciante', 'crop2Anunciante', 0),
(27, 7, 'cadParceiro', 'cadParceiro', 0),
(28, 7, 'listParceiro', 'listParceiro', 0),
(29, 7, 'orderParceiro', 'orderParceiro', 0),
(30, 7, 'cropParceiro', 'cropParceiro', 0),
(31, 7, 'crop2Parceiro', 'crop2Parceiro', 0),
(32, 8, 'cadPaginatexto', 'cadPaginatexto', 0),
(33, 8, 'listPaginatexto', 'listPaginatexto', 0),
(34, 8, 'orderPaginatexto', 'orderPaginatexto', 0),
(35, 8, 'cropPaginatexto', 'cropPaginatexto', 0),
(36, 8, 'crop2Paginatexto', 'crop2Paginatexto', 0),
(37, 9, 'cadNoticia', 'cadNoticia', 0),
(38, 9, 'listNoticia', 'listNoticia', 0),
(39, 9, 'orderNoticia', 'orderNoticia', 0),
(40, 9, 'cropNoticia', 'cropNoticia', 0),
(41, 9, 'crop2Noticia', 'crop2Noticia', 0),
(42, 10, 'cadGeral', 'cadGeral', 0),
(43, 10, 'listGeral', 'listGeral', 0),
(44, 10, 'orderGeral', 'orderGeral', 0),
(45, 10, 'cropGeral', 'cropGeral', 0),
(46, 10, 'crop2Geral', 'crop2Geral', 0),
(47, 11, 'cadProduto', 'cadProduto', 0),
(48, 11, 'listProduto', 'listProduto', 0),
(49, 11, 'orderProduto', 'orderProduto', 0),
(50, 11, 'cropProduto', 'cropProduto', 0),
(51, 11, 'crop2Produto', 'crop2Produto', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginatexto`
--

CREATE TABLE `paginatexto` (
  `idpaginatexto` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Título',
  `texto` longtext COLLATE latin1_general_ci NOT NULL COMMENT 'Texto',
  `posicao` int(10) UNSIGNED NOT NULL COMMENT 'Posição'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='titulo*Página de Texto-Páginas de Texto';

--
-- Extraindo dados da tabela `paginatexto`
--

INSERT INTO `paginatexto` (`idpaginatexto`, `titulo`, `texto`, `posicao`) VALUES
(1, 'Sobre Nós', '<p>\n	Sed id eleifend mi. Aliquam fringilla urna dui, a fringilla sapien eleifend molestie. Pellentesque eget felis et ligula consectetur feugiat aecenas lobortis orci ac magna gravida dignissim. Phasellus eget tempor ligula, et pulvinar ante. Maecenas tempor ante auctor magna porta, sed lobortis dolor auctored posuere lacus et posuere aliquet. Sed non leo in diam ultrices scelerisque ac vitae ante.</p>\n<p>\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras cursus enim et velit semper consectetur. Ut dignissim sed quam malesuada posuere. Nullam suscipit elit eu tellus imperdiet, non mollis erat auctor. Vivamus non molestie turpis, et faucibus nisi. Suspendisse in justo ut mi accumsan hendrerit.</p>\n<p>\n	Suspendisse quis tempus justo. Pellentesque vehicula, ex eu lobortis auctor, tortor dolor pharetra lacus, quis pellentesque diam diam posuere arcu. Duis at blandit felis.&nbsp;</p>\n', 1),
(2, 'Objetivos', '<p>\n	Sed id eleifend mi. Aliquam fringilla urna dui, a fringilla sapien eleifend molestie. Pellentesque eget felis et ligula consectetur feugiat aecenas lobortis orci ac magna gravida dignissim. Phasellus eget tempor ligula, et pulvinar ante. Maecenas tempor ante auctor magna porta, sed lobortis dolor auctored posuere lacus et posuere aliquet. Sed non leo in diam ultrices scelerisque ac vitae ante.</p>\n<p>\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras cursus enim et velit semper consectetur. Ut dignissim sed quam malesuada posuere. Nullam suscipit elit eu tellus imperdiet, non mollis erat auctor. Vivamus non molestie turpis, et faucibus nisi. Suspendisse in justo ut mi accumsan hendrerit.</p>\n<p>\n	Suspendisse quis tempus justo. Pellentesque vehicula, ex eu lobortis auctor, tortor dolor pharetra lacus, quis pellentesque diam diam posuere arcu. Duis at blandit felis.&nbsp;</p>\n', 2),
(3, 'Responsabilidade', '<p>\n	Sed id eleifend mi. Aliquam fringilla urna dui, a fringilla sapien eleifend molestie. Pellentesque eget felis et ligula consectetur feugiat aecenas lobortis orci ac magna gravida dignissim. Phasellus eget tempor ligula, et pulvinar ante. Maecenas tempor ante auctor magna porta, sed lobortis dolor auctored posuere lacus et posuere aliquet. Sed non leo in diam ultrices scelerisque ac vitae ante.</p>\n<p>\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras cursus enim et velit semper consectetur. Ut dignissim sed quam malesuada posuere. Nullam suscipit elit eu tellus imperdiet, non mollis erat auctor. Vivamus non molestie turpis, et faucibus nisi. Suspendisse in justo ut mi accumsan hendrerit.</p>\n<p>\n	Suspendisse quis tempus justo. Pellentesque vehicula, ex eu lobortis auctor, tortor dolor pharetra lacus, quis pellentesque diam diam posuere arcu. Duis at blandit felis.&nbsp;</p>\n', 3),
(4, 'Parceiros', '<p>\n	Sed id eleifend mi. Aliquam fringilla urna dui, a fringilla sapien eleifend molestie. Pellentesque eget felis et ligula consectetur feugiat aecenas lobortis orci ac magna gravida dignissim. Phasellus eget tempor ligula, et pulvinar ante. Maecenas tempor ante auctor magna porta, sed lobortis dolor auctored posuere lacus et posuere aliquet. Sed non leo in diam ultrices scelerisque ac vitae ante.</p>\n', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiro`
--

CREATE TABLE `parceiro` (
  `idparceiro` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Nome',
  `url` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'URL',
  `logotipo` varchar(123) COLLATE latin1_general_ci NOT NULL COMMENT 'Logotipo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='nome*Parceiro-Parceiros';

--
-- Extraindo dados da tabela `parceiro`
--

INSERT INTO `parceiro` (`idparceiro`, `nome`, `url`, `logotipo`) VALUES
(1, 'Parmalat', 'http://www.parmalat.com.br', '20170606135614.png'),
(2, 'Seara', 'http://www.palmasite.com.br', '20170606135741.png'),
(3, 'Perdigão', 'http://www.palmasite.com.br', '20170606140059.png'),
(4, 'Sadia', 'http://www.palmasite.com.br', '20170606140153.png'),
(5, 'Coca Cola', 'http://www.palmasite.com.br', '20170606140427.png'),
(6, 'Votorantim', 'http://www.palmasite.com.br', '20170606140519.png'),
(7, 'Cemig', 'http://www.palmasite.com.br', '20170606140654.png'),
(8, 'Furnas', 'http://www.palmasite.com.br', '20170606140830.png'),
(9, 'Teste', 'http://www.palmasite.com.br', '20170609173513.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `idperfil` int(11) NOT NULL COMMENT 'perfilmodulo-n',
  `nome` varchar(45) COLLATE latin1_general_ci NOT NULL COMMENT 'Nome'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='nome';

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idperfil`, `nome`) VALUES
(1, 'Master');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfilmodulo`
--

CREATE TABLE `perfilmodulo` (
  `idperfilmodulo` int(11) NOT NULL,
  `perfil_idperfil` int(11) NOT NULL,
  `modulo_idmodulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `perfilmodulo`
--

INSERT INTO `perfilmodulo` (`idperfilmodulo`, `perfil_idperfil`, `modulo_idmodulo`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idproduto` int(10) UNSIGNED NOT NULL COMMENT 'produtofoto-f',
  `anunciante_idanunciante` int(10) UNSIGNED NOT NULL COMMENT 'Anunciante',
  `categoria_idcategoria` int(10) UNSIGNED NOT NULL COMMENT 'Categoria',
  `subcategoria_idsubcategoria` int(10) UNSIGNED NOT NULL COMMENT 'Subcategoria',
  `titulo` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Título',
  `descricao` longtext COLLATE latin1_general_ci NOT NULL COMMENT 'Descrição',
  `preco` double NOT NULL COMMENT 'Preço',
  `fpagamento` longtext COLLATE latin1_general_ci NOT NULL COMMENT 'Formas de Pagamento',
  `fotodestaque` varchar(123) COLLATE latin1_general_ci NOT NULL COMMENT 'Foto de Destaque',
  `destaque` tinyint(3) UNSIGNED NOT NULL COMMENT 'Destaque na Home?'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='titulo*Produto-Produtos';

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idproduto`, `anunciante_idanunciante`, `categoria_idcategoria`, `subcategoria_idsubcategoria`, `titulo`, `descricao`, `preco`, `fpagamento`, `fotodestaque`, `destaque`) VALUES
(1, 1, 7, 16, 'Santo Antônio', 'Santo Antônio! \n \nConfeccionado com tecido 100% algodão, enchimento anti-alérgico. \n \nPara casamentos, decoração, etc... \n \nO bonequinho mede entre 25cm e 27cm de altura. \n \nOBS: Opção do cabelinho: Com cachinhos ou mais ralinho (como na foto), informar no ato da compra. \n \nOpção da plaquinha na mão com o nome dos noivos, acréscimo de 8,00 (informar no ato da compra para ajuste do valor).\n\n    Código do produto: 265E6C\n    Adicionado em: 20/09/2012\n', 55, 'Crédito, Débito e Dinheiro.', '20170620184218.jpg', 1),
(2, 1, 6, 17, 'Brinco de capim dourado', 'Biojoias de Capim dourado. Peças artesanais exclusivas. \n \nConheça um pouco do Ouro Vegetal do Brasil \nO capim dourado é uma espécie de sempre-viva da família Eriocaulaceae (Syngonanthus nitens Ruhland) que ocorre na região do Jalapão (TO), com a palha do qual se faz artesanatos, tais como: pulseiras, brincos, chaveiros, bolsas, cintos, vasos, peças de decoração entre outros. \nSua característica principal é a cor que lembra a do ouro. A principal localidade, onde começou o desenvolvimento da produção artesanal, é Mumbuca em Tocantins, um vilarejo localizado no município de Mateiros. \nO Capim Dourado só pode ser colhido entre 20 de Setembro e 20 de Novembro para que não entre em extinção.\n\n    Código do produto: 86AB1A\n    Adicionado em: 13/01/2017\n', 24.9, 'Crédito, Débito e Dinheiro', '20170620184701.jpg', 1),
(3, 1, 7, 18, 'Mini terço feito com capim dourado', 'Mini terço feito com capim dourado.\n\n    Código do produto: 31799A\n    Adicionado em: 31/05/2013\n', 25, 'Crédito, Débito e Dinheiro', '20170620185003.jpg', 1),
(4, 1, 1, 19, 'Cookies Recheados', 'Cookies recheados com diversas opções de recheios: \nBrigadeiro, brigadeiro branco, doce de leite, nutella, brigadeiro de morango, beijinho de coco, paçoca, limão e maracujá. \nEmbalados no celofane e fita.\n\n    Altura: 4.00 cm\n    Largura: 5.00 cm\n    Comprimento: 5.00 cm\n    Peso: 60 g\n    Código do produto: 7012E4\n    Adicionado em: 23/05/2016\n', 4.3, 'Crédito, Débito e Dinheiro', '20170620185353.jpg', 1),
(5, 1, 1, 19, 'Cupcake - Turma do Snoopy', 'Cupcakes decorados tema Snoopy\n\nOpções de massa:\n-baunilha\n-chocolate\n-red velvet (valor diferenciado, contatar vendedor)\n-cenoura\n-laranja\n-limão\n\nOpções cobertura\n-brigadeiros (branco, ou tradicional, ou rosa)\n-doce de leite\n-ganache chocolate ao leite, ou meio amargo ou branco\n-glacê real\n-chantininho\n-creme de queijo (doce) ', 6.9, '- Não enviamos bolos ou cupcakes via correios nem mensageiros (somente Uber) ', '20170620190125.jpg', 1),
(6, 2, 7, 16, 'Lembrancinha Dose Extra de Proteção 20ml', 'Dose extra de proteção para para presentear seus convidados e espalhar boas energias! Opção para batizado, maternidade, casamento, ou qualquer outro evento. Cartãozinho pode ser personalizado conforme sua escolha! Você também pode escolher outra cor de fita!!! \n \nFrasco de vidro 20 ml com rolha, fita de cetim verde, com sal grosso, lentinha, canela em pau e folha de louro. \n \n***PEDIDO MÍNIMO 05 UNIDADES*** \n \n*Produto artesanal, pode haver pequenas alterações de cores ou tamanho. Todos os produtos são feitos sob encomenda. \n \n***50% DE DESCONTO NO FRETE (E-SEDEX OU PAC) PARA COMPRAS ACIMA DE 200,00*** \n \n*** PRODUTO CRIADO, PRODUZIDO E COMERCIALIZADO PELA LOJA FULÔ DI FILÓ***\n\n    Altura: 6.00 cm\n    Largura: 3.00 cm\n    Comprimento: 3.00 cm\n    Peso: 52 g\n    Código do produto: 453238\n    Adicionado em: 12/09/2014', 7, 'Aceitamos Débito ou Crédito', '20170620183718.jpg', 1),
(7, 1, 1, 19, 'Brownies Recheados', 'Brownies artesaneis, sem conversantes super molinho e com muito recheio. Aproveite e garante um excelente doce para sua festa!!!!!\n\n    Altura: 2.00 cm\n    Largura: 5.00 cm\n    Comprimento: 5.00 cm\n    Peso: 50 g\n    Código do produto: 588A3C\n    Adicionado em: 12/08/2015\n', 4.99, 'Cartões de Crédito ou Débito. Aceito depósito para a Caixa.', '20170620185818.jpg', 1),
(8, 2, 4, 20, 'Cubo em MDF Arabesco', 'Cubo provençal em MDF cru de 6mm, ideal para decoração de festas, ambientes. valor unitário\n\n    Altura: 80.00 cm\n    Largura: 40.00 cm\n    Comprimento: 40.00 cm\n    Peso: 7000 g\n    Código do produto: 55B0CB\n    Adicionado em: 01/07/2015\n', 79.9, 'Todas', '20170620190624.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtofoto`
--

CREATE TABLE `produtofoto` (
  `idprodutofoto` int(10) UNSIGNED NOT NULL,
  `produto_idproduto` int(10) UNSIGNED NOT NULL COMMENT 'Produto',
  `arquivo` varchar(123) COLLATE latin1_general_ci NOT NULL COMMENT 'Arquivo',
  `posicao` int(10) UNSIGNED NOT NULL COMMENT 'Posição'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='arquivo*Fotos do Produto-Fotos do Produto';

--
-- Extraindo dados da tabela `produtofoto`
--

INSERT INTO `produtofoto` (`idprodutofoto`, `produto_idproduto`, `arquivo`, `posicao`) VALUES
(14, 6, 'lembrancinhadoseextradeprotecao20mllembrancinhamaternidade.jpg', 6),
(15, 6, 'lembrancinhadoseextradeprotecaoconvidados.jpg', 7),
(16, 6, 'lembrancinhadoseextradeprotecaoolhogordo.jpg', 8),
(17, 6, 'lembrancinhadoseextradeprotecaopote.jpg', 9),
(18, 1, 'santoadntoniobonecosantoantonio.jpg', 5),
(19, 1, 'santoantoniobdonecosantoantonio.jpg', 6),
(20, 1, 'santoantoniobonecosantoantonio.jpg', 7),
(21, 1, 'santoantonio.jpg', 8),
(22, 2, 'brincodecapimdouradomoda.jpg', 2),
(23, 3, 'minitercofeitocomcapimdourado.jpg', 2),
(24, 4, 'cookiesrecheadoscookiesrecheados.jpg', 2),
(25, 4, 'cookiesrecheadoscookies.jpg', 3),
(26, 4, 'cookiesrecheadosfestainfantil.jpg', 4),
(27, 4, 'cookiesrecheadospresentes.jpg', 5),
(28, 7, 'browniesrecheadosfestainfantil.jpg', 1),
(29, 7, 'browniesrecheadoslembrancas.jpg', 2),
(30, 7, 'browniesrecheadospresentes.jpg', 3),
(31, 5, 'cupcakesturmadosnoopysnoopy.jpg', 2),
(32, 5, 'cupcakesturmadosnoopyturmadosnoopy.jpg', 3),
(33, 8, 'cuboemmdfarabescocubo.jpg', 1),
(34, 8, 'cuboemmdfarabescodecoracaodefesta.jpg', 2),
(35, 8, 'cuboemmdfarabescolaser.jpg', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategoria`
--

CREATE TABLE `subcategoria` (
  `idsubcategoria` int(10) UNSIGNED NOT NULL,
  `categoria_idcategoria` int(10) UNSIGNED NOT NULL COMMENT 'Categoria',
  `nome` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'Nom'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='nome*Subcategoria-Subcategorias';

--
-- Extraindo dados da tabela `subcategoria`
--

INSERT INTO `subcategoria` (`idsubcategoria`, `categoria_idcategoria`, `nome`) VALUES
(1, 1, 'Comida'),
(2, 1, 'Bebida'),
(3, 7, 'Tapetes'),
(4, 7, 'Cestos'),
(5, 5, 'Berços'),
(6, 5, 'Brinquedos'),
(7, 6, 'Pulseiras'),
(8, 6, 'Colares'),
(9, 4, 'Quadros'),
(10, 4, 'Cortinas'),
(11, 3, 'Brinquedos'),
(12, 3, '15 anos'),
(13, 2, 'Roupas'),
(14, 2, 'Sapatos'),
(15, 8, 'Tecnologia'),
(16, 7, 'Lembrancinhas'),
(17, 6, 'Brincos'),
(18, 7, 'Religiosos'),
(19, 1, 'Doces'),
(20, 4, 'Aniversários e Festas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `token`
--

CREATE TABLE `token` (
  `idtoken` int(11) NOT NULL,
  `admin_idadmin` int(11) DEFAULT NULL,
  `dt` datetime DEFAULT NULL,
  `codigo` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`),
  ADD KEY `fk_admin_perfil1` (`perfil_idperfil`);

--
-- Indexes for table `anunciante`
--
ALTER TABLE `anunciante`
  ADD PRIMARY KEY (`idanunciante`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indexes for table `destaque`
--
ALTER TABLE `destaque`
  ADD PRIMARY KEY (`iddestaque`);

--
-- Indexes for table `geral`
--
ALTER TABLE `geral`
  ADD PRIMARY KEY (`idgeral`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idlog`),
  ADD KEY `fk_log_admin1` (`admin_idadmin`);

--
-- Indexes for table `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indexes for table `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`idnoticia`);

--
-- Indexes for table `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`idpagina`),
  ADD KEY `fk_pagina_modulo1` (`modulo_idmodulo`);

--
-- Indexes for table `paginatexto`
--
ALTER TABLE `paginatexto`
  ADD PRIMARY KEY (`idpaginatexto`);

--
-- Indexes for table `parceiro`
--
ALTER TABLE `parceiro`
  ADD PRIMARY KEY (`idparceiro`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idperfil`);

--
-- Indexes for table `perfilmodulo`
--
ALTER TABLE `perfilmodulo`
  ADD PRIMARY KEY (`idperfilmodulo`),
  ADD KEY `fk_perfilmodulo_modulo1` (`modulo_idmodulo`),
  ADD KEY `fk_perfilmodulo_perfil1` (`perfil_idperfil`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idproduto`),
  ADD KEY `fk_produto_anunciante_idanunciante_20427` (`anunciante_idanunciante`),
  ADD KEY `fk_produto_categoria_idcategoria_20406` (`categoria_idcategoria`),
  ADD KEY `fk_produto_subcategoria_idsubcategoria_20407` (`subcategoria_idsubcategoria`);

--
-- Indexes for table `produtofoto`
--
ALTER TABLE `produtofoto`
  ADD PRIMARY KEY (`idprodutofoto`),
  ADD KEY `fk_produtofoto_produto_idproduto_20414` (`produto_idproduto`);

--
-- Indexes for table `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`idsubcategoria`),
  ADD KEY `fk_subcategoria_categoria_idcategoria_20403` (`categoria_idcategoria`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`idtoken`),
  ADD KEY `admin_idadmin` (`admin_idadmin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `anunciante`
--
ALTER TABLE `anunciante`
  MODIFY `idanunciante` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `destaque`
--
ALTER TABLE `destaque`
  MODIFY `iddestaque` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `geral`
--
ALTER TABLE `geral`
  MODIFY `idgeral` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1877;
--
-- AUTO_INCREMENT for table `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `noticia`
--
ALTER TABLE `noticia`
  MODIFY `idnoticia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pagina`
--
ALTER TABLE `pagina`
  MODIFY `idpagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `paginatexto`
--
ALTER TABLE `paginatexto`
  MODIFY `idpaginatexto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `parceiro`
--
ALTER TABLE `parceiro`
  MODIFY `idparceiro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idperfil` int(11) NOT NULL AUTO_INCREMENT COMMENT 'perfilmodulo-n', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `perfilmodulo`
--
ALTER TABLE `perfilmodulo`
  MODIFY `idperfilmodulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idproduto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'produtofoto-f', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `produtofoto`
--
ALTER TABLE `produtofoto`
  MODIFY `idprodutofoto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `idsubcategoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `idtoken` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_perfil1` FOREIGN KEY (`perfil_idperfil`) REFERENCES `perfil` (`idperfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_log_admin1` FOREIGN KEY (`admin_idadmin`) REFERENCES `admin` (`idadmin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pagina`
--
ALTER TABLE `pagina`
  ADD CONSTRAINT `fk_pagina_modulo1` FOREIGN KEY (`modulo_idmodulo`) REFERENCES `modulo` (`idmodulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `perfilmodulo`
--
ALTER TABLE `perfilmodulo`
  ADD CONSTRAINT `fk_perfilmodulo_modulo1` FOREIGN KEY (`modulo_idmodulo`) REFERENCES `modulo` (`idmodulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_perfilmodulo_perfil1` FOREIGN KEY (`perfil_idperfil`) REFERENCES `perfil` (`idperfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_anunciante_idanunciante_20427` FOREIGN KEY (`anunciante_idanunciante`) REFERENCES `anunciante` (`idanunciante`),
  ADD CONSTRAINT `fk_produto_categoria_idcategoria_20406` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`),
  ADD CONSTRAINT `fk_produto_subcategoria_idsubcategoria_20407` FOREIGN KEY (`subcategoria_idsubcategoria`) REFERENCES `subcategoria` (`idsubcategoria`);

--
-- Limitadores para a tabela `produtofoto`
--
ALTER TABLE `produtofoto`
  ADD CONSTRAINT `fk_produtofoto_produto_idproduto_20414` FOREIGN KEY (`produto_idproduto`) REFERENCES `produto` (`idproduto`);

--
-- Limitadores para a tabela `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `fk_subcategoria_categoria_idcategoria_20403` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`);

--
-- Limitadores para a tabela `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `token_ibfk_1` FOREIGN KEY (`admin_idadmin`) REFERENCES `admin` (`idadmin`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
