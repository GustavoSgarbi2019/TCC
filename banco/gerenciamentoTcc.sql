-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 01/03/2020 às 02:36
-- Versão do servidor: 10.4.11-MariaDB
-- Versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gerenciamentoTcc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `autores`
--

CREATE TABLE `autores` (
  `ID_AUTORES` int(11) NOT NULL,
  `NOME` varchar(255) NOT NULL DEFAULT '0',
  `SOBRENOME` varchar(255) NOT NULL DEFAULT '0',
  `RM` varchar(5) NOT NULL DEFAULT '0',
  `CPF` varchar(11) NOT NULL DEFAULT '0',
  `USUARIOS_IDUSUARIO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `autores`
--

INSERT INTO `autores` (`ID_AUTORES`, `NOME`, `SOBRENOME`, `RM`, `CPF`, `USUARIOS_IDUSUARIO`) VALUES
(1, 'Lucas', 'TESTE', '15242', '11533622554', 1),
(3, 'Gustavo', 'TESTE 01', '10210', '15962348795', 2),
(4, 'Ana', 'TESTE 02', '00332', '15962348756', 3),
(5, 'Gabriel', 'TESTE 02', '51251', '15962348777', 4),
(6, 'Julia', 'TESTE 04', '10610', '15962568795', 5),
(7, 'teste01', 'teste 05', '2222', '15962348795', 6),
(8, 'jose', 'test 06', '33333', '15962301548', 5),
(9, 'tcc', 'teste 07', '44455', '15962348795', 1),
(10, 'valter', 'teste 08', '96521', '11245896487', 2),
(11, 'gabriel t', 'teste 09', '78954', '15962348795', 1),
(12, 'diego', 'teste 10', '11111', '14785236952', 4),
(13, 'esther', 'teste 11', '02202', '15962348795', 2),
(14, 'Lucas 01', 'teste 12', '03303', '15962348795', 7),
(15, 'Gustavo Sgarbi', 'teste 13', '01458', '15962348795', 8),
(16, 'Ana', 'teste 14', '65421', '45875215687', 9),
(17, 'Lucas', ' teste 15', '14520', '15962348795', 10),
(18, 'Jessica', 'teste', '45544', '15962348795', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `coorientador`
--

CREATE TABLE `coorientador` (
  `ID_PROFESSOR` int(11) NOT NULL,
  `NOME` varchar(255) NOT NULL DEFAULT '0',
  `RM` varchar(5) NOT NULL DEFAULT '0',
  `SOBRENOME` varchar(255) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `USUARIO_IDUSUARIO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `coorientador`
--

INSERT INTO `coorientador` (`ID_PROFESSOR`, `NOME`, `RM`, `SOBRENOME`, `CPF`, `USUARIO_IDUSUARIO`) VALUES
(1, 'Jessica', '00110', 'teste', '00022200065', 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `ID_CURSOS` int(11) NOT NULL,
  `NOME` varchar(255) DEFAULT NULL,
  `EIXO` varchar(255) DEFAULT NULL,
  `PERIODO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`ID_CURSOS`, `NOME`, `EIXO`, `PERIODO`) VALUES
(1, 'Acucar e Alcool', 'AA', 'noite'),
(2, 'Administracao', 'ADM', 'noite'),
(3, 'Agronegocio', 'AGRO', ''),
(4, 'Desenvolvimento Sitema', 'DS', 'noite'),
(5, 'Enfermagem', 'ENF', 'noite'),
(6, 'Ensino Medio Integrado ao Agropecuario', 'ETIM', 'manha e tarde'),
(7, 'Informatica', 'INFO', 'noite'),
(8, 'Redes de Computadores', 'RC', 'noite'),
(9, 'Recursos Humanos', 'RH', 'noite'),
(10, 'Zootecnia', 'ZOO', 'noite');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens`
--

CREATE TABLE `imagens` (
  `ID_IMG` int(11) NOT NULL,
  `NOME` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `imagens`
--

INSERT INTO `imagens` (`ID_IMG`, `NOME`) VALUES
(3, 'f44ddc31ce0854add89ade1a7b28c77b.png'),
(4, '8fcc19c173b80138b2bd1e6fe17206a2.jpg'),
(5, 'f8a874640f7417d3ebd0f1b9b2d27421.jpg'),
(6, 'b165b5520d7e6584275efbc63e988267.png'),
(7, 'c7a7fd74d999200fa93b05c3cfb51872.jpg'),
(8, '6d6fb252be237f301fca77ee37e81c1c.png'),
(9, '3d7e2c8c3342fa17fabe6f4495a4615d.png'),
(10, '664c9550f18d93c0c8ce00433a0cc52e.jpg'),
(11, '90dd63ec6739392316911565d0a043f4.jpg'),
(12, '4c8a9d51ae8f5f74756ecd18a1fa3b56.jpg'),
(13, '2539485fc0232201ced01d4501f2e616.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tcc`
--

CREATE TABLE `tcc` (
  `ID_TCC` int(11) NOT NULL,
  `TITULO` varchar(255) NOT NULL DEFAULT '0',
  `RESUMO` varchar(255) NOT NULL DEFAULT '0',
  `ARQUIVO` varchar(255) NOT NULL DEFAULT '0',
  `DATA_CAD` varchar(4) DEFAULT NULL,
  `STATUS` varchar(1) DEFAULT NULL,
  `MELHORIAS` varchar(255) DEFAULT NULL,
  `NOTA` varchar(2) DEFAULT NULL,
  `IMAGENS_IDIMG` int(11) DEFAULT NULL,
  `CURSO_IDCURSO` int(11) DEFAULT NULL,
  `AUTORES_IDAUTORES` int(11) DEFAULT NULL,
  `COORIENTADOR_IDCOORIENTADOR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tcc`
--

INSERT INTO `tcc` (`ID_TCC`, `TITULO`, `RESUMO`, `ARQUIVO`, `DATA_CAD`, `STATUS`, `MELHORIAS`, `NOTA`, `IMAGENS_IDIMG`, `CURSO_IDCURSO`, `AUTORES_IDAUTORES`, `COORIENTADOR_IDCOORIENTADOR`) VALUES
(4, 'LED IN GAME', 'LED IN GAME', 'GED/doc/15602926345d002d1aaa237.pdf', '2018', 'A', NULL, NULL, 7, 7, 1, NULL),
(5, 'Psicologia Organizacional: Desenvolvendo e Aperfeiçoando Colaboradores.', 'Este trabalho de conclusão de curso se refere a um método de estudo', 'GED/doc/15598714335cf9bfc9ef894.pdf', '2016', 'A', NULL, NULL, 12, 9, 4, NULL),
(6, 'ORGANIZAÇÃO DOCUMENTAL ESCOLAR: A eficiência do armazenamento em nuvem', 'O trabalho consiste em um tipo de solução, chamada cloud computing, ou seja,', 'GED/doc/15598690215cf9b65de36b7.pdf', '2016', 'A', NULL, NULL, 11, 8, 5, NULL),
(7, 'MANEJO E PREPARO RACIONAL DO GADO LEITEIRO: Exposições ', 'O Referido trabalho analisou o processo de doma de um animal até chegar em um', 'GED/doc/15598682555cf9b35f9e1a3.pdf', '2017', 'A', NULL, NULL, 10, 6, 3, NULL),
(8, 'EDUCAÇÃO SEXUAL PARA JOVENS DA REDE PÚBLICA', 'A partir de dados alarmantes sobre adolescentes com infecções', 'GED/doc/15598674395cf9b02f1ed96.pdf', '2018', 'A', NULL, NULL, 8, 5, 6, NULL),
(9, 'FOLDER COM ORIENTAÇÕES NUTRICIONAIS DE ENFERMAGEM EM PACIENTES DIALÍTICOS', 'A hemodiálise transforma de forma negativa a vida dos pacientes que', 'GED/doc/15598672605cf9af7c60034.pdf', '2018', 'A', NULL, NULL, 8, 5, 12, NULL),
(10, 'PRODUÇÃO DO PARASITÓIDE COTESIA FLAVIPES PARA CONTROLE BIOLÓGICO DA BROCA DA CANA-DE-AÇÚCAR', 'O Controle Biológico é um método que utiliza inimigos naturais (predadores,', 'GED/doc/15598643905cf9a446eb328.pdf', '2018', 'A', NULL, NULL, 3, 1, 13, NULL),
(11, 'FABRICAÇÃO DE ENERGIA NA CALDEIRA', 'O nosso objetivo de trabalho de conclusão de curso tem por finalidade a explicação', 'GED/doc/15598640765cf9a30cb214a.pdf', '2018', 'A', NULL, NULL, 3, 1, 7, NULL),
(12, 'A importância do Marketing dentro da Empresa Nando Car Embelezamento Automotivo - Detailing', 'Nosso trabalho de conclusão de curso busca trazer as pessoas para o mundo', 'GED/doc/15598637255cf9a1ad7ad34.pdf', '2018', 'A', NULL, NULL, 5, 2, 6, NULL),
(13, 'Gestão de Estoque', 'A gestão de estoque em uma empresa, geralmente se refere a gestão de', 'GED/doc/15598635275cf9a0e7bfdd6.pdf', '2016', 'A', NULL, NULL, 5, 2, 16, NULL),
(14, 'PRODUÇÃO DE MUDAS: Frutíferas e nativas.', 'O presente trabalho tem como objetivo utilizar recursos já existentes na escola ETEC', '0', '2018', 'A', NULL, NULL, 10, 6, 8, NULL),
(15, 'VOIP', 'VoIP, ou Voz sobre Protocolo de Internet, é uma tecnologia que permite a', '0', '2016', 'A', NULL, NULL, 11, 8, 15, NULL),
(25, 'teste curso', 'teste', '5af2700c13e78f010e40d4509b73e7b5.pdf', '2020', 'D', NULL, NULL, 3, 3, 13, NULL),
(26, 'teste curso', 'teste', '8931c9f79ddaf24d7d73cd04952b7f84.pdf', '2020', 'D', NULL, NULL, 11, 3, 7, NULL),
(27, 'Armazenamento de Tcc', 'rfrfr', '5a95813e778b2b3739c8945fcb0cbe46.jpg', '2018', 'D', NULL, NULL, 6, 9, 14, NULL),
(28, 'Armazenamento de Tcc', 'rfrfr', '150bd4da9eae485fb1d4b1a0950a1ae0.pdf', '2018', 'D', 'Fazer o PHP', '', 8, 9, 16, 1),
(29, 'teste curso', 'teste ...', '1205880bd97ea169d3bb31d003fe81de.pdf', '2020', 'D', 'Melhorias php errada', '', 6, 2, 13, NULL),
(30, 'Armazenamento de Tcc G', 'desenvolvimento', 'ca0ab3cccaf58bc73678ce16d3281447.pdf', '2018', 'D', 'Fazer a parte Escrita', '', 8, 2, 14, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOME` varchar(255) DEFAULT NULL,
  `RM` varchar(255) NOT NULL DEFAULT '0',
  `SENHA` varchar(255) NOT NULL DEFAULT '0',
  `ACESSO` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `NOME`, `RM`, `SENHA`, `ACESSO`) VALUES
(1, 'Lucas', '001100', '159623', '1'),
(2, 'Gustavo', '21252', '159623', '2'),
(3, 'teste01', '14785', '159623', '0'),
(4, 'tcc teste', '159623', '159623', '0'),
(5, 'Lucas', '14785', '159623', '0'),
(6, 'teste', '14785', '159623', '0'),
(7, 'Lucas 01', '14852', '$2y$10$9w3ma1R9ABqXbGE13mWuI.CuHU4M0ZriDt2AAXldRGJ.4gsXlHYEi', '1'),
(8, 'Gustavo Sgarbi', '15962', '$2y$10$oATQmyBA22dg8ITnVAj3HeL76Zuyn1.iY4DkUXdX.on0kJxlSAN8e', '0'),
(9, 'Ana', '14896', '$2y$10$5gqgDZ6i2YGKRUNDtDJTSu/vp.G/TZ32.3KcQbBKkrSKxuMxQQw9O', '1'),
(10, 'Lucas', '14789', '$2y$10$AHKjwVd5ETWSI/ZgAv5cRO4z3gfMW10g0FjTKZY6KxMH99GCxO1qW', '0'),
(11, 'Jessica', '12345', '$2y$10$dl4Lm61n/lV.0IT4zOUIYeRFM6eYYCKysJ9LFZqRjE1vA7TJki1wu', '2'),
(12, 'novoTeste', '65298', '$2y$10$JhiTuD69ZKiciuN5Jm9QfuBWuTsY82y4Z82OsIVClideU7HXhElnS', '0');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`ID_AUTORES`),
  ADD KEY `FK1_USUARIOS_IDUSUARIO` (`USUARIOS_IDUSUARIO`);

--
-- Índices de tabela `coorientador`
--
ALTER TABLE `coorientador`
  ADD PRIMARY KEY (`ID_PROFESSOR`),
  ADD KEY `FK1_USUARIO_IDUSUARIO` (`USUARIO_IDUSUARIO`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`ID_CURSOS`);

--
-- Índices de tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`ID_IMG`);

--
-- Índices de tabela `tcc`
--
ALTER TABLE `tcc`
  ADD PRIMARY KEY (`ID_TCC`),
  ADD KEY `FK1_IMAGENS_IDIMG` (`IMAGENS_IDIMG`),
  ADD KEY `FK2_CURSOS_IDCURSO` (`CURSO_IDCURSO`),
  ADD KEY `FK3_AUTORES_IDAUTORES` (`AUTORES_IDAUTORES`),
  ADD KEY `FK4_COORIENTADOR_IDCOORIENTADOR` (`COORIENTADOR_IDCOORIENTADOR`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `autores`
--
ALTER TABLE `autores`
  MODIFY `ID_AUTORES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `coorientador`
--
ALTER TABLE `coorientador`
  MODIFY `ID_PROFESSOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `ID_CURSOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `ID_IMG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tcc`
--
ALTER TABLE `tcc`
  MODIFY `ID_TCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `autores`
--
ALTER TABLE `autores`
  ADD CONSTRAINT `FK1_USUARIOS_IDUSUARIO` FOREIGN KEY (`USUARIOS_IDUSUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Restrições para tabelas `coorientador`
--
ALTER TABLE `coorientador`
  ADD CONSTRAINT `FK1_USUARIO_IDUSUARIO` FOREIGN KEY (`USUARIO_IDUSUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Restrições para tabelas `tcc`
--
ALTER TABLE `tcc`
  ADD CONSTRAINT `FK1_IMAGENS_IDIMG` FOREIGN KEY (`IMAGENS_IDIMG`) REFERENCES `imagens` (`ID_IMG`),
  ADD CONSTRAINT `FK2_CURSOS_IDCURSO` FOREIGN KEY (`CURSO_IDCURSO`) REFERENCES `cursos` (`ID_CURSOS`),
  ADD CONSTRAINT `FK3_AUTORES_IDAUTORES` FOREIGN KEY (`AUTORES_IDAUTORES`) REFERENCES `autores` (`ID_AUTORES`),
  ADD CONSTRAINT `FK4_COORIENTADOR_IDCOORIENTADOR` FOREIGN KEY (`COORIENTADOR_IDCOORIENTADOR`) REFERENCES `coorientador` (`ID_PROFESSOR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
