

CREATE TABLE `produto` (
  `codproduto` int(11) NOT NULL,
  `nomeprod` varchar(50) NOT NULL,
  `descprod` varchar(100) NOT NULL,
  `foto_prod` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `pessoa` (
  `codpessoa` int(6) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `senha` varchar(15) NOT NULL DEFAULT '12345',
  `foto_pe` varchar(100) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;