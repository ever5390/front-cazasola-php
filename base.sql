create database if not exists drive_unac;
use drive_unac;
create table usuario(
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

create table nivel(
	id_nivel int auto_increment primary key,
	nivel varchar(20) not null
);


insert into nivel values (	null, 'profesor'),
									(null, 'alumno');
									
insert into usuario values 
				(null, 'user_casazola','12345',1 ,'Oswaldo Daniel Cazasola Salas', 12345678 ,'cazasolad@gmail.com',258963147,'moto.jpg'),
				(null, 'user_casazola','12345',1 ,'Oswaldo Daniel Cazasola Salas', 12345678 ,'cazasolad@gmail.com',258963147,'zapatilla.jpg'),
				(null, 'user_casazola','12345',1 ,'Oswaldo Daniel Cazasola Salas', 12345678 ,'cazasolad@gmail.com',258963147,'moldimix.jpg');
				