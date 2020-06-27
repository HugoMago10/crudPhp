/*
  autor: Hugo Martinez Gonzalez
  Correo: hugo.mrtz.glez10@gmail.com
*/
create database estudiante;

  use estudiante;

  drop table if exists alumno, direccion;

  create table alumno(
    id_alumno int primary key auto_increment,
    nombre varchar(60),
    apeMat varchar (60),
    apePat varchar (60),
    fecha_nac date
  );

  create table direccion(
    id_direccion int primary key auto_increment,
    calle varchar (60),
    numero int,
    colonia varchar (80),
    municipio varchar (80),
    estado varchar (80),
    id_alumno int not null unique,
    foreign key (id_alumno) references alumno (id_alumno) on delete cascade
  );

insert into alumno (nombre, apeMat, apePat, fecha_nac) values ("Juan","Carlos",
"Garcia","1998-04-12");
insert into alumno (nombre, apeMat, apePat, fecha_nac) values ("Wendy","Esmeralda",
"Sandoval","1994-08-22");
insert into alumno (nombre, apeMat, apePat, fecha_nac) values ("Andrea","Escalona",
"Peralta","1993-18-01");

insert into direccion (calle,numero,colonia,municipio,estado,id_alumno)
values("Nogal",123,"La Lomita","San Isidro", "Las Palmas",1);
insert into direccion (calle,numero,colonia,municipio,estado,id_alumno)
values("Santa Rosa",123,"La crucecita","San Pablo", "La Cruz",2);
insert into direccion (calle,numero,colonia,municipio,estado,id_alumno)
values("Las Rosas",123,"San Juan","Lirio del Campo", "Fresnos",3);

select * from alumno left join direccion
on alumno.id_alumno = direccion.id_direccion;
