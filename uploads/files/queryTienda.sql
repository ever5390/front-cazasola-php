create database if not exists tienda;
use tienda;
create table if not exists usuario(
	id_usuario int primary key auto_increment,
	nombres varchar(30) not null,
	apellidos varchar(30) not null,
	correo varchar(30) not null,
	telefono int null default 55555555,
	direccion varchar(50) not null,
	usuario varchar(30) not null,
	contrasena varchar(30) not null,
	id_nivel int references nivel(id_nivel)
);

create table if not exists nivel(
	id_nivel int primary key auto_increment,
	descripcion_nivel varchar(50) not null
);

create table if not exists categoria(
	id_categoria int primary key auto_increment,
	descripcion varchar(40) not null
);

create table if not exists producto(
	id_producto int primary key auto_increment,
	nombre varchar(20) not null,
	precio double not null,
	stock int not null,
	id_categoria int references categoria(id_categoria)
);

alter table producto
add foto varchar(40) null;

create table if not exists factura(
	id_factura int primary key auto_increment,
	id_usuario int references cliente(id_usuario),
	fecha datetime
);

create table if not exists detalle_factura(
	id_factura int references factura(id_factura),
	id_producto int references producto(id_producto),
	cantidad int default 0,
	precio double
);

/* cambiamos el nombre de la columna :: CHANGE*/
alter table detalle_factura
change precio precioVendido double;

-- PROCEDIMIENTOS ALMACENADOS --
-- ************************** --

delimiter //
create procedure insert_detalle
(
	in id_factura int,
	in id_producto int,
	in cantidad int,
	in precioVendido double
)
begin 
	insert into detalle_factura values (id_factura, id_producto, cantidad, precioVendido);
end;//

call insert_detalle(1,1,5,10);
select * from detalle_factura;
select * from producto;

/* Llenado de datos, inserciones */

insert into nivel values (1, 'administrador'),
								 (2, 'vendedor'),
								 (3, 'cliente');
								 
								 
	
insert into categoria (descripcion) values ('calzado'),
													  ('carpinteria'),
													  ('ferreteria'),
													  ('computo'),
													  ('deportes');
													  
insert into producto (nombre, precio, stock, id_categoria) values ('zapatilla', 15.22, 50, 1),
																						('clavos', 1.20, 40, 2),
																						('soldimix', 5.40, 30, 3),
																						('placa madre asus', 300.22, 50, 4),
																						('pelota futbol', 8, 150, 5);

													
insert into usuario ( nombres, apellidos, correo, telefono, direccion, usuario, contrasena, id_nivel)
				values  ('ever junior','rosales pena','everjrosalesp@gmail.com',929814249,'santa anita','erosales','5390',1),
						  ('cinthia maria','eduardo ortiz','cinthia_maria_1504@gmail.com',991376315,'centro de lima','cmaria','1504',1),
						  ('fiorela patricia','armuto quispe','fiorellaparmuto@gmail.com',987456321,'santa anita','fiorearmuto','1111',2),
						  ('stefany','cordero chilin','stefy_5390@gmail.com',925874136,'agustino','stefanycordero','2222',3),
						  ('marvin edson','chavez hidalgo','marvinchavez@gmail.com',932569874,'manchay','mhidalgo','3333',2);
	
insert into factura (id_usuario, fecha) values (2,"2010-10-10");
																						
/*  creación de vistas */
 
create or replace view view_productos
as
select p.nombre, p.precio, p.foto,
 		  c.descripcion
from producto p inner join categoria c
on p.id_categoria = c.id_categoria;


-- select vista --
select * from view_productos;


/*  select´s */

select * from detalle_factura;
select * from factura;


create trigger detalle_trigger after insert on factura
for each row
insert into detalle_factura
values (new.id_factura, 2, 5, 15);

insert into factura (id_usuario, fecha) values (3,"2018-12-18");

-- creación de tabla virtual --

select max(id_factura) from factura;


select * from producto;

insert into producto (nombre, precio, stock, id_categoria) values ('maquinas', 15.22, 50, null);
