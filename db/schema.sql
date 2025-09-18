DROP SCHEMA IF EXISTS LESHAR;
CREATE SCHEMA IF NOT EXISTS LESHAR DEFAULT CHARACTER SET utf8mb4;
USE LESHAR;

CREATE TABLE IF NOT EXISTS usuario(
    id_usuario INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo_usuario ENUM('USUARIO', 'ADM') NOT NULL,
    credito INT NOT NULL DEFAULT 0,
    bio TEXT NULL,
    localizacao VARCHAR(250) NULL,
    data_cadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_usuario)
);

CREATE TABLE IF NOT EXISTS aluno(
    id_aluno INT NOT NULL AUTO_INCREMENT,
    usuario_id_usuario INT NOT NULL,
    PRIMARY KEY (id_aluno),
    UNIQUE INDEX fk_aluno_usuario1_idx (usuario_id_usuario ASC),
    CONSTRAINT fk_aluno_usuario1
        FOREIGN KEY (usuario_id_usuario)
        REFERENCES usuario (id_usuario)
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS mentor (
    id_mentor INT NOT NULL AUTO_INCREMENT,
    usuario_id_usuario INT NOT NULL,
    reputacao INT NULL DEFAULT 0,
    PRIMARY KEY (id_mentor),
    UNIQUE INDEX fk_mentor_usuario1_idx (usuario_id_usuario ASC),
    CONSTRAINT fk_mentor_usuario1
        FOREIGN KEY (usuario_id_usuario)
        REFERENCES usuario (id_usuario)
        ON DELETE CASCADE
);
