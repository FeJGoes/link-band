CREATE TABLE usuarios (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `senha` VARCHAR(50) NOT NULL,
    `tipo` SET('GESTOR','BANDA','COMUM') NOT NULL DEFAULT 'COMUM',
    `status` SET('ATIVO','INATIVO') NOT NULL DEFAULT 'ATIVO',
    `permissao` JSON DEFAULT NULL,
    `url_img` VARCHAR(250) DEFAULT NULL,
    `criado_em` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
)ENGINE=innoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

CREATE TABLE eventos (
    `id` INT NOT NULL AUTO_INCREMENT,
    `responsavel` INT NOT NULL,
    `genero` VARCHAR(50) NOT NULL,
    `titulo` VARCHAR(50) NOT NULL,
    `descricao` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `data` DATE NOT NULL,
    `hora` TIME,
    `lat` VARCHAR(50),
    `long` VARCHAR(50),
    `telefone` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `celular` VARCHAR(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `cep` VARCHAR(9) COLLATE utf8_unicode_ci DEFAULT NULL,
    `logradouro` VARCHAR(150) COLLATE utf8_unicode_ci DEFAULT NULL,
    `numero` int(6) DEFAULT NULL,
    `bairro` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `complemento` VARCHAR(150) COLLATE utf8_unicode_ci DEFAULT NULL,
    `cidade` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT NULL,
    `estado` ENUM('AC','AL','AM','AP','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RO','RS','RR','SC','SE','SP','TO') DEFAULT NULL,
    `status` SET('ABERTO','FINALIZADO') NOT NULL DEFAULT 'ABERTO',
    `url_img` VARCHAR(250) DEFAULT NULL,
    `criado_em` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `ultima_mod` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`responsavel`) REFERENCES `usuarios`(`id`)
)ENGINE=innoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci44

CREATE TABLE usuarios_has_eventos (
    `id` INT NOT NULL AUTO_INCREMENT,
    `usuario_id` INT NOT NULL,
    `evento_id` INT NOT NULL,

    FOREIGN KEY (`usuario_id`) REFERENCES `usuarios`(`id`),
    FOREIGN KEY (`evento_id`) REFERENCES `eventos`(`id`)
)ENGINE=innoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci44

