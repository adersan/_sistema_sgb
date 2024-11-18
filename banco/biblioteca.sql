-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/11/2024 às 14:20
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `assunto`
--

CREATE TABLE `assunto` (
  `id_assunto` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `assunto`
--

INSERT INTO `assunto` (`id_assunto`, `descricao`) VALUES
(2, 'Tecnologia'),
(3, 'Romance'),
(4, 'Fantasia');

-- --------------------------------------------------------

--
-- Estrutura para tabela `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nacionalidade` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autor`
--

INSERT INTO `autor` (`id_autor`, `nome`, `nacionalidade`) VALUES
(1, 'João Silva', 'Brasileiro'),
(3, 'Emily', 'Brasileira'),
(4, 'Carlos Drummond', 'Brasileiro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `editora`
--

CREATE TABLE `editora` (
  `id_editora` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `editora`
--

INSERT INTO `editora` (`id_editora`, `nome`) VALUES
(2, 'Velha Editora 01'),
(3, 'Moderna'),
(10, 'Editora Canoa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id_emprestimo` int(11) NOT NULL,
  `data_emprestimo` date DEFAULT NULL,
  `data_devolucao_prevista` date DEFAULT NULL,
  `data_devolucao_real` date DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_livro` int(11) DEFAULT NULL,
  `id_reserva` int(11) DEFAULT NULL,
  `id_pagamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `emprestimo`
--

INSERT INTO `emprestimo` (`id_emprestimo`, `data_emprestimo`, `data_devolucao_prevista`, `data_devolucao_real`, `id_usuario`, `id_livro`, `id_reserva`, `id_pagamento`) VALUES
(1, '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL),
(2, '2024-11-17', '2024-11-18', '2024-11-17', 54, 5, NULL, NULL),
(3, '2024-11-17', '2024-11-17', '0000-00-00', 51, 5, NULL, NULL),
(4, '2024-11-17', '2024-11-17', '2024-11-17', 53, 5, NULL, NULL),
(5, '2024-11-17', '2024-11-18', '2024-11-17', 57, 5, NULL, NULL),
(7, '2024-11-17', '2024-11-17', '2024-11-17', 54, 11, NULL, NULL),
(8, '2024-11-17', '2024-11-17', '2024-11-17', 59, 5, NULL, NULL),
(9, '2024-11-17', '2024-11-18', '2024-11-17', 57, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE `livro` (
  `id_livro` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `quantidade_disponivel` int(11) DEFAULT NULL,
  `id_editora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livro`
--

INSERT INTO `livro` (`id_livro`, `titulo`, `isbn`, `quantidade_disponivel`, `id_editora`) VALUES
(5, 'A casa que meu Pai morou', '99635214587415', 7, 3),
(9, 'A dona', '99999999999999999999999', 1, 3),
(10, 'Ama de verdade', '9999999999999999999999999', 2, 3),
(11, 'Jogos Mortais', '75455555555555555', 1, 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro_assunto`
--

CREATE TABLE `livro_assunto` (
  `id_livro_assunto` int(11) NOT NULL,
  `id_livro` int(11) DEFAULT NULL,
  `id_assunto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro_autor`
--

CREATE TABLE `livro_autor` (
  `id_livro_autor` int(11) NOT NULL,
  `id_livro` int(11) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `forma_pagamento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pagamento`
--

INSERT INTO `pagamento` (`id`, `valor`, `valor_total`, `forma_pagamento`) VALUES
(1, 3.00, 0.00, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `data_reserva` date DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_livro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `data_reserva`, `id_usuario`, `id_livro`) VALUES
(14, '2024-11-17', 51, 9),
(15, '2024-11-17', 59, 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `id_tipo_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `data_nascimento`, `endereco`, `cidade`, `estado`, `cep`, `telefone`, `email`, `senha`, `id_tipo_usuario`) VALUES
(51, 'Aderval Santiago Leite', NULL, NULL, NULL, NULL, NULL, '71987803715', 'adersan@hotmail.com', '$2y$10$AAtbS9RR7X8FLUh3vz2b7OqySp9R5kQlroaGeYDmVM8Y6K77PfKIq', NULL),
(53, 'Edmundo Vieira', NULL, NULL, NULL, NULL, NULL, '71985635241', 'edvieira@gmail.com', '$2y$10$K2iXMSlD7PXlptSdftdbnuxyibOy5PHhBUusTOXbt5pZxG15FeMoC', NULL),
(54, 'Jackson Leite', NULL, NULL, NULL, NULL, NULL, '75986523210', 'jackson@gmail.com', '$2y$10$RPcthhUxnP0h/AWYqNRz1Ojb4Oyb6dw6z06hcSDPPBCvS1w2FY65m', NULL),
(57, 'Emily Rainan', NULL, NULL, NULL, NULL, NULL, '71991354586', 'emilyrainanblog@gmail.com', '$2y$10$pEAiUs3Xwjc/YugqrsXoIeZ3jBNQfiizQG5bAhh2R2zTFLsgC.G0i', NULL),
(58, 'Joaquim Leite', NULL, NULL, NULL, NULL, NULL, '71987546325', 'joaquim@hotmail.com', '$2y$10$nbXUs5hegrZtd3pTf.5GUe/S8fNQYfKHwA4vz2HVLp.vsSlKziuL6', NULL),
(59, 'Arlete Leite', NULL, NULL, NULL, NULL, NULL, '75996857412', 'arlete@hotmail.com', '$2y$10$w3gZS1fc2CLYSx801Q3dhOSOCnc1TcMWOoPl.D8OA8XX3vaewbXwG', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `assunto`
--
ALTER TABLE `assunto`
  ADD PRIMARY KEY (`id_assunto`);

--
-- Índices de tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Índices de tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id_editora`);

--
-- Índices de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id_emprestimo`),
  ADD KEY `fk_emprestimo_usuario` (`id_usuario`),
  ADD KEY `fk_emprestimo_livro` (`id_livro`),
  ADD KEY `fk_emprestimo_reserva` (`id_reserva`),
  ADD KEY `fk_emprestimo_pagamento` (`id_pagamento`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id_livro`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `fk_livro_editora` (`id_editora`);

--
-- Índices de tabela `livro_assunto`
--
ALTER TABLE `livro_assunto`
  ADD PRIMARY KEY (`id_livro_assunto`),
  ADD KEY `fk_livro_assunto_livro` (`id_livro`),
  ADD KEY `fk_livro_assunto_assunto` (`id_assunto`);

--
-- Índices de tabela `livro_autor`
--
ALTER TABLE `livro_autor`
  ADD PRIMARY KEY (`id_livro_autor`),
  ADD KEY `fk_livro_autor_livro` (`id_livro`),
  ADD KEY `fk_livro_autor_autor` (`id_autor`);

--
-- Índices de tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `fk_reserva_usuario` (`id_usuario`),
  ADD KEY `fk_reserva_livro` (`id_livro`);

--
-- Índices de tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_usuario_tipo_usuario` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assunto`
--
ALTER TABLE `assunto`
  MODIFY `id_assunto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `livro_assunto`
--
ALTER TABLE `livro_assunto`
  MODIFY `id_livro_assunto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `livro_autor`
--
ALTER TABLE `livro_autor`
  MODIFY `id_livro_autor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `fk_emprestimo_livro` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`),
  ADD CONSTRAINT `fk_emprestimo_pagamento` FOREIGN KEY (`id_pagamento`) REFERENCES `pagamento` (`id`),
  ADD CONSTRAINT `fk_emprestimo_reserva` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`),
  ADD CONSTRAINT `fk_emprestimo_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Restrições para tabelas `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `fk_livro_editora` FOREIGN KEY (`id_editora`) REFERENCES `editora` (`id_editora`);

--
-- Restrições para tabelas `livro_assunto`
--
ALTER TABLE `livro_assunto`
  ADD CONSTRAINT `fk_livro_assunto_assunto` FOREIGN KEY (`id_assunto`) REFERENCES `assunto` (`id_assunto`),
  ADD CONSTRAINT `fk_livro_assunto_livro` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`);

--
-- Restrições para tabelas `livro_autor`
--
ALTER TABLE `livro_autor`
  ADD CONSTRAINT `fk_livro_autor_autor` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`),
  ADD CONSTRAINT `fk_livro_autor_livro` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`);

--
-- Restrições para tabelas `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_reserva_livro` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`),
  ADD CONSTRAINT `fk_reserva_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_tipo_usuario` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
