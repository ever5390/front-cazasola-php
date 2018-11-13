create database if not exists drive_unac;
use drive_unac;
create table if not exists usuario(
	codigo int auto_increment primary key,
	usuario varchar(20) not null,
	contrasena varchar(20) not null,
	nivel int not null,
	nombres varchar(40) null,
	dni int null,
	correo varchar(40) null,
	telefono int null,
	imagen varchar(50) null
);

-- create table if not exists nivel(
-- 	id_nivel int auto_increment primary key,
-- 	nivel varchar(20) not null
-- );

create table if not exists curso(
	id_curso int auto_increment primary key,
	nombre varchar(50) not null;
);

create table if not exists archivo(
	id_archivo int auto_increment primary key,
	nombre varchar(100) null,
	tipo_archivo int null,
	id_curso int null,
	id_usuario int null,
	CONSTRAINT fk_curso FOREIGN KEY (id_curso) REFERENCES curso(id_curso),
	CONSTRAINT fk_user FOREIGN KEY (id_usuario) REFERENCES usuario(codigo),
);

insert into nivel values (	null, 'profesor'),
									(null, 'alumno');
									
insert into usuario values 
				(null, 'user_casazola','12345',1 ,'Oswaldo Daniel Cazasola Salas', 12345678 ,'cazasolad@gmail.com',258963147,'moto.jpg'),
				(null, 'user_casazola','12345',1 ,'Oswaldo Daniel Cazasola Salas', 12345678 ,'cazasolad@gmail.com',258963147,'zapatilla.jpg'),
				(null, 'user_casazola','12345',1 ,'Oswaldo Daniel Cazasola Salas', 12345678 ,'cazasolad@gmail.com',258963147,'moldimix.jpg');
	