create database roomsync;

use roomsync;

create table usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    tipo_usuario VARCHAR(255),
    nome_usuario VARCHAR(255),
    email_usuario VARCHAR(255),
    senha_usuario VARCHAR(255),
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create table eventos (
	id_evento int auto_increment primary key, 
	id_solicitador int,
	titulo_evento varchar(255),
	descricao_evento varchar(255),
	comeco_evento timestamp null,
	fim_evento timestamp null,
	sala_evento varchar(255)   
);
create table eventosPendentes (
	id_evento int auto_increment primary key, 
	id_solicitador int,
	titulo_evento varchar(255),
	descricao_evento varchar(255),
	comeco_evento timestamp null,
	fim_evento timestamp null,
	sala_evento varchar(255)  
);

