CREATE TABLE usuarios (
    nick varchar(50) NOT NULL,
    nombre varchar(50) NOT NULL,
    apellidos varchar(50) NOT NULL,
    email varchar(100) NOT NULL,UNIQUE KEY (email),
    provincia varchar(50) NOT NULL,
    municipio varchar(50) NOT NULL,
    codigo_postal varchar(20) NOT NULL,
    password varchar(128) NOT NULL,
    principios varchar(50) NULL,
    objetivo_moral varchar(50) NULL,
    lema varchar(400) NULL,
    nick_amigos varchar(50) NULL,
    nick_familiar varchar(50) NULL,
    
    puntuacion_familia int(3) NULL,
    puntuacion_amigos int(3) NULL,
    puntuacion_tribunal int(3) NULL,
    fecha_modificacion timestamp NULL ON UPDATE CURRENT_TIMESTAMP,
    fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pk_usuario PRIMARY KEY (nick),
    CONSTRAINT uq_email UNIQUE KEY (email),
    CONSTRAINT fk_usuario_amigo FOREIGN KEY (nick_amigos) REFERENCES usuarios(nick),
    CONSTRAINT fk_usuario_familiar FOREIGN KEY (nick_familiar) REFERENCES usuarios(nick)
    
)ENGINE=InnoDB;

CREATE TABLE amigos (
   
    nick_usuario varchar(50) NOT NULL,
    nick_amigo varchar(50) NOT NULL,
    solicitud_amistad varchar(10) NOT NULL DEFAULT 'pendiente',
    fecha_modificacion timestamp NULL ON UPDATE CURRENT_TIMESTAMP,
    fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pk_amigos PRIMARY KEY (nick_usuario,nick_amigo),
    CONSTRAINT fk_amigos_usuario FOREIGN KEY (nick_usuario) REFERENCES usuarios(nick),
    CONSTRAINT fk_amigos_amigo FOREIGN KEY (nick_amigo) REFERENCES usuarios(nick)
    )ENGINE=InnoDB;
    
   
CREATE TABLE familiares (
    nick_usuario varchar(50) NOT NULL,
    nick_familiar varchar(50) NOT NULL,
    solicitud_familia varchar(10) NOT NULL DEFAULT 'pendiente',
    fecha_modificacion timestamp NULL ON UPDATE CURRENT_TIMESTAMP,
    fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pk_familia PRIMARY KEY (nick_usuario,nick_familiar),
    CONSTRAINT fk_familiares_usuario FOREIGN KEY (nick_usuario) REFERENCES usuarios(nick),
    CONSTRAINT fk_familiares_familiar FOREIGN KEY (nick_familiar) REFERENCES usuarios(nick)
    )ENGINE=InnoDB;
