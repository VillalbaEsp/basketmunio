﻿DROP DATABASE IF EXISTS `basketmunio`;

CREATE DATABASE `basketmunio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `basketmunio`;

create table `usuarios`
(
  `id_usuario` int not null auto_increment,
  `apodo_usuario` varchar(25) not null,
  `nombre_usuario` varchar(40) not null,
  `apellidos_usuario` varchar(70) not null,
  `email_usuario` varchar(100) not null,
  `password_usuario` varchar(100) not null,
  `fecha_nacimiento_usuario` date not null,
  `codigo_activacion_usuario` varchar(20) not null
 comment 'código que se utiliza para la activación de la cuenta al registrarse.',
  `activado_usuario` char(1) not null default 0
 comment '0: cuenta desactivada
1: cuenta activada',
  primary key (`id_usuario`),
 unique `id_usuario` (`id_usuario`)
) engine = innodb
;

alter table `usuarios` add unique `apodo_usuario` (`apodo_usuario`)
;

alter table `usuarios` add unique `email_usuario` (`email_usuario`)
;


create table `jugadores`
(
  `id_jugador` int(11) not null auto_increment,
  `nombre_jugador` varchar(100) not null,
  `posicion_jugador` varchar(4) not null,
  `equipo_real_jugador` varchar(60) not null,
  `precio_jugador` int not null,
  primary key (`id_jugador`),
 unique `id_jugador` (`id_jugador`)
) engine = innodb
;


create table `ligas`
(
  `id_liga` int not null auto_increment,
  `nombre_liga` varchar(30) not null,
  `tipo_liga` char(2) not null
 comment 'pu: publico
pv: privado',
  `contraseña_liga` varchar(30)
 comment 'tiene contraseña solo si es privada.',
  primary key (`id_liga`)
) engine = innodb
;


create table `partidos_reales`
(
  `id_partido` int not null auto_increment,
  `fecha_hora_partido` datetime not null,
  `equipo_local_partido` varchar(60) not null,
  `equipo_visitante_partido` varchar(60) not null,
  `resultado_partido` varchar(9),
  primary key (`id_partido`)
) engine = innodb
;


create table `equipos`
(
  `id_equipo` int not null auto_increment,
  `id_usuario` int not null,
  `id_liga` int,
  `nombre_equipo` varchar(20) not null,
  `escudo_equipo` varchar(22) not null
 comment 'ejemplo: equipo4-amarillo.png',
  `presupuesto_equipo` int not null default 60000000,
  `pts_equipo` int not null default 0
 comment 'puntos equipo',
  primary key (`id_equipo`,`id_usuario`)
) engine = innodb
;

create index `ix_relationship30` on `equipos` (`id_liga`)
;

alter table `equipos` add unique `nombre_equipo` (`nombre_equipo`)
;


create table `jugadores_equipos`
(
  `id_jugador_equipo` int not null auto_increment,
  `id_equipo` int,
  `id_usuario` int,
  `id_jugador` int(11),
  primary key (`id_jugador_equipo`)
) engine = innodb
;

create index `ix_relationship31` on `jugadores_equipos` (`id_equipo`,`id_usuario`)
;

create index `ix_relationship32` on `jugadores_equipos` (`id_jugador`)
;


create table `jugadores_partidos_reales`
(
  `id_jugador` int(11) not null,
  `id_partido` int not null,
  `min_jugador_partido_real` int(2) not null default 0
 comment 'minutos jugados',
  `pts_jugador_partido_real` int(3) not null default 0
 comment 'puntos anotados',
  `ast_jugador_partido_real` int(2) not null default 0
 comment 'asistencias',
  `blk_jugador_partido_real` int(2) not null default 0
 comment 'tapones',
  `reb_jugador_partido_real` int(2) not null default 0
 comment 'rebotes totales',
  `dreb_jugador_partido_real` int(2) not null default 0
 comment 'rebotes defensivos',
  `oreb_jugador_partido_real` int(2) not null default 0
 comment 'rebotes ofensivos',
  `stl_jugador_partido_real` int(2) not null default 0
 comment 'robos'
) engine = innodb
;

alter table `jugadores_partidos_reales` add  primary key (`id_partido`,`id_jugador`)
;


create table `estadisticas_totales`
(
  `id_jugador` int(11) not null,
  `gp_estadistica_total` float(4) not null default 0,
  `min_estadistica_total` float(4) not null default 0
 comment 'minutos jugados',
  `pts_estadistica_total` float(4) not null default 0
 comment 'puntos anotados',
  `ast_estadistica_total` float(4) not null default 0
 comment 'asistencias',
  `blk_estadistica_total` float(4) not null default 0
 comment 'tapones',
  `reb_estadistica_total` float(4) not null default 0
 comment 'rebotes totales',
  `dreb_estadistica_total` float(4) not null default 0
 comment 'rebotes defensivos',
  `oreb_estadistica_total` float(4) not null default 0
 comment 'rebotes ofensivos',
  `stl_estadistica_total` float(4) not null default 0
 comment 'robos'
) engine = innodb
;

alter table `estadisticas_totales` add  primary key (`id_jugador`)
;


create table `jugador_libre`
(
  `id_jugador_libre` int not null auto_increment,
  `id_jugador` int(11),
  `id_liga` int,
  primary key (`id_jugador_libre`)
)
;

create index `ix_relationship33` on `jugador_libre` (`id_jugador`)
;

create index `ix_relationship37` on `jugador_libre` (`id_liga`)
;


alter table `equipos` add constraint `tiene` foreign key (`id_usuario`) references `usuarios` (`id_usuario`) on delete cascade on update cascade
;

alter table `jugadores_partidos_reales` add constraint `relationship25` foreign key (`id_partido`) references `partidos_reales` (`id_partido`) on delete cascade on update cascade
;

alter table `jugadores_partidos_reales` add constraint `relationship26` foreign key (`id_jugador`) references `jugadores` (`id_jugador`) on delete cascade on update cascade
;

alter table `estadisticas_totales` add constraint `relationship29` foreign key (`id_jugador`) references `jugadores` (`id_jugador`) on delete cascade on update cascade
;

alter table `equipos` add constraint `relationship30` foreign key (`id_liga`) references `ligas` (`id_liga`) on delete cascade on update cascade
;

alter table `jugadores_equipos` add constraint `relationship31` foreign key (`id_equipo`, `id_usuario`) references `equipos` (`id_equipo`, `id_usuario`) on delete cascade on update cascade
;

alter table `jugadores_equipos` add constraint `relationship32` foreign key (`id_jugador`) references `jugadores` (`id_jugador`) on delete cascade on update cascade
;

alter table `jugador_libre` add constraint `relationship33` foreign key (`id_jugador`) references `jugadores` (`id_jugador`) on delete cascade on update cascade
;

alter table `jugador_libre` add constraint `relationship37` foreign key (`id_liga`) references `ligas` (`id_liga`) on delete cascade on update cascade
;