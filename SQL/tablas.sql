CREATE TABLE usuarios (
    id varchar(50) NOT NULL,PRIMARY KEY (id),
    nombre varchar(50) NOT NULL,
    apellidos varchar(50) NOT NULL,
    email varchar(100) NOT NULL,UNIQUE KEY (email),
    provincia varchar(50) NOT NULL,
    municipio varchar(50) NOT NULL,
    codigo_postal varchar(20) NOT NULL,
    password varchar(128) NOT NULL
    principios varchar(50) NULL,
    objetivo_moral varchar(50) NULL,
    lema varchar(400) NULL,
    nick_amigos varchar(50) NULL FOREIGN KEY (nick_amigos) REFERENCES usuarios(nick),
    nick_familia varchar(50) NULL FOREIGN KEY (nick_familia) REFERENCES usuarios(nick),
    puntuacion_familia int(3) NULL,
    puntuacion_amigos int(3) NULL,
    puntuacion_tribunal int(3) NULL,
    fecha_modificacion timestamp NULL ON UPDATE CURRENT_TIMESTAMP,
    fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
    
)ENGINE=InnoDB;

