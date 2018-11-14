create view view_horario_curso
as
select h.id_curso, h.dia_asignado, h.horainicio, h.horafin, c.nombre
from horario as h
inner join curso as c
on h.id_curso = c.id_curso;

select * from view_horario_curso;
select * from view_horario_curso where id_user = 1;
select * from view_horario_curso where id_curso = 1;

create view view_curso_detalle_usuario
as
select c.nombre, c.id_curso, dt.id_user,us.nivel
from detalle_curso_prof as dt
inner join curso as c
on dt.id_curso = c.id_curso
inner join usuario as us
on dt.id_user = us.codigo;

select * from view_curso_detalle_usuario;
select * from view_curso_detalle_usuario where nivel = 1;
select * from view_curso_detalle_usuario where id_user = 2;

select * from view_horario_curso where id_curso = 2;