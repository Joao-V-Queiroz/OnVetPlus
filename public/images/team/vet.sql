-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20-Jul-2022 às 02:04
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dt_ini` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dt_fim` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ha` int(11) NOT NULL,
  `util` int(11) NOT NULL,
  `ativo` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `areas`
--

INSERT INTO `areas` (`id`, `nome`, `dt_ini`, `dt_fim`, `tipo`, `ha`, `util`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 'Teste', '2022-07-05', '2022-07-27', 'ARRENDADA', 48, 85, 1, '2022-07-20 01:33:33', '2022-07-20 01:58:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `audits`
--

DROP TABLE IF EXISTS `audits`;
CREATE TABLE IF NOT EXISTS `audits` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auditable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auditable_id` bigint(20) UNSIGNED NOT NULL,
  `old_values` text COLLATE utf8_unicode_ci,
  `new_values` text COLLATE utf8_unicode_ci,
  `url` text COLLATE utf8_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` varchar(1023) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  KEY `audits_user_id_user_type_index` (`user_id`,`user_type`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `audits`
--

INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'created', 'App\\Models\\Cadastro\\Fornecedor', 1, '[]', '{\"nome\":\"Novo Mundo\",\"razao\":\"Novo Mundo M\\u00f3veis S.A\",\"cpf\":null,\"cnpj\":\"156454564456\",\"email\":\"novomundo@novomundo.com.br\",\"telefone\":\"(62) 45456-456\",\"cep\":\"74710-020\",\"endereco\":\"Pra\\u00e7a Washington\",\"numero\":\"0\",\"complemento\":\"Deposito NM\",\"bairro\":\"Jardim Novo Mundo\",\"cidade\":\"Goi\\u00e2nia\",\"uf\":\"GO\",\"ativo\":\"1\",\"id\":1}', 'http://127.0.0.1:8000/data/cadastros/fornecedores/save', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-12 02:13:39', '2022-07-12 02:13:39'),
(2, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Cadastro\\Fornecedor', 1, '{\"cpf\":null,\"cnpj\":\"156454564456\"}', '{\"cpf\":\"165.416.514-65\",\"cnpj\":\"45.456.465\\/4564-56\"}', 'http://127.0.0.1:8000/data/cadastros/fornecedores/save', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-12 02:20:48', '2022-07-12 02:20:48'),
(3, 'App\\Models\\User', 1, 'created', 'App\\Models\\Cadastro\\Fornecedor', 2, '[]', '{\"nome\":\"Jo\\u00e3o Vendas\",\"razao\":\"Novo Mundo M\\u00f3veis\",\"cpf\":\"058.747.901-95\",\"cnpj\":null,\"tipo\":\"externo\",\"email\":\"novomundo@novomundo.com\",\"telefone\":\"(62) 32193-141\",\"cep\":\"74810-150\",\"endereco\":\"Rua 12\",\"numero\":\"18\",\"complemento\":\"01\",\"bairro\":\"Jardim Goi\\u00e1s\",\"cidade\":\"Goi\\u00e2nia\",\"uf\":\"GO\",\"ativo\":\"1\",\"id\":2}', 'http://127.0.0.1:8000/data/cadastros/fornecedores/save', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-13 00:17:17', '2022-07-13 00:17:17'),
(4, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Cadastro\\Fornecedor', 2, '{\"telefone\":\"(62) 32193-141\"}', '{\"telefone\":\"(62) 99337-7352\"}', 'http://127.0.0.1:8000/data/cadastros/fornecedores/save', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-13 00:26:07', '2022-07-13 00:26:07'),
(5, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\Cadastro\\Area', 1, '{\"id\":1,\"nome\":\"Teste\",\"tipo\":\"arrendada\",\"dt_ini\":\"10\\/05\\/2020\",\"dt_fim\":\"11\\/07\\/2022\",\"ar\":\"5454\",\"util\":\"4544\",\"ativo\":1}', '[]', 'http://127.0.0.1:8000/cadastros/areas/delete/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-13 02:00:55', '2022-07-13 02:00:55'),
(6, 'App\\Models\\User', 1, 'created', 'App\\Models\\Cadastro\\Tanque', 1, '[]', '{\"nome\":\"Teste\",\"litros\":\"25\",\"id\":1}', 'http://127.0.0.1:8000/data/cadastros/tanques/save', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-13 02:41:25', '2022-07-13 02:41:25'),
(7, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\Cadastro\\Tanque', 1, '{\"id\":1,\"nome\":\"Teste\",\"litros\":25}', '[]', 'http://127.0.0.1:8000/cadastros/tanques/delete/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-13 02:41:32', '2022-07-13 02:41:32'),
(8, 'App\\Models\\User', 1, 'created', 'App\\Models\\Cadastro\\FornecedorContato', 1, '[]', '{\"fornecedor_id\":2,\"nome\":\"Bruno\",\"telefone\":\"(62) 99999-9999\",\"email\":\"bruno@novomundo.com\",\"id\":1}', 'http://127.0.0.1:8000/data/cadastros/fornecedores/save', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-18 23:56:28', '2022-07-18 23:56:28'),
(9, 'App\\Models\\User', 1, 'created', 'App\\Models\\Cadastro\\Funcionario', 1, '[]', '{\"nome\":\"Bruno Almeida\",\"sexo\":\"M\",\"funcao\":\"Gestor de projeto\",\"cpf\":\"999.999.999-99\",\"dt_nasc\":\"1991-05-02\",\"telefone\":\"(62) 99999-9999\",\"cep\":\"74968-505\",\"endereco\":\"Rua Luiz Ant\\u00f4nio Garavelo\",\"numero\":\"10\",\"complemento\":\"casa do bruno\",\"bairro\":\"Residencial Village Garavelo\",\"cidade\":\"Aparecida de Goi\\u00e2nia\",\"uf\":\"GO\",\"ativo\":\"1\",\"id\":1}', 'http://127.0.0.1:8000/data/cadastros/funcionarios/save', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-19 01:29:51', '2022-07-19 01:29:51'),
(10, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\Cadastro\\Area', 1, '{\"id\":1,\"nome\":\"\\u00c1rea nova arrendada\",\"dt_ini\":\"20\\/06\\/2022\",\"dt_fim\":\"18\\/07\\/2022\",\"tipo\":\"ARRENDADA\",\"ha\":58,\"util\":5,\"ativo\":1}', '[]', 'http://127.0.0.1:8000/cadastros/areas/delete/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-20 01:09:06', '2022-07-20 01:09:06'),
(11, 'App\\Models\\User', 1, 'created', 'App\\Models\\Cadastro\\Area', 2, '[]', '{\"nome\":\"Teste\",\"id\":2}', 'http://127.0.0.1:8000/data/cadastros/areas/save', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-20 01:14:04', '2022-07-20 01:14:04'),
(12, 'App\\Models\\User', 1, 'created', 'App\\Models\\Cadastro\\Area', 1, '[]', '{\"nome\":\"Teste\",\"tipo\":\"CONFINAMENTO\",\"id\":1}', 'http://127.0.0.1:8000/data/cadastros/areas/save', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-20 01:18:26', '2022-07-20 01:18:26'),
(13, 'App\\Models\\User', 1, 'created', 'App\\Models\\Cadastro\\Area', 1, '[]', '{\"nome\":\"Teste\",\"tipo\":\"ARRENDADA\",\"ativo\":\"1\",\"id\":1}', 'http://127.0.0.1:8000/data/cadastros/areas/save', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-20 01:22:24', '2022-07-20 01:22:24'),
(14, 'App\\Models\\User', 1, 'created', 'App\\Models\\Cadastro\\Area', 1, '[]', '{\"nome\":\"Teste\",\"tipo\":\"ARRENDADA\",\"dt_ini\":\"2022-07-19\",\"ativo\":\"1\",\"id\":1}', 'http://127.0.0.1:8000/data/cadastros/areas/save', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-20 01:26:07', '2022-07-20 01:26:07'),
(15, 'App\\Models\\User', 1, 'created', 'App\\Models\\Cadastro\\Area', 1, '[]', '{\"nome\":\"Teste\",\"tipo\":\"CONFINAMENTO\",\"dt_ini\":\"2022-07-19\",\"dt_fim\":\"2022-07-19\",\"ativo\":\"1\",\"id\":1}', 'http://127.0.0.1:8000/data/cadastros/areas/save', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-20 01:27:53', '2022-07-20 01:27:53'),
(16, 'App\\Models\\User', 1, 'created', 'App\\Models\\Cadastro\\Area', 1, '[]', '{\"nome\":\"Teste\",\"tipo\":\"ARRENDADA\",\"dt_ini\":\"2022-07-19\",\"dt_fim\":\"2022-07-22\",\"ha\":\"25\",\"ativo\":\"1\",\"id\":1}', 'http://127.0.0.1:8000/data/cadastros/areas/save', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-20 01:32:06', '2022-07-20 01:32:06'),
(17, 'App\\Models\\User', 1, 'created', 'App\\Models\\Cadastro\\Area', 1, '[]', '{\"nome\":\"Teste\",\"tipo\":\"ARRENDADA\",\"dt_ini\":\"2022-07-05\",\"dt_fim\":\"2022-07-27\",\"ha\":\"58\",\"util\":\"52\",\"ativo\":\"1\",\"id\":1}', 'http://127.0.0.1:8000/data/cadastros/areas/save', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-20 01:33:33', '2022-07-20 01:33:33'),
(18, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Cadastro\\Area', 1, '{\"util\":52}', '{\"util\":\"85\"}', 'http://127.0.0.1:8000/data/cadastros/areas/save', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-20 01:33:47', '2022-07-20 01:33:47'),
(19, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Cadastro\\Area', 1, '{\"ha\":58}', '{\"ha\":\"25\"}', 'http://127.0.0.1:8000/data/cadastros/areas/save', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-20 01:40:09', '2022-07-20 01:40:09'),
(20, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Cadastro\\Area', 1, '{\"ha\":25}', '{\"ha\":\"48\"}', 'http://127.0.0.1:8000/data/cadastros/areas/save', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', NULL, '2022-07-20 01:58:32', '2022-07-20 01:58:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resposta` text COLLATE utf8_unicode_ci NOT NULL,
  `ativo` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `razao` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `complemento` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `ativo` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `cpf`, `cnpj`, `tipo`, `razao`, `email`, `telefone`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `ativo`, `created_at`, `updated_at`) VALUES
(2, 'João Vendas', '058.747.901-95', NULL, 'externo', 'Novo Mundo Móveis', 'novomundo@novomundo.com', '(62) 99337-7352', '74810-150', 'Rua 12', '18', '01', 'Jardim Goiás', 'Goiânia', 'GO', 1, '2022-07-13 00:17:17', '2022-07-13 00:26:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor_contato`
--

DROP TABLE IF EXISTS `fornecedor_contato`;
CREATE TABLE IF NOT EXISTS `fornecedor_contato` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fornecedor_id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fornecedor_contato_fornecedor_id_foreign` (`fornecedor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_nasc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `funcao` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `complemento` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `ativo` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `cpf`, `dt_nasc`, `sexo`, `funcao`, `telefone`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 'Bruno Almeida', '999.999.999-99', '1991-05-02', 'M', 'Gestor de projeto', '(62) 99999-9999', '74968-505', 'Rua Luiz Antônio Garavelo', '10', 'casa do bruno', 'Residencial Village Garavelo', 'Aparecida de Goiânia', 'GO', 1, '2022-07-19 01:29:51', '2022-07-19 01:29:51');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario_contato`
--

DROP TABLE IF EXISTS `funcionario_contato`;
CREATE TABLE IF NOT EXISTS `funcionario_contato` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `funcionario_id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `funcionario_contato_funcionario_id_foreign` (`funcionario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `iatfs`
--

DROP TABLE IF EXISTS `iatfs`;
CREATE TABLE IF NOT EXISTS `iatfs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inducoes`
--

DROP TABLE IF EXISTS `inducoes`;
CREATE TABLE IF NOT EXISTS `inducoes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=536 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(439, '2014_10_12_000000_create_users_table', 1),
(440, '2014_10_12_100000_create_password_resets_table', 1),
(441, '2019_08_19_000000_create_failed_jobs_table', 1),
(442, '2021_03_18_221847_create_role', 1),
(443, '2021_03_18_222000_user_role', 1),
(444, '2021_03_18_223950_create_permissions', 1),
(445, '2021_03_18_224257_create_role_permissions', 1),
(446, '2021_03_18_224837_create_audits_table', 1),
(447, '2021_03_18_225136_add_user_admin', 1),
(448, '2021_05_13_214939_permissao_cadastros', 1),
(449, '2021_05_13_224719_permissao_nivel_acesso', 1),
(450, '2021_05_14_165026_permissao_usuarios', 1),
(451, '2021_05_14_171156_permissao_funcionarios', 1),
(452, '2021_05_14_174809_permissao_pastagens', 1),
(453, '2021_05_14_174809_permissao_tanques', 1),
(454, '2021_05_14_175741_permissao_duvida', 1),
(455, '2021_05_14_175741_permissao_protocolos', 1),
(456, '2021_05_14_181322_permissao_duvida_faqs', 1),
(457, '2021_05_21_181041_alter_user_others', 1),
(458, '2021_05_22_100202_create_status', 1),
(459, '2021_05_23_194646_alter_funcionarios_pdv', 1),
(460, '2021_05_25_085921_data_status', 1),
(461, '2021_05_31_174910_create_faq', 1),
(462, '2021_05_31_174910_create_inducoes', 1),
(463, '2021_06_04_152423_create_iatfs', 1),
(464, '2021_06_04_152423_create_tanques', 1),
(465, '2021_06_04_152423_create_tes', 1),
(466, '2021_06_08_165350_create_cadastros_funcionarios', 1),
(467, '2021_06_08_165350_create_cadastros_pastagens', 1),
(468, '2021_06_08_170303_create_cadastros_funcionario_contato', 1),
(469, '2021_06_10_203416_alter_cadastros_funcionarios', 2),
(470, '2021_06_14_232654_alter_cadastros_funcionario_contato', 2),
(471, '2021_06_14_233501_alter_cadastros_funcionario', 2),
(472, '2021_06_19_082158_alter_cadastros_funcionario_contato_2', 2),
(473, '2021_06_19_100743_alter_cadastros_funcionario_2', 2),
(474, '2022_07_09_174809_permissao_iatfs', 2),
(475, '2022_07_09_174809_permissao_tes', 2),
(476, '2022_07_09_181322_permissao_inducoes', 2),
(477, '2022_07_11_165350_create_cadastros_fornecedores', 3),
(478, '2022_07_11_170303_create_cadastros_fornecedor_contato', 3),
(479, '2022_07_11_171156_permissao_fornecedores', 3),
(480, '2022_07_11_203416_alter_cadastros_fornecedores', 3),
(481, '2022_07_11_232654_alter_cadastros_fornecedor_contato', 3),
(482, '2022_07_11_233501_alter_cadastros_fornecedor', 3),
(532, '2022_07_11_082158_alter_cadastros_fornecedor_contato_2', 9),
(533, '2022_07_11_100743_alter_cadastros_fornecedor_2', 9),
(497, '2022_07_12_174809_permissao_areas', 4),
(503, '2022_07_12_215428_permission_areas', 7),
(499, '2022_07_12_215918_create_areas', 6),
(504, '2022_07_12_220301_create_areas', 7),
(534, '2022_07_19_211547_permissao_areas', 9),
(506, '2022_07_19_211631_create_areas', 8),
(535, '2022_07_19_212045_create_areas', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pastagem`
--

DROP TABLE IF EXISTS `pastagem`;
CREATE TABLE IF NOT EXISTS `pastagem` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dt_ini` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dt_fim` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `custo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_id` bigint(20) UNSIGNED DEFAULT NULL,
  `menu` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_permission_id_foreign` (`permission_id`),
  KEY `permissions_menu_index` (`menu`),
  KEY `permissions_position_index` (`position`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `permissions`
--

INSERT INTO `permissions` (`id`, `permission_id`, `menu`, `position`, `name`, `icon`, `url`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, 'menu.cadastros', 'database', '', NULL, NULL),
(2, 1, 1, 1, 'menu.cadastros.nivel-acesso', 'unlock', 'security/role', NULL, NULL),
(3, 1, 1, 2, 'menu.cadastros.usuarios', 'user-plus', 'security/users', NULL, NULL),
(4, 1, 1, 3, 'menu.cadastros.funcionarios', 'map-pin', 'cadastros/funcionarios', NULL, '2022-07-12 01:41:24'),
(14, 1, 1, 8, 'menu.cadastros.pastagens', 'sunset', 'cadastros/pastagens', NULL, NULL),
(6, 1, 1, 4, 'menu.cadastros.tanques', 'thermometer', 'cadastros/tanques', '2022-07-13 02:40:15', '2022-07-13 02:40:15'),
(7, NULL, 1, 2, 'menu.duvida', 'list', '', NULL, NULL),
(5, NULL, 1, 1, 'menu.protocolos', 'list', '', NULL, NULL),
(9, 7, 1, 1, 'menu.duvida.faqs', 'thumbs-up', 'duvida/faqs', NULL, NULL),
(11, 5, 1, 2, 'menu.protocolos.iatfs', 'tag', 'protocolos/iatfs', NULL, NULL),
(10, 5, 1, 1, 'menu.protocolos.tes', 'tag', 'protocolos/tes', NULL, NULL),
(8, 5, 1, 1, 'menu.protocolos.inducoes', 'tag', 'protocolos/inducoes', NULL, NULL),
(12, 1, 1, 7, 'menu.cadastros.fornecedores', 'tag', 'cadastros/fornecedores', NULL, NULL),
(13, 1, 1, 5, 'menu.cadastros.areas', 'thermometer', 'cadastros/areas', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '2022-07-12 01:41:24', '2022-07-12 01:41:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
CREATE TABLE IF NOT EXISTS `role_permissions` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  KEY `role_permissions_role_id_foreign` (`role_id`),
  KEY `role_permissions_permission_id_foreign` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status_module_id_index` (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `module_id`, `name`, `icon`, `class`, `created_at`, `updated_at`) VALUES
(1, 22, 'Ag. Confirmação', 'square', 'warning', '2022-07-12 01:41:24', '2022-07-12 01:41:24'),
(2, 22, 'Confirmado', 'check-square', 'success', '2022-07-12 01:41:24', '2022-07-12 01:41:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tanques`
--

DROP TABLE IF EXISTS `tanques`;
CREATE TABLE IF NOT EXISTS `tanques` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `litros` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tes`
--

DROP TABLE IF EXISTS `tes`;
CREATE TABLE IF NOT EXISTS `tes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `home_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jobtitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cellphone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `role_id`, `home_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `jobtitle`, `phone`, `cellphone`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Administrador do Sistema', 'suporte@wsbrasil.com', NULL, '$2y$10$UhF804lzUpEqhQtIXceyye6O77pZxUz3Bfv1Nna07CHPJ6RryPlW.', NULL, NULL, NULL, NULL, 1, '2022-07-12 01:41:24', '2022-07-12 01:41:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
