use drive_unac;

create table if not exists curso(
	id_curso int auto_increment primary key,
	nombre_curso varchar(50) not null
);

insert into curso values (null, 'QUIMICA');
insert into curso values (null, 'FISICA');
insert into curso values (null, 'ARQUITECTURA DEL COMPUTADOR');
insert into curso values (null, 'ANALISIS DE SISTEMAS');
insert into curso values (null, 'BASE DE DATOS');
insert into curso values (null, 'SISTEMAS DE INFORMACION');
insert into curso values (null, 'TEORIA GENERAL DE SISTEMAS');
insert into curso values (null, 'LENGUAJE ENSAMBLADOR');

create table if not exists horario(
	id_horario int auto_increment primary key,
	id_curso int not null,
	dia_asignado varchar(20) null,
	horainicio varchar(10) null,
	horafin varchar(10) null,
	constraint fk_curso_horario foreign key (id_curso) references curso(id_curso)
);

insert into horario values (null,8,'Lunes','10:00','13:30'),
									(null,2,'Jueves','08:00','12:30'),
									(null,3,'Lunes','10:00','13:30'),
									(null,3,'Jueves','08:00','12:30'),
									(null,4,'Lunes','10:00','13:30'),
									(null,5,'Jueves','08:00','12:30'),
									(null,5,'Lunes','10:00','13:30'),
									(null,5,'Jueves','08:00','12:30'),
									(null,6,'Lunes','10:00','13:30'),
									(null,6,'Jueves','08:00','12:30'),
									(null,7,'Lunes','10:00','13:30'),
									(null,4,'Jueves','08:00','12:30'),
									(null,1,'Lunes','10:00','13:30'),
									(null,2,'Lunes','10:00','13:30');
									(null,7,'Lunes','10:00','13:30');
									
create view view_horario_curso
as
select h.id_curso, h.dia_asignado, h.horainicio, h.horafin, c.nombre_curso
from horario as h
inner join curso as c
on h.id_curso = c.id_curso;


select * from view_horario_curso;

create table if not exists detalle_curso_prof(
	id_detallecp int auto_increment primary key,
	id_curso int not null,
	id_user int not null,
	CONSTRAINT fk_curso_prof FOREIGN KEY (id_curso) REFERENCES curso(id_curso),
	CONSTRAINT fk_user_prof FOREIGN KEY (id_user) REFERENCES usuario(codigo)
	
);

insert into detalle_curso_prof values 			  (null, 1, 3),
												  (null, 2, 3),
												  (null, 3, 3),
												  (null, 4, 2),
												  (null, 5, 2),
												  (null, 6, 1),
												  (null, 7, 1),
												  (null, 8, 1),
												  (null, 2, 2),
												  (null, 3, 2),
												  (null, 5, 4),
												  (null, 1, 4),
												  (null, 7, 4),
												  (null, 8, 4),
												  (null, 2, 4),
												  (null, 3, 4),
												  (null, 6, 4),
												  (null, 6, 2),
												  (null, 7, 2),
												  (null, 8, 2);
create table if not exists archivo(
	id int auto_increment primary key,
	titulo varchar(40) null,
	descripcion varchar(50) null,
	tipo_archivo int not null,
	id_curso int not null,
	id_usser int not null,
	constraint fk_id_curso_archivo foreign key (id_curso) references curso(id_curso),
	constraint fk_id_user_archivo foreign key (id_usser) references usuario(codigo)
);

insert into archivo values (null, 'Syllabus blandos','loremipsum dolor detsmani logiigion ..',1,6,1),
									(null, 'sistemas blandos','loremipsum dolor detsmani logiigion ..',2,6,1),
									(null, 'sistemas blandos','loremipsum dolor detsmani logiigion ..',2,6,1),
									(null, 'sistemas blandos','loremipsum dolor detsmani logiigion ..',2,7,1),
									(null, 'sistemas blandos','loremipsum dolor detsmani logiigion ..',2,7,1),
									(null, 'sistemas blandos','loremipsum dolor detsmani logiigion ..',12,8,1);
select * from archivo where id_usser = 1 and id_curso = 6;

select * from detalle_curso_prof where id_user = 3;

create view view_curso_detalle
as
select c.nombre_curso, c.id_curso, dt.id_user
from curso as c
inner join detalle_curso_prof as dt
on c.id_curso = dt.id_curso;

select * from view_curso_detalle;
select * from view_horario_curso;
select * from view_horario_curso where id_curso = 3;
