DROP DATABASE IF EXISTS ECOLLECT;
CREATE DATABASE IF NOT EXISTS ECOLLECT;
USE ECOLLECT;

CREATE TABLE BAIRRO (
    idBairro INT NOT NULL AUTO_INCREMENT,
    nomeBairro VARCHAR(30) NOT NULL,
    PRIMARY KEY(idBairro)
);

INSERT INTO `bairro`
    (`idBairro`, `nomeBairro`)
VALUES
    (NULL, 'Altos do Jaraguá'),
    (NULL, 'Altos de Pinheiros 1 e 2'),
    (NULL, 'Altos de Pinheiros 3'),
    (NULL, 'Campos Ville'),
    (NULL, 'Centro'),
    (NULL, 'Chácara Flora'),
    (NULL, 'Chácara Velosa'),
    (NULL, 'Cidade Jardim'),
    (NULL, 'Fonte Luminosa'),
    (NULL, 'Jardim Aclimação'),
    (NULL, 'Jardim Adalberto Roxo'),
    (NULL, 'Jardim Adalgisa'),
    (NULL, 'Jardim Águas do Paiol'),
    (NULL, 'Jardim Almeida'),
    (NULL, 'Jardim Altos do Cecap e 2'),
    (NULL, 'Jardim América'),
    (NULL, 'Jardim Ana Adelaide'),
    (NULL, 'Jardim Arangá'),
    (NULL, 'Jardim Aranga'),
    (NULL, 'Jardim Arco-íris'),
    (NULL, 'Jardim Ártico'),
    (NULL, 'Jardim Biagioni'),
    (NULL, 'Jardim Botânico'),
    (NULL, 'Jardim Brasil'),
    (NULL, 'Jardim Brasília'),
    (NULL, 'Jardim Cristo Rei'),
    (NULL, 'Jardim Cruzeiro do Sul'), 
    (NULL, 'Jardim Cruzeiro do Sul 2'),
    (NULL, 'Jardim das Estações'),
    (NULL, 'Jardim das Flores'),
    (NULL, 'Jardim das Paineiras'),
    (NULL, 'Jardim Del Rei'),
    (NULL, 'Jardim do Bosque'),
    (NULL, 'Jardim do Carmo'),
    (NULL, 'Jardim Dom Pedro'),
    (NULL, 'Jardim Domingos Sávio'),
    (NULL, 'Jardim dos Manacás'),
    (NULL, 'Jardim Dumont'),
    (NULL, 'Jardim Eliana'),
    (NULL, 'Jardim Esplanada'),
    (NULL, 'Jardim Europa'),
    (NULL, 'Jardim Floridiana'),
    (NULL, 'Jardim Gardenias'),
    (NULL, 'Jardim Higienópolis'),
    (NULL, 'Jardim Imperador'),
    (NULL, 'Jardim Imperador 2'),
    (NULL, 'Jardim Imperial'),
    (NULL, 'Jardim Indaia'),
    (NULL, 'Jardim Mangiacapra'),
    (NULL, 'Jardim Maracanã'),
    (NULL, 'Jardim Maria Luiza'),
    (NULL, 'Jardim Martinez'),
    (NULL, 'Jardim Morada do Sol'),
    (NULL, 'Jardim Morumbi'),
    (NULL, 'Jardim Nova América'),
    (NULL, 'Jardim Nova Araraquara'),
    (NULL, 'Jardim Nova Época'),
    (NULL, 'Jardim Padre Anchieta'),
    (NULL, 'Jardim Palmares'),
    (NULL, 'Jardim Paulistano'),
    (NULL, 'Jardim Pinheiros'),
    (NULL, 'Jardim Pinheiros'),
    (NULL, 'Jardim Pinheiros 2'),
    (NULL, 'Jardim Portugal'),
    (NULL, 'Jardim Primor'),
    (NULL, 'Jardim Quitandinha'),
    (NULL, 'Jardim Rafaela Amoroso Micelli'),
    (NULL, 'Jardim Regina'),
    (NULL, 'Jardim Res. Ieda'),
    (NULL, 'Jardim Res. Italia'),
    (NULL, 'Jardim Res. Paraíso'),
    (NULL, 'Jardim Res. Santa Monica'),
    (NULL, 'Jardim Res. Silvestre'),
    (NULL, 'Jardim Santa Angelina'),
    (NULL, 'Jardim Santa Clara'),
    (NULL, 'Jardim Santa Julia'),
    (NULL, 'Jardim Santa Marta'),
    (NULL, 'Jardim Santa Thereza'),
    (NULL, 'Jardim Santo Antonio'),
    (NULL, 'Jardim São Rafael'),
    (NULL, 'Jardim São Rafael 2'),
    (NULL, 'Jardim Serra Azul'),
    (NULL, 'Jardim Silvânia'),
    (NULL, 'Jardim Tabapua'),
    (NULL, 'Jardim Tamoio'),
    (NULL, 'Jardim Tangará'),
    (NULL, 'Jardim Tinen'),
    (NULL, 'Jardim Uirapuru'),
    (NULL, 'Jardim Uirapuru 2'),
    (NULL, 'Jardim Universal'),
    (NULL, 'Jardim Veneza'),
    (NULL, 'Jardim Zavanella'),
    (NULL, 'Parque Alvorada'),
    (NULL, 'Parque das Hortências'),
    (NULL, 'Parque das Laranjeiras'),
    (NULL, 'Parque Gramado'),
    (NULL, 'Parque Igaçaba'),
    (NULL, 'Parque Planalto'),
    (NULL, 'Parque Res. Iguatemi'),
    (NULL, 'Parque Res. Jardim do Valle'),
    (NULL, 'Parque Res. Laura Molina'),
    (NULL, 'Parque Res. Vale do Sol'),
    (NULL, 'Parque São Paulo'),
    (NULL, 'Res. Acapulco'),
    (NULL, 'Res. Cambuy'),
    (NULL, 'Res. Lupo e 2'),
    (NULL, 'São Geraldo'),
    (NULL, 'Selmi dei'),
    (NULL, 'Selmi dei 2'),
    (NULL, 'Selmi dei 3'),
    (NULL, 'Selmi dei 4'),
    (NULL, 'Selmi dei 5'),
    (NULL, 'Selmi dei 6'),
    (NULL, 'Victório de Santi'),
    (NULL, 'Vila Biagioni'),
    (NULL, 'Vila Cidade Industrial'),
    (NULL, 'Vila de Aracoara'),
    (NULL, 'Vila DER'),
    (NULL, 'Vila do Servidor'),
    (NULL, 'Vila Donofre'),
    (NULL, 'Vila Esperança'),
    (NULL, 'Vila Ferroviária'),
    (NULL, 'Vila Furlan'),
    (NULL, 'Vila Gaspar'),
    (NULL, 'Vila Guaianazes'),
    (NULL, 'Vila Harmonia'),
    (NULL, 'Vila Higia'),
    (NULL, 'Vila Melhado'),
    (NULL, 'Vila Melhado'),
    (NULL, 'Vila Progresso'),
    (NULL, 'Vila Santana'),
    (NULL, 'Vila Sedenho'),
    (NULL, 'Vila Standard'),
    (NULL, 'Vila Suconasa'),
    (NULL, 'Vila Vieira'),
    (NULL, 'Vila Xavier'),
    (NULL, 'Vila Yamada'),
    (NULL, 'Yolanda Ópice');

CREATE TABLE DESCARTADOR (
    emailDescartador VARCHAR(35) NOT NULL,
    senha VARCHAR(33) NOT NULL,
    nomeDescartador VARCHAR(15) NOT NULL,
    sbrnomeDescartador VARCHAR(15) NOT NULL,
    telDescartador VARCHAR(15) NOT NULL,
    ruaCasa VARCHAR(50) NOT NULL,
    nmrCasa INT NOT NULL,
    idBairro INT NOT NULL,
    PRIMARY KEY(emailDescartador),
    FOREIGN KEY (idBairro) REFERENCES BAIRRO (idBairro) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE COLETOR (
    emailColetor VARCHAR(35) NOT NULL,
    senha VARCHAR(33) NOT NULL,
    nomeColetor VARCHAR(15) NOT NULL,
    sbrnomeColetor VARCHAR(15) NOT NULL,
    telColetor VARCHAR(15) NOT NULL,
    PRIMARY KEY(emailColetor)
);

CREATE TABLE MATERIAL (
    idMaterial INT NOT NULL AUTO_INCREMENT,
    tipoMaterial VARCHAR(15) NOT NULL,
    PRIMARY KEY(idMaterial)
);

INSERT INTO `material`
    (`idMaterial`,
    `tipoMaterial`)
VALUES
    (NULL, 'Papel'),
    (NULL, 'Latinha'),
    (NULL, 'Plástico'),
    (NULL, 'PET'),
    (NULL, 'Vidro'),
    (NULL, 'Metal'),
    (NULL, 'Papelão');

CREATE TABLE COLETOR_MATERIAL (
    idMaterial INT NOT NULL,
    emailColetor VARCHAR(35) NOT NULL,
    PRIMARY KEY (idMaterial, emailColetor),
    FOREIGN KEY (emailColetor) REFERENCES COLETOR (emailColetor) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (idMaterial) REFERENCES MATERIAL (idMaterial) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE COLETOR_BAIRRO (
    idBairro INT NOT NULL,
    emailColetor VARCHAR(35) NOT NULL,
    PRIMARY KEY (idBairro, emailColetor),
    FOREIGN KEY (emailColetor) REFERENCES COLETOR (emailColetor) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (idBairro) REFERENCES BAIRRO (idBairro) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE COLETA (
    emailDescartador VARCHAR(35) NOT NULL, 
    dataColeta DATE NOT NULL,
    horaColeta TIME NOT NULL,
    emailColetor VARCHAR(35) NULL,
    idColeta INT NOT NULL AUTO_INCREMENT UNIQUE, 
    PRIMARY KEY (emailDescartador, dataColeta, horaColeta),
    FOREIGN KEY (emailDescartador) REFERENCES DESCARTADOR (emailDescartador) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (emailColetor) REFERENCES COLETOR (emailColetor) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE  COLETA_MATERIAL (
  idMaterial INT NOT NULL,
  idColeta INT NOT NULL,
  qtddMaterial FLOAT NOT NULL,
  PRIMARY KEY (idMaterial, idColeta),
  FOREIGN KEY (idColeta) REFERENCES COLETA (idColeta) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (idMaterial) REFERENCES MATERIAL (idMaterial) ON UPDATE CASCADE ON DELETE CASCADE

);

INSERT INTO `descartador`
    (`emailDescartador`,
    `senha`,
    `nomeDescartador`,
    `sbrnomeDescartador`,
    `telDescartador`,
    `ruaCasa`,
    `nmrCasa`,
    `idBairro`)
VALUES
    ('brunobastos@gmail.com',
    'b80d24bb1fad12b0e349e61533fccd66',
    'Bruno',
    'Bastos',
    '(16)99999-9992',
    'Av. Campos Elíseos',
    '123',
    '1'),
    ('carloscampos@gmail.com',
    '5c444e1fbd450527f9f20c9ddbc944d7',
    'Carlos',
    'Campos',
    '(16)99999-9993',
    'Rua do Bolo',
    '221',
    '2'),
    ('dinodiniz@gmail.com',
    'eb06e2e019de9f9dcc469ca29dbe015f',
    'Dino',
    'Diniz',
    '(16)99999-9994',
    'Av. Brasil',
    '128',
    '3'),
    ('erasmoernandes@gmail.com',
    '829294730fe34901300721108a5e1ae8',
    'Erasmo',
    'Ernandes',
    '(16)99999-9995',
    'Av. São João',
    '250',
    '4'),
    ('flaviofernandes@gmail.com',
    '9afa37bb19199d700123ce9fac7bf2c2',
    'Flávio',
    'Fernandes',
    '(16)99999-9996',
    'Av. Presidente Vargas',
    '789',
    '5');

INSERT INTO `coletor`
    (`emailColetor`,
    `senha`,
    `nomeColetor`,
    `sbrnomeColetor`,
    `telColetor`)
VALUES
    ('aldoalencar@gmail.com',
    '43d0a88d3257a160a1dbc1d778ec86a4',
    'Aldo',
    'Alencar',
    '(16)99999-9991');

INSERT INTO `coletor_material`
    (`idMaterial`,
    `emailColetor`)
VALUES
    ('1', 'aldoalencar@gmail.com'),
    ('2', 'aldoalencar@gmail.com'),
    ('3', 'aldoalencar@gmail.com'),
    ('4', 'aldoalencar@gmail.com'),
    ('5', 'aldoalencar@gmail.com'),
    ('6', 'aldoalencar@gmail.com'),
    ('7', 'aldoalencar@gmail.com');

INSERT INTO `coletor_bairro`
    (`idBairro`, `emailColetor`)
VALUES
    ('2', 'aldoalencar@gmail.com'),
    ('3', 'aldoalencar@gmail.com'),
    ('4', 'aldoalencar@gmail.com'),
    ('5', 'aldoalencar@gmail.com');